<div id="painelsaldo">
<?php
require_once 'controle/Saldo.php';
$Saldo = ControleSaldo::saldo();
?>
<table>
    <tr>
        <th>Total Receita</th>
        <th>Total Despesa</th>
        <th>Saldo em Caixa(+)(-)</th>
    </tr>
    <tr>
        <td bgcolor="LightGreen">R&#36; <?php echo round($Saldo->receita, 2); ?></td>
        <td bgcolor="Salmon">R&#36; <?php echo round($Saldo->despesa, 2); ?></td>
        <td>R&#36; <?php echo round($Saldo->saldo, 2); ?></td>
    </tr>
</table>
</div>
