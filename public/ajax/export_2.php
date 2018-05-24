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

$fileName = "consolidado_descarga_muestreo_biometrico" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$fecha2                    =OWASP::RequestString('fecha2');
$horaInicio2               =OWASP::RequestString('horaInicio2');
$horaFinal2                =OWASP::RequestString('horaFinal2');
$local2                    =OWASP::RequestInt('local2');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="3" class="gray">Anchoveta</th>
        <th colspan="3" class="gray">Pesca Incidental</th>
    </tr>
    <tr>
        <th class="gray">ID</th>
        <th class="gray">Regi&oacute;n</th>
        <th class="gray">Puerto</th>
        <th class="gray">Planta</th>
        <th class="gray">Embarcaci&oacute;n </th>
        <th class="gray">Matr&iacute;cula </th>
        <th class="gray">Descarga (Tm) </th>
        <th class="gray">Fecha</th>
        <th class="gray">% Juv. por Cala (Dato del muestreo)</th>
        <th class="gray">Moda</th>
        <th class="gray">Estad&iacute;o Sexual</th>
        <th class="gray">% Pesca Incidental (Dato del Muestreo)</th>
        <th class="gray">Especie Pesca Incidental</th>
        <th class="gray">Observaciones</th>
    </tr>
    <?php 
    $count=0;$conteoTotal=0;$conteoTotal2=0;
    $list=CrmReportes::getItemReporte2P($fecha2,$horaInicio2,$horaFinal2,$local2);
    $list2=CrmReportes::getItemReporte2($fecha2,$horaInicio2,$horaFinal2,$local2);
    $vowels = array(",,", ",,,", ",,,,");
    $vowels2 = array(",0,0", ",0,0,0", ",0,0,0,0");
    foreach ($list as $oItem){
        $conteoTotal++;
        $date = new DateTime($oItem->fechaDescarga);
        if($oItem->pendiente != 0){$valor = 'pendiente';}else{ $valor = 'soft';}
        if($list->getLength() == $conteoTotal  && $list2->getLength() == 0 ){
            $valor .='final';
        }
        ?>
        <tr>
            <td class="<?php echo $valor; ?>">&nbsp;<?php echo number_pad($conteoTotal,5); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->descargaTM; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo date_format($date, 'd/m/y'); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->porcJuveniles; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->frecuencia; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->estadio; ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->porcEspecie == '0,0,0,0,0'){echo '-';}else{echo str_replace($vowels2, "", $oItem->porcEspecie);} ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->especie == ',,,,'){echo '-';}else{echo htmlentities(str_replace($vowels, "",$oItem->especie), ENT_QUOTES, "UTF-8");} ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
        </tr>
        <?php } ?>
        <?php 
        foreach ($list2 as $oItem2){
            $conteoTotal2++;
            $conteoTotal++;
            $date = new DateTime($oItem2->fechaDescarga);
            if($oItem2->pendiente != 0){$valor = 'pendiente';}else{ $valor = 'soft';}
            if($list2->getLength() == $conteoTotal2){
                $valor .='final';
            }
            ?>
            <tr>
                <td class="<?php echo $valor; ?>">&nbsp;<?php echo number_pad($conteoTotal,5); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem2->descargaTM; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo date_format($date, 'd/m/y'); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem2->porcJuveniles; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem2->frecuencia; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem2->estadio; ?> </td>
                <td class="<?php echo $valor; ?>"><?php if($oItem2->porcEspecie == '0,0,0,0,0'){echo '-';}else{echo str_replace($vowels2, "", $oItem2->porcEspecie);} ?> </td>
                <td class="<?php echo $valor; ?>"><?php if($oItem2->especie == ',,,,'){echo '-';}else{echo htmlentities(str_replace($vowels, "",$oItem2->especie), ENT_QUOTES, "UTF-8");} ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
            </tr>

            <?php } ?>
        </table>
        <?php exit();?>