<div class="tipoRepositorios view">
<h2><?php echo __('Tipo Repositorio'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tipoRepositorio['TipoRepositorio']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($tipoRepositorio['TipoRepositorio']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($tipoRepositorio['TipoRepositorio']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($tipoRepositorio['TipoRepositorio']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>
