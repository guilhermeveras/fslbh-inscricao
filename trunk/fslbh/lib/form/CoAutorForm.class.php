<?php

/**
 * CoAutor form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CoAutorForm extends BaseCoAutorForm
{
  public function configure()
  {
  	$this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'primeiro_nome'           => new sfWidgetFormInput(),
      'nome_meio'               => new sfWidgetFormInput(),
      'sobrenome'               => new sfWidgetFormInput(),
      'email'                   => new sfWidgetFormInput(),
      'instituicao'             => new sfWidgetFormInput(),
      'contato_correspondencia' => new sfWidgetFormInputCheckbox(array(), array('onClick' => 'uncheckAllButThis(this)')),
      'resumo_biografia'        => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setLabels(array(
      'nome_meio'               => 'Nome do meio' ,
      'email'                   => 'E-mail' ,
      'instituicao'             => 'Instituição' ,
      'resumo_biografia'        => 'Resumo da biografia' ,
      'contato_correspondencia' => 'É o contato principal para correspondência?' ,
    ));
    
    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'CoAutor', 'column' => 'id', 'required' => false)),
      'primeiro_nome'           => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo obrigat&oacute;rio')),
      'nome_meio'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sobrenome'               => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo obrigat&oacute;rio')),
      'email'                   => new sfValidatorEmail(array(), array('required' => 'Campo obrigat&oacute;rio', 'invalid'=>'Atenção este E-mail não possui um formato valido')),
      'instituicao'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contato_correspondencia' => new sfValidatorBoolean(),
      'resumo_biografia'        => new sfValidatorString(array(), array('required' => 'Campo obrigat&oacute;rio')),
    ));

    $this->widgetSchema->setNameFormat('co_autor[%s]');
    
  }
}
