<?php

/**
 * UsuariosTrabalho form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUsuariosTrabalhoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'  => new sfWidgetFormInputHidden(),
      'trabalho_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'usuario_id'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'trabalho_id' => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuarios_trabalho[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuariosTrabalho';
  }


}
