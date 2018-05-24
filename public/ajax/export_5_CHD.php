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

$fileName = "facturacion_" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}


$fechaInicioCHD5                =OWASP::RequestString('fechaInicialCHD5');
$fechaFinalCHD5                 =OWASP::RequestString('fechaFinalCHD5');
$local5                         =OWASP::RequestInt('local5');    
$plantaCHD                      =OWASP::RequestString('planta5');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>
        <th class="gray">NRO</th>
        <th class="gray">ID</th>
        <th class="gray">REGION</th>
        <th class="gray">LOCALIDAD</th>
        <th class="gray">EMBARCACION / CAMARA</th>
        <th class="gray">MATRICULA / PLACA</th>
        <th class="gray">PESO CHD (t) </th>
        <th class="gray">ESPECIE</th>
        <th class="gray">TIPO DE EIP</th>
        <th class="gray">PESO DESCARTES PROPIOS PROCESADOS (t)</th>
        <th class="gray">PESO DESCARTES PROPIOS NO PROCESADOS (t)</th>
        <th class="gray">PESO RESIDUOS PROPIOS PROCESADOS (t)</th>
        <th class="gray">PESO RESIDUOS PROPIOS NO PROCESADOS (t)</th>
        <th class="gray">PESO DESCARTES RECIBIDOS DE TERCEROS PROCESADOS (t)</th>
        <th class="gray">PESO RESIDUOS RECIBIDOS DE TERCEROS PROCESADOS (t)</th>
        <th class="gray">DESTINO / PROCEDENCIA</th>
        <th class="gray">NUMERO DE ACTA DE CHD</th>
        <th class="gray">NUMERO DE ACTA DE DESCARTES Y RESIDUOS</th>
        <th class="gray">FECHA</th>
        <th class="gray">HORA INICIO</th>
        <th class="gray">HORA TERMINO</th>
        <th class="gray">OBSERVACIONES</th>
    </tr>
    <?php 
    $count=0;
    $list=CrmChd::getListxReporte4($fechaInicioCHD5,$fechaFinalCHD5,$local5,$plantaCHD);
    foreach ($list as $oItem){
        $count++;
        $valor='';
        if($oItem->tipoCHD == 2){
            $oEspecie = new CmsParameterLang();
            $oTipoUnidad = new CmsParameterLang();   
            $date1 = new DateTime();
            $oItemDescartesResiduos = CrmDescartesResiduos::getItemCHD($oItem->chdID);
            $date1 = new DateTime($oItemDescartesResiduos->fechaIngreso);
            $plantaDR = CrmPlantaChd::getItem($oItemDescartesResiduos->plantaID);
            $oItemDR = CrmDatosDR::getItemCHD($oItem->chdID);

            if($oItemDescartesResiduos->tipoUnidadTransporte != 0){
                $oTipoUnidad= CmsParameterLang::getItem($oItemDescartesResiduos->tipoUnidadTransporte, 1);
            }else{
                $oTipoUnidad->parameterName = '-';
            }
            if($oItemDescartesResiduos->especie1 != 0){
                $oEspecie= CmsParameterLang::getItem($oItemDescartesResiduos->especie1, 1);
            }else{
                $oEspecie->parameterName = '-';
            }

            ?>
            <tr>
                <td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
                <td class="<?php echo $valor; ?>">-</td>
                <?php if($plantaDR != NULL){ ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($plantaDR->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($plantaDR->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <?php }else{ ?>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <?php } ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>">3</td>
                <?php if($oItemDescartesResiduos->tipoTM == '157'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
                <?php if($oItemDescartesResiduos->tipoTM == '158'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
                <?php if($oItemDescartesResiduos->tipoTM == '160'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
                <?php if($oItemDescartesResiduos->tipoTM == '161'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
                <?php if($oItemDescartesResiduos->tipoTM == '159'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
                <?php if($oItemDescartesResiduos->tipoTM == '162'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->destinoProcedencia, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->horaIngreso, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->horaTermino, ENT_QUOTES, "UTF-8"); ?> </td>
                <?php if($oItemDR != NULL){ ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
                <?php }else{ ?>
                <td class="<?php echo $valor; ?>">-</td>
                <?php } ?>
            </tr>
            <?php }else{ 
             $oEspecie = new CmsParameterLang();
             $oTipoUnidad = new CmsParameterLang();   
             $oTipoEIP = new CmsParameterLang();
             $date1 = new DateTime();
             $oItemMateriaPrima = CrmMateriaPrima::getItemCHD($oItem->chdID);
             $date1 = new DateTime($oItemMateriaPrima->fechaIngreso);
             $plantaMP = CrmPlantaChd::getItem($oItemMateriaPrima->plantaID);
             if($oItemMateriaPrima->tipoUnidad != 0){
                $oTipoUnidad= CmsParameterLang::getItem($oItemMateriaPrima->tipoUnidad, 1);
            }else{
                $oTipoUnidad->parameterName = '-';
            }
            if($oItemMateriaPrima->especie1 != 0){
                $oEspecie= CmsParameterLang::getItem($oItemMateriaPrima->especie1, 1);
            }else{
                $oEspecie->parameterName = '-';
            }
            $oItemMP = CrmDatosMP::getItemCHD($oItem->chdID);
            ?>
            <tr>
                <td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
                <td class="<?php echo $valor; ?>">-</td>
                <?php if($plantaMP != NULL){ ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($plantaMP->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($plantaMP->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <?php }else{ ?>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <?php } ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->placaUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->tmMateriaPrima, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>">3</td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->destinoProcedencia, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroActaMateria, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>">-</td>
                <td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->horaIngreso, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->horaTermino, ENT_QUOTES, "UTF-8"); ?> </td>
                <?php if($oItemMP != NULL){ ?>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMP->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
                <?php }else{ ?>
                <td class="<?php echo $valor; ?>">-</td>
                <?php } ?>
            </tr>
            <?php

        }
    } ?>



</table>
<?php exit();?>