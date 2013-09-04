<div class="tarefas form">
<?php echo $this->Form->create('Tarefa'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tarefa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descricao');
		echo $this->Form->input('repositorio_id');
		echo $this->Form->input('status_id');
		echo $this->Form->input('usuario_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>