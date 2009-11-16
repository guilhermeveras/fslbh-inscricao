<?php

require_once dirname(__FILE__).'/../lib/associadoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/associadoGeneratorHelper.class.php';

/**
 * associado actions.
 *
 * @package    sf_sandbox
 * @subpackage associado
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class associadoActions extends autoAssociadoActions
{   
  public function executeBatchAprovar(sfWebRequest $request)
  {
	    $ids = $request->getParameter('ids');
	 
	    $trabalhos = TrabalhoPeer::retrieveByPKs($ids);
	 
	    foreach ($trabalhos as $trabalho)
	    {
	      $trabalho->valida(true);
	    }
	 
	    $this->getUser()->setFlash('notice', 'Os trabalhos selecionados foram aprovados com sucesso.');
	 
	    $this->redirect('@associado');
  }
    
  public function executeListAprovar(sfWebRequest $request)
  {
	    $trabalho = $this->getRoute()->getObject();
	    $trabalho->valida(true);
	 
	    $this->getUser()->setFlash('notice', 'Os trabalho foi aprovado com sucesso.');
	 
	    $this->redirect('@associado');
  }
  
  public function executeBatchReprovar(sfWebRequest $request)
  {
	    $ids = $request->getParameter('ids');
	 
	    $trabalhos = TrabalhoPeer::retrieveByPKs($ids);
	 
	    foreach ($trabalhos as $trabalho)
	    {
	      $trabalho->valida(false);
	    }
	 
	    $this->getUser()->setFlash('notice', 'Os trabalhos selecionados foram reprovados com sucesso.');
	 
	    $this->redirect('@associado');
  }
    
  public function executeListReprovar(sfWebRequest $request)
  {
	    $trabalho = $this->getRoute()->getObject();
	    $trabalho->valida(false);
	 
	    $this->getUser()->setFlash('notice', 'Os trabalho foi reprovado com sucesso.');
	 
	    $this->redirect('@associado');
  }
  
  public function executeListVer(sfWebRequest $request)
  {
	    $trabalho = $this->getRoute()->getObject();
	    
	    $file = new FileReader(sfConfig::get('sf_upload_dir')."/submissoes/".$trabalho->getArquivo());
	    
	    if ($file->fileExists())
	    {
	    	$file->getFile();
	    } else {
	    	$this->getUser()->setFlash('notice', 'Arquivo não encontrado.');
	    	
	    	$this->redirect('@associado');
	    }
		
		return sfView::NONE;	    
  }
}
