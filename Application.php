<?php 
    define('INCLUDE_PATH_FULL' , 'http://localhost/ministras/Views/pages/');
    define('INCLUDE_PATH' , 'http://localhost/ministras/');        
    define('HORARIO_ATUAL', date('Y-m-d H:i:s'));
    define('IP_ADDR', $_SERVER['REMOTE_ADDR']);
    define('DATA_ATUAL', date('Y-m-d'));
    session_start();
    
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );



// constantes banco de dados

if (!defined('HOST')) {
    define('HOST', 'localhost');
}
if (!defined('DATABASE')) {
    define('DATABASE', 'ministras');
}
if (!defined('USER')) {
    define('USER', 'root');
}
if (!defined('PASSWORD')) {
    define('PASSWORD', '');
}

    class Application{
        public function executar(){
            $url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Home';
            $url = ucfirst($url);
            $url.="Controller";
            if(file_exists('Controllers/'.$url.'.php')){
                $className = 'Controllers\\'.$url;
                $controller = new $className();
                $controller->executar();
            }else{
                echo $url;
                die("Não existe esse controlador.");
            }
        }
    }
?> 