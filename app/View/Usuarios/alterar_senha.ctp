<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
		<legend><?php echo __('Alterar senha'); ?></legend>
		<?php echo $this->Session->flash(); ?>
		<p></p>
			<p><?php echo $this->Form->input('oldPassword', array('type' => 'password','div' => false, 'label' => 'Senha atual'));?></p>
			<p><?php echo $this->Form->input('senha', array('type' => 'password','div' => false, 'label' => 'Nova senha'));?></p>
			<p><?php echo $this->Form->input('passwordAgain', array('type' => 'password','div' => false, 'label' => 'Repita nova senha'));?></p>
		<?php echo $this->Form->end(__('Submit')); ?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
<?php echo $this->Element('menu'); ?>