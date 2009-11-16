<?php slot('titulo', 'Programação'); ?>


<?php
  function inicioQuadro($titulo)
  {  	
	$html = <<<html
<center>
<table border="1">
<tr>
<th colspan="3">{$titulo}</th>
</tr>
html;
	return $html;
  }

  function linhaQuadro3Colunas($col1, $col2, $col3, $isTitle=FALSE)
  {
  	if($isTitle)
  	{
		$html = <<<html
<tr>
<th width="70">{$col1}</th>
<th width="450">{$col2}</th>
<th>{$col3}</th>
</tr>
html;
		return $html;
  	}
  	else
    {
		$html = <<<html
<tr>
<td width="70">{$col1}</td>
<td width="450">{$col2}</td>
<td>{$col3}</td>
</tr>
html;
		return $html;
  	}
  }
  
  function fimQuadro()
  {
	$html = <<<html
</table>
</center>
html;
	return $html;
  }
  
?>

<p>&nbsp;</p>

<?php echo inicioQuadro("26/09/2009 - Sábado"); ?>

<?php echo linhaQuadro3Colunas("8h", "Mesa de Abertura", "Tammy Claret Monteiro<br />Diretora da ESP-MG<br/>&nbsp;<br/>Organizadores do evento e representantes da ESP-MG"); ?>
<?php echo linhaQuadro3Colunas("9h<br/>Palestra 1<br />Auditório", "<strong>Educação é bom e o KDE gosta!</strong><br />&nbsp;<p>Dentre os vários recursos disponíveis no KDE, temos um conjunto de aplicativos educacionais bem variados e interessantes, que abrangem diversas áreas do conhecimento, o KDE Edu. Nessa palestra serão apresentada uma explanação geral sobre o uso educacional de softwares livres e como utilizar esses aplicativos em ambientes educacionais.<p>", "Frederico Gonçalves"); ?>
<?php echo linhaQuadro3Colunas("9h<br/>Palestra 2<br />Sala 1", "<strong>SAMBA4 + AD DEPLOYMENT TOOLS</strong><br />&nbsp;<p>Palestra com a finalidade de apresentar as novas características do protocolo SMB (Service Message Block) implementado na nova versão do SaMBa - Samba4. Dentre as principais iremos destacar o suporte à Protocolos de Logon do Active Directory, Servidor LDAP embutido com suporte à características do Active Directory, Servidor Kerberos Embutido, Suporte à características do Sistema de Arquivo NTFS completo e outras. Destinado ao público que já trabalha com administração de sistemas e redes de computadores. Apresentar a instalação em um sistema Debian Lenny 5.0 e a utilização de GPO’s.<br/>Demonstrar a administração do samba4 com as ferramentas Administration Pack and Support Tools (Win 2003 server e Win XP).</p>", "Felipe Ribeiro"); ?>
<?php echo linhaQuadro3Colunas("10h<br/>Palestra 4<br />Auditório", "<strong>Aprendendo a usar e contribuir com o Software Livre</strong><br />&nbsp;<p>Uma visão geral sobre o estado do Software Livre, quanto ao seu uso nos computadores desktop e como o usuário tem reagido ao usar ambientes desktops livres.<p>", "Djavan Fagundes"); ?>
<?php echo linhaQuadro3Colunas("10h<br/>Palestra 3<br />Sala 1", "<strong>Openstreepmap: mapeando o mundo</strong><br />&nbsp;<p>OpenStreetMap é um mapa editável de todo o mundo, construído por voluntários e liberado sob uma licença livre. Será apresentada uma visão geral do projeto e de alguns de seus subprojetos, além informações sobre como utilizar seus dados para localização e a construir aplicações que utilizem a base de dados. Saiba também como contribuir com dados para o projeto, obtidos do seu aparelho receptor de GPS, mapas de satélite ou conhecimento da sua vizinhança.</p>", "Samuel Vale"); ?>
<?php echo linhaQuadro3Colunas("11h<br/>Palestra 5<br />Auditório", "<strong>Software Livre, Open Source e Licenças</strong><br />&nbsp;<p>Este trabalho visa explicar para os iniciantes os conceito de software livre e código aberto, bem como as interseções e diferenças entre ambos. Por último, será apresentada uma visão geral das licenças: LGPL (GNU Lesser General Public License), FDL (Free Documentation License), GPL 2 e GPL 3 (GNU General Public License), AGPL (Affero General Public License), Apache License 2.0, MIT License e BSD License.<p>", "Glauco Vinicius"); ?>
<?php echo linhaQuadro3Colunas("11h<br/>Palestra 6<br />Sala 1", "<strong>Asterisk fácil e rápido no Ubuntu</strong><br />&nbsp;<p>Asterisk no Ubuntu - O Asterisk é o software principal por trás das redes de telefonia sobre Internet, popularmente chamado de VOIP. Aprenda como montar um ambiente de testes e homologação usando o Ubuntu, a distribuição linux mais popular do mundo. Aprenda a montar um PABX digital, para um ambiente de testes e homologação.<p>", "Duda Nogueira"); ?>
<?php echo linhaQuadro3Colunas("14h<br/>Palestra 7<br />Auditório", "<strong>Debian custom and Debian BR-Desktop</strong><br />&nbsp;<p>Apresentação do projeto debian-live para realizações de customizações pure blend Debian. Demonstrará como o BRDesktop foi feito com esta ferramenta e iremos gerar na hora uma customização conforme pacotes escolhidos pela platéia.<p>", "Juliano Sene"); ?>
<?php echo linhaQuadro3Colunas("14h<br/>Palestra 8<br />Sala 1", "<strong>Animação e modelagem com Blender e Gimp</strong><br />&nbsp;<p>Esta apresentação irá demonstrar como utilizar o Blender e o GIMP na prática.<p>", "Damasceno"); ?>
<?php echo linhaQuadro3Colunas("14h<br/>Palestra 9<br />Sala 2", "<strong>Funcionalidades KDE 4.X e KDE-MG</strong><br />&nbsp;<p>Demonstração dos efeitos do KDE 4.x e funcionalidades que estarão presentes nas próximas versões.<p>", "Amanda/Daniel Oliveira"); ?>
<?php echo linhaQuadro3Colunas("15h<br/>Palestra 10<br />Auditório", "<strong>Conhecimento e Liberdade: Uma mão lava a outra se estiverem livres</strong><br />&nbsp;<p>A palestra tem o propósito de esclarecer sobre o que é o conhecimento, como adquiri-lo, trabalhar o mesmo e como esse está envolvido com a liberdade. Ou seja, é através da descentralização, do não monopólio, do conhecer e poder observar as coisas para entendê-las e por consequência, dominá-las. A liberdade e aprendizado ligados ao software de código aberto, explicando sobre o reconhecimento para quem investiu (desenvolveu) e a garantia de usufruir das melhorias e contribuir para as mesmas para quem adquiriu.<p>", "Gustavo Fernandes"); ?>
<?php echo linhaQuadro3Colunas("15h<br/>Palestra 11<br />Sala 2", "<strong>VIM! Typing like a hurricane!</strong><br />&nbsp;<p>Vimbook é um projeto de um livro opensource escrito em Latex que tem por objetivo reunir e explicar (em claro pt_BR) comandos básicos, funções avançadas e dicas interessantes do editor mais legal que existe.<p>", "Eduardo Otubo"); ?>
<?php echo linhaQuadro3Colunas("16h<br/>Palestra 13<br />Auditório", "<strong>Patchs de contribuição para o KDE</strong><br />&nbsp;<p>A apresentação mostra a cronologia de contribuições para o KDE, e kernel do Linux, feitas durante a resolução de um problema no Kopete (programa de mensagens instantâneas do KDE). O foco será dado nos detalhes para se enviar e revisar remendos (\"patches\") para quem está interessado em saber como funciona o processo de correção de bugs e implementação de novas funcionalidades no KDE.<p>", "Lamarque Vieira"); ?>
<?php echo linhaQuadro3Colunas("16h<br/>Palestra 14<br />Sala 1", "<strong>Introdução a Modelagem e Desenvolvimento Ágil de Sistemas com Symfony</strong><br />&nbsp;<p>A oficina abordará a construção de um sistema de Inscrição Online baseado no Framework Symfony. O participante irá aprender os principais conceitos e técnicas para o desenvolvimento ágil com Framework Symfony.<p>", "Guilherme Veras"); ?>
<?php echo linhaQuadro3Colunas("16h<br/>Palestra 12<br />Sala 2", "<strong>Libertas Debian e ferramenta para criação de distribuições</strong><br />&nbsp;<p>Essa palestra abordará o processo de desenvolvimento e implantação de uma distribuição GNU/Linux personalizado para o ambiente escolar. Tal processo ocorreu na Secretaria de Educação da Prefeitura de Belo Horizonte, que já utiliza uma distribuição GNU/Linux (Libertas) há algum tempo, mas precisava atualizá-la para atender a uma série de demandas. Com isso, foi planejada uma migração da Fedora Core 3 (na qual a Libertas era baseada) para a Debian. Nessa palestra serão apresentados os motivos e o planejamento dessa migração, as características da nova distribuição e o processo de seu desenvolvimento, que envolveu a construção de uma ferramenta geradora de distribuições<p>", "Érika Ceciane"); ?>
<?php echo linhaQuadro3Colunas("17h<br/>Palestra 16<br />Auditório", "<strong>XMPP/Jabber: Liberdade também nos bate-papos</strong><br />&nbsp;<p>Em tempos de comunicação à distância, os IMs estão cada vez mais difundidos na população e é difícil imaginar a vida digital sem a sua utilização. Mas e o que há por trás do que se usa para se comunicar? Será que as pessoas sabem sobre os bastidores das suas conversas? Esta palestra visa apresentar o XMPP/Jabber. O protocolo de comunicação livre<p>", "Amanda Magalhães"); ?>
<?php echo linhaQuadro3Colunas("17h<br/>Palestra 17<br />Sala 1", "<strong>Evolução do Software Livre</strong><br />&nbsp;<p>O palestrante fará uso de suas experiências profissionais para demonstrar a evolução do software livre na educação.<p>", "Hélio Cruz"); ?>
<?php echo linhaQuadro3Colunas("17h<br/>Palestra 15<br />Sala 2", "<strong>Aprendendo Django com o EMA</strong><br />&nbsp;<p>Desenvolver para a web nunca foi tão fácil e divertido! O Django - framework da linguagem Python voltado para a web - provê ferramentas e utilitários que agilizam e aprimoram o processo de desenvolvimento WEB. Com o Django não se programa, se faz poesia! Nesta oficina, iremos analisar o EMA - Event Manager - para aprender a como utilizar desse poderoso framework<p>", "Duda Nogueira"); ?>


<?php echo fimQuadro(); ?>
