<?php
use_helper('Date');
//slot('titulo', 'Cadastro realizado!'); ?>
<br>
<pre>
<? //print_r($usuario); ?>
</pre>

<style>
/* Box exibição de Ajuda*/
.BoxAjuda {bbackground: ttransparent; width:95%; padding: 10px;}
.BoxAjuda .b1, .BoxAjuda .b2, .BoxAjuda .b3, .BoxAjuda .b4, .BoxAjuda .b1b, .BoxAjuda .b2b, .BoxAjuda .b3b, .BoxAjuda .b4b {display:block; overflow:hidden; font-size:1px;}
.BoxAjuda .b1, .BoxAjuda .b2, .BoxAjuda .b3, .BoxAjuda .b1b, .BoxAjuda .b2b, .BoxAjuda .b3b {height:1px;}
.BoxAjuda .b2, .BoxAjuda .b3, .BoxAjuda .b4 {background:#E8F3FF; border-left:1px solid #999; border-right:1px solid #999;}
.BoxAjuda .b1 {margin:0 5px; background:#999;}
.BoxAjuda .b2 {margin:0 3px; border-width:0 2px;}
.BoxAjuda .b3 {margin:0 2px;}
.BoxAjuda .b4 {height:2px; margin:0 1px;}
.BoxAjuda .conteudo {padding:5px;display:block; background:#E8F3FF; border-left:1px solid #999; border-right:1px solid #999;}

</style>

<? /////////////////////////////////////////////////////////////////////////// ?>

<table width="80%" cellpadding="3" cellspacing="0" border="0" align="center">
<tr>
<td align="left">
<img widt="100" height="50" src="<?php echo $server?>/images/logo_ficha.jpg">
</td>
<td align="center">
<font size="3"><b>
ESCOLA DE SAÚDE PÚBLICA DE MINAS GERAIS
<br />
<u>FICHA CADASTRAL</u>
</b></font>
</td>
</tr>
</table>

<table width="80%" cellpadding="3" cellspacing="0" border="1" align="center">
<tr>
<td colspan="2">
<p style="line-height: 200%">

<b>Identificação:</b>
<br />
Nome: <?php echo $usuario->getnome()?>
<br />
Filiação: Pai: <?php echo $usuario->getPai()?>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Mãe: <?php echo $usuario->getmae()?>
<br />
Data de Nascimento: <?php echo format_date($usuario->getNascimento(), 'p','pt_BR');?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Naturalidade: <?php echo $usuario->getNaturalidademunicipio()?> &nbsp;&nbsp;&nbsp;&nbsp; UF: <?php echo $usuario->getNaturalidadeestado()?>
<br />
Email: <?php echo $usuario->getEmailpessoal()?>
<br /><br />

<b>Endereço Residencial:</b>
<br />
Logradouro: <?php echo $usuario->getLogradouro()?> &nbsp;&nbsp;&nbsp;&nbsp; Número: <?php echo $usuario->getNumero()?>
<br />
Bairro: <?php echo $usuario->getBairro()?> &nbsp;&nbsp;&nbsp;&nbsp; Município: <?php echo $usuario->getMunicipio()?> &nbsp;&nbsp;&nbsp;&nbsp; UF: <?php echo $usuario->getEstado()?>
<br />
CEP: <?php echo $usuario->getCep()?> &nbsp;&nbsp;&nbsp;&nbsp; Telefone: <?php echo $usuario->getTelefone()?>
<br /><br />

<b>Documentos de Identidade:</b>
<br />
Carteira de Identidade: <?php echo $usuario->getRg()?> &nbsp;&nbsp;&nbsp;&nbsp; Órgão Expedidor: <?php echo $usuario->getRgorgaoexpeditor()?> &nbsp;&nbsp;&nbsp;&nbsp; Data: <?php echo  $usuario->getRgdataexpedicao() ?>
<br />
CPF: <?php echo $usuario->getcpf()?>
<br /><br />

<b>Dados Escolares:</b>
<br />
Escolaridade: <?php echo $usuario->getescolaridade()?>
<br /><br />


<b>Dados Profissionais:</b>
<br />
Instituição: <?php echo $usuario->getInstnome()?>
<br />
Local onde trabalha: <?php echo $usuario->getInstsetor()?>
<br />
Cargo / Função que exerce: <?php echo $usuario->getInstcargo()?>
<br />
Data Admissão: <?php echo format_date($usuario->getInstdataadmissao(), 'p','pt_BR');?>
<br />
Nome da Equipe: <?php echo $usuario->getInstnomeequipe();?>
<br />
Código Equipe: <?php echo $usuario->getInstcodequipe();?>
<br />

<?
	$modelo_atencao_primaria = "";
	switch($usuario->getInstmodeloatencao())
	{
		case 1:
			$modelo_atencao_primaria = "PSF";
		break;
		case 2:
			$modelo_atencao_primaria = "PACS";
		break;
		case 3:
			$modelo_atencao_primaria = "OUTRO";
		break;
	}
	//--
	$desenvolve_outra_ativ_remunerada = "";
	switch($usuario->getInstatividade())
	{
		case 1:
			$desenvolve_outra_ativ_remunerada = "Sim";
		break;
		case 2:
			$desenvolve_outra_ativ_remunerada = "Não";
		break;		
	}
?>

Modelo de Atenção Primária à Saúde Municipal: <?php echo $modelo_atencao_primaria;?>
<br />
Desenvolve outra atividade remunerada?: <?php echo $desenvolve_outra_ativ_remunerada;?>
<br />
Sim, onde?
<?php echo $usuario->getInstatividadequal();?>


<br />
Logradouro: <?php echo $usuario->getInstlogradouro()?> &nbsp;&nbsp;&nbsp;&nbsp; Número: <?php echo $usuario->getInstnumero()?>
<br />
Bairro: <?php echo $usuario->getInstbairro()?> &nbsp;&nbsp;&nbsp;&nbsp; Município: <?php echo $usuario->getInstmunicipio()?> &nbsp;&nbsp;&nbsp;&nbsp; UF: <?php echo $usuario->getInstestado()?>
<br />
CEP: <?php echo $usuario->getInstcep()?> &nbsp;&nbsp;&nbsp;&nbsp; Telefone: <?php echo $usuario->getInsttelefone()?> &nbsp;&nbsp;&nbsp;&nbsp; Email: <?php echo $usuario->getInstemail()?>

<br /><br />

<b>Preenchido pela Secretaria Escolar / ESP-MG:</b>
<br />

Autorização da Turma
<br />
&nbsp; &nbsp; &nbsp; &nbsp; Portaria SEE:
<br />
&nbsp; &nbsp; &nbsp; &nbsp; Parecer SEE:
<br />
&nbsp; &nbsp; &nbsp; &nbsp; Referendo CEE:
<br />

<table width="100%">
	<tr valign="top">
		<td>
			<center>
			______________________________________<br />
			M&ordf; de Fátima Camarinho Pereira França<br />
			Secretária ESP/MG<br />
			Autorização N&ordm; 007018/07<br />
			SRE Metropolitana
			</center>
		</td>
		<td>
			<center>
			______________________________________<br />
			Aluno
			</center>
		</td>
	</tr>
</table>

<center>

<?php
	        switch (date('m')) {
	        	case 1: $nomemes = "Janeiro"; break;
	        	case 2: $nomemes = "Fevereiro"; break;
	        	case 3: $nomemes = "Mar&ccedil;o"; break;
	        	case 4: $nomemes = "Abril"; break;
	        	case 5: $nomemes = "Maio"; break;
	        	case 6: $nomemes = "Junho"; break;
	        	case 7: $nomemes = "Julho"; break;
	        	case 8: $nomemes = "Agosto"; break;
	        	case 9: $nomemes = "Setembro"; break;
	        	case 10: $nomemes = "Outubro"; break;
	        	case 11: $nomemes = "Novembro"; break;
	        	case 12: $nomemes = "Dezembro"; break;
	        }
?>


Belo Horizonte - MG, <?php echo date('d');?> de <?php echo $nomemes?> de <?php echo date('Y');?>
</center>
<br />
</p>
</td>
</tr>
</table>


<br /><br />

</td>
</tr>

</table>


</TD>
</TR>
</table>



<? echo link_to('Voltar','inscricao/inscricao'); ?>
