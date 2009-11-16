<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('trabalho/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<script type="text/javascript">
/* <![CDATA[ */
function uncheckAllButThis(field)
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box != field) box.checked = false } return true;
}

function aguarde()
{
   document.getElementById('pagina').innerHTML = '<center><h1><font color="#FF0000">Aguarde...</h1><strong>ATENÇÃO:</strong> Para que o seu anexo seja enviado com sucesso, espere até que esta mensagem desapareça. Caso você tente realizar qualquer operação enquanto esta mensagem está em sua tela, o seu arquivo poderá ser corrompido e terá que ser reenviado.</font></center>';
}
/* ]]> */
</script>

<style>

.formulario { width: 650px; float:left; margin-left: 0px;}
.tipo_dados { margin-left: 15px; color: #0d4169; font-size: 14px; font-weight: bold; margin-top: 10px; float: left; display: block; width: 650px;}
.label { margin-left: 15px; font-size: 11px; font-weight: bold; margin-top: 10px; float: left; display: block; width: 650px;}
.campo { margin-left: 15px;  float: left; display: block; width: 650px;}
.erro {  float: left; display: block; width: 650px;}
.dica { margin-left: 15px;  color: #999;  float: left; display: block; width: 650px; font-size: 11px;}
.area_submit { margin-left: 15px; float: left; display: block; width: 650px;}

.error_list
{
	margin: 0px;
	margin-left: 15px; 
} 
.error_list li {	list-style: none; }
.radio_list li {	list-style: none; }

/* Form inputs... */
input:focus { background: #fafafa; border: 1px solid #0d4169; font-weight: bold;}

/* .area_campo:hover { width: 650px;  background: #ffffdd;} */
/* .area_campo:focus { width: 650px; float: left; background: #ffffdd;}*/


/* #trabalho_primeiro_nome{ width: 200px;} */

</style>

<div class="formulario">

<div class="tipo_dados">Insira abaixo os dados do anexo</div>

<div id="pagina">
</div>
  
  <span class="area_campo">
	<div class="label"><?php echo $form['titulo']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['titulo'] ?></div>
	<div class="erro"><?php echo $form['titulo']->renderError() ?></div>
	<div class="dica">(Prencha o título do anexo, sem abreviações)</div>
  </span>
  
  <span class="area_campo">
	<div class="label"><?php echo $form['arquivo']->renderLabel() ?></div>
	<div class="campo"><?php echo $form['arquivo'] ?></div>
	<div class="erro"><?php echo $form['arquivo']->renderError() ?></div>
	<div class="dica">(Selecione o arquivo do seu anexo em formato PDF com no máximo 1MB)</div>
  </span>


 
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('trabalho/index') ?>">Voltar</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Apagar', 'trabalho/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Tem certeza?')) ?>
          <?php endif; ?>
          <input type="submit" value="Salvar" onClick="javascript:aguarde()"/>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
    </tbody>
  </table>
  
  </div>
</form>
