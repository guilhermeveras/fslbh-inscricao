<?php

/**
 * Comissao form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ComissaoForm extends BaseComissaoForm
{
  public function configure()
  {
  	
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'membro'                   => new sfWidgetFormInput(),
      'email'                    => new sfWidgetFormInput(),
      'usuario_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPass(),
      'membro'                   => new sfValidatorString(array('max_length' => 255), array('required'=>'Campo Obrigat&oacute;rio')),
      'email'                    => new sfValidatorEmail(array('required' => true), array('invalid'=>'Atenção este E-mail não possui um formato valido', 'required'=>'Campo Obrigat&oacute;rio')),
      'usuario_id'               => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id'), array('required'=>'Campo Obrigat&oacute;rio')),
    ));

    /*
     * Provide an unique id which will be the number of records minus one
     */
    $this->setDefault('id', ComissaoPeer::doCount(new Criteria()));
        
    /*
     *  Avoid the possibility of selecting an user more than once and sorts by name 
     */
    $usuarios = array();
    
    foreach (ComissaoPeer::doSelect(new Criteria()) as $membro)
    {
    	if ($this->isNew())
    		array_push($usuarios, $membro->getUsuarioId());
    	else if($this->getObject()->getUsuarioId() != $membro->getUsuarioId())
    		array_push($usuarios, $membro->getUsuarioId());
    }
    
    $c = new Criteria();
    
    $c->add(sfGuardUserPeer::ID, $usuarios, Criteria::NOT_IN);
    $c->addAscendingOrderByColumn(sfGuardUserPeer::USERNAME);
    
   	$this->widgetSchema['usuario_id']->setOption('criteria', $c);	
    
    /*
     * Ensure the singleness of an user
     */
    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Comissao', 'column' => array('usuario_id')), array('invalid' => 'Este usuário já está cadastrado como membro da comissão'))
    );

    $this->widgetSchema->setNameFormat('comissao[%s]');
  }
}
