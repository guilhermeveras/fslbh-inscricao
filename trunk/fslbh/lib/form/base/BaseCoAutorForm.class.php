<?php

/**
 * CoAutor form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCoAutorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'primeiro_nome'           => new sfWidgetFormInput(),
      'nome_meio'               => new sfWidgetFormInput(),
      'sobrenome'               => new sfWidgetFormInput(),
      'email'                   => new sfWidgetFormInput(),
      'instituicao'             => new sfWidgetFormInput(),
      'contato_correspondencia' => new sfWidgetFormInputCheckbox(),
      'resumo_biografia'        => new sfWidgetFormTextarea(),
      'trabalho_id'             => new sfWidgetFormPropelChoice(array('model' => 'Trabalho', 'add_empty' => true)),
      'trabalhos_co_autor_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Trabalho')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'CoAutor', 'column' => 'id', 'required' => false)),
      'primeiro_nome'           => new sfValidatorString(array('max_length' => 255)),
      'nome_meio'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sobrenome'               => new sfValidatorString(array('max_length' => 255)),
      'email'                   => new sfValidatorString(array('max_length' => 255)),
      'instituicao'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contato_correspondencia' => new sfValidatorBoolean(),
      'resumo_biografia'        => new sfValidatorString(),
      'trabalho_id'             => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'column' => 'id', 'required' => false)),
      'trabalhos_co_autor_list' => new sfValidatorPropelChoiceMany(array('model' => 'Trabalho', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('co_autor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CoAutor';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['trabalhos_co_autor_list']))
    {
      $values = array();
      foreach ($this->object->getTrabalhosCoAutors() as $obj)
      {
        $values[] = $obj->getTrabalhoId();
      }

      $this->setDefault('trabalhos_co_autor_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTrabalhosCoAutorList($con);
  }

  public function saveTrabalhosCoAutorList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['trabalhos_co_autor_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TrabalhosCoAutorPeer::CO_AUTOR_ID, $this->object->getPrimaryKey());
    TrabalhosCoAutorPeer::doDelete($c, $con);

    $values = $this->getValue('trabalhos_co_autor_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TrabalhosCoAutor();
        $obj->setCoAutorId($this->object->getPrimaryKey());
        $obj->setTrabalhoId($value);
        $obj->save();
      }
    }
  }

}
