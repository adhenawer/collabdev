<div class="equipes view">
<h2><?php echo __('Equipe'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($equipe['Equipe']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($equipe['Equipe']['nome']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($equipe['Equipe']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($equipe['Equipe']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>