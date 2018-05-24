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

$fileName = "consolidado_reporte_chi_zona_chimbote" . date('Ymd') . ".xls";
function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$fecha9                    =OWASP::RequestString('fecha9');
$horaInicio9               =OWASP::RequestString('horaInicio9');
$horaFinal9                =OWASP::RequestString('horaFinal9');
$local9                    =OWASP::RequestInt('local9');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
    <tr>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
        <th class="green">&nbsp;</th>
    </tr>
    <tr>
        <th class="green">PPPP</th>
        <th class="green">EP</th>
        <th class="green">MATRICULA</th>
        <th class="green">PESO</th>
        <th class="green">MODA</th>
        <th class="green">% JUV.</th>
        <th class="green">% PESCA INCIDENTAL</th>
        <th class="green">ESPECIE</th>
        <th class="green">ZONA DE PESCA</th>
    </tr>
    <?php 
    $list=CrmReportes::getItemReporte9P($fecha9,$horaInicio9,$horaFinal9,$local9);
    $vowels = array(",,", ",,,", ",,,,");
    $vowels2 = array(",0,0", ",0,0,0", ",0,0,0,0");
    foreach ($list as $oItem){
        $valor ='softfinal';
        ?>
        <tr>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->tmDescargado, ENT_QUOTES, "UTF-8"); ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->frecuencia; ?> </td>
            <td class="<?php echo $valor; ?>"><?php echo $oItem->porcJuveniles; ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->porcEspecie == '0,0,0,0,0'){echo '-';}else{echo str_replace($vowels2, "", $oItem->porcEspecie);} ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->especie == ',,,,'){echo '-';}else{echo htmlentities(str_replace($vowels, "",$oItem->especie), ENT_QUOTES, "UTF-8");} ?> </td>
            <td class="<?php echo $valor; ?>"><?php if($oItem->nroParteMuestreo != ''){echo htmlentities($oItem->zonaPesca, ENT_QUOTES, "UTF-8");}else{ echo 'E/P no muestreada';} ?> </td>
        </tr>
        <?php } ?>

        
        <?php 
        $list=CrmReportes::getItemReporte9($fecha9,$horaInicio9,$horaFinal9,$local9);
        foreach ($list as $oItem){
            $valor ='softfinal';
            ?>
            <tr>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo htmlentities($oItem->tmDescargado, ENT_QUOTES, "UTF-8"); ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem->frecuencia; ?> </td>
                <td class="<?php echo $valor; ?>"><?php echo $oItem->porcJuveniles; ?> </td>
                <td class="<?php echo $valor; ?>"><?php if($oItem->porcEspecie == '0,0,0,0,0'){echo '-';}else{echo str_replace($vowels2, "", $oItem->porcEspecie);} ?> </td>
                <td class="<?php echo $valor; ?>"><?php if($oItem->especie == ',,,,'){echo '-';}else{echo htmlentities(str_replace($vowels, "",$oItem->especie), ENT_QUOTES, "UTF-8");} ?> </td>    
                <td class="<?php echo $valor; ?>"><?php if($oItem->nroParteMuestreo != ''){echo htmlentities($oItem->zonaPesca, ENT_QUOTES, "UTF-8");}else{ echo 'E/P no muestreada';} ?> </td>
            </tr>
            <?php } ?>
        </table>
        <?php exit();?>