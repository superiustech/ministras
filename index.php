<?php
spl_autoload_register(function($class) {
    include($class . '.php');
});

$app = new Application();
$app->executar();

?>