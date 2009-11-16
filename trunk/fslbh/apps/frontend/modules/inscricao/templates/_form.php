<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('inscricao/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>


<div class="formulario">

<div class="tipo_dados">Insira abaixo os seus dados pessoais</div>

  <span class="area_campo">
	<div class="label"><?php echo $form['nome']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['nome'] ?></div>
	<div class="erro"><?php echo $form['nome']->renderError() ?></div>
	<div class="dica">(Prencha seu nome completo, sem abreviações)</div>
  </span>

  <span class="area_campo">
	<div class="label"><?php echo $form['sexo']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['sexo'] ?></div>
	<div class="erro"><?php echo $form['sexo']->renderError() ?></div>
	<div class="dica">(Informe o seu sexo)</div>
  </span>

  <span class="area_campo">
	<div class="label"><?php echo $form['cpf']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['cpf'] ?></div>
	<div class="erro"><?php echo $form['cpf']->renderError() ?></div>
	<div class="dica">(Prencha o seu CPF)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['email_profissional']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['email_profissional'] ?></div>
	<div class="erro"><?php echo $form['email_profissional']->renderError() ?></div>
	<div class="dica">(Prencha seu E-mail Principal)</div>
</span>

<!--
<span class="area_campo">
	<div class="label"><?php echo $form['email_pessoal']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['email_pessoal'] ?></div>
	<div class="erro"><?php echo $form['email_pessoal']->renderError() ?></div>
	<div class="dica">(Prencha seu E-mail Secundário)</div>
</span>
-->

<span class="area_campo">
	<div class="label"><?php echo $form['telefone']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['telefone'] ?></div>
	<div class="erro"><?php echo $form['telefone']->renderError() ?></div>
	<div class="dica">(Prencha seu telefone com DDD)</div>
</span>

<!--
<span class="area_campo">
	<div class="label"><?php echo $form['celular']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['celular'] ?></div>
	<div class="erro"><?php echo $form['celular']->renderError() ?></div>
	<div class="dica">(Prencha seu celular com DDD)</div>
</span>
-->

<div class="tipo_dados">Endereço:</div>

<span class="area_campo">
	<div class="label"><?php echo $form['cep']->renderLabel() ?></div>
	<div class="campo">
	     <?php echo $form['cep'] ?>
	</div>
	<div class="erro"><?php echo $form['cep']->renderError() ?></div>
	<div class="dica">(Prencha o cep de sua residência)</div>
</span>

<div id="div_endereco" style="display: block;">
<div id="resultado_cep"></div>
<span class="area_campo">
	<div class="label"><?php echo $form['logradouro']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['logradouro'] ?></div>
	<div class="erro"><?php echo $form['logradouro']->renderError() ?></div>
	<div class="dica">(Prencha o logradouro de residência)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['numero']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['numero'] ?></div>
	<div class="erro"><?php echo $form['numero']->renderError() ?></div>
	<div class="dica">(Prencha o número de sua residência)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['complemento']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['complemento'] ?></div>
	<div class="erro"><?php echo $form['complemento']->renderError() ?></div>
	<div class="dica">(Prencha o complemento de sua residência)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['bairro']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['bairro'] ?></div>
	<div class="erro"><?php echo $form['bairro']->renderError() ?></div>
	<div class="dica">(Prencha o bairro de sua residência)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['municipio']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['municipio'] ?></div>
	<div class="erro"><?php echo $form['municipio']->renderError() ?></div>
	<div class="dica">(Prencha seu Múnicípio de residência)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['estado']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['estado'] ?></div>
	<div class="erro"><?php echo $form['estado']->renderError() ?></div>
	<div class="dica">(Prencha o estado de sua residência)</div>
</span>
</div>

<div class="tipo_dados">Dados Profissionais:</div>

<span class="area_campo">
	<div class="label"><?php echo $form['instituicao_trabalho']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['instituicao_trabalho'] ?></div>
	<div class="erro"><?php echo $form['instituicao_trabalho']->renderError() ?></div>
	<div class="dica">(Informe o nome da instituição em que trabalha)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['profissao']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['profissao'] ?></div>
	<div class="erro"><?php echo $form['profissao']->renderError() ?></div>
	<div class="dica">(Prencha o cargo que ocupa na empresa em que trabalha OU a sua profissão)</div>
</span>

<div class="tipo_dados">Palestras Preferenciais:</div>
<div class="campo">Caso haja superlotação, devido a quantidade de vagas limitadas, as primeiras
opções terão preferência para assistir aos eventos.</div>

<span class="area_campo">
	<div class="label"><?php echo $form['opcao_1_oficina']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['opcao_1_oficina'] ?></div>
	<div class="erro"><?php echo $form['opcao_1_oficina']->renderError() ?></div>
	<div class="dica">(Selecione a primeira opção de evento que você deseja participar.)</div>
</span>

<span class="area_campo">
	<div class="label"><?php echo $form['opcao_2_oficina']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['opcao_2_oficina'] ?></div>
	<div class="erro"><?php echo $form['opcao_2_oficina']->renderError() ?></div>
	<div class="dica">(Selecione a segunda opção de evento que você deseja participar.)</div>
</span>

  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('inscricao/inicio') ?>">Voltar</a>
          <input type="submit" value="Salvar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>

    </tbody>
  </table>

  </div>
</form>
