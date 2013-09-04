<div class="statuses form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><?php echo __('Editar Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>