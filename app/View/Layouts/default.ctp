<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <?php
            $auth = $this->Session->read('Auth.User');
            if(!empty($auth)):
            ?>
                <div id="left">
                    <?php echo $this->Html->link(__('Dashboard'), array('controller' => 'usuarios', 'action' => 'dashboard')); ?>
                </div>
                <div id="right">
                    Acessando como:
                    <span><?php echo $this->Session->read('Auth.User.login').' - '?></span>
                        <?php echo $this->Session->read('Auth.User.Grupo.nome')?>
                    <?php
                        echo $this->Html->link(__('Minha conta'), array('controller' => 'usuarios', 'action' => 'edit', $this->Session->read('Auth.User.id')));
                        echo $this->Html->link(__('Sair'), array('controller' => 'usuarios', 'action' => 'logout'));
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="content">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
            <?php echo $this->Html->link(
                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                    'http://www.cakephp.org/',
                    array('target' => '_blank', 'escape' => false)
                );
            ?>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
