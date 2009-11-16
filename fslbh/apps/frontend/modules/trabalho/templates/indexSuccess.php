<?php slot('titulo', 'Anexos submetidos'); ?>

<br>
<style>
	
	table th {
		background-color: #6078a8;
		color: #fff;
	}
	
</style>
<?php if ($trabalho_list) { ?>
<table border="1"> 
  <thead>
    <tr>
      <th>Título</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trabalho_list as $resultset): ?>
    <?php $trabalho = $resultset->getTrabalho(); ?>
    <tr>
      <td>
      <?php if (!is_null($trabalho->getAprovado()) || date("y-m-d") >  date("d-m-y",strtotime("14-08-09"))) { ?>
        <?php echo $trabalho->getTitulo() ?>
       <?php } else { ?>
		<a href="<?php echo url_for('trabalho/edit?id='.$trabalho->getId()) ?>"><?php echo $trabalho->getTitulo() ?></a>
	   <?php } ?>
      </td>
      <td align="center">
        <?php
          if (is_null($trabalho->getAprovado()) && date("y-m-d") <=  date("d-m-y",strtotime("14-08-09"))) {
	      	 echo link_to('Editar', 'trabalho/edit?id='.$trabalho->getId());
	      	 echo '&nbsp;';
	         echo link_to('Apagar', 'trabalho/delete?id='.$trabalho->getId(), array('method' => 'delete', 'confirm' => 'Tem certeza?'));
          } else {
          	echo '<img src="/images/icons/delete.png" />';
          } 
         ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php } else { ?>
<p>Não há nenhum anexo submetido.</p>
<?php } ?>

<?php if  ( date("y-m-d") >  date("d-m-y",strtotime("14-08-09"))  ) { ?>
<p>O prazo para submissão de anexos encerrou no dia 14/08/2009.</p>  
<?php } else if ($reached_works_limit) { ?>
<p>Já foi atingido o número máximo de anexos submetidos.</p>
<?php } else { ?>
  <img src="/images/icons/add.png" />
  <a href="<?php echo url_for('trabalho/new') ?>">Submeter novo anexo</a>
<?php } ?>