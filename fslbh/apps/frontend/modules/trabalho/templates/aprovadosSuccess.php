<?php slot('titulo', 'Lista de trabalhos aprovados'); ?>

<br>
<style>
	
	table th {
		background-color: #6078a8;
		color: #fff;
	}
	
</style>
<?php if  ( date("y-m-d") <  date("d-m-y",strtotime("10-07-09"))  ) { ?>
<p>A lista com os trabalhos aprovados estará disponível apartir do dia 10/07/2009.</p>
<?php } else if ($trabalho_list) { ?>
<table border="1"> 
  <thead>
    <tr>
      <th>Título</th>
      <th>Autor</th>
      <th>Eixo temático</th>
      <th>Trabalho</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trabalho_list as $trabalho): ?>
    <tr>
      <td>
        <?php echo $trabalho->getTitulo() ?>
      </td>
      <td><?php echo $trabalho->getPrimeiroNome()," ",$trabalho->getNomeMeio()," ",$trabalho->getSobrenome() ?></td>
      <td><?php echo $trabalho->getEixoTematico() ?></td>
      <td>
        <?php echo link_to('<img src="/images/icons/page.png" />ver', 'trabalho/visualizar?id='.$trabalho->getId(), array('style' => 'text-decoration: none;', 'title' => 'visualizar')) ?>
      </td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php } else { ?>
<p>Não há nenhum trabalho aprovado.</p>
<?php } ?>
  