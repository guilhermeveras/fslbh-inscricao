<?php

/**
 * Trabalho form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTrabalhoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'primeiro_nome'            => new sfWidgetFormInput(),
      'nome_meio'                => new sfWidgetFormInput(),
      'sobrenome'                => new sfWidgetFormInput(),
      'email'                    => new sfWidgetFormInput(),
      'instituicao'              => new sfWidgetFormInput(),
      'resumo_biografia'         => new sfWidgetFormTextarea(),
      'eixo_tematico_id'         => new sfWidgetFormPropelChoice(array('model' => 'EixoTematico', 'add_empty' => false)),
      'arquivo'                  => new sfWidgetFormInput(),
      'aprovado'                 => new sfWidgetFormInputCheckbox(),
      'titulo'                   => new sfWidgetFormInput(),
      'contato_correspondencia'  => new sfWidgetFormInputCheckbox(),
      'trabalhos_co_autor_list'  => new sfWidgetFormPropelChoiceMany(array('model' => 'CoAutor')),
      'usuarios_trabalho_list'   => new sfWidgetFormPropelChoiceMany(array('model' => 'sfGuardUser')),
      'trabalhos_avaliador_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Comissao')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'column' => 'id', 'required' => false)),
      'primeiro_nome'            => new sfValidatorString(array('max_length' => 255)),
      'nome_meio'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sobrenome'                => new sfValidatorString(array('max_length' => 255)),
      'email'                    => new sfValidatorString(array('max_length' => 255)),
      'instituicao'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'resumo_biografia'         => new sfValidatorString(),
      'eixo_tematico_id'         => new sfValidatorPropelChoice(array('model' => 'EixoTematico', 'column' => 'id')),
      'arquivo'                  => new sfValidatorString(array('max_length' => 255)),
      'aprovado'                 => new sfValidatorBoolean(array('required' => false)),
      'titulo'                   => new sfValidatorString(array('max_length' => 255)),
      'contato_correspondencia'  => new sfValidatorBoolean(),
      'trabalhos_co_autor_list'  => new sfValidatorPropelChoiceMany(array('model' => 'CoAutor', 'required' => false)),
      'usuarios_trabalho_list'   => new sfValidatorPropelChoiceMany(array('model' => 'sfGuardUser', 'required' => false)),
      'trabalhos_avaliador_list' => new sfValidatorPropelChoiceMany(array('model' => 'Comissao', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trabalho[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Trabalho';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['trabalhos_co_autor_list']))
    {
      $values = array();
      foreach ($this->object->getTrabalhosCoAutors() as $obj)
      {
        $values[] = $obj->getCoAutorId();
      }

      $this->setDefault('trabalhos_co_autor_list', $values);
    }

    if (isset($this->widgetSchema['usuarios_trabalho_list']))
    {
      $values = array();
      foreach ($this->object->getUsuariosTrabalhos() as $obj)
      {
        $values[] = $obj->getUsuarioId();
      }

      $this->setDefault('usuarios_trabalho_list', $values);
    }

    if (isset($this->widgetSchema['trabalhos_avaliador_list']))
    {
      $values = array();
      foreach ($this->object->getTrabalhosAvaliadors() as $obj)
      {
        $values[] = $obj->getAvaliadorId();
      }

      $this->setDefault('trabalhos_avaliador_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTrabalhosCoAutorList($con);
    $this->saveUsuariosTrabalhoList($con);
    $this->saveTrabalhosAvaliadorList($con);
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
    $c->add(TrabalhosCoAutorPeer::TRABALHO_ID, $this->object->getPrimaryKey());
    TrabalhosCoAutorPeer::doDelete($c, $con);

    $values = $this->getValue('trabalhos_co_autor_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TrabalhosCoAutor();
        $obj->setTrabalhoId($this->object->getPrimaryKey());
        $obj->setCoAutorId($value);
        $obj->save();
      }
    }
  }

  public function saveUsuariosTrabalhoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuarios_trabalho_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UsuariosTrabalhoPeer::TRABALHO_ID, $this->object->getPrimaryKey());
    UsuariosTrabalhoPeer::doDelete($c, $con);

    $values = $this->getValue('usuarios_trabalho_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsuariosTrabalho();
        $obj->setTrabalhoId($this->object->getPrimaryKey());
        $obj->setUsuarioId($value);
        $obj->save();
      }
    }
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
    $c->add(TrabalhosAvaliadorPeer::TRABALHO_ID, $this->object->getPrimaryKey());
    TrabalhosAvaliadorPeer::doDelete($c, $con);

    $values = $this->getValue('trabalhos_avaliador_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TrabalhosAvaliador();
        $obj->setTrabalhoId($this->object->getPrimaryKey());
        $obj->setAvaliadorId($value);
        $obj->save();
      }
    }
  }

}
