<?php

/**
 * Cadastro form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CadastroForm extends BaseCadastroForm
{
  public function configure()
  {
  	$this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'nome'                          => new sfWidgetFormInput(array(),array('style'=>'width: 350px;','maxlength' => '100','onkeyup' => 'maiuscula(\'cadastro_nome\')')),
      'sexo'           			      => new sfWidgetFormChoice(array('choices'=> array('' => '', 'false'=>'Feminino','true'=>'Masculino'))),
  	  'cpf'                           => new sfWidgetFormInput(array(), array('onkeypress' => 'mascara(this,cpf)', 'maxlength' => '14')),
      'email_pessoal'                 => new sfWidgetFormInput(),
      'email_profissional'            => new sfWidgetFormInput(),
      'municipio'                     => new sfWidgetFormInput(array(),array('maxlength' => '100','onkeyup' => 'maiuscula(\'cadastro_municipio\')')),
      'telefone'                      => new sfWidgetFormInput(array(), array('onkeypress' => 'mascara(this,telefone)', 'maxlength' => '14')),
      'validado'                      => new sfWidgetFormInputCheckbox(),
      'logradouro'                    => new sfWidgetFormInput(array(),array('style'=>'width: 350px;','maxlength' => '100','onkeyup' => 'maiuscula(\'cadastro_logradouro\')')),
      'bairro'                        => new sfWidgetFormInput(array(),array('style'=>'width: 250px;','maxlength' => '100','onkeyup' => 'maiuscula(\'cadastro_bairro\')')),
      'numero'                        => new sfWidgetFormInput(array(), array('onkeypress' => 'mascara(this,soNumeros)', 'maxlength' => '8')),
      'complemento'                   => new sfWidgetFormInput(),
      'estado'                        => new sfWidgetFormChoice(array('choices'=>
  										 array(
'1'=>'Minas Gerais',
'2'=>'Alagoas',
'3'=>'Amapá',
'4'=>'Amazonas',
'5'=>'Bahia',
'6'=>'Ceara',
'7'=>'Espírito Santo',
'8'=>'Goiás',
'9'=>'Maranhão',
'10'=>'Mato Grosso',
'11'=>'Mato Grosso do Sul',
'12'=>'Acre',
'13'=>'Pará',
'14'=>'Paraíba',
'15'=>'Paraná',
'16'=>'Pernambuco',
'17'=>'Piauí',
'18'=>'Rio de Janeiro',
'19'=>'Rio Grande do Norte',
'20'=>'Rio Grande do Sul',
'21'=>'Rondônia',
'22'=>'Roraima',
'23'=>'Santa Catarina',
'24'=>'São Paulo',
'25'=>'Sergipe',
'26'=>'Tocantins',
'27'=>'Distrito Federal',

))),
      'cep'                           => new sfWidgetFormInput(array(), array('onkeypress' => 'mascara(this,cep)', 'maxlength' => '9')),
 	  'created_at'                    => new sfWidgetFormDateTime(),
  	  'celular'                       => new sfWidgetFormInput(array(), array('onkeypress' => 'mascara(this,telefone)', 'maxlength' => '14')),
      'instituicao_trabalho'          => new sfWidgetFormInput(array(), array('style'=>'width: 350px;')),
      'profissao'                     => new sfWidgetFormInput(array(), array('style'=>'width: 350px;')),

	  'opcao_1_oficina' 			  => new sfWidgetFormChoice(array('choices'=>
  										 array(
'' => '',
'1'=>'Palestra: Conheça e faça parte do Projeto KDE-MG',
//'2'=>'Palestra: Gnome love – você no seu Desktop',
'3'=>'Palestra: LaTeX: Find you type!',
'4'=>'Palestra: Migrando ambiente de desenvolvimento web proprietário para software livre',
'5'=>'Palestra: Palestra Padrões Aberto e Informação Livre',
'6'=>'Palestra: Software Livre: Revolucione!',
'7'=>'Palestra: Software Livre, Open Source e Licenças',
'8'=>'Oficina: Aprenda Qt e Contribua com o desenvolvimento do projeto KDE',
//'9'=>'Oficina: Asterisk no Ubuntu - mão na massa!',
'10'=>'Oficina: Desenvolvimento PHP5 com smarty e PDO',
'11'=>'Oficina: InkScape – Conheça a ferramenta livre para seus desenhos!',
'12'=>'Oficina: Java para iniciantes',
'13'=>'Oficina: Xen para Ambientes Corporativos',
))),
	  'opcao_2_oficina' 			  => new sfWidgetFormChoice(array('choices'=>
  	array(
'' => '',
'1'=>'Palestra: Conheça e faça parte do Projeto KDE-MG',
//'2'=>'Palestra: Gnome love – você no seu Desktop',
'3'=>'Palestra: LaTeX: Find you type!',
'4'=>'Palestra: Migrando ambiente de desenvolvimento web proprietário para software livre',
'5'=>'Palestra: Palestra Padrões Aberto e Informação Livre',
'6'=>'Palestra: Software Livre: Revolucione!',
'7'=>'Palestra: Software Livre, Open Source e Licenças',
'8'=>'Oficina: Aprenda Qt e Contribua com o desenvolvimento do projeto KDE',
//'9'=>'Oficina: Asterisk no Ubuntu - mão na massa!',
'10'=>'Oficina: Desenvolvimento PHP5 com smarty e PDO',
'11'=>'Oficina: InkScape – Conheça a ferramenta livre para seus desenhos!',
'12'=>'Oficina: Java para iniciantes',
'13'=>'Oficina: Xen para Ambientes Corporativos',
))),

    ));

  	$this->setDefault('numero', '');

    $this->widgetSchema->setLabels(array(
      	'nome'                => 'Nome Completo:',
        'sexo'             	  => 'Sexo:',
      	'cpf'                 => 'CPF:',
      	'email_profissional'  => 'E-mail Profissional:',
      	'email_pessoal'       => 'E-mail Pessoal:',
      	'municipio'          => 'Cidade:',
  		'estado_id'			  => 'UF:',
  		//'identificacao_participante_id' => 'Grau de Formação:',
  		'servico'				=> 'Em qual serviço esta inserido?',
  		'numero'				=> 'Número:',
    	'cep'	=> 'CEP:',
    	'bairro'	=> 'Bairro:',
    	'instituicao_trabalho' => 'Instituição onde trabalha:',
    	'profissao' => 'Cargo ou Profissão:',
        'opcao_1_oficina' => 'Primeira opção de evento:',
        'opcao_2_oficina' => 'Segunda opção de evento:'
	));

	$this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'Cadastro', 'column' => 'id', 'required' => false)),
      'nome'                          => new sfValidatorString(array('min_length'=> 6, 'max_length' => 255, 'required' => true), array('min_length'=> 'O seu nome não deve conter menos que 6 caracteres', 'max_length' => 'O seu nome não pode conter mais que 100 caracteres','required' => 'Atenção você deve preencher o seu nome completo')),
      'sexo'                          => new sfValidatorBoolean(
    									 array('required' => true),
    									 array('required' => 'Este campo é obrigatorio')),
      'opcao_1_oficina'               => new sfValidatorInteger(
    									 array('required' => true),
    									 array('required' => 'Este campo é obrigatorio')),
      'opcao_2_oficina'               => new sfValidatorInteger(
    									 array('required' => true),
    									 array('required' => 'Este campo é obrigatorio')),


	  'cpf'                           => new sfValidatorCnpj(array('type'=>'cpf'),array('invalid'=>'CPF Inv&aacute;lido','type'=>'Tipo de op&ccedil;&atilde;o inv&aacute;lida','required'=>'Campo Obrigat&oacute;rio')),
      'email_pessoal'                 => new sfValidatorEmail(array('required' => false), array('invalid'=>'Atenção este E-mail não possui um formato valido')),
      'email_profissional'            => new sfValidatorEmail(array('required' => true), array('invalid'=>'Atenção este E-mail não possui um formato valido', 'required'=>'Campo Obrigat&oacute;rio')),
      'municipio'                     => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo Obrigat&oacute;rio')),
      //'identificacao_participante_id' => new sfValidatorPropelChoice(array('model' => 'IdentificacaoParticipante', 'column' => 'id'), array('required' => 'Campo Obrigat&oacute;rio')),
      'telefone'                      => new sfValidatorString(array('max_length' => 15), array('required' => 'Campo Obrigat&oacute;rio')),
      'validado'                      => new sfValidatorBoolean(),
      'servico'                       => new sfValidatorString(array('max_length' => 255, 'required' => false), array('required' => 'Campo Obrigat&oacute;rio')),
      'logradouro'                    => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo Obrigat&oacute;rio')),
      'bairro'                        => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo Obrigat&oacute;rio')),
      'numero'                        => new sfValidatorInteger(array(), array('required' => 'Campo Obrigat&oacute;rio')),
      'complemento'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado'                        => new sfValidatorString(array('max_length' => 2), array('required' => 'Campo Obrigat&oacute;rio')),
      'cep'                           => new sfValidatorString(array('max_length' => 9), array('required' => 'Campo Obrigat&oacute;rio')),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
	  'celular'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'instituicao_trabalho'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'profissao'                     => new sfValidatorString(array('max_length' => 255), array('required' => 'Campo Obrigat&oacute;rio')),
    ));


      $this->widgetSchema->setHelp('sexo_id','Informe aqui o seu sexo, por exemplo: Masculino e Feminino.');
      $this->widgetSchema->setHelp('estado','Informe aqui o estado aonde reside, por exemplo: Minas Gerais.');
      $this->widgetSchema->setHelp('cidade'  ,'Informe aqui a cidade aonde reside, por exemplo: Belo Horizonte.');
      $this->widgetSchema->setHelp('nome','Informe aqui o seu nome completo, por exemplo: Paulo Coelho da Silva.');
      $this->widgetSchema->setHelp('telefone','Informe aqui o telefone para contato, por exemplo: (31) 5555-5555');
      $this->widgetSchema->setHelp('logradouro','Informe aqui o endereço, por exemplo: Rua das Acácias');
      $this->widgetSchema->setHelp('numero','Informe aqui o número do endereço da residência, por exemplo: 1500');
      $this->widgetSchema->setHelp('complemento','Informe aqui, se necessário, o complemento do endereço da residência, por exemplo: Apto 10, Fundos, Sala 205');
      $this->widgetSchema->setHelp('bairro','Informe aqui o bairro, por exemplo: Jardim Florido.');
      $this->widgetSchema->setHelp('email_pessoal','Informe aqui o seu e-mail pessoal, por exemplo: emaildopaulo@email.com.br');
      $this->widgetSchema->setHelp('email_profissional','Informe aqui o seu e-mail profissional, por exemplo: emaildopaulo@email.com.br');
      $this->widgetSchema->setHelp('cpf','Informe aqui o seu CPF, por exemplo: 000.111.222-33');
      $this->widgetSchema->setHelp('data_nascimento' ,'Informe aqui a data do seu nascimento, por exemplo: 26/02/1975.');
      $this->widgetSchema->setHelp('celular','Informe aqui o número do seu celular, por exemplo: (31) 5555-5555.');
      $this->widgetSchema->setHelp('pais' ,'Informe aqui o seu país de origem, por exemplo: Brasil.');
      $this->widgetSchema->setHelp('cep' ,'Informe aqui o seu Código de Endereçamento Postal (CEP), por exemplo: 31000-000.');
      $this->widgetSchema->setHelp('instituicao_trabalho' ,'Informe aqui o nome da empresa que você trabalha, por exemplo: Banco do Brasil.');
      $this->widgetSchema->setHelp('profissao' ,'Informe aqui a sua profissão, por exemplo: Analista de Sistemas.');
       $this->widgetSchema->setHelp('municipio' ,'Informe aqui a sua cidade, por exemplo: Belo Horizonte.');


      $decorator = new totWidgetFormSchemaFormatter($this->getWidgetSchema());
      $this->widgetSchema->addFormFormatter('custom', $decorator);
      $this->widgetSchema->setFormFormatterName('custom');



    //$this->embedForm('usuario', new sfGuardUserForm());

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Cadastro', 'column' => array('cpf')), array('invalid' =>'Este CPF já esta cadastrado')),
        //new sfValidatorPropelUnique(array('model' => 'Cadastro', 'column' => array('email_pessoal')), array('invalid' =>'Este e-mail já esta cadastrado')),
        new sfValidatorPropelUnique(array('model' => 'Cadastro', 'column' => array('email_pessoal')), array('invalid' =>'Este e-mail já esta cadastrado')),
      ))
    );

    $this->widgetSchema->setNameFormat('cadastro[%s]');

  }

/*
  protected function doSave($con = null)
  {
    parent::save($con);

    //$this->addUser($con);

  }
*/
/*
  public function addUser($con = null)



  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuario']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $values = $this->getValue('usuario');
    if (is_array($values))
    {
      $c = new Criteria();
      $c->add(sfGuardUserPeer::USERNAME, $values['username']);
      $login = sfGuardUserPeer::doSelectOne($c, $con);

      if ($login)
      {
        $obj = CadastroPeer::retrieveByPK($this->object->getPrimaryKey());
        $obj->setUsuarioId($login->getId());
        $obj->save();
      }
    }
  }
  */


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
/*
    if ($this->object->getCidadeId() > 0)
    {
    	$cidade = CidadePeer::retrieveByPK($this->object->getCidadeId());
    	$this->setDefault("estado_id", $cidade->getEstadoId());
    }
*/
  }

}
