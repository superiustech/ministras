<?php 

namespace Models;

Class PainelModel{
	private static $pdo;

    public static function conectar() {
		if (self::$pdo == null) {
			try {
				self::$pdo = new \PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				echo '<h3>Erro ao conectar</h3>';
			}
		}
		return self::$pdo;
	}
	
    public static function alert($tipo,$mensagem){
		if($tipo == 'sucesso'){
			echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
		}else if($tipo == 'erro'){
			echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
		}else if($tipo == 'atencao')
			echo '<div class="box-alert atencao"><i class="fa fa-warning"></i> '.$mensagem.'</div>';
	}
	public static function cadastrarCliente($nome , $apelido,$senha){
		$sql = PainelModel::conectar()->prepare("INSERT INTO USUARIO (sNmUsuarioCompleto,sNmUsuario, sDsSenha) VALUES (?,?,?)");
		if($sql->execute(array($nome, $apelido,$senha)))
			return true;
		else
			return false;
	}
	public static function verificaUsuario($apelido){
		$sql = PainelModel::conectar()->prepare("SELECT sNmUsuario FROM USUARIO WHERE sNmUsuario = ?");
		$sql->execute(array($apelido));
		$retorno = $sql->fetch();
		if($retorno && $retorno['sNmUsuario'] == $apelido)
			return true;
		else
			return false;
	}
	public static function verificaLogin($apelido, $senha){
		$sql = PainelModel::conectar()->prepare("SELECT sNmUsuario FROM USUARIO WHERE sNmUsuario = ? AND sDsSenha = ?");
		$sql->execute(array($apelido,$senha));
		$retorno = $sql->fetch();
		if($retorno && $retorno['sNmUsuario'] == $apelido && $retorno['sDsSenha'] = $senha)
			return true;
		else
			return false;
	}
	public static function retornaUsuario($apelido){
		$sql = PainelModel::conectar()->prepare("SELECT * FROM USUARIO WHERE sNmUsuario = ?");
		$sql->execute(array($apelido));
		return $sql->fetchAll();
	}


	
	
}

?>