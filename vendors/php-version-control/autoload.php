<?php
spl_autoload_register(function() {
    $path = __DIR__ . '/version-controls/';
    require_once($path.'Internals'.'/Actions.php');
    $dir = dir($path);
    while ($file = $dir->read()) {
        if (is_file($path.$file)) {
            require_once($path.$file);
        }
    }
});