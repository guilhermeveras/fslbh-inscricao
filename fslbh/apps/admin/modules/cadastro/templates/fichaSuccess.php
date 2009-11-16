<?php
use_helper('Date');
?>

<style>
html{color:#000;background:#FFF; font-family: Arial;}
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}
table{border-collapse:collapse;border-spacing:0;}
fieldset,img{border:0;}
address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}
li{list-style:none;}
caption,th{text-align:left;}
h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}
q:before,q:after{content:'';}
abbr,acronym {border:0;font-variant:normal;}
/* to preserve line-height and selector appearance */
sup {vertical-align:text-top;}
sub {vertical-align:text-bottom;}
input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit;}
/*to enable resizing for IE*/
input,textarea,select{*font-size:100%;}
/*because legend doesn't inherit in IE */
legend{color:#000;}


/* base.css, part of YUI's CSS Foundation */
h1 {
    /*18px via YUI Fonts CSS foundation*/
    font-size:138.5%;  
}
h2 {
    /*16px via YUI Fonts CSS foundation*/
    font-size:123.1%; 
}
h3 {
    /*14px via YUI Fonts CSS foundation*/
    font-size:108%;  
}
h1,h2,h3 {
    /* top & bottom margin based on font size */
    margin:1em 0;
}
h1,h2,h3,h4,h5,h6,strong {
    /*bringing boldness back to headers and the strong element*/
    font-weight:bold; 
}
abbr,acronym {
    /*indicating to users that more info is available */
    border-bottom:1px dotted #000;
    cursor:help;
} 
em {
    /*bringing italics back to the em element*/
    font-style:italic;
}
blockquote,ul,ol,dl {
    /*giving blockquotes and lists room to breath*/
    margin:1em;
}
ol,ul,dl {
    /*bringing lists on to the page with breathing room */
    margin-left:2em;
}
ol li {
    /*giving OL's LIs generated numbers*/
    list-style: decimal outside;    
}
ul li {
    /*giving UL's LIs generated disc markers*/
    list-style: disc outside;
}
dl dd {
    /*giving UL's LIs generated numbers*/
    margin-left:1em;
}
th,td {
    /*borders and padding to make the table readable*/
    /*border:1px solid #000;*/
    border: 0px;
    padding:.5em;
}
th {
    /*distinguishing table headers from data cells*/
    font-weight:bold;
    text-align:center;
}
caption {
    /*coordinated margin to match cell's padding*/
    margin-bottom:.5em;
    /*centered so it doesn't blend in to other content*/
    text-align:center;
}
p,fieldset,table,pre {
    /*so things don't run into each other*/
    margin-bottom:1em;
}
/* setting a consistent width, 160px;   control of type=file still not possible */
input[type=text],input[type=password],textarea{width:12.25em;*width:11.9em;}












/*
 Box exibiÃ§Ã£o de Ajuda
.BoxAjuda {bbackground: ttransparent; width:95%; padding: 10px;}
.BoxAjuda .b1, .BoxAjuda .b2, .BoxAjuda .b3, .BoxAjuda .b4, .BoxAjuda .b1b, .BoxAjuda .b2b, .BoxAjuda .b3b, .BoxAjuda .b4b {display:block; overflow:hidden; font-size:1px;}
.BoxAjuda .b1, .BoxAjuda .b2, .BoxAjuda .b3, .BoxAjuda .b1b, .BoxAjuda .b2b, .BoxAjuda .b3b {height:1px;}
.BoxAjuda .b2, .BoxAjuda .b3, .BoxAjuda .b4 {background:#E8F3FF; border-left:1px solid #999; border-right:1px solid #999;}
.BoxAjuda .b1 {margin:0 5px; background:#999;}
.BoxAjuda .b2 {margin:0 3px; border-width:0 2px;}
.BoxAjuda .b3 {margin:0 2px;}
.BoxAjuda .b4 {height:2px; margin:0 1px;}
.BoxAjuda .conteudo {padding:5px;display:block; background:#E8F3FF; border-left:1px solid #999; border-right:1px solid #999;}
*/
br{ margin-top: 5px; display: block;}
#ficha { width: 980px; border: 1px solid #000000; margin: 20px;}
#matricula {width: 980px; background: #dddddd;  text-align: center; display: block; font-size: 30px; padding-top: 10px; font-weight: bold;}
#bloco 
{
    width: 960px;
    margin: auto 10px;
    border: 1px solid #cccccc;
    margin-top: 5px;

}
#titulo 
{
    width: 960px;
    background: #cccccc;


}
#titulo p 
{
    font-size: 18px; 
    font-weight: bold;
    padding: 3px;
    padding-left: 10px;
}

#conteudo 
{
    width: 940px;
    margin: 10px auto;

}

#botao
{
    width: 1000px;
    text-align: center;
}
#logomarca{

text-align: center;

}


#assinatura
{
    width: 960px;
    margin: 20px auto;


}
#assinatura p 
{
    padding: 3px;
}

</style>

<? /////////////////////////////////////////////////////////////////////////// ?>

<div id="ficha">

<div id="logomarca"><br>
<br>
<?php echo image_tag('logo_ficha.jpg', array('width'=>'890 ')); ?>
<br><br>
</div>


<div id="matricula">Ficha Cadastral de Matrí­cula  / PROHOSP<br></div>

<div id="bloco">
<div id="titulo"><p>Identificação:</p></div>
<div id="conteudo">
    <strong>Nome:</strong> <?php echo $usuario->getnome()?>
    <br />
    
    
    <strong>E-mail Pessoal: </strong><?php echo $usuario->getEmailpessoal()?><br />
    <strong>E-mail Profissional: </strong><?php echo $usuario->getEmailprofissional()?><br />
    <strong>Telefone: </strong><?php echo $usuario->getTelefone()?><br />
    <strong>Celular: </strong><?php echo $usuario->getCelular()?><br />
    
</div>
</div>

<div id="bloco">
<div id="titulo"><p>Endereço Residencial:</p></div>
<div id="conteudo">
    
        <strong>Logradouro: </strong> <?php echo $usuario->getLogradouro()?>        
        <strong>Número: </strong> <?php echo $usuario->getNumero()?>
        <?php if($usuario->getComplemento() != ""){ ?>
        <strong>Complemento: </strong> <?php echo $usuario->getComplemento()?>
        <?php } ?>
    <br />
        <strong>Bairro: </strong> <?php echo $usuario->getBairro()?> 
        <strong>Município: </strong> <?php echo $usuario->getMunicipio()?>
    <br />
        <strong>Estado:  </strong><?php echo $usuario->getEstado()?>    
        <strong>Cep:  </strong><?php echo $usuario->getCep()?>
    <br />

</div>
</div>    

<div id="bloco">
<div id="titulo"><p>Documentos:</p></div>
<div id="conteudo">
    <strong>CPF:</strong> <?php echo $usuario->getcpf()?>
    <br />
</div>
</div>


<div id="bloco">
<div id="titulo"><p>Dados Escolares:</p></div>
<div id="conteudo">

    <strong>Grau de Formação:</strong> <?php echo $usuario->getIdentificacaoParticipante()->getDescricao()?>
    <br />

</div>
</div>

<div id="bloco">
<div id="titulo"><p>Dados Profissionais:</p></div>
<div id="conteudo">
    <strong>Instituição:</strong> <?php echo $usuario->getInstituicaoTrabalho()?>
    <br />
    <strong>Cargo: </strong><?php echo $usuario->getProfissao();?>
    <br />


<br />
</div>
</div>

<div id="bloco">
<div id="titulo"><p>Preenchimento pela Secretaria de Ensino CPG / ESP-MG:</p></div>
<div id="conteudo">



<br />
<center>
<table>
<tr>
<td align="center" valign="top">
________________________________________________<br />

<strong>Maria Celeste Teixeira Guimarães</strong><br />

Secretaria de Ensino da Coordenadoria de Pós-graduação<br />

Escola de Saúde Pública do Estado de Minas Gerais - ESP-MG<br />

</td>
<td align="center" valign="top">
________________________________________________<br />

<strong><?php echo $usuario->getnome()?></strong><br />

Aluno<br />

</td>
</tr>
</table>
</center>

<br />

</div>
</div>

<?/*
    Belo Horizonte - MG, <?php echo date('d');?> de <?php echo $nomemes?> de <?php echo date('Y');?>

    ______________________________________
    <br />
    Assinatura
    
    <br />
    
*/?>
&nbsp;
</div>



</div>

<div id="botao">
        <div class="form-botao-voltar">    
         <a href="JavaScript:window.print();"><img alt="Voltar" src="/images/images-io/imprimir.gif"></a>
        </div>
</div>    

<br /><br /><br />