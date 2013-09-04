<div class="equipes form">
<?php echo $this->Form->create('Equipe'); ?>
	<fieldset>
		<legend><?php echo __('Add Equipe'); ?></legend>
	<?php
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>