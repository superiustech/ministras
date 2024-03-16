<?php 

    namespace Controllers;

    class PainelController extends Controller{
    
        private $view;

        public function executar(){
            // verifica se a sessão de login está ok e usa as todas as rotas caso esteja
            // caso nãoe esteja, direciona para o login

            if(isset($_SESSION['logado'])){
            \Router::rota('painel/', function(){
                $this->view = new \Views\MainView('painel-home' ,'header-painel');
                $this->view->render(array('titulo' =>'Painel'));
            });

            \Router::rota('painel/cadastro-usuario', function(){           
                // CADASTRAR USUÁRIO ADMINISTRADOR ->>>>> 
                if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar-cliente'){
                        $nome = $_POST['nome_usuario'];
                        $apelido = $_POST['nome_apelido'];
                        $senha = $_POST['senha_usuario'];

                        if($nome == ''|| $senha == '' || $apelido == ''){
                            $data['sucesso'] = false;
                            $data['mensagens'] = 'Campos vazios não são permitidos.';
                        }else if(\Models\PainelModel::verificaUsuario($apelido)){
                            $data['sucesso'] = false;
                            $data['mensagens'] = 'Usuário já existente';
                        }else
                        {
                        if(\Models\PainelModel::cadastrarCliente($nome ,$apelido,$senha)){
                            $data['mensagens'] = 'Usuário cadastrado com sucesso!';
                            $data['sucesso'] = true;    
                        }else{
                            $data['sucesso'] = false;
                            $data['mensagens'] = 'Erro esporádico.';
                        }
                    }
                    die(json_encode($data)); 
                }
                // FIM CADASTRO USUÁRIO ADIMINISTADOR ->>>>>>>
                // ROTACIONA PARA A TELA ESPECÍFICA:

                $this->view = new \Views\MainView('cadastro-usuario' ,'header-painel');
                $this->view->render(array('titulo' =>'Painel'));
            });
            }else{
                // direcionar para tela de login
                \Router::rota('painel/login', function(){
                    $this->view = new \Views\MainView('painel-login' ,'header-login');
                    $this->view->render(array('titulo' =>'Login'));
                });
            }
            //DESCONECTAR 
            \Router::rota('painel/desconectar', function(){
                session_destroy();
                $this->view = new \Views\MainView('painel-login' ,'header-login');
                header('Location:'.INCLUDE_PATH.'painel');
                $this->view->render(array('titulo' =>'Painel'));
            });
        }
    }

?>

