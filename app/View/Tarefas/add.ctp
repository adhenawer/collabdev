<div class="tarefas form">
<?php echo $this->Form->create('Tarefa'); ?>
	<fieldset>
		<legend><?php echo __('Add Tarefa'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('descricao');
		echo $this->Form->input('repositorio_id');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>