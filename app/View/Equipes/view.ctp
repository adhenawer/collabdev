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
<div class="equipes index usuariosEquipe">
    <h2><?php echo 'Membros da equipe' ?></h2>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Usuário</th>
                <th></th>
            </tr>
            <?php foreach ($membros as $value): ?>
            <tr>
                <td><?php echo h($value['Usuario']['login']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('Visualizar'), array('controller' => 'usuarios','action' => 'view', $value['Usuario']['id'])); ?>
                <?php echo $this->Html->link(__('Remover'), array('action' => 'removerUsuario', $equipe['Equipe']['id'], $value['Usuario']['id']), null, __('Tem certeza que deseja remover o usuário %s da equipe?', $value['Usuario']['login'])); ?>
            </td>
            </tr>
            <?php endforeach;?>
        </table>
</div>
<div class="equipes index usuariosEquipe">
    <h2><?php echo 'Repositórios da equipe' ?></h2>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Repositório</th>
                <th></th>
            </tr>
            <?php foreach ($repositoriosEquipe as $value): ?>
            <tr>
                <td><?php echo h($value['Repositorio']['nome']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('Visualizar'), array('controller' => 'repositorios','action' => 'view', $value['Repositorio']['id'])); ?>
                <?php echo $this->Html->link(__('Remover'), array('action' => 'removerRepositorio', $equipe['Equipe']['id'], $value['Repositorio']['id']), null, __('Tem certeza que deseja remover o repositório %s da equipe?', $value['Repositorio']['nome'])); ?>
            </td>
            </tr>
            <?php endforeach;?>
        </table>
</div>
<div class="equipes view form">
    <?php
        echo $this->Form->create(null, array(
            'url' => array(
                'controller' => 'equipes',
                'action' => 'relacionarUsuario',
                 $equipe['Equipe']['id']
        )));
    ?>
    <h2><?php echo 'Adicionar membro' ?></h2>
    <?php
        echo $this->Form->input('usuario_id');
        echo $this->Form->end(__('Submit'));
    ?>
</div>
<div class="equipes view form">
    <?php
        echo $this->Form->create(null, array(
            'url' => array(
                'controller' => 'equipes',
                'action' => 'relacionarRepositorio',
                 $equipe['Equipe']['id']
        )));
    ?>
    <h2><?php echo 'Adicionar repositório' ?></h2>
    <?php
        echo $this->Form->input('repositorio_id');
        echo $this->Form->end(__('Submit'));
    ?>
</div>