<?php
$action  = OWASP::RequestString('action');
$chiID  = OWASP::RequestString('ID');
$detalleCala1 = NULL;
$detalleCala2 = NULL;
$detalleCala3 = NULL;
$detalleCala4 = NULL;
$detalleCala5 = NULL;
$detalleCala6 = NULL;
$detalleCala7 = NULL;
if($action == 'insert'){
  $cmd = 'insert';
  $cala = NULL;
}else{ 
  $cmd = 'update';
  $cala = NULL;
  $cala = CrmCala::getItemCHI($chiID);
  $detalleCala = NULL;
  if($cala == NULL){
    $cmd = 'insert';
  }else
  { $count = 0;
    $detalleCala = CrmDetalleCala::getList($chiID);
    foreach ($detalleCala as $valor) {
      $count++;
      ${'detalleCala'.$count} = new eCrmDetalleCala();
      ${'detalleCala'.$count}->latitud        = $valor->latitud;
      ${'detalleCala'.$count}->minLat         = $valor->minLat;
      ${'detalleCala'.$count}->segLat         = $valor->segLat;
      ${'detalleCala'.$count}->orienteLat     = $valor->orienteLat;
      ${'detalleCala'.$count}->longitud       = $valor->longitud;
      ${'detalleCala'.$count}->minLong        = $valor->minLong;
      ${'detalleCala'.$count}->segLong        = $valor->segLong;
      ${'detalleCala'.$count}->orienteLong    = $valor->orienteLong;
      ${'detalleCala'.$count}->fechaCala      = $valor->fechaCala;
      ${'detalleCala'.$count}->horaCala       = $valor->horaCala;
      ${'detalleCala'.$count}->tmDeclaradas   = $valor->tmDeclaradas;
      ${'detalleCala'.$count}->juveniles      = $valor->juveniles;
      ${'detalleCala'.$count}->porcJuveniles  = $valor->porcJuveniles;
      ${'detalleCala'.$count}->especie        = $valor->especie;
      ${'detalleCala'.$count}->porcEspecie    = $valor->porcEspecie;
    }
  } 

}


?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiK7lS1OMjgpOmEwkNO37o2GQ1lCVxPIo"
async defer></script>
<section class="content">
  <form name="form_cala" id="form_cala" > 
    <div class="row">
      <div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp;Cala</h2></div>
    </div>
    <div class="row">
      <div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Número de Reporte de Cala </label>
          <input name="numReporteCala" id="numReporteCala" type="text" class="form-control" value="<?php if($cala != NUll){ echo $cala->numReporteCala; } ?>"  maxlength="255" autocomplete="off"> 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Codigo de Faena Bitacora Web</label>
          <input name="codigoFaenaWeb" id="codigoFaenaWeb" type="text" class="form-control" value="<?php if($cala != NUll){ echo $cala->codigoFaenaWeb; } ?>"  maxlength="255" autocomplete="off">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 navbar">
        <div class="navbar-inner">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#cala1"  id="tab1" >Cala N°1</a></li>
            <li role="presentation"><a href="#cala2" id="tab2" >Cala N°2</a></li>
            <li role="presentation"><a href="#cala3" id="tab3" >Cala N°3</a></li>
            <li role="presentation"><a href="#cala4" id="tab4" >Cala N°4</a></li>
            <li role="presentation"><a href="#cala5" id="tab5" >Cala N°5</a></li>
            <li role="presentation"><a href="#cala6" id="tab6" >Cala N°6</a></li>
            <li role="presentation"><a href="#cala7" id="tab7" >Cala N°7</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div  class="tab-pane active" id="cala1">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <fieldset class="scheduler-border">
                      <legend  class="scheduler-border" >Latitud</legend>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>grad.</label>
                          <input name="latitud1" id="latitud1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>min.</label>
                          <input name="minLat1" id="minLat1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>seg.</label>
                          <input name="segLat1" id="segLat1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>orient.</label>
                          <select name="orienteLat1" id="orienteLat1" class="form-control" autocomplete="off">
                            <?php
                            echo "<option value=\"S\" ";
                            if($detalleCala1 != NULL){if("S"==$detalleCala1->orienteLong) echo " selected";}
                            echo ">S</option>";
                            echo "<option value=\"N\" ";
                            if($detalleCala1 != NULL){if("N"==$detalleCala1->orienteLat) echo " selected";}
                            echo ">N</option>";
                            ?>   
                          </select>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <fieldset class="scheduler-border">
                      <legend  class="scheduler-border" >Longitud</legend>  
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>grad.</label>
                          <input name="longitud1" id="longitud1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>min.</label>
                          <input name="minLong1" id="minLong1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>seg.</label>
                          <input name="segLong1" id="segLong1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>orient.</label>
                          <select name="orienteLong1" id="orienteLong1" class="form-control" autocomplete="off">
                            <?php
                            echo "<option value=\"O\" ";
                            if($detalleCala1 != NULL){if("O"==$detalleCala1->orienteLong) echo " selected";}
                            echo ">O</option>";
                            echo "<option value=\"E\" ";
                            if($detalleCala1 != NULL){if("N"==$detalleCala1->orienteLong) echo " selected";}
                            echo ">E</option>";
                            ?>   
                          </select>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <a class="btn btn-primary" id="btnPrueba">Ingresar</a> 
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div id="map1" style="height:250px;width:100%;display:none;"></div>
                  </div>
                </div>
              </div>
              <script>
                var map;
                $(function(){
                  $('#btnPrueba').click(function(){
                    $('#map1').show();
                    var valor;
                    if($('#orienteLat1').val() == 'N') { valor = ''; }else{ valor = '-'; }
                    if($('#orienteLong1').val() == 'E') { valor = ''; }else{ valor = '-'; }
                    var orienteLat = ( parseInt($('#latitud1').val())  + (parseInt($('#minLat1').val())/60 + (parseInt($('#segLat1').val())/3600)) );
                    var orienteLong = ( parseInt($('#longitud1').val())  + (parseInt($('#minLong1').val())/60 + (parseInt($('#segLong1').val())/3600)) );

                    orienteLat = parseFloat(valor + orienteLat.toString());
                    orienteLong = parseFloat(valor + orienteLong.toString());

                    console.log(orienteLat);
                    console.log(orienteLong);
                    var myLatLng = {lat: orienteLat, lng: orienteLong};
                    map = new google.maps.Map(document.getElementById('map1'), {
                      center: myLatLng,
                      zoom: 14
                    });
                    var marker = new google.maps.Marker({
                      position: myLatLng,
                      map: map
                    });
                  });
                });
              </script>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fecha</label>
                    <div class="input-group date" data-provide="datepicker">
                      <input type="text" class="form-control" id="fechaCala1" name="fechaCala1"  value="<?php if($detalleCala1 != NUll){ echo  str_replace('00:00:00','',$detalleCala1->fechaCala); } ?>" >
                      <div class="input-group-addon ">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Hora</label>
                    <input name="horaCala1" id="horaCala1"  class="form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>TM Declaradas</label>
                    <input name="tmDeclaradas1" id="tmDeclaradas1" type="text" class="form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Juveniles > 10%</label>
                    <br>
                    <div class="radio radio-primary radio-inline">
                      <input type="radio" value="1" class="radio-primary" name="juveniles1" id="juvenilesY1" <?php if($detalleCala1 != NUll){ echo ($detalleCala1->juveniles == 1) ? 'checked':''; }?>> 
                      <label for="juvenilesY1">Si</label>
                    </div>
                    <div class="radio radio-primary radio-inline">
                      <input type="radio" value="0" class="radio-primary" name="juveniles1" id="juvenilesN1" <?php if($detalleCala1 != NUll){ echo ($detalleCala1->juveniles == 0) ? 'checked':''; }?>> 
                      <label for="juvenilesN1">No</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>% Juveniles</label>
                    <input name="porcJuveniles1" id="porcJuveniles1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Especie Incidental</label>
                    <select name="especie1" id="especie1" class="form-control" autocomplete="off">
                      <option value="0">Seleccione su especie
                      </option> 
                      <?php
                          $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                          foreach ($list as $obj) {
                            echo "<option value=\"".$obj->parameterID."\"";
                            if($detalleCala1 != NULL){if($obj->parameterID==$detalleCala1->especie) echo " selected";}
                            echo ">".$obj->parameterName."</option>";
                          }
                          ?>   
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Especie Incidental</label>
                        <input name="porcEspecie1" id="porcEspecie1" type="text" class="only_float form-control" value="<?php if($detalleCala1 != NUll){ echo $detalleCala1->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>
                </div>
                <div  class="tab-pane" id="cala2">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border">Latitud</legend>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="latitud2" id="latitud2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLat2" id="minLat2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLat2" id="segLat2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLat2" id="orienteLat2" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"S\" ";
                                if($detalleCala2 != NULL){if("S"==$detalleCala2->orienteLong) echo " selected";}
                                echo ">S</option>";
                                echo "<option value=\"N\" ";
                                if($detalleCala2 != NULL){if("N"==$detalleCala2->orienteLat) echo " selected";}
                                echo ">N</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Longitud</legend>  
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="longitud2" id="longitud2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLong2" id="minLong2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLong2" id="segLong2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLong2" id="orienteLong2" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"O\" ";
                                if($detalleCala2 != NULL){if("O"==$detalleCala2->orienteLong) echo " selected";}
                                echo ">O</option>";
                                echo "<option value=\"E\" ";
                                if($detalleCala2 != NULL){if("N"==$detalleCala2->orienteLong) echo " selected";}
                                echo ">E</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <a class="btn btn-primary" id="btnPrueba2">Ingresar</a> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div id="map2" style="height:250px;width:100%;display:none;"></div>
                    </div>
                  </div>
                  <script>
                    var map;
                    $(function(){
                      $('#btnPrueba2').click(function(){
                        $('#map2').show();
                        var valor;
                        if($('#orienteLat2').val() == 'N') { valor = ''; }else{ valor = '-'; }
                        if($('#orienteLong2').val() == 'E') { valor = ''; }else{ valor = '-'; }
                        var orienteLat = ( parseInt($('#latitud2').val())  + (parseInt($('#minLat2').val())/60 + (parseInt($('#segLat2').val())/3600)) );
                        var orienteLong = ( parseInt($('#longitud2').val())  + (parseInt($('#minLong2').val())/60 + (parseInt($('#segLong2').val())/3600)) );

                        orienteLat = parseFloat(valor + orienteLat.toString());
                        orienteLong = parseFloat(valor + orienteLong.toString());

                        console.log(orienteLat);
                        console.log(orienteLong);
                        var myLatLng = {lat: orienteLat, lng: orienteLong};
                        map = new google.maps.Map(document.getElementById('map2'), {
                          center: myLatLng,
                          zoom: 14
                        });
                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map
                        });
                      });
                    });
                  </script>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group date" data-provide="datepicker">
                          <input type="text" class="form-control" id="fechaCala2" name="fechaCala2"  value="<?php if($detalleCala2 != NUll){ echo  str_replace('00:00:00','',$detalleCala2->fechaCala); } ?>" >
                          <div class="input-group-addon ">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hora</label>
                        <input name="horaCala2" id="horaCala2"  class="form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>TM Declaradas</label>
                        <input name="tmDeclaradas2" id="tmDeclaradas2" type="text" class="form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Juveniles > 10%</label>
                        <br>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="1" class="radio-primary" name="juveniles2" id="juvenilesY2" <?php if($detalleCala2 != NUll){ echo ($detalleCala2->juveniles == 1) ? 'checked':''; }?>> 
                          <label for="juvenilesY2">Si</label>
                        </div>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="0" class="radio-primary" name="juveniles2" id="juvenilesN2" <?php if($detalleCala2 != NUll){ echo ($detalleCala2->juveniles == 0) ? 'checked':''; }?>> 
                          <label for="juvenilesN2">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Juveniles</label>
                        <input name="porcJuveniles2" id="porcJuveniles2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Especie Incidental</label>
                        <select name="especie2" id="especie2" class="form-control" autocomplete="off">
                          <option value="0">Seleccione su especie
                          </option> 
                          <?php
                            $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                            foreach ($list as $obj) {
                              echo "<option value=\"".$obj->parameterID."\"";
                              if($detalleCala2 != NULL){if($obj->parameterID==$detalleCala2->especie) echo " selected";}
                              echo ">".$obj->parameterName."</option>";
                            }
                            ?>   
                          </select>
                        </div>
                      </div>  
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>% Especie Incidental</label>
                          <input name="porcEspecie2" id="porcEspecie2" type="text" class="only_float form-control" value="<?php if($detalleCala2 != NUll){ echo $detalleCala2->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div  class="tab-pane" id="cala3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <fieldset class="scheduler-border">
                            <legend  class="scheduler-border" >Latitud</legend>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>grad.</label>
                                <input name="latitud3" id="latitud3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>min.</label>
                                <input name="minLat3" id="minLat3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>seg.</label>
                                <input name="segLat3" id="segLat3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>orient.</label>
                                <select name="orienteLat3" id="orienteLat3" class="form-control" autocomplete="off">
                                  <?php
                                  echo "<option value=\"S\" ";
                                  if($detalleCala3 != NULL){if("S"==$detalleCala3->orienteLong) echo " selected";}
                                  echo ">S</option>";
                                  echo "<option value=\"N\" ";
                                  if($detalleCala3 != NULL){if("N"==$detalleCala3->orienteLat) echo " selected";}
                                  echo ">N</option>";
                                  ?>   
                                </select>
                              </div>
                            </div>
                          </fieldset>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <fieldset class="scheduler-border">
                            <legend  class="scheduler-border" >Longitud</legend>  
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>grad.</label>
                                <input name="longitud3" id="longitud3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>min.</label>
                                <input name="minLong3" id="minLong3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>seg.</label>
                                <input name="segLong3" id="segLong3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>orient.</label>
                                <select name="orienteLong3" id="orienteLong3" class="form-control" autocomplete="off">
                                  <?php
                                  echo "<option value=\"O\" ";
                                  if($detalleCala3 != NULL){if("O"==$detalleCala3->orienteLong) echo " selected";}
                                  echo ">O</option>";
                                  echo "<option value=\"E\" ";
                                  if($detalleCala3 != NULL){if("N"==$detalleCala3->orienteLong) echo " selected";}
                                  echo ">E</option>";
                                  ?>   
                                </select>
                              </div>
                            </div>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a class="btn btn-primary" id="btnPrueba3">Ingresar</a> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div id="map3" style="height:250px;width:100%;display:none;"></div>
                      </div>
                    </div>
                    <script>
                      var map;
                      $(function(){
                        $('#btnPrueba3').click(function(){
                          $('#map3').show();
                          var valor;
                          if($('#orienteLat3').val() == 'N') { valor = ''; }else{ valor = '-'; }
                          if($('#orienteLong3').val() == 'E') { valor = ''; }else{ valor = '-'; }
                          var orienteLat = ( parseInt($('#latitud3').val())  + (parseInt($('#minLat3').val())/60 + (parseInt($('#segLat3').val())/3600)) );
                          var orienteLong = ( parseInt($('#longitud3').val())  + (parseInt($('#minLong3').val())/60 + (parseInt($('#segLong3').val())/3600)) );

                          orienteLat = parseFloat(valor + orienteLat.toString());
                          orienteLong = parseFloat(valor + orienteLong.toString());

                          console.log(orienteLat);
                          console.log(orienteLong);
                          var myLatLng = {lat: orienteLat, lng: orienteLong};
                          map = new google.maps.Map(document.getElementById('map3'), {
                            center: myLatLng,
                            zoom: 14
                          });
                          var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map
                          });
                        });
                      });
                    </script>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Fecha</label>
                          <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="fechaCala3" name="fechaCala3"  value="<?php if($detalleCala3 != NUll){ echo  str_replace('00:00:00','',$detalleCala3->fechaCala); } ?>" >
                            <div class="input-group-addon ">
                              <span class="glyphicon glyphicon-th"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Hora</label>
                          <input name="horaCala3" id="horaCala3"  class="form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>TM Declaradas</label>
                          <input name="tmDeclaradas3" id="tmDeclaradas3" type="text" class="form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Juveniles > 10%</label>
                          <br>
                          <div class="radio radio-primary radio-inline">
                            <input type="radio" value="1" class="radio-primary" name="juveniles3" id="juvenilesY3" <?php if($detalleCala3 != NUll){ echo ($detalleCala3->juveniles == 1) ? 'checked':''; }?>> 
                            <label for="juvenilesY3">Si</label>
                          </div>
                          <div class="radio radio-primary radio-inline">
                            <input type="radio" value="0" class="radio-primary" name="juveniles3" id="juvenilesN3" <?php if($detalleCala3 != NUll){ echo ($detalleCala3->juveniles == 0) ? 'checked':''; }?>> 
                            <label for="juvenilesN3">No</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>% Juveniles</label>
                          <input name="porcJuveniles3" id="porcJuveniles3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Especie Incidental</label>
                          <select name="especie3" id="especie3" class="form-control" autocomplete="off">
                            <option value="0">Seleccione su especie
                            </option> 
                            <?php
                          $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                          foreach ($list as $obj) {
                            echo "<option value=\"".$obj->parameterID."\"";
                            if($detalleCala3 != NULL){if($obj->parameterID==$detalleCala3->especie) echo " selected";}
                            echo ">".$obj->parameterName."</option>";
                          }
                          ?>   
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Especie Incidental</label>
                        <input name="porcEspecie3" id="porcEspecie3" type="text" class="only_float form-control" value="<?php if($detalleCala3 != NUll){ echo $detalleCala3->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>
                </div>
                <div  class="tab-pane" id="cala4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Latitud</legend>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="latitud4" id="latitud4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLat4" id="minLat4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLat4" id="segLat4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLat4" id="orienteLat4" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"S\" ";
                                if($detalleCala4 != NULL){if("S"==$detalleCala4->orienteLong) echo " selected";}
                                echo ">S</option>";
                                echo "<option value=\"N\" ";
                                if($detalleCala4 != NULL){if("N"==$detalleCala4->orienteLat) echo " selected";}
                                echo ">N</option>";                                
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Longitud</legend>  
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="longitud4" id="longitud4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLong4" id="minLong4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLong4" id="segLong4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLong4" id="orienteLong4" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"O\" ";
                                if($detalleCala4 != NULL){if("O"==$detalleCala4->orienteLong) echo " selected";}
                                echo ">O</option>";
                                echo "<option value=\"E\" ";
                                if($detalleCala4 != NULL){if("N"==$detalleCala4->orienteLong) echo " selected";}
                                echo ">E</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <a class="btn btn-primary" id="btnPrueba4">Ingresar</a> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div id="map4" style="height:250px;width:100%;display:none;"></div>
                    </div>
                  </div>
                  <script>
                    var map;
                    $(function(){
                      $('#btnPrueba4').click(function(){
                        $('#map4').show();
                        var valor;
                        if($('#orienteLat4').val() == 'N') { valor = ''; }else{ valor = '-'; }
                        if($('#orienteLong4').val() == 'E') { valor = ''; }else{ valor = '-'; }
                        var orienteLat = ( parseInt($('#latitud4').val())  + (parseInt($('#minLat4').val())/60 + (parseInt($('#segLat4').val())/3600)) );
                        var orienteLong = ( parseInt($('#longitud4').val())  + (parseInt($('#minLong4').val())/60 + (parseInt($('#segLong4').val())/3600)) );

                        orienteLat = parseFloat(valor + orienteLat.toString());
                        orienteLong = parseFloat(valor + orienteLong.toString());

                        console.log(orienteLat);
                        console.log(orienteLong);
                        var myLatLng = {lat: orienteLat, lng: orienteLong};
                        map = new google.maps.Map(document.getElementById('map4'), {
                          center: myLatLng,
                          zoom: 14
                        });
                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map
                        });
                      });
                    });
                  </script>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group date" data-provide="datepicker">
                          <input type="text" class="form-control" id="fechaCala4" name="fechaCala4"  value="<?php if($detalleCala4 != NUll){ echo  str_replace('00:00:00','',$detalleCala4->fechaCala); } ?>" >
                          <div class="input-group-addon ">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hora</label>
                        <input name="horaCala4" id="horaCala4"  class="form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>TM Declaradas</label>
                        <input name="tmDeclaradas4" id="tmDeclaradas4" type="text" class="form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Juveniles > 10%</label>
                        <br>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="1" class="radio-primary" name="juveniles4" id="juvenilesY4" <?php if($detalleCala4 != NUll){ echo ($detalleCala4->juveniles == 1) ? 'checked':''; }?>> 
                          <label for="juvenilesY4">Si</label>
                        </div>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="0" class="radio-primary" name="juveniles4" id="juvenilesN4" <?php if($detalleCala4 != NUll){ echo ($detalleCala4->juveniles == 0) ? 'checked':''; }?>> 
                          <label for="juvenilesN4">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Juveniles</label>
                        <input name="porcJuveniles4" id="porcJuveniles4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Especie Incidental</label>
                        <select name="especie4" id="especie4" class="form-control" autocomplete="off">
                          <option value="0">Seleccione su especie
                          </option> 
                          <?php
                          $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                          foreach ($list as $obj) {
                            echo "<option value=\"".$obj->parameterID."\"";
                            if($detalleCala4 != NULL){if($obj->parameterID==$detalleCala4->especie) echo " selected";}
                            echo ">".$obj->parameterName."</option>";
                          }
                          ?>   
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Especie Incidental</label>
                        <input name="porcEspecie4" id="porcEspecie4" type="text" class="only_float form-control" value="<?php if($detalleCala4 != NUll){ echo $detalleCala4->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>
                </div>
                <div  class="tab-pane" id="cala5">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Latitud</legend>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="latitud5" id="latitud5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLat5" id="minLat5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLat5" id="segLat5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLat5" id="orienteLat5" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"S\" ";
                                if($detalleCala5 != NULL){if("S"==$detalleCala5->orienteLong) echo " selected";}
                                echo ">S</option>";
                                echo "<option value=\"N\" ";
                                if($detalleCala5 != NULL){if("N"==$detalleCala5->orienteLat) echo " selected";}
                                echo ">N</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Longitud</legend>  
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="longitud5" id="longitud5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLong5" id="minLong5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLong5" id="segLong5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLong5" id="orienteLong5" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"O\" ";
                                if($detalleCala5 != NULL){if("O"==$detalleCala5->orienteLong) echo " selected";}
                                echo ">O</option>";
                                echo "<option value=\"E\" ";
                                if($detalleCala5 != NULL){if("N"==$detalleCala5->orienteLong) echo " selected";}
                                echo ">E</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <a class="btn btn-primary" id="btnPrueba5">Ingresar</a> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div id="map5" style="height:250px;width:100%;display:none;"></div>
                    </div>
                  </div>
                  <script>
                    var map;
                    $(function(){
                      $('#btnPrueba5').click(function(){
                        $('#map5').show();
                        var valor;
                        if($('#orienteLat5').val() == 'N') { valor = ''; }else{ valor = '-'; }
                        if($('#orienteLong5').val() == 'E') { valor = ''; }else{ valor = '-'; }
                        var orienteLat = ( parseInt($('#latitud5').val())  + (parseInt($('#minLat5').val())/60 + (parseInt($('#segLat5').val())/3600)) );
                        var orienteLong = ( parseInt($('#longitud5').val())  + (parseInt($('#minLong5').val())/60 + (parseInt($('#segLong5').val())/3600)) );

                        orienteLat = parseFloat(valor + orienteLat.toString());
                        orienteLong = parseFloat(valor + orienteLong.toString());

                        console.log(orienteLat);
                        console.log(orienteLong);
                        var myLatLng = {lat: orienteLat, lng: orienteLong};
                        map = new google.maps.Map(document.getElementById('map5'), {
                          center: myLatLng,
                          zoom: 14
                        });
                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map
                        });
                      });
                    });
                  </script>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group date" data-provide="datepicker">
                          <input type="text" class="form-control" id="fechaCala5" name="fechaCala5"  value="<?php if($detalleCala5 != NUll){ echo  str_replace('00:00:00','',$detalleCala5->fechaCala); } ?>" >
                          <div class="input-group-addon ">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hora</label>
                        <input name="horaCala5" id="horaCala5"  class="form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>TM Declaradas</label>
                        <input name="tmDeclaradas5" id="tmDeclaradas5" type="text" class="form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Juveniles > 10%</label>
                        <br>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="1" class="radio-primary" name="juveniles5" id="juvenilesY5" <?php if($detalleCala5 != NUll){ echo ($detalleCala5->juveniles == 1) ? 'checked':''; }?>> 
                          <label for="juvenilesY5">Si</label>
                        </div>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="0" class="radio-primary" name="juveniles5" id="juvenilesN5" <?php if($detalleCala5 != NUll){ echo ($detalleCala5->juveniles == 0) ? 'checked':''; }?>> 
                          <label for="juvenilesN5">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Juveniles</label>
                        <input name="porcJuveniles5" id="porcJuveniles5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Especie Incidental</label>
                        <select name="especie5" id="especie5" class="form-control" autocomplete="off">
                          <option value="0">Seleccione su especie
                          </option> 
                          <?php
                          $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                          foreach ($list as $obj) {
                            echo "<option value=\"".$obj->parameterID."\"";
                            if($detalleCala5 != NULL){if($obj->parameterID==$detalleCala5->especie) echo " selected";}
                            echo ">".$obj->parameterName."</option>";
                          }
                          ?>   
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Especie Incidental</label>
                        <input name="porcEspecie5" id="porcEspecie5" type="text" class="only_float form-control" value="<?php if($detalleCala5 != NUll){ echo $detalleCala5->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>
                </div>
                <div  class="tab-pane" id="cala6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Latitud</legend>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="latitud6" id="latitud6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLat6" id="minLat6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLat6" id="segLat6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLat6" id="orienteLat6" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"S\" ";
                                if($detalleCala6 != NULL){if("S"==$detalleCala6->orienteLong) echo " selected";}
                                echo ">S</option>";
                                echo "<option value=\"N\" ";
                                if($detalleCala6 != NULL){if("N"==$detalleCala6->orienteLat) echo " selected";}
                                echo ">N</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Longitud</legend>  
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="longitud6" id="longitud6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLong6" id="minLong6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLong6" id="segLong6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLong6" id="orienteLong6" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"O\" ";
                                if($detalleCala6 != NULL){if("O"==$detalleCala6->orienteLong) echo " selected";}
                                echo ">O</option>";
                                echo "<option value=\"E\" ";
                                if($detalleCala6 != NULL){if("N"==$detalleCala6->orienteLong) echo " selected";}
                                echo ">E</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <a class="btn btn-primary" id="btnPrueba6">Ingresar</a> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div id="map6" style="height:250px;width:100%;display:none;"></div>
                    </div>
                  </div>
                  <script>
                    var map;
                    $(function(){
                      $('#btnPrueba6').click(function(){
                        $('#map6').show();
                        var valor;
                        if($('#orienteLat6').val() == 'N') { valor = ''; }else{ valor = '-'; }
                        if($('#orienteLong6').val() == 'E') { valor = ''; }else{ valor = '-'; }
                        var orienteLat = ( parseInt($('#latitud6').val())  + (parseInt($('#minLat6').val())/60 + (parseInt($('#segLat6').val())/3600)) );
                        var orienteLong = ( parseInt($('#longitud6').val())  + (parseInt($('#minLong6').val())/60 + (parseInt($('#segLong6').val())/3600)) );

                        orienteLat = parseFloat(valor + orienteLat.toString());
                        orienteLong = parseFloat(valor + orienteLong.toString());

                        console.log(orienteLat);
                        console.log(orienteLong);
                        var myLatLng = {lat: orienteLat, lng: orienteLong};
                        map = new google.maps.Map(document.getElementById('map6'), {
                          center: myLatLng,
                          zoom: 14
                        });
                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map
                        });
                      });
                    });
                  </script>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group date" data-provide="datepicker">
                          <input type="text" class="form-control" id="fechaCala6" name="fechaCala6"  value="<?php if($detalleCala6 != NUll){ echo  str_replace('00:00:00','',$detalleCala6->fechaCala); } ?>" >
                          <div class="input-group-addon ">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hora</label>
                        <input name="horaCala6" id="horaCala6"  class="form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>TM Declaradas</label>
                        <input name="tmDeclaradas6" id="tmDeclaradas6" type="text" class="form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Juveniles > 10%</label>
                        <br>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="1" class="radio-primary" name="juveniles6" id="juvenilesY6" <?php if($detalleCala6 != NUll){ echo ($detalleCala6->juveniles == 1) ? 'checked':''; }?>> 
                          <label for="juvenilesY6">Si</label>
                        </div>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="0" class="radio-primary" name="juveniles6" id="juvenilesN6" <?php if($detalleCala6 != NUll){ echo ($detalleCala6->juveniles == 0) ? 'checked':''; }?>> 
                          <label for="juvenilesN6">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Juveniles</label>
                        <input name="porcJuveniles6" id="porcJuveniles6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Especie Incidental</label>
                        <select name="especie6" id="especie6" class="form-control" autocomplete="off">
                          <option value="0">Seleccione su especie
                          </option> 
                          <?php
                          $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                          foreach ($list as $obj) {
                            echo "<option value=\"".$obj->parameterID."\"";
                            if($detalleCala6 != NULL){if($obj->parameterID==$detalleCala6->especie) echo " selected";}
                            echo ">".$obj->parameterName."</option>";
                          }
                          ?>   
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Especie Incidental</label>
                        <input name="porcEspecie6" id="porcEspecie6" type="text" class="only_float form-control" value="<?php if($detalleCala6 != NUll){ echo $detalleCala6->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>
                </div>
                <div  class="tab-pane" id="cala7">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Latitud</legend>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="latitud7" id="latitud7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->latitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLat7" id="minLat7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->minLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLat7" id="segLat7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->segLat; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLat7" id="orienteLat7" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"S\" ";
                                if($detalleCala7 != NULL){if("S"==$detalleCala7->orienteLong) echo " selected";}
                                echo ">S</option>";
                                echo "<option value=\"N\" ";
                                if($detalleCala7 != NULL){if("N"==$detalleCala7->orienteLat) echo " selected";}
                                echo ">N</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Longitud</legend>  
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>grad.</label>
                              <input name="longitud7" id="longitud7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->longitud; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>min.</label>
                              <input name="minLong7" id="minLong7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->minLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>seg.</label>
                              <input name="segLong7" id="segLong7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->segLong; } ?>"  maxlength="255" autocomplete="off"> 
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>orient.</label>
                              <select name="orienteLong7" id="orienteLong7" class="form-control" autocomplete="off">
                                <?php
                                echo "<option value=\"O\" ";
                                if($detalleCala7 != NULL){if("O"==$detalleCala7->orienteLong) echo " selected";}
                                echo ">O</option>";
                                echo "<option value=\"E\" ";
                                if($detalleCala7 != NULL){if("N"==$detalleCala7->orienteLong) echo " selected";}
                                echo ">E</option>";
                                ?>   
                              </select>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group date" data-provide="datepicker">
                          <input type="text" class="form-control" id="fechaCala7" name="fechaCala7"  value="<?php if($detalleCala7 != NUll){ echo  str_replace('00:00:00','',$detalleCala7->fechaCala); } ?>" >
                          <div class="input-group-addon ">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hora</label>
                        <input name="horaCala7" id="horaCala7"  class="form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->horaCala; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>TM Declaradas</label>
                        <input name="tmDeclaradas7" id="tmDeclaradas7" type="text" class="form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->tmDeclaradas; } ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Juveniles > 10%</label>
                        <br>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="1" class="radio-primary" name="juveniles7" id="juvenilesY7" <?php if($detalleCala7 != NUll){ echo ($detalleCala7->juveniles == 1) ? 'checked':''; }?>> 
                          <label for="juvenilesY">Si</label>
                        </div>
                        <div class="radio radio-primary radio-inline">
                          <input type="radio" value="0" class="radio-primary" name="juveniles7" id="juvenilesN7" <?php if($detalleCala7 != NUll){ echo ($detalleCala7->juveniles == 0) ? 'checked':''; }?>> 
                          <label for="juvenilesN7">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Juveniles</label>
                        <input name="porcJuveniles7" id="porcJuveniles7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->porcJuveniles; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Especie Incidental</label>
                        <select name="especie7" id="especie7" class="form-control" autocomplete="off">
                          <option value="0">Seleccione su especie
                          </option> 
                          <?php
                          $list= CmsParameterLang::getList(4, 1); //Observaciones Inusuales
                          foreach ($list as $obj) {
                            echo "<option value=\"".$obj->parameterID."\"";
                            if($detalleCala7 != NULL){if($obj->parameterID==$detalleCala7->especie) echo " selected";}
                            echo ">".$obj->parameterName."</option>";
                          }
                          ?>   
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>% Especie Incidental</label>
                        <input name="porcEspecie7" id="porcEspecie7" type="text" class="only_float form-control" value="<?php if($detalleCala7 != NUll){ echo $detalleCala7->porcEspecie; }else{ echo '-';} ?>"  maxlength="255" autocomplete="off"> 
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
          <input type="hidden" value="<?php echo $chiID; ?>" name="ID" id="ID" > 
          <div class="col-md-2">
            <label></label>
            <div class="btn btn-info btn-block" name="btnBack" id="back_cala"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
          </div>
          <div class="col-md-2">
            <label></label>
            <div class="btn btn-primary btn-block" name="btnCrear" id="send_cala">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
          </div>
        </div>

      </form>

      <script type="text/javascript">

        $('#tab1').click(function(){
          $('.tab-pane').hide(); $('#cala1').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active');
        });
          //validate inputs on click of button
          $('#tab2').click(function(){
            var allValid = true;
            $('#cala1').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#cala2').show(); $('.nav-tabs li').removeClass('active'); $(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab3').click(function(){
            var allValid = true;
            $('#cala2').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#cala3').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab4').click(function(){
            var allValid = true;
            $('#cala3').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#cala4').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab5').click(function(){
            var allValid = true;
            $('#cala5').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#cala5').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });
          //validate inputs on click of button
          $('#tab6').click(function(){
            var allValid = true;
            $('#cala6').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#cala6').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active');}
          });
          //validate inputs on click of button
          $('#tab7').click(function(){
            var allValid = true;
            $('#cala7').find('.form-control').each(function(i,e){ var len = $(e).val().length;if (len>0){allValid = true;} else {allValid = false;}});
            if (allValid) { $('.tab-pane').hide();  $('#cala7').show(); $('.nav-tabs li').removeClass('active');$(this).parent().addClass('active')}
          });


          $(function(){

          //  var timepicker = new TimePicker(['horaCala1','horaCala2','horaCala3','horaCala4','horaCala5','horaCala6','horaCala7'], {
          //     theme: 'dark', // or 'blue-grey'
          //     lang: 'pt' // 'en', 'pt' for now
          //   });
          //  timepicker.on('change', function(evt){
          //   console.info(evt);

          //   var value = (evt.hour || '00') + ':' + (evt.minute || '00');
          //   evt.element.value = value;
          // }); 

           prepareForm('#form_cala');
           $('#send_cala').click(function(){
            <?php if($oUser->level != 0){ ?>
              bootbox.confirm({
                title: "Produce - Bureau Veritas",
                message: "Estas seguro de guardar los datos de cala?",
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
                    if (!isValidate('#form_cala')){ alertify.error('Porfavor ingrese datos validos.'); return false; }
                    var fields3=$('#form_cala').serialize();
                    <?php if($cmd!='update'){ ?>
                      $.getJSON('<?php echo $URL_ROOT;?>ajax/form_cala.php?cmd=insert&'+fields3, function(data) {
                        if(data.retval==1){
                          alertify.success(data.message);
                          $('.sombra').show();
                          setTimeout(function(){
                            location.href='<?php echo $URL_ROOT;?>chi/reporte-de-ocurrencia.html?action=insert&ID='+data.chiID;
                          }, 100);
                        }else{
                          alertify.error(data.message);
                        }
                      });
                      <?php }else{ ?>
                        $.getJSON('<?php echo $URL_ROOT;?>ajax/form_cala.php?cmd=update&ID=<?php echo $chiID;?>&'+fields3, function(data) {
                          if(data.retval==1){
                            $('.sombra').show();
                            alertify.success(data.message);
                            setTimeout(function(){
                              location.href='<?php echo $URL_ROOT;?>chi/reporte-de-ocurrencia.html?action=update&ID='+data.chiID;
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
                location.href='<?php echo $URL_ROOT;?>chi/reporte-de-ocurrencia.html?action=update&ID=<?php echo $chiID; ?>';

                <?php } ?>


              });
         });

          $('#back_cala').click(function(){
            location.href='<?php echo $URL_ROOT;?>chi/muestreo.html?action=update&ID=<?php echo $chiID; ?>';
          });
        </script>




      </section>