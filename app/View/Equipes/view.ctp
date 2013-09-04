<div class="equipes view">
<h2><?php echo __('Equipe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($equipe['Equipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($equipe['Equipe']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($equipe['Equipe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($equipe['Equipe']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->Element('menu'); ?>
<div class="related">
	<h3><?php echo __('Related Equipe Repositorios'); ?></h3>
	<?php if (!empty($equipe['EquipeRepositorio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Equipe Id'); ?></th>
		<th><?php echo __('Repositorio Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($equipe['EquipeRepositorio'] as $equipeRepositorio): ?>
		<tr>
			<td><?php echo $equipeRepositorio['id']; ?></td>
			<td><?php echo $equipeRepositorio['equipe_id']; ?></td>
			<td><?php echo $equipeRepositorio['repositorio_id']; ?></td>
			<td><?php echo $equipeRepositorio['created']; ?></td>
			<td><?php echo $equipeRepositorio['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'equipe_repositorios', 'action' => 'view', $equipeRepositorio['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'equipe_repositorios', 'action' => 'edit', $equipeRepositorio['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'equipe_repositorios', 'action' => 'delete', $equipeRepositorio['id']), null, __('Are you sure you want to delete # %s?', $equipeRepositorio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Equipe Repositorio'), array('controller' => 'equipe_repositorios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Equipe Usuarios'); ?></h3>
	<?php if (!empty($equipe['EquipeUsuario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Equipe Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($equipe['EquipeUsuario'] as $equipeUsuario): ?>
		<tr>
			<td><?php echo $equipeUsuario['id']; ?></td>
			<td><?php echo $equipeUsuario['equipe_id']; ?></td>
			<td><?php echo $equipeUsuario['usuario_id']; ?></td>
			<td><?php echo $equipeUsuario['created']; ?></td>
			<td><?php echo $equipeUsuario['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'equipe_usuarios', 'action' => 'view', $equipeUsuario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'equipe_usuarios', 'action' => 'edit', $equipeUsuario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'equipe_usuarios', 'action' => 'delete', $equipeUsuario['id']), null, __('Are you sure you want to delete # %s?', $equipeUsuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Equipe Usuario'), array('controller' => 'equipe_usuarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
