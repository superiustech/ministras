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
	public static function editarUsuario($apelido,$senha){
		$sql = PainelModel::conectar()->prepare("UPDATE USUARIO SET sDsSenha = ? where sNmUsuario = ?");
		if($sql->execute(array($senha,$apelido)))
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
	public static function mostrarVisitas(){
		$sql = PainelModel::conectar()->prepare("SELECT * FROM USUARIOS_VISITAS");
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function mostrarVisitasHoje(){
		$dataAgora = date('Y-m-d');
		$dataInicio = $dataAgora . ' 00:00:00';
		$dataFim = $dataAgora . ' 23:59:59';
	
		$sql = PainelModel::conectar()->prepare("SELECT * FROM USUARIOS_VISITAS WHERE tDtLogin BETWEEN ? AND ?");
		$sql->execute(array($dataInicio, $dataFim));
		return $sql->fetchAll();
	}
	
	public static function listarUsuariosOnline(){
		$sql = PainelModel::conectar()->prepare("SELECT * FROM USUARIOS_ONLINE");
		$sql->execute();
		return $sql->fetchAll();
	}
	
	public static function updateUsuarioOnline(){
        if(isset($_SESSION['online'])){
            $token = $_SESSION['online'];
            $verificarToken = PainelModel::conectar()->prepare("SELECT nCdUsuario FROM USUARIOS_ONLINE WHERE sDsToken = ?");
            $verificarToken->execute(array($_SESSION['online']));

            if($verificarToken->rowCount() == 1){
                $sql = PainelModel::conectar()->prepare("UPDATE USUARIOS_ONLINE SET tDtUltimaAcao = ? WHERE sDsToken = ?");
                $sql->execute(array(HORARIO_ATUAL, $token));
            }else{
                $token = $_SESSION['online'];
                $sql = PainelModel::conectar()->prepare("INSERT INTO USUARIOS_ONLINE VALUES (null,?,?,?)");
                $sql->execute(array(IP_ADDR,$token,HORARIO_ATUAL));
            }   
        }
        else{
            $_SESSION['online'] = uniqid();
            $token = $_SESSION['online'];
            $sql = PainelModel::conectar()->prepare("INSERT INTO USUARIOS_ONLINE VALUES (null,?,?,?)");
            $sql->execute(array(IP_ADDR,$token,HORARIO_ATUAL));
        }
    }

        public static function contadorVisitas(){
            if(!isset($_COOKIE['visita'])){
                setcookie('visita',true,time() + (60*60*24*7));
                $sql = PainelModel::conectar()->prepare("INSERT INTO USUARIOS_VISITAS VALUES (null, ?,?)");
                $sql->execute(array(IP_ADDR, HORARIO_ATUAL));
            }
        }
}

?>