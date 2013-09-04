<div class="statuses view">
<h2><?php echo __('Status'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($status['Status']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($status['Status']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($status['Status']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($status['Status']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>
