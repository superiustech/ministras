<?php 

    namespace Controllers;

    class ContatoController extends Controller{

        public function __construct() {
            $this->view = new \Views\MainView('contato');
            //$this->view = new \Views\MainView('contato' , 'header 2');
            // caso eu queira adicionar um geader personalizado.
        }

        public function executar(){

            // $i = 0; 
            // if ($i = 1){
            //     echo '<script>location.href = "http://localhost/ministras/contato/sucesso"; </script>';
            // }
            // \Router::rota('contato/sucesso' , function(){
            //     $this->view->render(array('titulo' =>'Contato'));
            //     $this->view = new \Views\MainView('contato-sucesso');
            // });
            \Router::rota('contato' , function(){
                $this->view->render(array('titulo' =>'Contato'));
                $this->view = new \Views\MainView('contato');
            });

           // $this->view->render(array('titulo' =>'Contato'));
        }

    }

?>