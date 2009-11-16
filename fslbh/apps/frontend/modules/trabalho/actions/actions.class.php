<?php                                                                                                          

/**
 * trabalho actions.
 *                  
 * @package    sf_sandbox
 * @subpackage trabalho  
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */                                                                           
class trabalhoActions extends sfActions                                       
{                                                                             
  public function executeIndex(sfWebRequest $request)                         
  {                                                                           
    $c = new Criteria();                                                      
                                                                              
    $c->add(UsuariosTrabalhoPeer::USUARIO_ID, $this->getUser()->getGuardUser()->getId());
                                                                                         
        $this->trabalho_list = UsuariosTrabalhoPeer::doSelectJoinTrabalho($c);           
                                                                                         
    $this->reached_works_limit = (UsuariosTrabalhoPeer::doCount($c) >= 2);               
  }                                                                                      

  public function executeNew(sfWebRequest $request)
  {

  	    if (date("y-m-d") >  date("d-m-y",strtotime("7-08-09")))
    	$this->setTemplate('encerradas');
    	
    if (!$this->checkNumberOfWorks() && !$this->Expired())
                $this->form = new TrabalhoForm();         
        else $this->redirect('trabalho/index');           
  }                                                       

  public function executeCreate(sfWebRequest $request)
  {                                                   
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TrabalhoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }                           

  public function executeEdit(sfWebRequest $request)
  {
		$c = new Criteria();
		$c->add(UsuariosTrabalhoPeer::USUARIO_ID, $this->getUser()->getGuardUser()->getId());
		$c->add(UsuariosTrabalhoPeer::TRABALHO_ID, $request->getParameter('id'));
        $user_trabalho_list = UsuariosTrabalhoPeer::doSelectOne($c);

        $this->forward404Unless($user_trabalho_list);
        
        
        if (!$this->Expired())                      
        {                                           
            $this->forward404Unless($trabalho = TrabalhoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object trabalho does not exist (%s).', $request->getParameter('id')));                                                                                                 
            $this->form = new TrabalhoForm($trabalho);                                                                                         
                                                                                                                                               
            $this->coautores = $trabalho->getCoAutors();                                                                                       
                                                                                                                                               
            foreach($this->coautores as $coautor)                                                                                              
            {                                                                                                                                  
                $this->form->embedForm('coautor_existente'.$coautor->getId(), new CoAutorForm($coautor));                                      
            }                                                                                                                                  
    } else {                                                                                                                                   
            $this->redirect('trabalho/index');                                                                                                 
    }                                                                                                                                          
  }                                                                                                                                            

  public function executeUpdate(sfWebRequest $request)
  {                                                   
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($trabalho = TrabalhoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object trabalho does not exist (%s).', $request->getParameter('id')));                                                                                                             
    $this->form = new TrabalhoForm($trabalho);                                                                                                 
        $this->coautores = $trabalho->getCoAutors();                                                                                           

        $myfields = $request->getParameter('trabalho');

    foreach($this->coautores as $coautor)
    {                                    
        // Add the form field only if it wasn't deleted
        if (isset($myfields['coautor_existente'.$coautor->getId()]))
        {                                                           
                $this->form->embedForm('coautor_existente'.$coautor->getId(), new CoAutorForm($coautor));
        }                                                                                                
    }                                                                                                    
                                                                                                         
    $this->processForm($request, $this->form);                                                           

    $this->setTemplate('edit');
  }                            

  public function executeDelete(sfWebRequest $request)
  {                                                   
    $request->checkCSRFProtection();                  

    $this->forward404Unless($trabalho = TrabalhoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object trabalho does not exist (%s).', $request->getParameter('id')));                                                                                                             
    $trabalho->delete();                                                                                                                       

    $this->redirect('trabalho/index');
  }                                   

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())                                                                       
    {                                                                                           
      $trabalho = $form->save();                                                               

      $this->sendConfirmacaoSubmissao($trabalho);
                                                 
      $this->redirect('trabalho/index');         
    }                                            
  }                                              
                                                 
  public function checkNumberOfWorks()           
  {                                              
        $c = new Criteria();                     
                                                 
    $c->add(UsuariosTrabalhoPeer::USUARIO_ID, $this->getUser()->getGuardUser()->getId());
                                                                                         
        $this->trabalho_list = UsuariosTrabalhoPeer::doSelectJoinTrabalho($c);           
                                                                                         
    return (UsuariosTrabalhoPeer::doCount($c) >= 2);                                     
  }                                                                                      
                                                                                         
  public function executeAprovados()                                                     
  {                                                                                      
        $c = new Criteria();                                                             
                                                                                         
    $c->add(TrabalhoPeer::APROVADO, true);                                               
                                                                                         
    $c->addAscendingOrderByColumn(TrabalhoPeer::PRIMEIRO_NOME);                          
                                                                                         
        $this->trabalho_list = TrabalhoPeer::doSelect($c);                               
  }                                                                                      
                                                                                         
  public function executeAddCoAutor(sfWebRequest $request)                               
  {                                                                                      
    $coautorIndex = $request->getParameter('coautor_index');                             
    $this->forward404Unless($coautorIndex);                                              
                                                                                         
    $embedName = 'coautor'.$coautorIndex; // the unique name to give this form           
    $form = new TrabalhoForm();                                                          
    $form->addNewCoAutorField($embedName);                                               
                                                                                         
    $output =                                                                            
                                                                                         
    "<div id=\"coautor".$coautorIndex."\">                                               
    <span><a href=\"#\" onclick=\"document.getElementById('coautor".$coautorIndex."').innerHTML = '';\">remover este co-autor</a></span>
    <span class=\"area_campo\">                                                                                                         
        <div class=\"label\">".$form[$embedName]['primeiro_nome']->renderLabel(). "</div>                                               
        <div class=\"campo\">".$form[$embedName]['primeiro_nome'] ."</div>                                                              
        <div class=\"erro\">". $form[$embedName]['primeiro_nome']->renderError() ."</div>                                               
        <div class=\"dica\">(Informe o primeiro nome do co-autor)</div>                                                                 
  </span>                                                                                                                               
   <span class=\"area_campo\">                                                                                                          
        <div class=\"label\">". $form[$embedName]['nome_meio']->renderLabel() ."</div>                                                  
        <div class=\"campo\">". $form[$embedName]['nome_meio'] ."</div>                                                                 
        <div class=\"erro\">". $form[$embedName]['nome_meio']->renderError() ."</div>                                                   
        <div class=\"dica\">(Informe o nome do meio do co-autor)</div>                                                                  
  </span>                                                                                                                               
   <span class=\"area_campo\">                                                                                                          
        <div class=\"label\">". $form[$embedName]['sobrenome']->renderLabel() ."</div>                                                  
        <div class=\"campo\">". $form[$embedName]['sobrenome'] ."</div>                                                                 
        <div class=\"erro\">". $form[$embedName]['sobrenome']->renderError() ."</div>                                                   
        <div class=\"dica\">(Informe o sobrenome do co-autor)</div>                                                                     
  </span>                                                                                                                               
   <span class=\"area_campo\">                                                                                                          
        <div class=\"label\">". $form[$embedName]['email']->renderLabel() ."</div>                                                      
        <div class=\"campo\">". $form[$embedName]['email'] ."</div>                                                                     
        <div class=\"erro\">". $form[$embedName]['email']->renderError() ."</div>                                                       
        <div class=\"dica\">(Prencha o e-mail do co-autor)</div>                                                                        
  </span>                                                                                                                               
   <span class=\"area_campo\">                                                                                                          
        <div class=\"label\">". $form[$embedName]['instituicao']->renderLabel() ."</div>                                                
        <div class=\"campo\">". $form[$embedName]['instituicao'] ."</div>                                                               
        <div class=\"erro\">". $form[$embedName]['instituicao']->renderError() ."</div>                                                 
        <div class=\"dica\">(Informe a instituição onde o co-autor trabalha)</div>                                                      
  </span>                                                                                                                               
   <span class=\"area_campo\">                                                                                                          
        <div class=\"label\">". $form[$embedName]['contato_correspondencia']->renderLabel() ."</div>                                    
        <div class=\"campo\">". $form[$embedName]['contato_correspondencia'] ."</div>                                                   
        <div class=\"erro\">". $form[$embedName]['contato_correspondencia']->renderError() ."</div>                                     
        <div class=\"dica\">(Selecione se este co-autor é o contato principal de correspondência)</div>                                 
  </span>                                                                                                                               
   <span class=\"area_campo\">                                                                                                          
        <div class=\"label\">". $form[$embedName]['resumo_biografia']->renderLabel() ."</div>                                           
        <div class=\"campo\">". $form[$embedName]['resumo_biografia'] ."</div>                                                          
        <div class=\"erro\">". $form[$embedName]['resumo_biografia']->renderError() ."</div>                                            
        <div class=\"dica\">(Prencha o resumo da biografia do co-autor)</div>                                                           
  </span>                                                                                                                               
  <span>".$form[$embedName]['id']."</span>                                                                                              
  </div>";                                                                                                                              
                                                                                                                                        
                                                                                                                                        
    $this->renderText($output);                                                                                                         
                                                                                                                                        
    return sfView::NONE;                                                                                                                
  }                                                                                                                                     
                                                                                                                                        
                                                                                                                                        
  public function sendConfirmacaoSubmissao($trabalho)                                                                                   
  {
		//Pego a pessoa
		$p = new Criteria();
		$p->add(CadastroPeer::USUARIO_ID, $this->getUser()->getGuardUser()->getId());
		$cadastro = CadastroPeer::doSelectOne($p);

                //$to = $trabalho->getEmail();
                $to = $cadastro->getEmailPessoal() . ", " . $cadastro->getEmailProfissional();

  	            //$to = $trabalho->getEmail();
  	            
  	              
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: Inscrição Online - ESP/MG <inscricao@esp.mg.gov.br>' . "\r\n";
                $subject = 'Confirmação de submissão de trabalho - ESP/MG';                      
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
        Prezado(a),                                     
<br />                                                                                              
        O seu anexo, <strong> '.$trabalho->getTitulo().'</strong>, foi submetido corretamente em nosso sistema.<br />    
    Os seus anexos serão avaliados pela comissão e você receberá a resposta conforme informado nas instruções do processo de seleção.<br>                           
    Você também pode acompanhar o resultado pelo site de Inscrição On-line através de seu login e senha cadastrados.<br>    
    <br>
    Divulgação do cronograma da entrevista no site da ESP/MG e e-mail do candidato: 12/08/2009.<br>                      
        <br />                                                                                                              
        Para obter mais informações acesse <a href="http://inscricaoprohosp.esp.mg.gov.br" target="_blank">http://inscricaoprohosp.esp.mg.gov.br</a>.<br />                                                                                                                                         
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
                
        @mail($to, $subject, $message, $headers);

  }

  public function executeVisualizar(sfWebRequest $request)
  {
            $trabalho = TrabalhoPeer::retrieveByPK($request->getParameter('id'));

            $file = new FileReader(sfConfig::get('sf_upload_dir')."/submissoes/".$trabalho->getArquivo());

            if ($file->fileExists())
            {
                $file->getFile();
            } else {
                $this->getUser()->setFlash('notice', 'Arquivo não encontrado.');

                $this->redirect('trabalho/aprovados');
            }

                return sfView::NONE;
  }

  public function Expired()
  {
        return (date("y-m-d") >  date("d-m-y",strtotime("14-08-09")));
  }
}
