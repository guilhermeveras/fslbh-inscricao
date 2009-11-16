<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cadastro filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCadastroFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'                 => new sfWidgetFormFilterInput(),
      'cpf'                  => new sfWidgetFormFilterInput(),
      'email_pessoal'        => new sfWidgetFormFilterInput(),
      'email_profissional'   => new sfWidgetFormFilterInput(),
      'municipio'            => new sfWidgetFormFilterInput(),
      'telefone'             => new sfWidgetFormFilterInput(),
      'validado'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'logradouro'           => new sfWidgetFormFilterInput(),
      'bairro'               => new sfWidgetFormFilterInput(),
      'numero'               => new sfWidgetFormFilterInput(),
      'complemento'          => new sfWidgetFormFilterInput(),
      'estado'               => new sfWidgetFormFilterInput(),
      'cep'                  => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'celular'              => new sfWidgetFormFilterInput(),
      'instituicao_trabalho' => new sfWidgetFormFilterInput(),
      'profissao'            => new sfWidgetFormFilterInput(),
      'opcao_1_oficina'      => new sfWidgetFormFilterInput(),
      'opcao_2_oficina'      => new sfWidgetFormFilterInput(),
      'sexo'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nome'                 => new sfValidatorPass(array('required' => false)),
      'cpf'                  => new sfValidatorPass(array('required' => false)),
      'email_pessoal'        => new sfValidatorPass(array('required' => false)),
      'email_profissional'   => new sfValidatorPass(array('required' => false)),
      'municipio'            => new sfValidatorPass(array('required' => false)),
      'telefone'             => new sfValidatorPass(array('required' => false)),
      'validado'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'logradouro'           => new sfValidatorPass(array('required' => false)),
      'bairro'               => new sfValidatorPass(array('required' => false)),
      'numero'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'complemento'          => new sfValidatorPass(array('required' => false)),
      'estado'               => new sfValidatorPass(array('required' => false)),
      'cep'                  => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'celular'              => new sfValidatorPass(array('required' => false)),
      'instituicao_trabalho' => new sfValidatorPass(array('required' => false)),
      'profissao'            => new sfValidatorPass(array('required' => false)),
      'opcao_1_oficina'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'opcao_2_oficina'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sexo'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('cadastro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cadastro';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'nome'                 => 'Text',
      'cpf'                  => 'Text',
      'email_pessoal'        => 'Text',
      'email_profissional'   => 'Text',
      'municipio'            => 'Text',
      'telefone'             => 'Text',
      'validado'             => 'Boolean',
      'logradouro'           => 'Text',
      'bairro'               => 'Text',
      'numero'               => 'Number',
      'complemento'          => 'Text',
      'estado'               => 'Text',
      'cep'                  => 'Text',
      'created_at'           => 'Date',
      'celular'              => 'Text',
      'instituicao_trabalho' => 'Text',
      'profissao'            => 'Text',
      'opcao_1_oficina'      => 'Number',
      'opcao_2_oficina'      => 'Number',
      'sexo'                 => 'Boolean',
    );
  }
}
