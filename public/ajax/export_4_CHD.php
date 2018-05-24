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

$fileName = "ro_" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}


$fechaInicioCHD4                =OWASP::RequestString('fechaInicioCHD4');
$fechaFinalCHD4                 =OWASP::RequestString('fechaFinalCHD4');
$local4                         =OWASP::RequestInt('local4');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>
        <th class="gray">NRO</th>
        <th class="gray">LOCALIDAD</th>
        <th class="gray">UNIDAD INSPECCI&Oacute;N</th>
        <th class="gray">Nro ACTA INSPECCI&Oacute;N</th>
        <th class="gray">FECHA </th>
    </tr>
    <?php 
    $count=0;
    $list=CrmChd::getListxReporte3($fechaInicioCHD4,$fechaFinalCHD4,$local4);
    foreach ($list as $oItem){
        $count++;
        if($oItem->tipoCHD == 2){
            $date1 = new DateTime();
            $oTipoUnidad = new CmsParameterLang(); 
            $oItemDescartesResiduos = CrmDescartesResiduos::getItemCHD($oItem->chdID);
            $date1 = new DateTime($oItemDescartesResiduos->fechaIngreso);
            if($oItemDescartesResiduos->tipoUnidadTransporte != 0){
                $oTipoUnidad= CmsParameterLang::getItem($oItemDescartesResiduos->tipoUnidadTransporte, 1);
            }else{
                $oTipoUnidad->parameterName = '-';
            }
            ?>
            <tr>
                <td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
            </tr>
            <?php }else{ 
                $date1 = new DateTime();
                $oTipoUnidad = new CmsParameterLang(); 
                $oItemMateriaPrima = CrmMateriaPrima::getItemCHD($oItem->chdID);
                $date1 = new DateTime($oItemMateriaPrima->fechaIngreso);
                if($oItemMateriaPrima->tipoUnidad != 0){
                    $oTipoUnidad= CmsParameterLang::getItem($oItemMateriaPrima->tipoUnidad, 1);
                }else{
                    $oTipoUnidad->parameterName = '-';
                }
                ?>
                <tr>
                    <td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroActaMateria, ENT_QUOTES, "UTF-8"); ?> </td>
                    <td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
                </tr>
                <?php

            }
        } ?>



    </table>
    <?php exit();?>