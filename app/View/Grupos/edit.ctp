<div class="grupos form">
<?php echo $this->Form->create('Grupo'); ?>
	<fieldset>
		<legend><?php echo __('Editar Grupo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>