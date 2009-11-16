<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Trabalho filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTrabalhoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'primeiro_nome'            => new sfWidgetFormFilterInput(),
      'nome_meio'                => new sfWidgetFormFilterInput(),
      'sobrenome'                => new sfWidgetFormFilterInput(),
      'email'                    => new sfWidgetFormFilterInput(),
      'instituicao'              => new sfWidgetFormFilterInput(),
      'resumo_biografia'         => new sfWidgetFormFilterInput(),
      'eixo_tematico_id'         => new sfWidgetFormPropelChoice(array('model' => 'EixoTematico', 'add_empty' => true)),
      'arquivo'                  => new sfWidgetFormFilterInput(),
      'aprovado'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'titulo'                   => new sfWidgetFormFilterInput(),
      'contato_correspondencia'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'trabalhos_co_autor_list'  => new sfWidgetFormPropelChoice(array('model' => 'CoAutor', 'add_empty' => true)),
      'usuarios_trabalho_list'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'trabalhos_avaliador_list' => new sfWidgetFormPropelChoice(array('model' => 'Comissao', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'primeiro_nome'            => new sfValidatorPass(array('required' => false)),
      'nome_meio'                => new sfValidatorPass(array('required' => false)),
      'sobrenome'                => new sfValidatorPass(array('required' => false)),
      'email'                    => new sfValidatorPass(array('required' => false)),
      'instituicao'              => new sfValidatorPass(array('required' => false)),
      'resumo_biografia'         => new sfValidatorPass(array('required' => false)),
      'eixo_tematico_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'EixoTematico', 'column' => 'id')),
      'arquivo'                  => new sfValidatorPass(array('required' => false)),
      'aprovado'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'titulo'                   => new sfValidatorPass(array('required' => false)),
      'contato_correspondencia'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'trabalhos_co_autor_list'  => new sfValidatorPropelChoice(array('model' => 'CoAutor', 'required' => false)),
      'usuarios_trabalho_list'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'trabalhos_avaliador_list' => new sfValidatorPropelChoice(array('model' => 'Comissao', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trabalho_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addTrabalhosCoAutorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TrabalhosCoAutorPeer::TRABALHO_ID, TrabalhoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TrabalhosCoAutorPeer::CO_AUTOR_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TrabalhosCoAutorPeer::CO_AUTOR_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addUsuariosTrabalhoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UsuariosTrabalhoPeer::TRABALHO_ID, TrabalhoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsuariosTrabalhoPeer::USUARIO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsuariosTrabalhoPeer::USUARIO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addTrabalhosAvaliadorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TrabalhosAvaliadorPeer::TRABALHO_ID, TrabalhoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TrabalhosAvaliadorPeer::AVALIADOR_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TrabalhosAvaliadorPeer::AVALIADOR_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Trabalho';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'primeiro_nome'            => 'Text',
      'nome_meio'                => 'Text',
      'sobrenome'                => 'Text',
      'email'                    => 'Text',
      'instituicao'              => 'Text',
      'resumo_biografia'         => 'Text',
      'eixo_tematico_id'         => 'ForeignKey',
      'arquivo'                  => 'Text',
      'aprovado'                 => 'Boolean',
      'titulo'                   => 'Text',
      'contato_correspondencia'  => 'Boolean',
      'trabalhos_co_autor_list'  => 'ManyKey',
      'usuarios_trabalho_list'   => 'ManyKey',
      'trabalhos_avaliador_list' => 'ManyKey',
    );
  }
}
