<div class="tipoRepositorios form">
<?php echo $this->Form->create('TipoRepositorio'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipo Repositorio'); ?></legend>
	<?php
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>