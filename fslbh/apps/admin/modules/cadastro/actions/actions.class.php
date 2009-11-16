<?php

require_once dirname(__FILE__).'/../lib/cadastroGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/cadastroGeneratorHelper.class.php';

/**
 * cadastro actions.
 *
 * @package    sf_sandbox
 * @subpackage cadastro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cadastroActions extends autoCadastroActions
{
  protected function AdjustFilters()
  {
  		$filtros = $this->getFilters();
		
		$filtros['validado'] = 0;
  	
  		$this->setFilters($filtros);
  }
  
  public function executeIndex(sfWebRequest $request)
  {
		$this->AdjustFilters();

		parent::executeIndex($request);
  }

    public function executeBatchValidar(sfWebRequest $request)
    {
	    $ids = $request->getParameter('ids');
	 
	    $cadastros = CadastroPeer::retrieveByPKs($ids);
	 
	    foreach ($cadastros as $cadastro)
	    {
	      $cadastro->valida(true);
	    }
	 
	    $this->getUser()->setFlash('notice', 'O cadastro selecionado foi validado com sucesso.');
	 
	    $this->redirect('@cadastro');
    }
    
    public function executeListValidar(sfWebRequest $request)
    {
	    $cadastro = $this->getRoute()->getObject();
	    $cadastro->valida(true);
	 
	    $this->getUser()->setFlash('notice', 'Os cadastros selecionados foram validados com sucesso.');
	 
	    $this->redirect('@cadastro');
    }
    
  public function executeFicha(sfWebRequest $request)
  {
	$c = new Criteria();
	$c->add(CadastroPeer::ID,$request->getParameter("id"));
	$this->usuario = $this->getRoute()->getObject();//CadastroPeer::doSelectOne($c);	
    //--	
	$this->setLayout(false);	
  }
}
