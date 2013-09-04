<div class="tarefas view">
<h2><?php echo __('Tarefa'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Titulo'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['titulo']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Descricao'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['descricao']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Repositorio'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tarefa['Repositorio']['nome'], array('controller' => 'repositorios', 'action' => 'view', $tarefa['Repositorio']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tarefa['Status']['nome'], array('controller' => 'statuses', 'action' => 'view', $tarefa['Status']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Usuario'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tarefa['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $tarefa['Usuario']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($tarefa['Tarefa']['created']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado em'); ?></dt>
        <dd>
            <?php
            $date = new DateTime($tarefa['Tarefa']['modified']);
            echo h($date->format('d/m/Y H:i:s'));
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->Element('menu'); ?>
