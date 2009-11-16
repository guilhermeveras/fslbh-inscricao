<?php

/**
 * relatorio actions.
 *
 * @package    sf_sandbox
 * @subpackage relatorio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class relatorioActions extends sfActions
{
  const REPORT_FULL_LIST      = 1;
  const REPORT_ONLY_CONFIRMED = 2;
  const REPORT_APROVED_WORKS  = 3;
  const REPORT_ALL_WORKS      = 4; 
  const REPORT_BY_PALESTRA    = 5;
  
  private function setHeader($report)
  {
  		$header = '';
  		
  		switch ($report)
  		{
  			case self::REPORT_FULL_LIST      : $header .= "Relatório Geral de Cadastros\n\n"; break;
  			case self::REPORT_ONLY_CONFIRMED : $header .= "Relatório Geral de Inscrições Corfimadas\n\n"; break;
  			case self::REPORT_APROVED_WORKS  : $header .= "Relatório de Trabalhos aprovados\n\n"; break;
  			case self::REPORT_APROVED_WORKS  : $header .= "Relatório Geral de Trabalhos Submetidos\n\n"; break;
  		}
  		
  		$header .= "Nome \t";
		$header.= "Instituição de Trabalho \t";
		$header .= "Primeira opção de oficina\t";
		$header .= "Segunda opção de oficina\t";
		$header.= "CPF \t"; 
  		$header.= "E-mail Pessoal \t";
		$header.= "E-mail Profissional \t";
		$header.= "Logradouro \t"; 	
		$header.= "Número \t"; 				
		$header.= "Complemento \t";	
		$header.= "CEP \t"; 	 	
		$header.= "Bairro \t"; 	 	
		$header.= "Município \t"; 	 	
		$header.= "Estado  \t"; 	 	
//		$header.= "Identificação do participante \t"; 	 	
		$header.= "Telefone \t";
		$header.= "Data de cadastro \t";  	 	
		
		if ($report == self::REPORT_FULL_LIST)
			$header.= "Situação \t"; 
  		
		return $header;
  }
  
  private function setContent($list, $report)
  {
  		$oficinas = array(                                                                                    '' => '',
				                                                   '1'=>'Educação é bom e o KDE gosta!',
				                                                   '2'=>'SAMBA4 + AD DEPLOYMENT TOOLS',
				                                                   '3' => 'OPENSTREETMAP',
				'4' => 'Aprendendo a usar e contribuir com o Software Livre',
				  '5' => 'Software Livre, Open Source e Licenças',
				                                                                '6' => 'Asterisk fácil e rápido no Ubuntu',
				                                                           '7' => 'Debian custom and Debian BR-Desktop',
				                                                         '8' => 'Animação e modelagem com Blender e Gimp',
				                                                        '9' => 'Funcionalidades KDE 4.X e KDE-MG',
				                                                      '10' => 'Conhecimento e Liberdade: Uma mão lava a outra se estiverem livres',
				                                                      '11' => 'VIM! Typing like a hurricane!',
				                                                     '12' => 'Libertas Debian e ferramenta para criação de distribuições',
				                                                   '13' => 'Patchs de contribuição para o KDE',
				                                                 '14' => 'Introdução a Modelagem e Desenvolvimento Ágil de Sistemas com Symfony',
				                                                '15' => 'Aprendendo Django com o EMA',
				                                              '16' => 'XMPP/Jabber: Liberdade também nos bate-papos',
				                                             '17' => 'Evolução do Software Livre'
				 );
  		$dados = '';
  		
  		foreach($list as $item)
		{		
				// Dados
				$dados .=  $item->getNome()." \t";
				$dados .=  $item->getInstituicaoTrabalho()." \t";
				$dados .=  $oficinas[$item->getOpcao1Oficina()]." \t";
				$dados .=  $oficinas[$item->getOpcao2Oficina()]." \t";
				$dados.= $item->getCpf()." \t";  
				$dados.= $item->getEmailPessoal()." \t";
				$dados.= $item->getEmailProfissional()." \t";  
				$dados.=  $item->getLogradouro()." \t";
				$dados.=  $item->getNumero()." \t";  
				$dados.= $item->getComplemento()." \t";
				$dados.= $item->getCep()." \t";  
				$dados.= $item->getBairro()." \t";   
				$dados.= $item->getMunicipio()." \t";
				$dados.= $item->getEstado()." \t";  
//				$dados.= $item->getIdentificacaoParticipante()." \t";  
				$dados.= $item->getTelefone()." \t";  
				$dados.= date("d/m/Y",strtotime($item->getCreatedAt()))." \t";
				
				if ($report == self::REPORT_FULL_LIST)
					$dados.= ($item->getValidado()?"Confirmado":"Não confirmado")."\n";
				else $dados.= "\n";
		}	
		
		return $dados;
  }
  
  private function doReport($list, $report)
  {
		// Define o cabeçalho
		$cabecalho = $this->setHeader($report);
		
		// Define o conteudo
		$conteudo = $this->setContent($list, $report);
		
		// Retorna o resultado
		return "$cabecalho\n$conteudo";
  }
  
  private function setDocumentHeader()
  {
  		header("Content-type: application/octet-stream");
		// este cabeçalho abaixo, indica que o arquivo deverá ser gerado para download (parâmetro attachment) e o nome dele será o contido dentro do parâmetro filename.
		header("Content-Disposition: attachment; filename=relatorio.xls");
		// No cache, ou seja, não guarda cache, pois é gerado dinamicamente
		header("Pragma: no-cache");
		// Não expira
		header("Expires: 0");
  }
  
  private function DefineFilterForReport($report)
  {
  	   $c = new Criteria();
//	   $c->addJoin(CadastroPeer::IDENTIFICACAO_PARTICIPANTE_ID, IdentificacaoParticipantePeer::ID);         
	   $c->addAscendingOrderByColumn(CadastroPeer::OPCAO_1_OFICINA);
	   $c->addAscendingOrderByColumn(CadastroPeer::CREATED_AT);
	   $c->addAscendingOrderByColumn(CadastroPeer::NOME);

	   
	   // Filtra os confirmados
	   if ($report == self::REPORT_ONLY_CONFIRMED)
	   		$c->add(CadastroPeer::VALIDADO, true);
	   if ($report == self::REPORT_BY_PALESTRA)
	   {
	   	$c->add(CadastroPeer::OPCAO_1_OFICINA, $this->getUser()->getAtribute('oficina'));
	   }

		
	   return $c;
  }
  
  private function getList($filtro)
  {
  	   // Executa a consulta
	   $resultado = CadastroPeer::doSelect($filtro);
	   
	   return $resultado;
  }
  
  private function generateReport($report)
  {
  	    //Define o cabecalho
		$this->setDocumentHeader($report);
				
		// Gera o arquivo XLS
		print $this->doReport($this->getList($this->DefineFilterForReport($report)), $report);
  }
  
  public function executeCadastrados()
  {
  		// Gera o relatorio
	  	$this->generateReport(self::REPORT_FULL_LIST);
		
		return sfView::NONE;
  }
  
  public function executeConfirmados()
  {
  		// Gera o relatorio
	   	$this->generateReport(self::REPORT_ONLY_CONFIRMED);
	   	
		return sfView::NONE;
  }

  public function executePalestra($request)
  {
  	$oficina = $request->getParameter('oficina');
  	if (isset($oficina))
	{
		$this->getUser()->setAttribute('oficina', $oficina);
		// Gera o relatorio
		                $this->generateReport(self::REPORT_BY_PALESTRA);

				                return sfView::NONE;
	}
  }
}
