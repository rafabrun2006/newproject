<?php
require_once 'controle/Usuario.php';
$controle = new ControleUsuario();
$usuarios = $controle->acaoUsuarios(@$_REQUEST['acao']);
?>
<div>
    <input type="text" name="" id="auto-complete">
    <a href="?url=usuarios/novo"><h4><i class="icon-plus"></i> Novo Usuário</h4></a>
    <fieldset>
        <table class="table table-bordered table-striped">
            <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Opções</th>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario->getId() ?></td>
                        <td><?php echo $usuario->getNome() ?></td>
                        <td><?php echo $usuario->getEmail() ?></td>
                        <td><?php echo $usuario->getCpf() ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn" href="index.php?url=usuarios/editar&acao=editar&id=<?php echo $usuario->getId() ?>"><i class="icon-edit"></i></a>
                                <a class="btn btn-danger" href="index.php?url=usuarios/usuarios&acao=excluir&id=<?php echo $usuario->getId() ?>"><i class="icon-trash icon-white"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>
</div>
