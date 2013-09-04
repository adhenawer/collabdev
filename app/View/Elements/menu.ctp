<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
    <?php if($this->Session->read('Auth.User.Grupo.id') == $nivel['administrador']): ?>
        <li><?php echo $this->Html->link(__('Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Usuários'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Equipes'), array('controller' => 'equipes','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Tipos de Repositório'), array('controller' => 'tipo_repositorios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Repositórios'), array('controller' => 'repositorios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Lista de Status (Tarefa)'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Tarefas'), array('controller' => 'tarefas', 'action' => 'index')); ?> </li>
    <?php endif; ?>

    <?php if($this->Session->read('Auth.User.Grupo.id') == $nivel['gerenciador']): ?>
        <li><?php echo $this->Html->link(__('Usuários'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Equipes'), array('controller' => 'equipes','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Repositórios'), array('controller' => 'repositorios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Tarefas'), array('controller' => 'tarefas', 'action' => 'index')); ?> </li>
    <?php endif; ?>

    <?php if($this->Session->read('Auth.User.Grupo.id') == $nivel['colaborador']): ?>
        <li><?php echo $this->Html->link(__('Tarefas'), array('controller' => 'tarefas', 'action' => 'index')); ?> </li>
    <?php endif; ?>
    </ul>
</div>



