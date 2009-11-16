<?php

/**
 * TrabalhosCoAutor form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTrabalhosCoAutorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'trabalho_id' => new sfWidgetFormInputHidden(),
      'co_autor_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'trabalho_id' => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'column' => 'id', 'required' => false)),
      'co_autor_id' => new sfValidatorPropelChoice(array('model' => 'CoAutor', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trabalhos_co_autor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrabalhosCoAutor';
  }


}
