<?php 
	//error_reporting(~E_NOTICE, ~E_STRICT, ~E_ALL);
	ini_set('display_errors', false);
	
    session_start();
    require_once 'controle/Acesso.php'; 
    require_once 'controle/URL.php';
    require_once 'controle/Mensagem.php';
    ControleAcesso::acessar();
?>
<html>
    <head>
        <title>Financeiro</title>
        <link rel="stylesheet" type="text/css" href="visao/css/css.css">
    </head>
    <body>
        <div align='center'>
            <p id='titulo'>Financeiro</p>
            <?php require_once 'visao/cabecalho.php' ?>
        </div>
        <?php if(isset(ControleAcesso::getUser()->usuario)){ ?>
        <div>
            <?php require_once 'visao/menu.php'; ?>
        </div>
        <?php } ?>
       	<div id="esquerdo">
            <?php $controleUrl = new controleURL(); ?>
        </div>
        <?php isset(ControleAcesso::getUser()->usuario) ? require_once 'visao/saldo.php':''; ?>
    </body>
</html>