<div class="repositorios view">
<h2><?php echo __('Repositório'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($repositorio['Repositorio']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($repositorio['Repositorio']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Descricao'); ?></dt>
        <dd>
            <?php echo h($repositorio['Repositorio']['descricao']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Linguagem'); ?></dt>
        <dd>
            <?php echo h($repositorio['Repositorio']['linguagem']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Responsável'); ?></dt>
        <dd>
            <?php echo $this->Html->link($repositorio['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $repositorio['Usuario']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tipo Repositorio'); ?></dt>
        <dd>
            <?php echo $this->Html->link($repositorio['TipoRepositorio']['nome'], array('controller' => 'tipo_repositorios', 'action' => 'view', $repositorio['TipoRepositorio']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($repositorio['Repositorio']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($repositorio['Repositorio']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>