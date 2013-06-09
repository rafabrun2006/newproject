<div id="painelsaldo">
    <?php
    require_once 'controle/Saldo.php';
    $Saldo = ControleSaldo::saldo();
    ?>
    <table class="table table-bordered">
        <tr>
            <td bgcolor="LightGreen"><strong>Receita:</strong> R&#36; <?php echo number_format($Saldo->receita, 2, ',', '.'); ?></td>
            <td bgcolor="Salmon"><strong>Despesa:</strong> R&#36; <?php echo number_format($Saldo->despesa, 2, ',', '.'); ?></td>
            <td><strong>Saldo: </strong>R&#36; <?php echo number_format($Saldo->saldo, 2, ',', '.'); ?></td>
        </tr>
    </table>
</div>
