<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CoAutor filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCoAutorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'primeiro_nome'           => new sfWidgetFormFilterInput(),
      'nome_meio'               => new sfWidgetFormFilterInput(),
      'sobrenome'               => new sfWidgetFormFilterInput(),
      'email'                   => new sfWidgetFormFilterInput(),
      'instituicao'             => new sfWidgetFormFilterInput(),
      'contato_correspondencia' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'resumo_biografia'        => new sfWidgetFormFilterInput(),
      'trabalho_id'             => new sfWidgetFormPropelChoice(array('model' => 'Trabalho', 'add_empty' => true)),
      'trabalhos_co_autor_list' => new sfWidgetFormPropelChoice(array('model' => 'Trabalho', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'primeiro_nome'           => new sfValidatorPass(array('required' => false)),
      'nome_meio'               => new sfValidatorPass(array('required' => false)),
      'sobrenome'               => new sfValidatorPass(array('required' => false)),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'instituicao'             => new sfValidatorPass(array('required' => false)),
      'contato_correspondencia' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'resumo_biografia'        => new sfValidatorPass(array('required' => false)),
      'trabalho_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Trabalho', 'column' => 'id')),
      'trabalhos_co_autor_list' => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('co_autor_filters[%s]');

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

    $criteria->addJoin(TrabalhosCoAutorPeer::CO_AUTOR_ID, CoAutorPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TrabalhosCoAutorPeer::TRABALHO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TrabalhosCoAutorPeer::TRABALHO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'CoAutor';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'primeiro_nome'           => 'Text',
      'nome_meio'               => 'Text',
      'sobrenome'               => 'Text',
      'email'                   => 'Text',
      'instituicao'             => 'Text',
      'contato_correspondencia' => 'Boolean',
      'resumo_biografia'        => 'Text',
      'trabalho_id'             => 'ForeignKey',
      'trabalhos_co_autor_list' => 'ManyKey',
    );
  }
}
