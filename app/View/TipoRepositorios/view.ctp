<div class="tipoRepositorios view">
<h2><?php echo __('Tipo Repositorio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoRepositorio['TipoRepositorio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($tipoRepositorio['TipoRepositorio']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tipoRepositorio['TipoRepositorio']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tipoRepositorio['TipoRepositorio']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->Element('menu'); ?>
<div class="related">
	<h3><?php echo __('Related Repositorios'); ?></h3>
	<?php if (!empty($tipoRepositorio['Repositorio'])): ?>
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
	<?php foreach ($tipoRepositorio['Repositorio'] as $repositorio): ?>
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
