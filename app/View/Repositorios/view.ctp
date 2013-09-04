<div class="repositorios view">
<h2><?php echo __('Repositorio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($repositorio['Repositorio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($repositorio['Repositorio']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($repositorio['Repositorio']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linguagem'); ?></dt>
		<dd>
			<?php echo h($repositorio['Repositorio']['linguagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($repositorio['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $repositorio['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Repositorio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($repositorio['TipoRepositorio']['nome'], array('controller' => 'tipo_repositorios', 'action' => 'view', $repositorio['TipoRepositorio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($repositorio['Repositorio']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($repositorio['Repositorio']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->Element('menu'); ?>
<div class="related">
	<h3><?php echo __('Related Tarefas'); ?></h3>
	<?php if (!empty($repositorio['Tarefa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Repositorio Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($repositorio['Tarefa'] as $tarefa): ?>
		<tr>
			<td><?php echo $tarefa['id']; ?></td>
			<td><?php echo $tarefa['titulo']; ?></td>
			<td><?php echo $tarefa['descricao']; ?></td>
			<td><?php echo $tarefa['repositorio_id']; ?></td>
			<td><?php echo $tarefa['status_id']; ?></td>
			<td><?php echo $tarefa['usuario_id']; ?></td>
			<td><?php echo $tarefa['created']; ?></td>
			<td><?php echo $tarefa['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tarefas', 'action' => 'delete', $tarefa['id']), null, __('Are you sure you want to delete # %s?', $tarefa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tarefa'), array('controller' => 'tarefas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
