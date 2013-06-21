<div id="menuprincipal">
    <a href="index.php?url=inicio"><i class="icon-home"></i> Principal</a>
    <?php if (ControleAcesso::getUsuario()->tipo_usuario == 1): ?>
        <a href="index.php?url=receitas/inicio"><i class="icon-check"></i> Receitas</a>
    <?php endif; ?>
    <a href="index.php?url=despesas/inicio"><i class="icon-check"></i> Despesas</a>
    <a href="index.php?url=fornecedores/inicio"><i class="icon-circle-arrow-up"></i> Fornecedores</a>
    <?php if (ControleAcesso::getUsuario()->tipo_usuario == 1): ?>
        <a href="index.php?url=usuarios/inicio"><i class="icon-user"></i> Usuários</a>
        <a href="index.php?url=relatorios/relatorios"><i class="icon-book"></i> Relatórios</a>
    <?php endif; ?>
</div>