<div class="actions">
    <h3><?php echo __('Principal'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Criar Tipo de Repositório'), array('controller' => 'tipo_repositorios', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="tipoRepositorios index">
    <h2><?php echo __('Tipo Repositorios'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($tipoRepositorios as $tipoRepositorio): ?>
    <tr>
        <td><?php echo h($tipoRepositorio['TipoRepositorio']['id']); ?>&nbsp;</td>
        <td><?php echo h($tipoRepositorio['TipoRepositorio']['nome']); ?>&nbsp;</td>
        <td><?php echo h($tipoRepositorio['TipoRepositorio']['created']); ?>&nbsp;</td>
        <td><?php echo h($tipoRepositorio['TipoRepositorio']['modified']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $tipoRepositorio['TipoRepositorio']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tipoRepositorio['TipoRepositorio']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tipoRepositorio['TipoRepositorio']['id']), null, __('Are you sure you want to delete # %s?', $tipoRepositorio['TipoRepositorio']['id'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
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