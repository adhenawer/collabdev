<div class="repositorios form">
<?php echo $this->Form->create('Repositorio'); ?>
	<fieldset>
		<legend><?php echo __('Editar Repositorio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('linguagem');
		echo $this->Form->input('tipo_repositorio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>