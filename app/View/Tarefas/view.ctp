<div class="tarefas view">
<h2><?php echo __('Tarefa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tarefa['Tarefa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($tarefa['Tarefa']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($tarefa['Tarefa']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repositorio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tarefa['Repositorio']['nome'], array('controller' => 'repositorios', 'action' => 'view', $tarefa['Repositorio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tarefa['Status']['nome'], array('controller' => 'statuses', 'action' => 'view', $tarefa['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tarefa['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $tarefa['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tarefa['Tarefa']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tarefa['Tarefa']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->Element('menu'); ?>
<div class="related">
	<h3><?php echo __('Related Tarefa Comentarios'); ?></h3>
	<?php if (!empty($tarefa['TarefaComentario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Tarefa Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tarefa['TarefaComentario'] as $tarefaComentario): ?>
		<tr>
			<td><?php echo $tarefaComentario['id']; ?></td>
			<td><?php echo $tarefaComentario['descricao']; ?></td>
			<td><?php echo $tarefaComentario['tarefa_id']; ?></td>
			<td><?php echo $tarefaComentario['usuario_id']; ?></td>
			<td><?php echo $tarefaComentario['created']; ?></td>
			<td><?php echo $tarefaComentario['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tarefa_comentarios', 'action' => 'view', $tarefaComentario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tarefa_comentarios', 'action' => 'edit', $tarefaComentario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tarefa_comentarios', 'action' => 'delete', $tarefaComentario['id']), null, __('Are you sure you want to delete # %s?', $tarefaComentario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tarefa Comentario'), array('controller' => 'tarefa_comentarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
