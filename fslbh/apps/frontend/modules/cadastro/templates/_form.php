<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php use_helper('Object') ?>
<?php use_helper('Form') ?>
<?php use_helper('Javascript') ?>


<form action="<?php echo url_for('cadastro/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<div class="formulario" id="formulario">

      <?php echo $form->renderGlobalErrors() ?>


<?php #################################################################################### ?>


				<?php if ($form['opcao_1_oficina']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['opcao_1_oficina']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['opcao_1_oficina'] ?>
		                       <?php echo $form['opcao_1_oficina']->renderHelp() ?>
		                       <?php echo $form['opcao_1_oficina']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['opcao_1_oficina']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['opcao_1_oficina'] ?>
				                <?php echo $form['opcao_1_oficina']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['opcao_2_oficina']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['opcao_2_oficina']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['opcao_2_oficina'] ?>
		                       <?php echo $form['opcao_2_oficina']->renderHelp() ?>
		                       <?php echo $form['opcao_2_oficina']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['opcao_2_oficina']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['opcao_2_oficina'] ?>
				                <?php echo $form['opcao_2_oficina']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>


<?php #################################################################################### ?>

				<?php if ($form['nome']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['nome']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['nome'] ?>
		                       <?php echo $form['nome']->renderHelp() ?>
		                       <?php echo $form['nome']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['nome']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['nome'] ?>
				                <?php echo $form['nome']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['sexo']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['sexo']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['sexo'] ?>
		                       <?php echo $form['sexo']->renderHelp() ?>
		                       <?php echo $form['sexo']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['sexo']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['sexo'] ?>
				                <?php echo $form['sexo']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>



<?php #################################################################################### ?>


				<?php if ($form['cpf']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['cpf']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['cpf'] ?>
		                       <?php echo $form['cpf']->renderHelp() ?>
		                       <?php echo $form['cpf']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['cpf']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['cpf'] ?>
				                <?php echo $form['cpf']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['email_pessoal']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['email_pessoal']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['email_pessoal'] ?>
		                       <?php echo $form['email_pessoal']->renderHelp() ?>
		                       <?php echo $form['email_pessoal']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['email_pessoal']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['email_pessoal'] ?>
				                <?php echo $form['email_pessoal']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['email_profissional']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['email_profissional']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['email_profissional'] ?>
		                       <?php echo $form['email_profissional']->renderHelp() ?>
		                       <?php echo $form['email_profissional']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['email_profissional']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['email_profissional'] ?>
				                <?php echo $form['email_profissional']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>



<?php #################################################################################### ?>


				<?php if ($form['telefone']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['telefone']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['telefone'] ?>
		                       <?php echo $form['telefone']->renderHelp() ?>
		                       <?php echo $form['telefone']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['telefone']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['telefone'] ?>
				                <?php echo $form['telefone']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>



<?php #################################################################################### ?>


				<?php if ($form['celular']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['celular']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['celular'] ?>
		                       <?php echo $form['celular']->renderHelp() ?>
		                       <?php echo $form['celular']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['celular']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['celular'] ?>
				                <?php echo $form['celular']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>


<?php #################################################################################### ?>


				<?php if ($form['cep']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['cep']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['cep'] ?>
		                       <?php echo $form['cep']->renderHelp() ?>
		                       <?php echo $form['cep']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['cep']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['cep'] ?>
				                <?php echo $form['cep']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>


<?php #################################################################################### ?>


				<?php if ($form['logradouro']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['logradouro']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['logradouro'] ?>
		                       <?php echo $form['logradouro']->renderHelp() ?>
		                       <?php echo $form['logradouro']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['logradouro']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['logradouro'] ?>
				                <?php echo $form['logradouro']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['numero']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['numero']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['numero'] ?>
		                       <?php echo $form['numero']->renderHelp() ?>
		                       <?php echo $form['numero']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['numero']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['numero'] ?>
				                <?php echo $form['numero']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['complemento']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['complemento']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['complemento'] ?>
		                       <?php echo $form['complemento']->renderHelp() ?>
		                       <?php echo $form['complemento']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['complemento']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['complemento'] ?>
				                <?php echo $form['complemento']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>
<?php #################################################################################### ?>


				<?php if ($form['bairro']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['bairro']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['bairro'] ?>
		                       <?php echo $form['bairro']->renderHelp() ?>
		                       <?php echo $form['bairro']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['bairro']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['bairro'] ?>
				                <?php echo $form['bairro']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>


<?php #################################################################################### ?>


				<?php if ($form['estado']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['estado']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['estado'] ?>
		                       <?php echo $form['estado']->renderHelp() ?>
		                       <?php echo $form['estado']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['estado']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['estado'] ?>
				                <?php echo $form['estado']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['municipio']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['municipio']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['municipio'] ?>
		                       <?php echo $form['municipio']->renderHelp() ?>
		                       <?php echo $form['municipio']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['municipio']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['municipio'] ?>
				                <?php echo $form['municipio']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>



<?php #################################################################################### ?>


				<?php if ($form['instituicao_trabalho']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['instituicao_trabalho']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['instituicao_trabalho'] ?>
		                       <?php echo $form['instituicao_trabalho']->renderHelp() ?>
		                       <?php echo $form['instituicao_trabalho']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['instituicao_trabalho']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['instituicao_trabalho'] ?>
				                <?php echo $form['instituicao_trabalho']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>


				<?php if ($form['profissao']->hasError()): ?>

		        <div class="form-linha-error">
		                <div class="form-rotulo-erro"><?php echo $form['profissao']->renderLabel() ?></div>
		                <div class="form-campos-erro">
		                       <?php echo $form['profissao'] ?>
		                       <?php echo $form['profissao']->renderHelp() ?>
		                       <?php echo $form['profissao']->renderError() ?>
		                </div>
		        </div>

		  <?php else: ?>

		        <div class="form-linha">
		                <div class="form-rotulo"><?php echo $form['profissao']->renderLabel() ?></div>
		                <div class="form-campos">
		                        <?php echo $form['profissao'] ?>
				                <?php echo $form['profissao']->renderHelp() ?>
		                </div>
		        </div>

		  <?php endif; ?>

<?php #################################################################################### ?>




          <?php echo $form->renderHiddenFields() ?>
<br />
<br />
<br />
<br />
	<div class="form-botoes">
		<div class="form-botao-voltar">
			<? echo link_to(image_tag('voltar.gif', 'alt=Voltar'),'inscricao/inicio'); ?>
		</div>
		<div class="form-botao-enviar">
			<? echo submit_image_tag('cadastrar_novo.gif', array('style'=>'border: 0px;')) ?>
		</div>
	</div>

</form>
</div>
