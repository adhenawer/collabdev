<div class="actions">
    <h3><?php echo __('Principal'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Criar Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="statuses index">
    <h2><?php echo __('Status'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('criado em'); ?></th>
        <th></th>
    </tr>
    <?php foreach ($statuses as $status): ?>
    <tr>
        <td><?php echo h($status['Status']['nome']); ?>&nbsp;</td>
        <td><?php echo h($status['Status']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $status['Status']['id'])); ?>
            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $status['Status']['id'])); ?>
            <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $status['Status']['id']), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Página {:page} de {:pages}, visualizando {:current} registros, de {:count} no total, começando do registro {:start}, terminando no {:end}')
    ));
    ?>  </p>
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<?php echo $this->Element('menu'); ?>