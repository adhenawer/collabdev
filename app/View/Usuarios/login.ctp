<?php
echo $this->Form->create('Usuario', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'login',
    'senha' => array('type' => 'password')
));
echo $this->Form->end('Login');
?>