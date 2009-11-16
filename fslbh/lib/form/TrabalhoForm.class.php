<?php

/**
 * Trabalho form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TrabalhoForm extends BaseTrabalhoForm
{
  public function configure()
  {
  	 $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'primeiro_nome'           => new sfWidgetFormInput(),
      'nome_meio'               => new sfWidgetFormInput(array(),array('maxlength' => '100','onkeyup' => 'maiuscula(\'trabalho_nome_meio\')')),
      'sobrenome'               => new sfWidgetFormInput(array(),array('maxlength' => '100','onkeyup' => 'maiuscula(\'trabalho_sobrenome\')')),
      'email'                   => new sfWidgetFormInput(),
      'instituicao'             => new sfWidgetFormInput(array(),array('maxlength' => '100')),
      'resumo_biografia'        => new sfWidgetFormTextarea(array(), array('cols' => 300)),
      'eixo_tematico_id'        => new sfWidgetFormPropelChoice(array('model' => 'EixoTematico', 'add_empty' => true)),
      'arquivo'                 => new sfWidgetFormInputFile(),
      'titulo'                  => new sfWidgetFormInput(),
      'contato_correspondencia' => new sfWidgetFormInputCheckbox(array(), array('onClick' => 'uncheckAllButThis(this)')),
    ));
    
  	 $this->widgetSchema->setLabels(array(
      'nome_meio'               => 'Nome do meio' ,
      'email'                   => 'E-mail' ,
      'instituicao'             => 'Instituição' ,
      'resumo_biografia'        => 'Resumo da biografia' ,
      'eixo_tematico_id'        => 'Eixo temático' ,
      'arquivo'                 => 'Arquivo para submissão' ,
      'titulo'                  => 'Título do anexo',
      'contato_correspondencia' => 'É o contato principal para correspondência?' ,
    ));    
    
    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'column' => 'id', 'required' => false)),
      'primeiro_nome'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nome_meio'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sobrenome'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                   => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),
      'instituicao'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'resumo_biografia'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'eixo_tematico_id'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'arquivo'                 => new sfValidatorFile(array('required' => true, 'max_size' => 1024000, 'path' => sfConfig::get('sf_upload_dir').'/submissoes', 'mime_types' => array('application/pdf')), array('required' => 'Campo obrigat&oacute;rio', 'mime_types' => 'Só serão aceitos arquivos em formato PDF', 'max_size' => 'O arquivo é muito grande (o tamanho máximo é 1MB).')),
      'titulo'                  => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo obrigat&oacute;rio')),
      'contato_correspondencia' => new sfValidatorBoolean(array(), array('required' => 'Campo obrigat&oacute;rio')),
    ));

    $c = new Criteria();
    $c->addAscendingOrderByColumn(EixoTematicoPeer::DESCRICAO);
    
    $this->widgetSchema['eixo_tematico_id']->setOption('criteria', $c);
    
    $this->widgetSchema->setNameFormat('trabalho[%s]');
    
  }
  
  public function addNewCoAutorField($name)
  {
    $this->embedForm($name, new CoAutorForm());
  }
  
  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsuariosTrabalho($con);
    $this->saveCoAutoresTrabalho($con);
    $this->AssignWorkToEvaluator($con);
  }
  
  /*
   * Uses some kind of circular list to assign works to evaluators
   */
  public function AssignWorkToEvaluator($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }
    
    $c = new Criteria();
    $c->add(TrabalhosAvaliadorPeer::TRABALHO_ID, $this->object->getPrimaryKey());
    
    $trabalhos = TrabalhosAvaliadorPeer::doSelectOne($c);
    
    if (!$trabalhos)
    {
	    $num_works = TrabalhoPeer::doCount(new Criteria(), $con);
	    $num_evaluators = ComissaoPeer::doCount(new Criteria(), $con);
	    
	    /*
	     * If there's a committee, pick one member and assign the work to him
	     */
	    if ($num_evaluators > 0)
	    {
	    	// Pick the evaluator
		    $evaluator_id = $num_works % $num_evaluators;
		    
		    // Assign the work to him
		    $record = new TrabalhosAvaliador();
		    $record->setAvaliadorId($evaluator_id);
		    $record->setTrabalhoId($this->object->getPrimaryKey());
		    $record->save();
	    }
    }
  }
    
  public function saveCoAutoresTrabalho($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $values = $this->getValues();
    
    /* Ensure the consistency of the embeded co-autor forms */
    
    // Wrapper for non-null objects
    $non_null = array();
    
    foreach($this->getEmbeddedForms() as $key=>$coautorForm)
    {
      if ($values[$key])
      {
      	// Retrieve the object from database
        $coautor = CoAutorPeer::retrieveByPK($values[$key]['id']);
        
        // Avoid a null object
        if (!isset($coautor))
        {
        	 $coautor = new CoAutor();
        }
        
        // Check for a non-null object, only for safety
        if ($coautor)
        {
        	/* Process the update of the object */
	        $coautor->setPrimeiroNome($values[$key]['primeiro_nome']);
	        $coautor->setNomeMeio($values[$key]['nome_meio']);
	        $coautor->setSobrenome($values[$key]['sobrenome']);
	        $coautor->setEmail($values[$key]['email']);
	        $coautor->setInstituicao($values[$key]['instituicao']);
	        $coautor->setContatoCorrespondencia($values[$key]['contato_correspondencia']);
	        $coautor->setResumoBiografia($values[$key]['resumo_biografia']);
	        $coautor->setTrabalhoId($this->object->getPrimaryKey());
	        
	        $coautor->save();
	        
        	// Ensure the object will not be deleted afterwards
        	array_push($non_null, $coautor->getId());
        }
      }
    }

    /* I know next step looks like a hammer but it's not, it's just a technical resource. :)  */
    
    /* First delete the objects with null reference of trabalho_id */

    // Build the criteria
    $c = new Criteria();

    // Only null references of trabalho_id are deleted
    $c->add(CoAutorPeer::TRABALHO_ID, null);
    
    // Perform deletion
    CoAutorPeer::doDelete($c, $con);
    
    /* Then delete the objects that the user explicit deleted */
    
    // Build the criteria
    $c = new Criteria();
    
    // Make sure that only the co-autors of this work will be deleted
    $c->add(CoAutorPeer::TRABALHO_ID, $this->object->getPrimaryKey());
    
    // Note that here, we've got the id's of updated objects, the only one will remain
    $c->add(CoAutorPeer::ID, $non_null, Criteria::NOT_IN);
    
    // Perform deletion
    CoAutorPeer::doDelete($c, $con);
  }
  
  public function saveUsuariosTrabalho($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }
	
    $obj = UsuariosTrabalhoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getGuardUser()->getId(), $this->object->getPrimaryKey(), $con);
    
    if (!$obj) $obj = new UsuariosTrabalho();
    
    $obj->setTrabalhoId($this->object->getPrimaryKey());
    $obj->setUsuarioId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    $obj->save();
  }
  
  /**
   * Override to add extra form fields for new todo items (otherwise they fail as extra fields)
   */
  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
    foreach($taintedValues as $key=>$newTodo)
    {
      // Here comes the magic
      if (!isset($this[$key]))
      {
        $this->addNewCoAutorField($key);
      }
    }
    
    // And here we garantee the fields will receive the correct treatment
    parent::bind($taintedValues, $taintedFiles);
  }
  
}

  
