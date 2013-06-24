<?php
require_once 'controle/Usuario.php';
$controle = new ControleUsuario();
$usuarios = $controle->acaoUsuarios(@$_REQUEST['acao']);
?>
<form class="form form-inline" method="post">
    Filtrar por nome: <input autocomplete="off" type="text" name="nome" placeholder="Insira um nome ou parte dele" class="input input-xxlarge" title="Digite o nome ou parte dele e os dados serão auto-completados" data-provide="typehead" id="auto-complete">
    <button class="btn btn-primary">Buscar</button>
</form>

<?php if ($_POST): ?>
    <div>

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
                    <?php
                    foreach ($usuarios as $usuario):
                        ?>
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
<?php endif; ?>
<?php
@$_REQUEST = null;
$auto = $controle->acaoUsuarios(@$_REQUEST['acao']);
$stringAuto = null;
foreach ($auto as $usuario) {
    $stringAuto .= "'" . $usuario->getNome() . "',";
}
?>
<script type="text/javascript">
    $("#auto-complete").typeahead({
        source: [<?php echo $stringAuto ?>]
    });
</script>
