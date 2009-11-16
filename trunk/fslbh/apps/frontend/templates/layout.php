<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <? /*<link rel="shortcut icon" href="/favicon.ico" /> */ ?>
  </head>
  <body>
<div id="sgi-tudo">
        <div id="sgi-corpo">
                <div id="sgi-topo"></div>

                <div id="sgi-menu-topo">
                    <span class="menu-topo-texto">

                     </span>
                </div>

                <div id="sgi-sub-menu-topo"></div>
                <div id="sgi-pagina">
                                        <div id="sgi-coluna-esquerda">

                                                <? /* <div id="sgi-coluna-esquerda-top"></div> */ ?>

                                                <div id="sgi-coluna-esquerda-conteudo">
                                                                        <div id="menu_lateral">

                <ul>
										<li><strong>Menu</strong></li>
										<li><?php echo link_to('Página Inicial', 'inscricao/inicio') ?></li>
										<li><?php echo link_to('Sobre o Evento', 'inscricao/inicio') ?></li>
										<li><?php echo link_to('Programação', 'inscricao/programacao') ?></li>
										<li><?php echo link_to('Local', 'inscricao/inicio') ?></li>
										<li><?php echo link_to('Faça sua Inscrição', 'cadastro/new') ?></li>
										<li><?php echo link_to('Downloads', 'inscricao/inicio') ?></li>
										<li><?php echo link_to('Informações e Contato', 'inscricao/contato') ?></li>
                </ul>

                                                                        </div>
                                                </div>
                                    </div>
                                        <div id="sgi-conteudo">
                                                <? /*<div id="sgi-conteudo-titulo"><p><?php include_slot('titulo') ?></p></div> */ ?>
                                                <div id="sgi-texto">
                                                		<?php if($sf_user->hasFlash('sucesso')):echo "&nbsp;<br /><b>".$sf_user->getFlash('sucesso')."</b>"; endif;?>
                                                        <?php echo $sf_content ?>
                                                </div>
                                        </div>
                           </div>

        <!-- end corpo //-->
        </div>
<!-- end tudo //-->
</div>
<div id="sgi-rodape">&nbsp;</div>
<br /> &nbsp;<br />

<?php /* Google Analytics */ ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11612494-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>



















