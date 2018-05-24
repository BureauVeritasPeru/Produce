<?php
$action  = OWASP::RequestString('action');
$chdID  = OWASP::RequestString('ID');
$detalleEmbarcacion1 = NULL;
$detalleEmbarcacion2 = NULL;
$detalleEmbarcacion3 = NULL;
$detalleEmbarcacion4 = NULL;
$detalleEmbarcacion5 = NULL;
$detalleEmbarcacion6 = NULL;
if($action == 'insert'){
  $cmd = 'insert';
  $embarcacion = NULL;
}else{ 
  $cmd = 'update';
  $embarcacion = NULL;
  $embarcacion = CrmEmbarcacionCHD::getItemCHD($chdID);
  $detalleCala = NULL;
  if($embarcacion == NULL){
    $cmd = 'insert';
  }else
  { $count = 0;
    $detalleEmbarcacion = CrmDetalleEmbarcacion::getList($chdID);
    foreach ($detalleEmbarcacion as $valor) {
      $count++;
      ${'detalleEmbarcacion'.$count} = new eCrmDetalleEmbarcacion();
      ${'detalleEmbarcacion'.$count}->matricula           = $valor->matricula;
      ${'detalleEmbarcacion'.$count}->nombreEmbarcacion   = $valor->nombreEmbarcacion;
      ${'detalleEmbarcacion'.$count}->nroCubetas          = $valor->nroCubetas;
      ${'detalleEmbarcacion'.$count}->especie1            = $valor->especie1;
      ${'detalleEmbarcacion'.$count}->nroCubetas1         = $valor->nroCubetas1;
      ${'detalleEmbarcacion'.$count}->especie2            = $valor->especie2;
      ${'detalleEmbarcacion'.$count}->nroCubetas2         = $valor->nroCubetas2;
      ${'detalleEmbarcacion'.$count}->especie3            = $valor->especie3;
      ${'detalleEmbarcacion'.$count}->nroCubetas3         = $valor->nroCubetas3;
      ${'detalleEmbarcacion'.$count}->reportePesaje       = $valor->reportePesaje;
      ${'detalleEmbarcacion'.$count}->numeroGuia          = $valor->numeroGuia;
    }
  } 

}


?>
<section class="content">
  <form name="form_embarcacion" id="form_embarcacion" > 
    <div class="row">
      <div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp;Embarcaciones Cubetas / TM</h2></div>
    </div>
    <div class="row">
      <div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
    </div>
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Unidad de Medida </label>
          <br>
          <div class="radio radio-primary radio-inline">
            <input type="radio" value="1" class="radio-primary" name="unidadMedida" id="unidadMedidaY" <?php if($embarcacion != NUll){ echo ($embarcacion->unidadMedida == 1) ? 'checked':''; }else{ echo 'checked'; }?>> 
            <label for="unidadMedidaY">Cubetas</label>
          </div>
          <div class="radio radio-primary radio-inline">
            <input type="radio" value="0" class="radio-primary" name="unidadMedida" id="unidadMedidaN" <?php if($embarcacion != NUll){ echo ($embarcacion->unidadMedida == 0) ? 'checked':''; }?>> 
            <label for="unidadMedidaN">TM</label>
          </div>
        </div>
      </div>
      <div class="col-md-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 navbar">
        <div class="navbar-inner">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#embarcacion1"  id="tab1" >Embarcacion N°1</a></li>
            <li role="presentation"><a href="#embarcacion2" id="tab2" tabindex="12" >Embarcacion N°2</a></li>
            <li role="presentation"><a href="#embarcacion3" id="tab3" >Embarcacion N°3</a></li>
            <li role="presentation"><a href="#embarcacion4" id="tab4" >Embarcacion N°4</a></li>
            <li role="presentation"><a href="#embarcacion5" id="tab5" >Embarcacion N°5</a></li>
            <li role="presentation"><a href="#embarcacion6" id="tab6" >Embarcacion N°6</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div  class="tab-pane active" id="embarcacion1">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Matricula</label>
                    <input name="matricula1" id="matricula1" tabindex="1" type="text" class="form-control" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->matricula; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Embarcacion</label>
                    <input name="nombreEmbarcacion1" id="nombreEmbarcacion1" tabindex="2" type="text" class="form-control" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas / TM</label>
                    <input name="nroCubetas1" id="nroCubetas1" type="text" tabindex="3" class="form-control" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 1</label>
                    <select name="especie1_1" id="especie1_1" class="form-control" autocomplete="off" tabindex="4">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion1 != NULL){if($obj->parameterID==$detalleEmbarcacion1->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 2</label>
                    <select name="especie2_1" id="especie2_1" class="form-control" autocomplete="off" tabindex="5">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion1 != NULL){if($obj->parameterID==$detalleEmbarcacion1->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 3</label>
                    <select name="especie3_1" id="especie3_1" class="form-control" autocomplete="off" tabindex="6">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion1 != NULL){if($obj->parameterID==$detalleEmbarcacion1->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 1 / TM </label>
                    <input name="nroCubetas1_1" id="nroCubetas1_1" type="text" class="only_float form-control" tabindex="7" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->nroCubetas1; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 2 / TM </label>
                    <input name="nroCubetas2_1" id="nroCubetas2_1" type="text" class="only_float form-control" tabindex="8" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->nroCubetas2; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 3 / TM </label>
                    <input name="nroCubetas3_1" id="nroCubetas3_1" type="text" class="only_float form-control" tabindex="9" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->nroCubetas3; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Reporte Pesaje</label>
                    <input name="reportePesaje1" id="reportePesaje1" type="text" class="form-control" tabindex="10" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->reportePesaje; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nro. de guia </label>
                    <input name="numeroGuia1" id="numeroGuia1" tabindex="11" type="text" class="form-control" value="<?php if($detalleEmbarcacion1 != NUll){ echo $detalleEmbarcacion1->numeroGuia; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
              </div>
            </div>
            <div  class="tab-pane" id="embarcacion2">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Matricula</label>
                    <input name="matricula2" id="matricula2" tabindex="13" type="text" class="form-control" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->matricula; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Embarcacion</label>
                    <input name="nombreEmbarcacion2" id="nombreEmbarcacion2" tabindex="14" type="text" class="form-control" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas / TM</label>
                    <input name="nroCubetas2" id="nroCubetas2" type="text" tabindex="15" class="form-control" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 1</label>
                    <select name="especie1_2" id="especie1_2" class="form-control" tabindex="16" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion2 != NULL){if($obj->parameterID==$detalleEmbarcacion2->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 2</label>
                    <select name="especie2_2" id="especie2_2" class="form-control" tabindex="17" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion2 != NULL){if($obj->parameterID==$detalleEmbarcacion2->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 3</label>
                    <select name="especie3_2" id="especie3_2" class="form-control" tabindex="18" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion2 != NULL){if($obj->parameterID==$detalleEmbarcacion2->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 1 / TM </label>
                    <input name="nroCubetas1_2" id="nroCubetas1_2" type="text" class="only_float form-control" tabindex="19" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->nroCubetas1; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 2 / TM </label>
                    <input name="nroCubetas2_2" id="nroCubetas2_2" type="text" class="only_float form-control" tabindex="20" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->nroCubetas2; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 3 / TM </label>
                    <input name="nroCubetas3_2" id="nroCubetas3_2" type="text" class="only_float form-control" tabindex="21" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->nroCubetas3; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Reporte Pesaje</label>
                    <input name="reportePesaje2" id="reportePesaje2" type="text" class="form-control" tabindex="22" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->reportePesaje; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nro. de guia </label>
                    <input name="numeroGuia2" id="numeroGuia2" type="text" class="form-control" value="<?php if($detalleEmbarcacion2 != NUll){ echo $detalleEmbarcacion2->numeroGuia; } ?>"  maxlength="255" tabindex="23" autocomplete="off"> 
                  </div>
                </div>
              </div>
            </div>
            <div  class="tab-pane" id="embarcacion3">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Matricula</label>
                    <input name="matricula3" id="matricula3" type="text" class="form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->matricula; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Embarcacion</label>
                    <input name="nombreEmbarcacion3" id="nombreEmbarcacion3" type="text" class="form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas / TM</label>
                    <input name="nroCubetas3" id="nroCubetas3" type="text" class="form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 1</label>
                    <select name="especie1_3" id="especie1_3" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion3 != NULL){if($obj->parameterID==$detalleEmbarcacion3->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 2</label>
                    <select name="especie2_3" id="especie2_3" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion3 != NULL){if($obj->parameterID==$detalleEmbarcacion3->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 3</label>
                    <select name="especie3_3" id="especie3_3" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion3 != NULL){if($obj->parameterID==$detalleEmbarcacion3->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 1 / TM </label>
                    <input name="nroCubetas1_3" id="nroCubetas1_3" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->nroCubetas1; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 2 / TM </label>
                    <input name="nroCubetas2_3" id="nroCubetas2_3" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->nroCubetas2; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 3 / TM </label>
                    <input name="nroCubetas3_3" id="nroCubetas3_3" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->nroCubetas3; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Reporte Pesaje</label>
                    <input name="reportePesaje3" id="reportePesaje3" type="text" class="form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->reportePesaje; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nro. de guia </label>
                    <input name="numeroGuia3" id="numeroGuia3" type="text" class="form-control" value="<?php if($detalleEmbarcacion3 != NUll){ echo $detalleEmbarcacion3->numeroGuia; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
              </div>
            </div>
            <div  class="tab-pane" id="embarcacion4">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Matricula</label>
                    <input name="matricula4" id="matricula4" type="text" class="form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->matricula; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Embarcacion</label>
                    <input name="nombreEmbarcacion4" id="nombreEmbarcacion4" type="text" class="form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas / TM</label>
                    <input name="nroCubetas4" id="nroCubetas4" type="text" class="form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 1</label>
                    <select name="especie1_4" id="especie1_4" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion4 != NULL){if($obj->parameterID==$detalleEmbarcacion4->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 2</label>
                    <select name="especie2_4" id="especie2_4" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion4 != NULL){if($obj->parameterID==$detalleEmbarcacion4->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 3</label>
                    <select name="especie3_4" id="especie3_4" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion4 != NULL){if($obj->parameterID==$detalleEmbarcacion4->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 1 / TM </label>
                    <input name="nroCubetas1_4" id="nroCubetas1_4" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->nroCubetas1; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 2 / TM </label>
                    <input name="nroCubetas2_4" id="nroCubetas2_4" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->nroCubetas2; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 3 / TM </label>
                    <input name="nroCubetas3_4" id="nroCubetas3_4" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->nroCubetas3; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Reporte Pesaje</label>
                    <input name="reportePesaje4" id="reportePesaje4" type="text" class="form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->reportePesaje; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nro. de guia </label>
                    <input name="numeroGuia4" id="numeroGuia4" type="text" class="form-control" value="<?php if($detalleEmbarcacion4 != NUll){ echo $detalleEmbarcacion4->numeroGuia; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
              </div>
            </div>
            <div  class="tab-pane" id="embarcacion5">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Matricula</label>
                    <input name="matricula5" id="matricula5" type="text" class="form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->matricula; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Embarcacion</label>
                    <input name="nombreEmbarcacion5" id="nombreEmbarcacion5" type="text" class="form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas / TM</label>
                    <input name="nroCubetas5" id="nroCubetas5" type="text" class="form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 1</label>
                    <select name="especie1_5" id="especie1_5" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion5 != NULL){if($obj->parameterID==$detalleEmbarcacion5->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 2</label>
                    <select name="especie2_5" id="especie2_5" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion5 != NULL){if($obj->parameterID==$detalleEmbarcacion5->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 3</label>
                    <select name="especie3_5" id="especie3_5" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion5 != NULL){if($obj->parameterID==$detalleEmbarcacion5->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 1 / TM </label>
                    <input name="nroCubetas1_5" id="nroCubetas1_5" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->nroCubetas1; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 2 / TM </label>
                    <input name="nroCubetas2_5" id="nroCubetas2_5" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->nroCubetas2; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 3 / TM </label>
                    <input name="nroCubetas3_5" id="nroCubetas3_5" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->nroCubetas3; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Reporte Pesaje</label>
                    <input name="reportePesaje5" id="reportePesaje5" type="text" class="form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->reportePesaje; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nro. de guia </label>
                    <input name="numeroGuia5" id="numeroGuia5" type="text" class="form-control" value="<?php if($detalleEmbarcacion5 != NUll){ echo $detalleEmbarcacion5->numeroGuia; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
              </div>
            </div>
            <div  class="tab-pane" id="embarcacion6">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Matricula</label>
                    <input name="matricula6" id="matricula6" type="text" class="form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->matricula; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Embarcacion</label>
                    <input name="nombreEmbarcacion6" id="nombreEmbarcacion6" type="text" class="form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas / TM</label>
                    <input name="nroCubetas6" id="nroCubetas6" type="text" class="form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 1</label>
                    <select name="especie1_6" id="especie1_6" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion6 != NULL){if($obj->parameterID==$detalleEmbarcacion6->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 2</label>
                    <select name="especie2_6" id="especie2_6" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion6 != NULL){if($obj->parameterID==$detalleEmbarcacion6->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Especie 3</label>
                    <select name="especie3_6" id="especie3_6" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su Especie</option> 
                      <?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
                      if($detalleEmbarcacion6 != NULL){if($obj->parameterID==$detalleEmbarcacion6->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
                      ?>   
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 1 / TM </label>
                    <input name="nroCubetas1_6" id="nroCubetas1_6" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->nroCubetas1; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 2 / TM </label>
                    <input name="nroCubetas2_6" id="nroCubetas2_6" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->nroCubetas2; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nro. de Cubetas 3 / TM </label>
                    <input name="nroCubetas3_6" id="nroCubetas3_6" type="text" class="only_float form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->nroCubetas3; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Reporte Pesaje</label>
                    <input name="reportePesaje6" id="reportePesaje6" type="text" class="form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->reportePesaje; } ?>"  maxlength="255" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nro. de guia </label>
                    <input name="numeroGuia6" id="numeroGuia6" type="text" class="form-control" value="<?php if($detalleEmbarcacion6 != NUll){ echo $detalleEmbarcacion6->numeroGuia; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-5">
      </div> 
      <div class="col-md-2">
      </div>
      <div class="col-md-1">
      </div>
      <input type="hidden" value="<?php echo $oUser->userID; ?>" name="userID" id="userID" > 
      <input type="hidden" value="<?php echo $chdID; ?>" name="ID" id="ID" > 
      <div class="col-md-2">
        <label></label>
        <div class="btn btn-info btn-block" name="btnBack" id="back_embarcacion"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
      </div>
      <div class="col-md-2">
        <label></label>
        <div class="btn btn-primary btn-block" name="btnCrear" id="send_embarcacion">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
      </div>
    </div>

  </form>

  <script type="text/javascript">
    <?php for ($i = 1; $i < 7; $i++) { ?>
      $("#matricula<?php echo $i; ?>").keydown(function(e) {
        if ( event.key == "Tab" || event.which == 13 ) {
          var dol = $("#matricula<?php echo $i; ?>").val();
          $.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_embarcacion.php?mat='+ dol, function(data) {
            if(data.retval==1){
              $('#nombreEmbarcacion<?php echo $i; ?>').val(data.nombre);
              $('#matricula<?php echo $i; ?>').val(data.matricula);
            }else{
              alertify.error(data.message);
            }
          });
        }
      });
      <?php } ?>
      
      $('#tab1').click(function(){
        $('.tab-pane').hide(); $('#embarcacion1').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active');
      });
          //validate inputs on click of button
          $('#tab2').click(function(){
            var allValid = true;
            $('#embarcacion1').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#embarcacion2').show(); $('.nav-tabs li').removeClass('active'); $(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab3').click(function(){
            var allValid = true;
            $('#embarcacion2').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#embarcacion3').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab4').click(function(){
            var allValid = true;
            $('#embarcacion3').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#embarcacion4').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab5').click(function(){
            var allValid = true;
            $('#embarcacion5').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#embarcacion5').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab6').click(function(){
            var allValid = true;
            $('#embarcacion6').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#embarcacion6').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active');}
          });
          //validate inputs on click of button


          $(function(){

           prepareForm('#form_embarcacion');
           $('#send_embarcacion').click(function(){
            <?php if($oUser->level != 0){ ?>
              bootbox.confirm({
                title: "Produce - Bureau Veritas",
                message: "Estas seguro de guardar los datos de embarcacion?",
                buttons: {
                  cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar'
                  },
                  confirm: {
                    label: '<i class="fa fa-check"></i> Confirmar'
                  }
                },
                callback: function (result) {
                  if(result){
                    if (!isValidate('#form_embarcacion')){ alertify.error('Porfavor ingrese datos validos.'); return false; }
                    var fields3=$('#form_embarcacion').serialize();
                    <?php if($cmd!='update'){ ?>
                      $.getJSON('<?php echo $URL_ROOT;?>ajax/form_embarcacion.php?cmd=insert&'+fields3, function(data) {
                        if(data.retval==1){
                          alertify.success(data.message);
                          $('.sombra').show();
                          setTimeout(function(){
                            location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_mp.html?action=insert&ID='+data.chdID;
                          }, 100);
                        }else{
                          alertify.error(data.message);
                        }
                      });
                      <?php }else{ ?>
                        $.getJSON('<?php echo $URL_ROOT;?>ajax/form_embarcacion.php?cmd=update&ID=<?php echo $chdID;?>&'+fields3, function(data) {
                          if(data.retval==1){
                            $('.sombra').show();
                            alertify.success(data.message);
                            setTimeout(function(){
                              location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_mp.html?action=update&ID='+data.chdID;
                            }, 100);
                          }else{
                            alertify.error(data.message);
                          }
                        });
                        <?php } ?>

                      }
                    }
                  });


              <?php }else{ ?>
                location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_mp.html?action=update&ID=<?php echo $chdID; ?>';

                <?php } ?>


              });
         });

          $('#back_embarcacion').click(function(){
            location.href='<?php echo $URL_ROOT;?>chd/materia_prima.html?action=update&chdID=<?php echo $chdID; ?>';
          });
        </script>




      </section>