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

$fileName = "Generaracion_y_salida_de_residuos_y_descartes_" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}


$fechaInicioCHD2                =OWASP::RequestString('fechaInicioCHD2');
$fechaFinalCHD2                 =OWASP::RequestString('fechaFinalCHD2');
$local2                         =OWASP::RequestInt('local2');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>

        <th colspan="8" class="gray">DATOS DE PLANTA DE ORIGEN</th>
        <th colspan="8" class="gray">DESCARTES Y RESIDUOS</th>
        <th colspan="4" class="gray">DATOS DE LA PLANTA DE DESTINO</th>
    </tr>
    <tr>
        <th class="gray">NRO</th>
        <th class="gray">FECHA (REPORTE DE PESAJE)</th>
        <th class="gray">HORA (REPORTE DE PESAJE)</th>
        <th class="gray">N DE RP</th>
        <th class="gray">PLANTA PESQUERA </th>
        <th class="gray">CODIGO DE PLANTA </th>
        <th class="gray">REGION </th>
        <th class="gray">PROVINCIA</th>
        <th class="gray">TM DE NO APTO</th>
        <th class="gray">TM DE SELECCION </th>
        <th class="gray">TM DE RESIDUOS</th>
        <th class="gray">ESPECIE</th>
        <th class="gray">NRO DE GUIA</th>
        <th class="gray">TIPO DE VEHICULO</th>
        <th class="gray">PLACA</th>
        <th class="gray">NRO DE ACTA DE INSPECCION</th>
        <th class="gray">PLANTA PESQUERA DE DESTINO</th>
        <th class="gray">CODIGO DE PLANTA</th>
        <th class="gray">REGION </th>
        <th class="gray">PROVINCIA</th>
    </tr>
    <?php 
    $count=0;
    $list=CrmChd::getListxReporte1($fechaInicioCHD2,$fechaFinalCHD2,$local2);
    foreach ($list as $oItem){
        $count++;
        $oEspecie = new CmsParameterLang();
        $oTipoTransporte = new CmsParameterLang();
        $oItemDescartesResiduos = CrmDescartesResiduos::getItemCHD($oItem->chdID);
        $oItemDR = CrmDatosDR::getItemCHD($oItem->chdID);
        if(isset($oItemDR)){
            $oItemPlantaO = CrmPlantaChd::getItem($oItemDR->plantaOID);
            $oItemPlantaD = CrmPlantaChd::getItem($oItemDR->plantaDID);
        }
        $date = new DateTime($oItemDescartesResiduos->fechaIngreso);
        for ($i = 1; $i < 5; $i++) {
            if($oItemDescartesResiduos->{'especie'.$i} != '0' ){
                if($oItemDescartesResiduos->{'especie'.$i} != 0){
                    $oEspecie= CmsParameterLang::getItem($oItemDescartesResiduos->{'especie'.$i}, 1);
                }else{
                    $oEspecie->parameterName = '-';
                }
                if($oItemDescartesResiduos->tipoUnidadTransporte != 0){
                    $oTipoTransporte= CmsParameterLang::getItem($oItemDescartesResiduos->tipoUnidadTransporte, 1);
                }else{
                    $oTipoTransporte->parameterName = '-';
                }
                ?>
                <tr>
                    <td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo date_format($date, 'd/m/y'); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->horaIngreso, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->{'rp'.$i}, ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php if(isset($oItemPlantaO)){ ?>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaO->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaO->codigoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaO->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaO->provinciaPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php }else{ ?>
                    <td class="<?php echo $valor; ?>">-</td>
                    <td class="<?php echo $valor; ?>">-</td>
                    <td class="<?php echo $valor; ?>">-</td>
                    <td class="<?php echo $valor; ?>">-</td>
                    <?php } ?>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tmNoApto, ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php if($oItemDescartesResiduos->tipoTM == '157' || $oItemDescartesResiduos->tipoTM == '158' || $oItemDescartesResiduos->tipoTM == '159' ){ ?>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->{'tm'.$i}, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities('', ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php }else{ ?>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities('', ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->{'tm'.$i}, ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php } ?>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->{'guia'.$i}, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoTransporte->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php if(isset($oItemPlantaD)){ ?>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaD->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaD->codigoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaD->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaD->provinciaPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <?php }else{ ?>
                    <td class="<?php echo $valor; ?>">-</td>
                    <td class="<?php echo $valor; ?>">-</td>
                    <td class="<?php echo $valor; ?>">-</td>
                    <td class="<?php echo $valor; ?>">-</td>
                    <?php } ?>
                </tr>
                <?php } ?>

                <?php } }?>        

            </table>
            <?php exit();?>