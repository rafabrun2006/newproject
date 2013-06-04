<?php
/**
 * Description of Acesso
 *
 * author Bruno
 */
class ModeloAcesso {
    
    var $usuario;
    var $senha;
    
    function getUsuario(){
        return $_SESSION['id'];
    }
    function setUsuario($usuario){
        $_SESSION['id'] = $usuario;
    }
    function setCodigo($codigo){
        $_SESSION['cod'] = $codigo;
    }
    function getCodigo(){
        return $_SESSION['cod'];
    }
    
    function acessar($usuario, $senha){
    
        $query = "SELECT nome_usuario, senha, cod FROM usuarios WHERE nome_usuario = '".$usuario."' and senha= '".$senha."'";
        if($result = mysql_query($query)){
        
	        while($res = mysql_fetch_array($result)){
	            $acesso = new ModeloAcesso();
	            $acesso->setUsuario($res['nome_usuario']);
	            $acesso->setCodigo($res['cod']);
	        }
            return $acesso;
        }else{
        	return false;
        }
    }
   
    public function cadastro($usuario, $senha){
        $query = "INSERT INTO usuarios (nome_usuario, senha) VALUES ('$usuario', '$senha')";
        if($result = mysql_query($query)==true){
            return true;
        }else{
            return false;
        }
    }
    function sair(){
        session_destroy();
        $_SESSION['id'] = null;
    }
}

?>
