<div class="largeBox">
<div class="container-login">
    <div class="img-box">
    <img src="<?php echo INCLUDE_PATH?>uploads/ministras.png" id="img2">
    </div>
    <div class="content-box">
    <div class="form-box">

    <h2>Login</h2>

    <?php 
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            if(\Models\PainelModel::verificaLogin($nome,$senha)){
                $_SESSION['nome_admin'] = $nome;
                $_SESSION['senha_admin'] = $senha;
                $_SESSION['logado'] = true;

                $objUsuario = \Models\PainelModel::retornaUsuario($nome);
                foreach ($objUsuario as $key => $value) {
                    $_SESSION['nome_completo'] = $value['sNmUsuarioCompleto'];
                }

                header('Location:'.INCLUDE_PATH.'painel');
            }else{
                \Models\PainelModel::alert('erro' , 'Usuário não encontrado!');
            }
        }
    ?>
    <form method="post" class="form">


    
        <div class="input-box">
            <span>  Usuário</span>
            <input type="text" name="nome" placeholder="Nome...">
        </div>
        <div class="input-box">
            <span>  Senha</span>
            <input type="password" name="senha" placeholder="Senha...">
        </div>
        <div  class="remember">
            <label>
                <input type="checkbox" value=""> Lembrar me
            </label>
            <a href="#">Esqueceu a Senha?</a>
        </div>
        <div class="input-box">
        <input type="submit" value="Entrar!" name="acao">
        </div>
        <div class="input-box">
            <p>Não Tem Uma Conta?<a href="#">Inscrever-se?</a></p>
        </div>

    </form>