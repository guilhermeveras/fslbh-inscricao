<?php slot('titulo', 'Programação'); ?>

<div class="tipo_dados">Programação do Evento</div>

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

<?php echo inicioQuadro("28/11/2009 - Sábado"); ?>


<?php echo linhaQuadro3Colunas("8h as 9h<br/>Sala 1", "Credenciamento", ""); ?>


<?php echo linhaQuadro3Colunas("9h as 12h<br/>Oficina<br />Lab 8", "<strong>Xen para Ambientes Corporativos - Parallel and Full Virtualization - Case de Sucesso: Corpo de Bombeiros e Fundação Ezequiel Dias</strong><br />&nbsp;<p>Este Hands-on tem como objetivo solidificar o conhecimento de técnicos e especialistas envolvidos nos processos de virtualização de servidores munindo-se de boas práticas no deployment de ambientes onde há a necessidade de virtualização.<br />
A abordagem deste, capacita o indivíduo a instalar um servidor de médio/grande porte para servir máquinas totalmente virtualizadas ou para-virtualizadas, dependendo de sua necessidade com várias opções de configuração das VMs (HVM/PVM), rede entre outras.
<br />Para este Hands-on, utilizaremos dois ambientes de servidores:
<br />Hp Proliant ML 350 G5 - Xen Server Open 3.4.1 - Dom0 - Compilado do Source - Debian 5.3 Lenny
<br />Desktop AMD64-X2, CoreDuo, 8GBRAM - Xen Server Open - 3.2 - Dom0 - Centos5.3 Final
<br />Importante ressaltar que este e um ambiente em funcionamento no Corpo de Bombeiros Militar de Minas Gerais e Fundação Ezequiel Dias, que será reproduzido para o Público..<p>",
"Felipe Ribeiro / Sandro Alves"); ?>


<?php echo linhaQuadro3Colunas("9h as 11h <br/>Oficina<br />Lab 9", "<strong>Java para iniciantes</strong><br />&nbsp;<p>" .
"Ementa: <br />
<strong>Introdução</strong> <br />
Conceitos de Orientação Objeto; <br />
<strong>Motivação – Porque usar Java?</strong> <br />
Características do Java; <br />
Demostração de um programa em java; <br />
<strong>Tipo, Operadores e Expressões</strong> <br />
Tipos primitivos; <br />
Declarações e inicialização; <br />
Operadores e Expressões; <br />
<strong>Classes e Objetos</strong> <br />
Conceitos e estruturas; <br />
Construtores; <br />
Herança de classe; <br />
Estendendo classe; <br />
Classe String e suas operações; <br />
Instrução de repetição (for e while); <br /> </p>",
"Wagner Gomes"); ?>


<?php echo linhaQuadro3Colunas("10h as 11h<br/>Lab 7<br />Palestra", "<strong>Software Livre, Open Source e Licenças</strong><br />&nbsp;<p>" .
"Este trabalho visa explicar para os iniciantes os conceito de software livre e código aberto, bem como as interseções e diferenças entre ambos. Por último, será apresentada uma visão geral das licenças: LGPL (GNU Lesser General Public License), FDL (Free Documentation License), GPL 2 e GPL 3 (GNU General Public License), AGPL (Affero General Public License), Apache License 2.0, MIT License e BSD License.<p>",
"Glauco Vinícius / Gustavo Alves"); ?>



<?php echo linhaQuadro3Colunas("13h as 17h<br/>Oficina<br />Lab 11", "<strong>Aprenda Qt e Contribua com o desenvolvimento do projeto KDE</strong><br />&nbsp;<p>" .
"Este mini-curso de cinco horas visa apresentar as principais funcionalidades do
Qt 4.5.x e KDE 4.2.x para o desenvolvimento produtivo de aplicações desktop
multi-plataforma, discutir decisões de projeto, idiomas e apresentar
ferramentas auxiliares para o desenvolvimento utilizando essas
plataformas, além de apresentar vivência prática inicial na utilização
destas plataformas.

<br />O curso será ministrado em dois módulos de três horas cada
um, teremos tópicos expositivos e atividades práticas para fixar conceitos.<p>",
"Lamarque Viera Souza"); ?>

<?php echo linhaQuadro3Colunas("13h as 17h<br/>Palestra<br />Lab 9", "<strong>Django, Desenvolvimento Web da maneira correta</strong><br />&nbsp;<p>" .
"Um framework para desenvolvimento Web que economiza seu tempo e torna a construção de sites uma diversão, permitindo que você construa e mantém alto padrão de qualidade nas aplicações com o mínimo de complicações
<br /><br />
* Introdução a Linguagem de Programção Python, levando em consideração que Django foi cem por cento (100%) desenvolvido nesta linguagem;<br />
* Iniciando com Django, Instalação e Configurações;<br />
* Aplicação prática de Model-View-Controller (MVC) e Don't-Repeat-Yourself (DRY);<br />
* Objeto Relacional.<br />
* Apresentação Teórica de Vantagens e Limitações.<br />
<br />
Django tem feito a Linguagem de Programação Python se tormar bastante conhecida para aplicações Web, sua performance de execução e desenvolvimento, estão deixando os programadores e designers encantados, considerando que o framework foi desenvolvido para quem precisa desenvolver muitas coisas em pouco tempo.
<br />
Desenvolvido por Adrian Holovaty em 2005, programador de um site de notícias Lawrence.com, o fez para suprir as necessidades do site em que trabalhava.",
"Rodolfo Alves Pereira"); ?>



<?php /*echo linhaQuadro3Colunas("10h as 12h<br/>Oficina<br />", "<strong>Asterisk no Ubuntu - mão na massa!</strong><br />&nbsp;<p>" .
"Asterisk no Ubuntu - O Asterisk é o software principal por trás das redes de telefonia sobre Internet, popularmente chamado de VOIP.
<br />Aprenda como montar um ambiente de testes e homologação usando o Ubuntu, a distribuição Linux mais popular do mundo
<br />Aprenda a montar um PABX digital, para um ambiente de testes e homologação.<p>",
"Djavan Fagundes e Guilherme Guerra"); */?>


<?php echo linhaQuadro3Colunas("11h as 12h<br/>Palestra<br />Lab 7", "<strong>LaTeX: Find you type!</strong><br />&nbsp;<p>" .
"Inovando o mundo da tipografia, essa linguagem de alto nível vem quebrar muitos paradigmas na criação de documentos com estrutura lógica. Trazendo visual profissional em artigos, teses, slides, livros, LaTeX vem tomando a frente no meio acadêmico, permitindo o usuário focar no conteúdo de seu trabalho, sem preocupações com a formatação e com a estrutura.
<br>
<strong>Abordagem:</strong> Estrutura lógica de um documento. Principais classes e estilos. CTAN, pacotes e fontes.
<p>", "Luís Eterovick"); ?>




<?php echo linhaQuadro3Colunas("11h as 12h<br/>Palestra<br />Lab 9", "<strong>Padrões Aberto e Informação Livre</strong><br />&nbsp;<p>" .
"Esta palestra visa padrões abertos são padrões disponíveis para livre acesso e implementação, que independem de royalties e outras taxas e sem discriminação de uso. São elementos importantes na era da Informação e do Conhecimento, pois permitem que estes não fiquem presos ao monopólio de um formato e estejam disponíveis para gerar o saber por meio do compartilhamento.
<br /><strong>Abordagem: </strong>Dado, Informação e Conhecimento. Armazenando de forma Livre. O cuidados com a tecnologia (ODF x Outros Padrões).
<p>", "Júlio César"); ?>

<?php /*echo linhaQuadro3Colunas("14h as 15h<br/>Palestra<br />Sala 1", "<strong>Gnome love - você no seu Desktop</strong><br />&nbsp;<p>" .
"O Gnome muitas vezes ultrapassa as barreiras tecnológicas para se tornar um caso real de amor.
<br />Você ama seu desktop? Se sente parte dele? <br />Saiba como fazer parte dessa grande família GNOME.
<p>", "Licio Fonseca"); */?>


<?php echo linhaQuadro3Colunas("14h as 16h<br/>Oficina<br />Lab 10", "<strong>Inkscape - Conheça a ferramenta livre para seus desenhos!</strong><br />&nbsp;<p>" .
"Conheça esse poderoso editor de imagens vetoriais, a alternativa livre, eficaz e imprescindível aos programas proprietários do gênero.
<br />A oficina introduzirá o aluno no desenho vetorial, mostrando conceitos elementares no uso do Inkscape, proporcionando aos mesmos a possibilidade do uso de uma ferramenta gratuita e livre para a elaboração de desenhos vetoriais profissionais.
<p>", "Anderson Viana"); ?>

<?php echo linhaQuadro3Colunas("14h as 17h<br/>Oficina<br />Lab 8", "<strong>Desenvolvimento PHP5 com smarty e PDO</strong><br />&nbsp;<p>" .
"Esta oficina visa apresentar ao público o desenvolvimento de aplicações usando todo o potencial da orientação a objetos do PHP 5, incluindo as bibliotecas Smarty e PDO.
<p>", "Diego Henrique Oliveira"); ?>



<?php echo linhaQuadro3Colunas("14h as 17h<br/>Oficina<br />Lab 7", "<strong>Migrando ambiente de desenvolvimento web proprietário para software livre</strong><br />&nbsp;<p>" .
"Os seguintes tópicos serão abordados:
<br/>
1 – Porque não migrar.
<br/>
2 – Porque migrar.
<br/>
3 – Principais dificuldades encontradas.
<br/>
4 - Por onde começar.
<br/>
5 – Entendendo as diferenças de permissões de acesso e particionamento do sistema.
<br/>
6 – Como preparar um ambiente de trabalho LAMP (linux -Apache, Mysql, Php).
<br/>
7 – Principais ferramentas de desenvolvimento.
<br/>
<p>", "Bruce Emmanuel Sueira"); ?>



<?php echo linhaQuadro3Colunas("14h as 16h<br/>Palestra<br />Sala 1", "<strong>Software Livre: Revolucione!</strong><br />&nbsp;<p>" .
"Uma visão geral sobre o estado do Software Livre, quanto ao seu uso nos computadores desktop e como o usuário tem reagido ao usar ambientes desktops livres.
<p>", "Guilherme Guerras e Djavan Fagundes"); ?>



<?php echo linhaQuadro3Colunas("16h as 17h<br/>Palestra<br />Lab 10", "<strong>Conheça e faça parte do Projeto KDE-MG</strong><br />&nbsp;<p>" .
"Conheça as pessoas envolvidas no KDE-MG e as novas propostas do nosso projeto.
<p>", "
Amanda Oliveira"); ?>


<?php echo linhaQuadro3Colunas("O dia todo<br/>Oficina<br />Intinerante", "<strong>Oficina de Jogos</strong><br />&nbsp;<p>" .
"Oficina aberta à discussão de jogos livres. Venha saber por que estão equivocados aqueles que dizem que Linux serve apenas para servidores! Eventuais partidas e/ou campeonatos podem acontecer..",
"Amanda Magalhães"); ?>


<?php echo fimQuadro(); ?>
