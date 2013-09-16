<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($usuario['Usuario']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($usuario['Usuario']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($usuario['Usuario']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Login'); ?></dt>
        <dd>
            <?php echo h($usuario['Usuario']['login']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Grupo'); ?></dt>
        <dd>
            <?php echo $this->Html->link($usuario['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $usuario['Grupo']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($usuario['Usuario']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($usuario['Usuario']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>