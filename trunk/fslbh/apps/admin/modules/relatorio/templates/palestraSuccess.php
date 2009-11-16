<?php
	$oficinas = array(  '1'=>'Educação é bom e o KDE gosta!',
			    '2'=>'SAMBA4 + AD DEPLOYMENT TOOLS',
			   '3' => 'OPENSTREETMAP',
			 '4' => 'Aprendendo a usar e contribuir com o Software Livre',
			 '5' => 'Software Livre, Open Source e Licenças',
			 '6' => 'Asterisk fácil e rápido no Ubuntu',
			 '7' => 'Debian custom and Debian BR-Desktop',
			 '8' => 'Animação e modelagem com Blender e Gimp',
			 '9' => 'Funcionalidades KDE 4.X e KDE-MG',
			 '10' => 'Conhecimento e Liberdade: Uma mão lava a outra se estiverem livres',
			 '11' => 'VIM! Typing like a hurricane!',
			 '12' => 'Libertas Debian e ferramenta para criação de distribuições',
			 '13' => 'Patchs de contribuição para o KDE',
			 '14' => 'Introdução a Modelagem e Desenvolvimento Ágil de Sistemas com Symfony',
			 '15' => 'Aprendendo Django com o EMA',
			 '16' => 'XMPP/Jabber: Liberdade também nos bate-papos',
			 '17' => 'Evolução do Software Livre'
			 );
	echo "<ul>";
	foreach($oficinas as $key=>$o)
	{
		echo "<li><a href='".url_for("relatorio/palestra?oficina=$key")."'>$o</a></li>";
	}
	echo "</ul>";

?>
