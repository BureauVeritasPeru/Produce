<style>

    tr{
        text-align: center;
        font-size: 10px;
    }
    .bord{
        border : 3px solid #000;

    }
    .gray{
        background-color: #C0C0C0;
        border : 3px solid #000;
    }

    .red{
        background-color: #E6B8B7;
        border : 3px solid #000;
    }

    .green{
        background-color: #C4D79B;
        border : 3px solid #000;
    }
    .soft{
        border-left : 1px solid #000;
        border-right : 1px solid #000;
        border-top : 1px solid #000;
    }
    .pendiente{
        background-color: #c6e0b4;
        border-left : 1px solid #000;
        border-right : 1px solid #000;
        border-top : 1px solid #000;
    }

    .pendientedash{
        background-color: #c6e0b4;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-top:3px dashed #000;

    }
    .softdash{
        border-top:3px dashed #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
    }
    .softfinal{
        border-top:1px solid #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px solid #000;
    }
    .softfinaldash{
        border-top:1px dashed #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px solid #000;
    }

    .pendientefinal{
        background-color: #c6e0b4;
        border-top:1px solid #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px solid #000;
    }
    .pendientefinaldash{
        background-color: #c6e0b4;
        border-top:1px dashed #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px solid #000;
    }

</style>

<?php 
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");

// file name for download

$fileName = "consolidado_reporte_muestreo_" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$fecha3                    =OWASP::RequestString('fecha3');
$horaInicio3               =OWASP::RequestString('horaInicio3');
$horaFinal3                =OWASP::RequestString('horaFinal3');
$local3                    =OWASP::RequestInt('local3');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
        <th class="gray" colspan="31">Composici&oacute;n por tallas</th>
        <th class="gray">&nbsp;</th>
        <th class="gray">&nbsp;</th>
    </tr>
    <tr>
        <th class="gray">Regi&oacute;n</th>
        <th class="gray">Puerto</th>
        <th class="gray">Planta</th>
        <th class="gray">Fecha Descarga</th>
        <th class="gray">Especie</th>
        <th class="gray">Nro. Parte de Muestreo</th>
        <th class="gray">Embarcaci&oacute;n Pesquera </th>
        <th class="gray">Matr&iacute;cula </th>
        <th class="gray" style="width:100px;">5.0</th>
        <th class="gray" style="width:100px;">5.5</th>
        <th class="gray" style="width:100px;">6.0</th>
        <th class="gray" style="width:100px;">6.5</th>
        <th class="gray" style="width:100px;">7.0</th>
        <th class="gray" style="width:100px;">7.5</th>
        <th class="gray" style="width:100px;">8.0</th>
        <th class="gray" style="width:100px;">8.5</th>
        <th class="gray" style="width:100px;">9.0</th>
        <th class="gray" style="width:100px;">9.5</th>
        <th class="gray" style="width:100px;">10.0</th>
        <th class="gray" style="width:100px;">10.5</th>
        <th class="gray" style="width:100px;">11.0</th>
        <th class="gray" style="width:100px;">11.5</th>
        <th class="gray" style="width:100px;">12.0</th>
        <th class="gray" style="width:100px;">12.5</th>
        <th class="gray" style="width:100px;">13.0</th>
        <th class="gray" style="width:100px;">13.5</th>
        <th class="gray" style="width:100px;">14.0</th>
        <th class="gray" style="width:100px;">14.5</th>
        <th class="gray" style="width:100px;">15.0</th>
        <th class="gray" style="width:100px;">15.5</th>
        <th class="gray" style="width:100px;">16.0</th>
        <th class="gray" style="width:100px;">16.5</th>
        <th class="gray" style="width:100px;">17.0</th>
        <th class="gray" style="width:100px;">17.5</th>
        <th class="gray" style="width:100px;">18.0</th>
        <th class="gray" style="width:100px;">18.5</th>
        <th class="gray" style="width:100px;">19.0</th>
        <th class="gray" style="width:100px;">19.5</th>
        <th class="gray" style="width:100px;">20.0</th>
        <th class="gray">Moda</th>
        <th class="gray">Observaciones</th>
    </tr>
    <?php 
    $list=CrmReportes::getItemReporte3P($fecha3,$horaInicio3,$horaFinal3,$local3);
    foreach ($list as $oItem){
        $dateI = new DateTime($oItem->fechaInicial);
        $valor ='softfinal';
        ?>
        <tr>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo date_format($dateI, 'd/m/y'); ?> </td>
            <td class="<?php echo $valor; ?>">&nbsp;<?php echo $oItem->especie; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->nroParteMuestreo; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia7_5 != '') ? $oItem->frecuencia7_5 : '0';  ?></td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia8 != '') ? $oItem->frecuencia8 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia8_5 != '') ? $oItem->frecuencia8_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia9 != '') ? $oItem->frecuencia9 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia9_5 != '') ? $oItem->frecuencia9_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia10 != '') ? $oItem->frecuencia10 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia10_5 != '') ? $oItem->frecuencia10_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia11 != '') ? $oItem->frecuencia11 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia11_5 != '') ? $oItem->frecuencia11_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia12 != '') ? $oItem->frecuencia12 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia12_5 != '') ? $oItem->frecuencia12_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia13 != '') ? $oItem->frecuencia13 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia13_5 != '') ? $oItem->frecuencia13_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia14 != '') ? $oItem->frecuencia14 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia14_5 != '') ? $oItem->frecuencia14_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia15 != '') ? $oItem->frecuencia15 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia15_5 != '') ? $oItem->frecuencia15_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia16 != '') ? $oItem->frecuencia16 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia16_5 != '') ? $oItem->frecuencia16_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia17 != '') ? $oItem->frecuencia17 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia17_5 != '') ? $oItem->frecuencia17_5 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia18 != '') ? $oItem->frecuencia18 : '0';  ?> </td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>">0</td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->frecuencia; ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->nroParteMuestreo != ''){ echo $oItem->obsInusuales; }else{ echo 'E/P no muestreada'; } ?> </td>
        </tr>
        <?php } ?>

        
        <?php 
        $list=CrmReportes::getItemReporte3($fecha3,$horaInicio3,$horaFinal3,$local3);
        foreach ($list as $oItem){
            $dateI = new DateTime($oItem->fechaInicial);
            $valor ='softfinal';
            ?>
            <tr>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo date_format($dateI, 'd/m/y'); ?> </td>
                <td class="<?php echo $valor; ?>">&nbsp;<?php echo $oItem->especie; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem->nroParteMuestreo; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia7_5 != '') ? $oItem->frecuencia7_5 : '0';  ?></td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia8 != '') ? $oItem->frecuencia8 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia8_5 != '') ? $oItem->frecuencia8_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia9 != '') ? $oItem->frecuencia9 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia9_5 != '') ? $oItem->frecuencia9_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia10 != '') ? $oItem->frecuencia10 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia10_5 != '') ? $oItem->frecuencia10_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia11 != '') ? $oItem->frecuencia11 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia11_5 != '') ? $oItem->frecuencia11_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia12 != '') ? $oItem->frecuencia12 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia12_5 != '') ? $oItem->frecuencia12_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia13 != '') ? $oItem->frecuencia13 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia13_5 != '') ? $oItem->frecuencia13_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia14 != '') ? $oItem->frecuencia14 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia14_5 != '') ? $oItem->frecuencia14_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia15 != '') ? $oItem->frecuencia15 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia15_5 != '') ? $oItem->frecuencia15_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia16 != '') ? $oItem->frecuencia16 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia16_5 != '') ? $oItem->frecuencia16_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia17 != '') ? $oItem->frecuencia17 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia17_5 != '') ? $oItem->frecuencia17_5 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo ($oItem->frecuencia18 != '') ? $oItem->frecuencia18 : '0';  ?> </td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>">0</td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem->frecuencia; ?> </td>
                <td class="<?php echo $valor; ?>"><?php if($oItem->nroParteMuestreo != ''){ echo $oItem->obsInusuales; }else{ echo 'E/P no muestreada'; } ?> </td>
            </tr>
            <?php } ?>
        </table>
        <?php exit();?>