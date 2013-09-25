<div class="actions">
    <h3><?php echo __('Principal'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Criar Equipe'), array('controller' => 'equipes','action' => 'add')); ?></li>
    </ul>
</div>
<div class="equipes index">
    <h2><?php echo __('Equipes'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('Criado em'); ?></th>
        <th></th>
    </tr>
    <?php foreach ($equipes as $equipe): ?>
    <tr>
        <td><?php echo h($equipe['Equipe']['nome']); ?>&nbsp;</td>
        <td><?php echo h($equipe['Equipe']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('Funções'), array('action' => 'view', $equipe['Equipe']['id'])); ?>
            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $equipe['Equipe']['id'])); ?>
            <?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $equipe['Equipe']['id']), null, __('Are you sure you want to delete # %s?', $equipe['Equipe']['id'])); ?>
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