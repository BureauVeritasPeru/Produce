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

$fileName = "registro_descargas" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$fechaInicial4                      =OWASP::RequestString('fechaInicial4');
$fechaFinal4                        =OWASP::RequestString('fechaFinal4');
$local4                             =OWASP::RequestInt('local4');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>
        <th class="gray">Nro</th>
        <th class="gray">Puerto</th>
        <th class="gray">Regi&oacute;n</th>
        <th class="gray">Zona</th>
        <th class="gray">Planta</th>
        <th class="gray">Embarcaci&oacute;n </th>
        <th class="gray">Matr&iacute;cula </th>
        <th class="gray">Armador</th>
        <th class="gray">Tolva</th>
        <th class="gray">Nro. de Reporte de Pesaje</th>
        <th class="gray">Especie</th>
        <th class="gray">TM Autorizadas</th>
        <th class="gray">TM Descargadas</th>
        <th class="gray">TM Declarado</th>
        <th class="gray">Nro. de Acta de Inspecci&oacute;n</th>
        <th class="gray">Fecha Ingreso</th>
        <th class="gray">Hora de Inicio</th>
        <th class="gray">Fecha de T&eacute;rmino</th>
        <th class="gray">Hora T&eacute;rmino</th>
        <th class="gray">Empresa Supervisora</th>
    </tr>
    <?php 
    $count=0;$conteoTotal=0;
    $list=CrmReportes::getItemReporte4($fechaInicial4,$fechaFinal4,$local4);
    foreach ($list as $oItem){
        $conteoTotal++;
        $date = new DateTime($oItem->fechaDescarga);
        $dateI = new DateTime($oItem->fechaInicial);
        $dateF = new DateTime($oItem->fechaFinal);
        $valor ='softfinal';
    ?>
        <tr>
            <td class="<?php echo $valor; ?>">&nbsp;<?php echo $conteoTotal; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->zonaPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->armador, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->nroTolva; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->nroReportePesaje; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->especie; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->capacidadBodega; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->tmDescargado; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->pescaDeclarada; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->numActaInspeccion; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo date_format($dateI, 'd/m/y'); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->horaInicio; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo date_format($dateF, 'd/m/y'); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->horaTermino; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->empresaSupervisora, ENT_QUOTES, "UTF-8"); ?> </td>
        </tr>
    <?php } ?>
    </table>
    <?php exit();?>