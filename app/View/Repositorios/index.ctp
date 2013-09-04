<div class="actions">
	<h3><?php echo __('Principal'); ?></h3>
    <ul>
		<li><?php echo $this->Html->link(__('Criar Repositório'), array('controller' => 'repositorios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="repositorios index">
	<h2><?php echo __('Repositorios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('linguagem'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_repositorio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($repositorios as $repositorio): ?>
	<tr>
		<td><?php echo h($repositorio['Repositorio']['id']); ?>&nbsp;</td>
		<td><?php echo h($repositorio['Repositorio']['nome']); ?>&nbsp;</td>
		<td><?php echo h($repositorio['Repositorio']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($repositorio['Repositorio']['linguagem']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($repositorio['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $repositorio['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($repositorio['TipoRepositorio']['nome'], array('controller' => 'tipo_repositorios', 'action' => 'view', $repositorio['TipoRepositorio']['id'])); ?>
		</td>
		<td><?php echo h($repositorio['Repositorio']['created']); ?>&nbsp;</td>
		<td><?php echo h($repositorio['Repositorio']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $repositorio['Repositorio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $repositorio['Repositorio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $repositorio['Repositorio']['id']), null, __('Are you sure you want to delete # %s?', $repositorio['Repositorio']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $this->Element('menu'); ?>