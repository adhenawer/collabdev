<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
    <fieldset>
        <legend><?php echo __('Alterar Cadastro'); ?></legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('email');
        echo $this->Form->input('login');
    ?>
    <div class="input text required">
        <label for="UsuarioLogin">Grupo</label>
        <?php echo $this->data['Grupo']['nome'];?>
    </div>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Element('menu'); ?>