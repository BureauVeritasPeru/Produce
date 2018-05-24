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
        border-left : 1px dashed #000;
        border-right : 1px solid #000;
        border-top : 1px dashed #000;
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
        border-top:3px solid #000;

    }
    .softdash{
        border-top:3px solid #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
    }
    .softfinal{
        border-top:1px dashed #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px dashed #000;
    }
    .softfinaldash{
        border-top:1px solid #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px solid #000;
    }

    .softdashfinaldash{
        border-top:3px solid #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px solid #000;
    }
    .pendientefinal{
        background-color: #c6e0b4;
        border-top:1px dashed #000;
        border-left:1px solid #000;
        border-right:1px solid #000;
        border-bottom:1px dashed #000;
    }
    .pendientefinaldash{
        background-color: #c6e0b4;
        border-top:1px solid #000;
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

$fileName = "consolidado_reporte_cala" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$fecha1                    =OWASP::RequestString('fecha1');
$horaInicio1               =OWASP::RequestString('horaInicio1');
$horaFinal1                =OWASP::RequestString('horaFinal1');
$local1                    =OWASP::RequestInt('local1');    


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
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="3" class="red">LATITUD</th>
        <th colspan="3" class="green">LONGITUD</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <th class="gray">ID</th>
        <th class="gray">Regi&oacute;n</th>
        <th class="gray">Puerto</th>
        <th class="gray">Planta</th>
        <th class="gray">Embarcaci&oacute;n </th>
        <th class="gray">Matr&iacute;cula </th>
        <th class="gray">Fecha de descarga </th>
        <th class="gray">Codigo de faena bitacora web</th>
        <th class="gray">N&uacute;mero Reporte de Cala</th>
        <th class="gray">N&#176; de Cala </th>
        <th class="gray">Fecha Cala</th>
        <th class="gray">Hora Cala</th>
        <th class="red">Grado Lat.</th>
        <th class="red">Min. Lat</th>
        <th class="red">Sec. Lat.</th>
        <th class="green">Grado Lon.</th>
        <th class="green">Min. Lon</th>
        <th class="green">Sec. Lon</th>
        <th class="gray">Toneladas Declaradas Cala </th>
        <th class="gray">% Juv. por Cala (dato tomado del Reporte de Cala)</th>
        <th class="gray">% Pesca Incidental (dato tomado del Reporte de Cala)</th>
        <th class="gray">Especie</th>
        <th class="gray">Observacion</th>
    </tr>
    <?php 
    $count=0;$conteoTotal=0;$conteoTotal2=0;
    $list=CrmReportes::getItemReporte1P($fecha1,$horaInicio1,$horaFinal1,$local1);
    $list2=CrmReportes::getItemReporte1($fecha1,$horaInicio1,$horaFinal1,$local1);
    foreach ($list as $oItem){
        $conteoTotal++;
        $date = new DateTime($oItem->fechaCala);
        $date2 = new DateTime($oItem->fechaDescarga);
        if($oItem->pendiente != 0){$valor = 'pendiente';}else{ $valor = 'soft';}
        if($oItem->correlativo  == '1' || $oItem->correlativo == ''){$count++; }
        if($oItem->correlativo  == '1' || $oItem->correlativo == '' && $count != 1){ $valor=$valor.'dash'; }
        if($list->getLength() == $conteoTotal  && $list2->getLength() == 0 ){
            if($oItem->correlativo  == '1' || $oItem->correlativo == ''){$valor .= 'finaldash';}else{$valor .='final';}
        }
        ?>
        <tr>
            <td class="<?php echo $valor; ?>">&nbsp;<?php echo number_pad($count,5); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->codigoFaenaWeb; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->numReporteCala; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->correlativo; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo date_format($date, 'd/m/y'); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->horaCala; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->latitud; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->minLat; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->segLat; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->longitud; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->minLong; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->segLong; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->tmDeclaradas; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->porcJuveniles; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->porcEspecie; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->especie, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->correlativo == ''){echo htmlentities('La E/P no presentó Reporte de Cala
                ', ENT_QUOTES, "UTF-8");}else{echo htmlentities($oItem->comentarios, ENT_QUOTES, "UTF-8");} ?> </td>
            </tr>
            <?php } ?>
            <?php 
            foreach ($list2 as $oItem2){
                $conteoTotal2++;
                $date = new DateTime($oItem2->fechaCala);
                $date2 = new DateTime($oItem2->fechaDescarga);
                if($oItem2->pendiente != 0){$valor = 'pendiente';}else{ $valor = 'soft';}
                if($oItem2->correlativo  == '1' || $oItem2->correlativo == ''){$count++; }
                if($oItem2->correlativo  == '1' || $oItem2->correlativo == '' && $count != 1){ $valor=$valor.'dash'; }
                if($list2->getLength() == $conteoTotal2  ){
                    if($oItem2->correlativo  == '1' || $oItem2->correlativo == ''){$valor .= 'finaldash';}else{$valor.='final';}
                }

                ?>
                <tr>
                    <td class="<?php echo $valor; ?>">&nbsp;<?php echo number_pad($count,5); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->codigoFaenaWeb; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->numReporteCala; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->correlativo; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo date_format($date, 'd/m/y'); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->horaCala; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->latitud; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->minLat; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->segLat; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->longitud; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->minLong; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->segLong; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->tmDeclaradas; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->porcJuveniles; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo $oItem2->porcEspecie; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem2->especie, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php if($oItem2->correlativo == ''){echo htmlentities('La E/P no presentó Reporte de Cala
                        ', ENT_QUOTES, "UTF-8");}else{echo htmlentities($oItem2->comentarios, ENT_QUOTES, "UTF-8");} ?> </td>
                    </tr>

                    <?php } ?>
                </table>
                <?php exit();?>