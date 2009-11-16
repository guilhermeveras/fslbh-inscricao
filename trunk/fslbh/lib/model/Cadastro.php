<?php

class Cadastro extends BaseCadastro
{
	public function hasTrabalhos()
	{
		return ($this->getsfGuardUser()->getUsuariosTrabalhos());
	}
	
	public function getTrabalhoSubmetido()
	{
		return (($this->hasTrabalhos())?"Sim":"Não");
	}
	
    public function getTrabalhoTitulo()
	{
		if ($this->hasTrabalhos())
		{
			$trabalhos = "";
			foreach ($this->getsfGuardUser()->getUsuariosTrabalhosJoinTrabalho() as $trabalho)
			{
				if ($trabalhos != "") $trabalhos .= ", ";
				//$trabalhos .= $trabalho->getTrabalho()->getTitulo() . "#" . $trabalho->getTrabalho()->getArquivo() ."#";
				$trabalhos .= link_to($trabalho->getTrabalho()->getTitulo(), '/uploads/submissoes/'.$trabalho->getTrabalho()->getArquivo());
			}
			
			return $trabalhos;
		} else {
			return "-";
		}
	}
	
    public function getEixoTematico()
	{
	    if ($this->hasTrabalhos())
		{
			$trabalhos = "";
			foreach ($this->getsfGuardUser()->getUsuariosTrabalhosJoinTrabalho() as $trabalho)
			{
				if ($trabalhos != "") $trabalhos .= ", ";
				$trabalhos .= $trabalho->getTrabalho()->getEixoTematico();
			}
			
			return $trabalhos;
		} else {
			return "-";
		}
	}
	
    public function getTrabalhoSituacao()
	{
	    if ($this->hasTrabalhos())
		{
			$trabalhos = "";
			foreach ($this->getsfGuardUser()->getUsuariosTrabalhosJoinTrabalho() as $trabalho)
			{
				if ($trabalhos != "") $trabalhos .= ", ";
				if (is_null($trabalho->getTrabalho()->getAprovado()))
					$trabalhos .= "Não avaliado";
				else if ($trabalho->getTrabalho()->getAprovado())
					$trabalhos .= "Aprovado";
				else $trabalhos .= "Não aprovado";
			}
			
			return $trabalhos;
		} else {
			return "-";
		}
	}
	
    public function valida($aprovado = false)
    {	 
	    $this->setValidado($aprovado);
	    $this->save();
	    
    	$this->sendConfirmacaoValida();
    }

	public function getPublicacaoLink()
	{
  		return link_to($this->getBlogArticle()->getTitle(), 'article_edit', $this->getBlogArticle());
	}
     
    public function sendConfirmacaoValida()
  {
   	
		$to = $this->getEmailPessoal().", ".$this->getEmailProfissional();
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: Inscrição Online - ESP/MG <inscricao@esp.mg.gov.br>' . "\r\n";
		$subject = 'Confirmação de Inscrição - ESP/MG';
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
	Prezado(a) <strong> '.$this->getNome().'</strong>,
<br />
	Parabens sua inscrição no evento foi efetivada com sucesso. <br /> 
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
  
    public function getLinkedNome()
    {
    	return link_to($this->getNome(), 'cadastro/ficha?id='. $this->getId(), array('target'=>'_blank'));
    }
    
}