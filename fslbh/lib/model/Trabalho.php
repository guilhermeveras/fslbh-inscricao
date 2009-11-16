<?php

class Trabalho extends BaseTrabalho
{
	public function __toString()
	{
		return $this->getTitulo();
	}
	
	public function getAutor()
	{
		return $this->getPrimeiroNome()." ".$this->getNomeMeio()." ".$this->getSobrenome();
	}
	
	public function hasCoAutores()
	{
		return ($this->getCoAutors());	
	}
	
    public function getAutores()
	{
	    $coautores = "";
	    
		if ($this->hasCoAutores())
		{
			foreach ($this->getCoAutors() as $coautor)
			{
				$coautores .= ", ".$coautor;
			}
		}
		
		return $this->getAutor().$coautores;
	}
	
	public function getCorrespondencia()
	{
		if ($this->getContatoCorrespondencia())
		{
			return $this->getEmail();
		} else if (!$this->hasCoAutores()) {
			return $this->getEmail();
		} else {
			foreach ($this->getCoAutors() as $coautor)
			{
				if ($coautor->getContatoCorrespondencia())
				{
					return $coautor->getEmail();
				}
			}
		}
	}
	
	public function getNomeCorrespondencia()
	{
		if ($this->getContatoCorrespondencia())
		{
			return $this->getAutor();
		} else if (!$this->hasCoAutores()) {
			return $this->getAutor();
		} else {
			foreach ($this->getCoAutors() as $coautor)
			{
				if ($coautor->getContatoCorrespondencia())
				{
					return $coautor;
				}
			}
		}
	}
	
    public function valida($aprovado = false)
    {	 
	    $this->setAprovado($aprovado);
	    $this->save();
	    
    	$this->sendConfirmacaoValida();
    }
    
     
  public function sendConfirmacaoValida()
  {
   	
		$to = $this->getCorrespondencia();
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: Inscrição Online - ESP/MG <inscricao@esp.mg.gov.br>' . "\r\n";
		$subject = 'Resultado da avaliação de seu trabalho - ESP/MG';
		$message = '
<html>
<head>
 	  <title>Inscrição Online</title>
</head>
<body>
<center>
      <small>Atenção este e-mail foi gerado automaticamente favor não responder.</small>
<br>
<table>
<tr>
<td>
<center>
	<img src="http://inscricao.esp.mg.gov.br/admin/images/images-io/topo_email_inscricao.png" />
</center>
</td>
</tr>
<tr>
<td>
<br />
<br />
	Prezado(a) <strong> '.$this->getNomeCorrespondencia().'</strong>,
<br />
    O seu trabalho, <strong>'.$this->getTitulo().'</strong>, '.($this->getAprovado()?"foi":"não foi").' aprovado pela comissão.
	Para obter mais informações acesse <a href="http://saudecoletiva.esp.mg.gov.br" target="_blank">http://saudecoletiva.esp.mg.gov.br</a>.<br />
	<br />
	Atenciosamente,<br />
	Escola de Saúde Pública do Estado de Minas Gerais.<br />
	http://www.esp.mg.gov.br
	
	
	
<br />

</td>
</tr>
</table>
</center>
</body>
</html>
';
	mail($to, $subject, $message, $headers);
  	
  }
}
