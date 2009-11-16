<?php

/**
 * Cadastro form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCadastroForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nome'                 => new sfWidgetFormInput(),
      'cpf'                  => new sfWidgetFormInput(),
      'email_pessoal'        => new sfWidgetFormInput(),
      'email_profissional'   => new sfWidgetFormInput(),
      'municipio'            => new sfWidgetFormInput(),
      'telefone'             => new sfWidgetFormInput(),
      'validado'             => new sfWidgetFormInputCheckbox(),
      'logradouro'           => new sfWidgetFormInput(),
      'bairro'               => new sfWidgetFormInput(),
      'numero'               => new sfWidgetFormInput(),
      'complemento'          => new sfWidgetFormInput(),
      'estado'               => new sfWidgetFormInput(),
      'cep'                  => new sfWidgetFormInput(),
      'created_at'           => new sfWidgetFormDateTime(),
      'celular'              => new sfWidgetFormInput(),
      'instituicao_trabalho' => new sfWidgetFormInput(),
      'profissao'            => new sfWidgetFormInput(),
      'opcao_1_oficina'      => new sfWidgetFormInput(),
      'opcao_2_oficina'      => new sfWidgetFormInput(),
      'sexo'                 => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Cadastro', 'column' => 'id', 'required' => false)),
      'nome'                 => new sfValidatorString(array('max_length' => 255)),
      'cpf'                  => new sfValidatorString(array('max_length' => 15)),
      'email_pessoal'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_profissional'   => new sfValidatorString(array('max_length' => 255)),
      'municipio'            => new sfValidatorString(array('max_length' => 255)),
      'telefone'             => new sfValidatorString(array('max_length' => 15)),
      'validado'             => new sfValidatorBoolean(),
      'logradouro'           => new sfValidatorString(array('max_length' => 255)),
      'bairro'               => new sfValidatorString(array('max_length' => 255)),
      'numero'               => new sfValidatorInteger(),
      'complemento'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado'               => new sfValidatorString(array('max_length' => 2)),
      'cep'                  => new sfValidatorString(array('max_length' => 9)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'celular'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'instituicao_trabalho' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'profissao'            => new sfValidatorString(array('max_length' => 255)),
      'opcao_1_oficina'      => new sfValidatorInteger(array('required' => false)),
      'opcao_2_oficina'      => new sfValidatorInteger(array('required' => false)),
      'sexo'                 => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Cadastro', 'column' => array('cpf'))),
        new sfValidatorPropelUnique(array('model' => 'Cadastro', 'column' => array('email_profissional'))),
      ))
    );

    $this->widgetSchema->setNameFormat('cadastro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cadastro';
  }


}
