<?php
//error_reporting(~E_STRICT);
ini_set('display_errors', true);
date_default_timezone_set('America/Sao_Paulo');

session_start();
require_once 'controle/Acesso.php';
require_once 'controle/Conteudo.php';
require_once 'controle/Mensagem.php';
ControleAcesso::acessar();
$conteudo = new ControleConteudo();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Financeiro</title>
        <link rel="stylesheet" type="text/css" href="visao/css/css.css">
        <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="public/assets/css/datepicker.css">

        <script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="public/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="public/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/assets/js/masks.js"></script>
        <script type="text/javascript" src="public/assets/js/jquery.maskMoney.js"></script>
        <script type="text/javascript" src="public/assets/js/datepicker/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="public/assets/js/utils.js"></script>
    </head>


    <body>
        <div id="titulo">
            <h2>Financeiro</h2>
            <?php require_once 'visao/cabecalho.php' ?>
        </div>
        <?php if (isset(ControleAcesso::getUsuario()->id)) { ?>
            <div>
                <?php require_once 'visao/menu.php'; ?>
            </div>
        <?php } ?>
       	<div id="esquerdo">
            <?php echo ControleMensagem::getMensagem() ?>
            <?php $conteudo->conteudo() ?>
        </div>
        <?php isset(ControleAcesso::getUsuario()->id) ? require_once 'visao/saldo.php' : ''; ?>
    </body>
</html>