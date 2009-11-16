<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('trabalho/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      
      <tbody>
        <?php $j =0; foreach ($pager->getResults() as $i => $trabalho): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
        	<?php if (is_null($trabalho->getAprovado())) { $j++; ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
          	
            <?php include_partial('trabalho/list_td_batch_actions', array('trabalho' => $trabalho, 'helper' => $helper)) ?>
            <?php include_partial('trabalho/list_td_tabular', array('trabalho' => $trabalho)) ?>
            <?php include_partial('trabalho/list_td_actions', array('trabalho' => $trabalho, 'helper' => $helper)) ?>
          </tr>
          	<?php } ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="6">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('trabalho/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] nenhum resultado|[1] 1 resultado|(1,+Inf] %1% resultados', array('%1%' => $j), $j, 'sf_admin') ?>
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
    </table>
  <?php endif; ?>
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
