<div class="grupos view">
<h2><?php echo __('Grupo'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($grupo['Grupo']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($grupo['Grupo']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($grupo['Grupo']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($grupo['Grupo']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>
