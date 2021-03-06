<div class="actions">
    <h3><?php echo __('Principal'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Criar Tarefa'), array('controller' => 'tarefas', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="tarefas index">
    <h2><?php echo __('Tarefas'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('titulo'); ?></th>
        <th><?php echo $this->Paginator->sort('repositorio_id'); ?></th>
        <th><?php echo $this->Paginator->sort('status_id'); ?></th>
        <th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
        <th><?php echo $this->Paginator->sort('criado em'); ?></th>
        <th></th>
    </tr>
    <?php foreach ($tarefas as $tarefa): ?>
    <tr>
        <td><?php echo h($tarefa['Tarefa']['titulo']); ?>&nbsp;</td>
        <td>
            <?php echo $this->Html->link($tarefa['Repositorio']['nome'], array('controller' => 'repositorios', 'action' => 'view', $tarefa['Repositorio']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($tarefa['Status']['nome'], array('controller' => 'statuses', 'action' => 'view', $tarefa['Status']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($tarefa['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $tarefa['Usuario']['id'])); ?>
        </td>
        <td><?php echo h($tarefa['Tarefa']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $tarefa['Tarefa']['id'])); ?>
            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tarefa['Tarefa']['id'])); ?>
            <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $tarefa['Tarefa']['id']), null, __('Are you sure you want to delete # %s?', $tarefa['Tarefa']['id'])); ?>
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
