<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['senha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $usuario['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->Element('menu'); ?>
<div class="related">
	<h3><?php echo __('Related Repositorios'); ?></h3>
	<?php if (!empty($usuario['Repositorio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Linguagem'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Tipo Repositorio Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuario['Repositorio'] as $repositorio): ?>
		<tr>
			<td><?php echo $repositorio['id']; ?></td>
			<td><?php echo $repositorio['nome']; ?></td>
			<td><?php echo $repositorio['descricao']; ?></td>
			<td><?php echo $repositorio['linguagem']; ?></td>
			<td><?php echo $repositorio['usuario_id']; ?></td>
			<td><?php echo $repositorio['tipo_repositorio_id']; ?></td>
			<td><?php echo $repositorio['created']; ?></td>
			<td><?php echo $repositorio['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'repositorios', 'action' => 'view', $repositorio['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'repositorios', 'action' => 'edit', $repositorio['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'repositorios', 'action' => 'delete', $repositorio['id']), null, __('Are you sure you want to delete # %s?', $repositorio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Repositorio'), array('controller' => 'repositorios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tarefa Comentarios'); ?></h3>
	<?php if (!empty($usuario['TarefaComentario'])): ?>
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
	<?php foreach ($usuario['TarefaComentario'] as $tarefaComentario): ?>
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
<div class="related">
	<h3><?php echo __('Related Tarefas'); ?></h3>
	<?php if (!empty($usuario['Tarefa'])): ?>
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
	<?php foreach ($usuario['Tarefa'] as $tarefa): ?>
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
