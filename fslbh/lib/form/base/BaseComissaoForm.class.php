<?php

/**
 * Comissao form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseComissaoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'membro'                   => new sfWidgetFormInput(),
      'email'                    => new sfWidgetFormInput(),
      'usuario_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'trabalhos_avaliador_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Trabalho')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Comissao', 'column' => 'id', 'required' => false)),
      'membro'                   => new sfValidatorString(array('max_length' => 255)),
      'email'                    => new sfValidatorString(array('max_length' => 255)),
      'usuario_id'               => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'trabalhos_avaliador_list' => new sfValidatorPropelChoiceMany(array('model' => 'Trabalho', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Comissao', 'column' => array('usuario_id')))
    );

    $this->widgetSchema->setNameFormat('comissao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comissao';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['trabalhos_avaliador_list']))
    {
      $values = array();
      foreach ($this->object->getTrabalhosAvaliadors() as $obj)
      {
        $values[] = $obj->getTrabalhoId();
      }

      $this->setDefault('trabalhos_avaliador_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTrabalhosAvaliadorList($con);
  }

  public function saveTrabalhosAvaliadorList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['trabalhos_avaliador_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TrabalhosAvaliadorPeer::AVALIADOR_ID, $this->object->getPrimaryKey());
    TrabalhosAvaliadorPeer::doDelete($c, $con);

    $values = $this->getValue('trabalhos_avaliador_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TrabalhosAvaliador();
        $obj->setAvaliadorId($this->object->getPrimaryKey());
        $obj->setTrabalhoId($value);
        $obj->save();
      }
    }
  }

}
