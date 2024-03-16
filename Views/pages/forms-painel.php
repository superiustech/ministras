<?php 

if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_cliente'){

    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $senha = $_POST['senha'];

    if (\Models\PainelModel::cadastrarCliente($nome ,$apelido,$senha)){
        echo 'sdaaaaaaaaaaa';
        $data['sucesso'] = true;
        $data['mensagens'] = " Cliente deletado com sucesso!";
    }else{
        $data['sucesso'] = false;
        $data['mensagens'] = " Ocorreram erros no processamento!";
    }

   }

?>
