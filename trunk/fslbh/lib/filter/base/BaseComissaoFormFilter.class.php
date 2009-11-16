<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Comissao filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseComissaoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'membro'                   => new sfWidgetFormFilterInput(),
      'email'                    => new sfWidgetFormFilterInput(),
      'usuario_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'trabalhos_avaliador_list' => new sfWidgetFormPropelChoice(array('model' => 'Trabalho', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'membro'                   => new sfValidatorPass(array('required' => false)),
      'email'                    => new sfValidatorPass(array('required' => false)),
      'usuario_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'trabalhos_avaliador_list' => new sfValidatorPropelChoice(array('model' => 'Trabalho', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comissao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(TrabalhosAvaliadorPeer::AVALIADOR_ID, ComissaoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TrabalhosAvaliadorPeer::TRABALHO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TrabalhosAvaliadorPeer::TRABALHO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Comissao';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'membro'                   => 'Text',
      'email'                    => 'Text',
      'usuario_id'               => 'ForeignKey',
      'trabalhos_avaliador_list' => 'ManyKey',
    );
  }
}
