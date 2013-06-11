<div id="menuprincipal">
    <a href="index.php?url=inicio"><i class="icon-home"></i> Principal</a>
    <?php if (ControleAcesso::getUsuario()->tipo_usuario == 1): ?>
        <a href="index.php?url=receitas/receitas"><i class="icon-check"></i> Receitas</a>
    <?php endif; ?>
    <a href="index.php?url=despesas/despesas"><i class="icon-check"></i> Despesas</a>
    <a href="index.php?url=fornecedores/fornecedores"><i class="icon-circle-arrow-up"></i> Fornecedores</a>
    <?php if (ControleAcesso::getUsuario()->tipo_usuario == 1): ?>
        <a href="index.php?url=usuarios/usuarios"><i class="icon-user"></i> Usuários</a>
        <a href="index.php?url=relatorios/relatorios"><i class="icon-book"></i> Relatórios</a>
    <?php endif; ?>
</div>