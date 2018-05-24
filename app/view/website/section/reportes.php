<section class="content">
	<form name="frmMain" id="frmMain" class="form-horizontal" method="post" autocomplete="off" >
		<div class="box box-default" >
			<div class="box-header">
				<h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Reportes </h2>
			</div>
			<br><br>
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6 padding-right-10 padding-left-10">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-reporte-diario-chi">Reportes diarios CHI</button>
						</div>
					</div>  
					<div class="col-sm-6 padding-right-10 padding-left-10">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-reporte-semanal-chi">Reportes semanales CHI</button>
						</div>
					</div>
				</div>
				<div class="row">  
					<div class="col-sm-6 padding-right-10 padding-left-10">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-reporte-actas-observadas">Reportes Actas Observadas</button>
						</div>
					</div>  
					<div class="col-sm-6 padding-right-10 padding-left-10">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-facturacion">Facturacion CHI</button>
						</div>
					</div>
				</div>
				<div class="row">  
					<div class="col-sm-6 padding-right-10 padding-left-10">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-reporte-chd">Reportes CHD</button>
						</div>
					</div>  
					<div class="col-sm-6 padding-right-10 padding-left-10">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-otros-chd">Otros Reportes CHD</button>
						</div>
					</div>
				</div>
				<div class="row">  
					<div class="col-sm-3">
					</div>
					<div class="col-sm-6">
						<div class="form-group ">
							<button type="button" class="btn btn-primary btn-block btn-reportes" data-toggle="modal" data-target=".bs-control-actas">Control de Actas por Planta</button>
						</div>
					</div>  
					<div class="col-sm-3">
					</div>
				</div>
			</div>
		</div>




		<div class="box-footer">

		</div>

	</div>                     
</form>
</section>

<div class="modal fade bs-reporte-diario-chi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="modal-frame">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Reportes Diarios CHI</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<fieldset class="scheduler-border">
						<legend  class="scheduler-border" >Consolidado de Reporte de Cala</legend>
						<div class="col-md-6">
							<div class="form-group">
								<label>Fecha</label>
								<div class="input-group date" data-provide="datepicker">
									<input type="text" class="form-control" id="fecha1" name="fecha1">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th">
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hora Inicio</label>
								<input name="horaInicio1" id="horaInicio1" type="time" class="form-control" value="07:00"   maxlength="255" autocomplete="off"> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hora Término</label>
								<input name="horaFinal1" id="horaFinal1" type="time" class="form-control" value="07:00" maxlength="255" autocomplete="off"> 
							</div>
						</div>
						<div class="col-md-4">
							<select name="local1" id="local1" class="form-control" autocomplete="off">
								<?php if($oUser->localID != '0'){ $item= CmsParameterLang::getItem($oUser->localID, 1);  echo "<option value=\"".$item->parameterID."\""; echo ">".$item->parameterName."</option>";
              }else{
               echo "<option value=\"0\">Seleccione su local</option>";  $list= CmsParameterLang::getList(3, 1);  foreach ($list as $obj) {echo "<option value=\"".$obj->parameterID."\""; echo ">".$obj->parameterName."</option>";} }   
               ?>   
             </select>
           </div>
           <div class="col-md-4 col-md-offset-4">
             <label></label>
             <a class="btn btn-primary btn-block" name="btnCrear" id="send_1">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
           </div>
         </fieldset>
       </div>
       <div class="row">
         <fieldset class="scheduler-border">
          <legend  class="scheduler-border" >Consolidado de Descarga y Muestreo Biométrico</legend>
          <div class="col-md-6">
           <div class="form-group">
            <label>Fecha</label>
            <div class="input-group date" data-provide="datepicker">
             <input type="text" class="form-control" id="fecha2" name="fecha2">
             <div class="input-group-addon ">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
       <div class="form-group">
        <label>Hora Inicio</label>
        <input name="horaInicio2" id="horaInicio2" type="time" class="form-control"  value="07:00" maxlength="255" autocomplete="off"> 
      </div>
    </div>
    <div class="col-md-3">
     <div class="form-group">
      <label>Hora Término</label>
      <input name="horaFinal2" id="horaFinal2" type="time" class="form-control" value="07:00" maxlength="255" autocomplete="off"> 
    </div>
  </div>
  <div class="col-md-4">
   <select name="local2" id="local2" class="form-control" autocomplete="off">
    <?php
    if($oUser->localID != '0'){
      $item= CmsParameterLang::getItem($oUser->localID, 1);
      echo "<option value=\"".$item->parameterID."\"";
      echo ">".$item->parameterName."</option>";
    }else{
     echo "<option value=\"0\">Seleccione su local</option>";
     $list= CmsParameterLang::getList(3, 1);
     foreach ($list as $obj) {
       echo "<option value=\"".$obj->parameterID."\"";
       echo ">".$obj->parameterName."</option>";
     }
   }   
   ?>   
 </select>
</div>
<div class="col-md-4 col-md-offset-4">
 <label></label>
 <div class="btn btn-primary btn-block" name="btnCrear" id="send_2">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
</div>
</fieldset>
</div>
<div class="row">
 <fieldset class="scheduler-border">
  <legend  class="scheduler-border" >Consolidado de Reporte de Muestreo</legend>
  <div class="col-md-6">
   <div class="form-group">
    <label>Fecha</label>
    <div class="input-group date" data-provide="datepicker">
     <input type="text" class="form-control" id="fecha3" name="fecha">
     <div class="input-group-addon ">
      <span class="glyphicon glyphicon-th"></span>
    </div>
  </div>
</div>
</div>
<div class="col-md-3">
 <div class="form-group">
  <label>Hora Inicio</label>
  <input name="horaInicio3" id="horaInicio3" type="time" class="form-control"  value="07:00" maxlength="255" autocomplete="off"> 
</div>
</div>
<div class="col-md-3">
 <div class="form-group">
  <label>Hora Término</label>
  <input name="horaInicio3" id="horaInicio3" type="time" class="form-control"  value="07:00" maxlength="255" autocomplete="off"> 
</div>
</div>
<div class="col-md-4">
 <select name="local3" id="local3" class="form-control" autocomplete="off">
  <?php
  if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_3">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
                           </div>
                         </fieldset>   
                       </div>
                       <div class="row">
                         <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Consolidado de Reporte CHI - Zona Chimbote</legend>
                          <div class="col-md-6">
                           <div class="form-group">
                            <label>Fecha</label>
                            <div class="input-group date" data-provide="datepicker">
                             <input type="text" class="form-control" id="fecha9" name="fecha">
                             <div class="input-group-addon ">
                              <span class="glyphicon glyphicon-th"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                       <div class="form-group">
                        <label>Hora Inicio</label>
                        <input name="horaInicio9" id="horaInicio9" type="time" class="form-control"  value="07:00" maxlength="255" autocomplete="off"> 
                      </div>
                    </div>
                    <div class="col-md-3">
                     <div class="form-group">
                      <label>Hora Término</label>
                      <input name="horaInicio9" id="horaInicio9" type="time" class="form-control"  value="07:00" maxlength="255" autocomplete="off"> 
                    </div>
                  </div>
                  <div class="col-md-4">
                   <select name="local9" id="local9" class="form-control" autocomplete="off">
                    <?php
                    if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_9">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
                           </div>
                         </fieldset>   
                       </div>
                     </div>
                   </div>
                 </div>
               </div>

               <script>
                 $(function(){
                  $('#send_1').click(function(){
                   if($('#fecha1').val() != '' && $('#horaInicio1').val() != '' && $('#horaFinal1').val() != '' ){

                    location.href = '<?php echo $URL_ROOT;?>ajax/export_1.php?fecha1='+$('#fecha1').val()+'&horaInicio1='+$('#horaInicio1').val()+'&horaFinal1='+$('#horaFinal1').val()+'&local1='+$('#local1').val();

                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                  $('#send_2').click(function(){
                   if($('#fecha2').val() != '' && $('#horaInicio2').val() != '' && $('#horaFinal2').val() != '' ){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_2.php?fecha2='+$('#fecha2').val()+'&horaInicio2='+$('#horaInicio2').val()+'&horaFinal2='+$('#horaFinal2').val()+'&local2='+$('#local2').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                  $('#send_3').click(function(){
                   if($('#fecha3').val() != '' && $('#horaInicio3').val() != '' && $('#horaFinal3').val() != '' ){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_3.php?fecha3='+$('#fecha3').val()+'&horaInicio3='+$('#horaInicio3').val()+'&horaFinal3='+$('#horaFinal3').val()+'&local3='+$('#local3').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                  $('#send_9').click(function(){
                   if($('#fecha9').val() != '' && $('#horaInicio9').val() != '' && $('#horaFinal9').val() != '' ){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_9.php?fecha9='+$('#fecha9').val()+'&horaInicio9='+$('#horaInicio9').val()+'&horaFinal9='+$('#horaFinal9').val()+'&local9='+$('#local9').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                });

              </script>


              <div class="modal fade bs-reporte-semanal-chi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
               <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                 <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel">Reportes Semanales CHI</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                   <fieldset class="scheduler-border">
                    <legend  class="scheduler-border" >Registros de Descargas</legend>
                    <div class="col-md-6">
                     <div class="form-group">
                      <label>Fecha Inicial</label>
                      <div class="input-group date" data-provide="datepicker">
                       <input type="text" class="form-control" id="fechaInicial4" name="fecha">
                       <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th">

                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Fecha Final</label>
                  <div class="input-group date" data-provide="datepicker">
                   <input type="text" class="form-control" id="fechaFinal4" name="fecha">
                   <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th">

                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
             <select name="local4" id="local4" class="form-control" autocomplete="off">
              <?php
              if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";  
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_4">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
                           </div>
                         </fieldset>
                       </div>
                       <div class="row">
                         <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Registros de Reporte de Ocurrencia y Decomisos</legend>
                          <div class="col-md-6">
                           <div class="form-group">
                            <label>Fecha Inicial</label>
                            <div class="input-group date" data-provide="datepicker">
                             <input type="text" class="form-control" id="fechaInicial5" name="fechaInicial5">
                             <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th">

                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                        <label>Fecha Final</label>
                        <div class="input-group date" data-provide="datepicker">
                         <input type="text" class="form-control" id="fechaFinal5" name="fechaFinal5">
                         <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th">

                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   <select name="local5" id="local5" class="form-control" autocomplete="off">
                    <?php
                    if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_5">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
                           </div>
                         </fieldset>
                       </div>
                       <div class="row">
                         <fieldset class="scheduler-border">
                          <legend  class="scheduler-border" >Registros de Parte Muestreo</legend>
                          <div class="col-md-6">
                           <div class="form-group">
                            <label>Fecha Inicial</label>
                            <div class="input-group date" data-provide="datepicker">
                             <input type="text" class="form-control" id="fechaInicial6" name="fechaInicial6">
                             <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th">

                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                        <label>Fecha Final</label>
                        <div class="input-group date" data-provide="datepicker">
                         <input type="text" class="form-control" id="fechaFinal6" name="fechaFinal6">
                         <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th">

                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   <select name="local6" id="local6" class="form-control" autocomplete="off">
                    <?php
                    if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_6">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
                           </div>
                         </fieldset>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>


               <script>
                 $(function(){
                  $('#send_4').click(function(){
                   if($('#fechaInicial4').val() != '' && $('#fechaFinal4').val() != ''){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_4.php?fechaInicial4='+$('#fechaInicial4').val()+'&fechaFinal4='+$('#fechaFinal4').val()+'&local4='+$('#local4').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                  $('#send_5').click(function(){
                   if($('#fechaInicial5').val() != '' && $('#fechaFinal5').val() != ''){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_5.php?fechaInicial5='+$('#fechaInicial5').val()+'&fechaFinal5='+$('#fechaFinal5').val()+'&local5='+$('#local5').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                  $('#send_6').click(function(){
                   if($('#fechaInicial6').val() != '' && $('#fechaFinal6').val() != ''){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_6.php?fechaInicial6='+$('#fechaInicial6').val()+'&fechaFinal6='+$('#fechaFinal6').val()+'&local6='+$('#local6').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                });

              </script>

              <div class="modal fade bs-reporte-actas-observadas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
               <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                 <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel">Reportes de Actas Observadas</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                     <label>Fecha Inicial</label>
                     <div class="input-group date" data-provide="datepicker">
                      <input type="text" class="form-control" id="fechaInicial7" name="fechaInicial7" >
                      <div class="input-group-addon">
                       <span class="glyphicon glyphicon-th">

                       </span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label>Fecha Final</label>
                 <div class="input-group date" data-provide="datepicker">
                  <input type="text" class="form-control" id="fechaFinal7" name="fechaFinal7">
                  <div class="input-group-addon">
                   <span class="glyphicon glyphicon-th">

                   </span>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
             <fieldset class="scheduler-border">
              <legend  class="scheduler-border" >Escenarios</legend>
              <div class="col-md-12">
               <div class="form-group">
                <div class="checkbox checkbox-inline">
                 <input type="checkbox" id="inlineCheckbox1" value="0">
                 <label for="inlineCheckbox1"> Chata </label>
               </div>
               <div class="checkbox checkbox checkbox-inline">
                 <input type="checkbox" id="inlineCheckbox2" value="1" >
                 <label for="inlineCheckbox2"> Tolva </label>
               </div>
               <div class="checkbox checkbox-inline">
                 <input type="checkbox" id="inlineCheckbox3" value="2">
                 <label for="inlineCheckbox3"> Muestreo </label>
               </div>
             </div>
           </div>
         </fieldset>
       </div>
     </div>
     <div class="col-md-3">
      <select name="local7" id="local7" class="form-control" autocomplete="off">
       <?php
       if($oUser->localID != '0'){
        $item= CmsParameterLang::getItem($oUser->localID, 1); 
        echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
        echo ">".$item->parameterName."</option>";
      }else{
       echo "<option value=\"0\">Seleccione su local</option>";      
       $list= CmsParameterLang::getList(3, 1); 
       foreach ($list as $obj) {
         echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
         echo ">".$obj->parameterName."</option>";
       }
     }   
     ?>   
   </select>
 </div>
 <div class="col-md-3">
   <label></label>
   <div class="btn btn-primary btn-block" name="btnCrear" id="send_7">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
 </div>
</div>
</div>
</div>
</div>
</div>


<script>
 $(function(){
  $('#send_7').click(function(){
   var chata,tolva,muestreo;
   if( $('#inlineCheckbox1').is(':checked') ) { chata = true; }else{ chata = false;}
   if( $('#inlineCheckbox2').is(':checked') ) { tolva = true; }else{ tolva = false;}
   if( $('#inlineCheckbox3').is(':checked') ) { muestreo = true; }else{ muestreo = false;}
   if($('#fechaInicial7').val() != '' && $('#fechaFinal7').val() != ''){
    location.href = '<?php echo $URL_ROOT;?>ajax/export_7.php?fechaInicial7='+$('#fechaInicial7').val()+'&fechaFinal7='+$('#fechaFinal7').val()+'&local7='+$('#local7').val()+'&chata='+chata+'&tolva='+tolva+'&muestreo='+muestreo;
  }
  else{
    alertify.error('Por favor ingrese todos los datos');
  }
});
});

</script>

<div class="modal fade bs-facturacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">Facturación</h4>
  </div>
  <div class="modal-body">
    <div class="row">
     <div class="col-md-6">
      <div class="form-group">
       <label>Fecha Inicial</label>
       <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control" id="fechaInicial8" name="fecha">
        <div class="input-group-addon">
         <span class="glyphicon glyphicon-th">

         </span>
       </div>
     </div>
   </div>
 </div>
 <div class="col-md-6">
  <div class="form-group">
   <label>Fecha Final</label>
   <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control" id="fechaFinal8" name="fecha">
    <div class="input-group-addon">
     <span class="glyphicon glyphicon-th">

     </span>
   </div>
 </div>
</div>
</div>
<div class="col-md-3">
  <div class="form-group">
   <label>Planta</label>
   <select name="planta" id="planta" class="form-control" autocomplete="off">
    <option value="0">Seleccione su planta</option> 
    <?php
                                    $list= CrmPlanta::getList(); //Observaciones Inusuales
                                    foreach ($list as $obj) {
                                    	echo "<option value=\"".$obj->plantaID."\"";
                                    	echo ">".$obj->nombrePlanta."</option>";
                                    }
                                    ?> 
                                  </select>
                                </div>
                              </div>    
                              <div class="col-md-3">
                               <label></label>
                               <select name="local8" id="local8" class="form-control" autocomplete="off">
                                <?php
                                if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_8">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>

                 <script>
                   $(function(){
                    $('#send_8').click(function(){
                     if($('#fechaInicial8').val() != '' && $('#fechaFinal8').val() != ''){
                      location.href = '<?php echo $URL_ROOT;?>ajax/export_8.php?fechaInicial8='+$('#fechaInicial8').val()+'&fechaFinal8='+$('#fechaFinal8').val()+'&local8='+$('#local8').val()+'&planta='+$('#planta').val();
                    }
                    else{
                      alertify.error('Por favor ingrese todos los datos');
                    }
                  });
                  });

                </script>



                <div class="modal fade bs-reporte-chd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                 <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content" id="modal-frame">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Reportes CHD</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                     <fieldset class="scheduler-border">
                      <legend  class="scheduler-border" >Generación y Salida de Residuos y Descartes en Plantas de Consumo Humano Directo</legend>
                      <div class="col-md-6">
                       <div class="form-group">
                        <label>Fecha Inicio</label>
                        <div class="input-group date" data-provide="datepicker">
                         <input type="text" class="form-control" id="fechaInicioCHD2" name="fechaInicioCHD2">
                         <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th">

                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                    <label>Fecha Final</label>
                    <div class="input-group date" data-provide="datepicker">
                     <input type="text" class="form-control" id="fechaFinalCHD2" name="fechaFinalCHD2">
                     <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th">

                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
               <select name="localCHD2" id="localCHD2" class="form-control" autocomplete="off">
                <?php
                if($oUser->localID != '0'){
                  $item= CmsParameterLang::getItem($oUser->localID, 1);
                  echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                  echo ">".$item->parameterName."</option>";
                }else{
                 echo "<option value=\"0\">Seleccione su local</option>";  
                 $list= CmsParameterLang::getList(3, 1); 
                 foreach ($list as $obj) {
                   echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                   echo ">".$obj->parameterName."</option>";
                 }
               }   
               ?>   
             </select>
           </div>
           <div class="col-md-4 col-md-offset-4">
             <label></label>
             <a class="btn btn-primary btn-block" name="btnCrear" id="send_CHD_2">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
           </div>
         </fieldset>
       </div>
       <div class="row">
         <fieldset class="scheduler-border">
          <legend  class="scheduler-border" >Plantas de Reaprovechamiento y/o Harina Residual</legend>
          <div class="col-md-6">
           <div class="form-group">
            <label>Fecha Inicio</label>
            <div class="input-group date" data-provide="datepicker">
             <input type="text" class="form-control" id="fechaInicioCHD3" name="fechaInicioCHD3">
             <div class="input-group-addon">
              <span class="glyphicon glyphicon-th">

              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
       <div class="form-group">
        <label>Fecha Final</label>
        <div class="input-group date" data-provide="datepicker">
         <input type="text" class="form-control" id="fechaFinalCHD3" name="fechaFinalCHD3">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-th">

          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
   <select name="localCHD3" id="localCHD3" class="form-control" autocomplete="off">
    <?php
    if($oUser->localID != '0'){
      $item= CmsParameterLang::getItem($oUser->localID, 1); 
      echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
      echo ">".$item->parameterName."</option>";
    }else{
     echo "<option value=\"0\">Seleccione su local</option>";  
     $list= CmsParameterLang::getList(3, 1); 
     foreach ($list as $obj) {
       echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
       echo ">".$obj->parameterName."</option>";
     }
   }   
   ?>   
 </select>
</div>
<div class="col-md-4 col-md-offset-4">
 <label></label>
 <a class="btn btn-primary btn-block" name="btnCrear" id="send_CHD_3">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
</div>
</fieldset>
</div>
<div class="row">
 <fieldset class="scheduler-border">
  <legend  class="scheduler-border" >Reporte de Ocurrencias</legend>
  <div class="col-md-6">
   <div class="form-group">
    <label>Fecha Inicio</label>
    <div class="input-group date" data-provide="datepicker">
     <input type="text" class="form-control" id="fechaInicioCHD4" name="fechaInicioCHD4">
     <div class="input-group-addon">
      <span class="glyphicon glyphicon-th">

      </span>
    </div>
  </div>
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  <label>Fecha Final</label>
  <div class="input-group date" data-provide="datepicker">
   <input type="text" class="form-control" id="fechaFinalCHD4" name="fechaFinalCHD4">
   <div class="input-group-addon">
    <span class="glyphicon glyphicon-th">

    </span>
  </div>
</div>
</div>
</div>
<div class="col-md-4">
 <select name="localCHD4" id="localCHD4" class="form-control" autocomplete="off">
  <?php
  if($oUser->localID != '0'){
    $item= CmsParameterLang::getItem($oUser->localID, 1); 
    echo "<option value=\"".$item->parameterID."\"";
    echo ">".$item->parameterName."</option>";
  }else{
   echo "<option value=\"0\">Seleccione su local</option>";  
   $list= CmsParameterLang::getList(3, 1); 
   foreach ($list as $obj) {
     echo "<option value=\"".$obj->parameterID."\"";
     echo ">".$obj->parameterName."</option>";
   }
 }   
 ?>   
</select>
</div>
<div class="col-md-4 col-md-offset-4">
 <label></label>
 <a class="btn btn-primary btn-block" name="btnCrear" id="send_CHD_4">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
</div>
</fieldset>
</div>
</div>
</div>
</div>
</div>

<script>
 $(function(){

  $('#send_CHD_2').click(function(){
   if($('#fechaInicioCHD2').val() != '' && $('#fechaFinalCHD2').val() != '' ){
    location.href = '<?php echo $URL_ROOT;?>ajax/export_2_CHD.php?fechaInicioCHD2='+$('#fechaInicioCHD2').val()+'&fechaFinalCHD2='+$('#fechaFinalCHD2').val()+'&local2='+$('#localCHD2').val();
  }
  else{
    alertify.error('Por favor ingrese todos los datos');
  }
});
  $('#send_CHD_3').click(function(){
   if($('#fechaInicioCHD3').val() != '' && $('#fechaFinalCHD3').val() != '' ){
    location.href = '<?php echo $URL_ROOT;?>ajax/export_3_CHD.php?fechaInicioCHD3='+$('#fechaInicioCHD3').val()+'&fechaFinalCHD3='+$('#fechaFinalCHD3').val()+'&local3='+$('#localCHD3').val();
  }
  else{
    alertify.error('Por favor ingrese todos los datos');
  }
});
  $('#send_CHD_4').click(function(){
   if($('#fechaInicioCHD4').val() != '' && $('#fechaFinalCHD4').val() != '' ){
    location.href = '<?php echo $URL_ROOT;?>ajax/export_4_CHD.php?fechaInicioCHD4='+$('#fechaInicioCHD4').val()+'&fechaFinalCHD4='+$('#fechaFinalCHD4').val()+'&local4='+$('#localCHD4').val();
  }
  else{
    alertify.error('Por favor ingrese todos los datos');
  }
});

});
</script>

<div class="modal fade bs-otros-chd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content" id="modal-frame">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">Otros Reportes CHD</h4>
  </div>
  <div class="modal-body">
    <div class="row">
     <fieldset class="scheduler-border">
      <legend  class="scheduler-border" >Facturación</legend>
      <div class="col-md-6">
       <div class="form-group">
        <label>Fecha Inicio</label>
        <div class="input-group date" data-provide="datepicker">
         <input type="text" class="form-control" id="fechaInicioCHD5" name="fechaInicioCHD5">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-th">

          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
   <div class="form-group">
    <label>Fecha Final</label>
    <div class="input-group date" data-provide="datepicker">
     <input type="text" class="form-control" id="fechaFinalCHD5" name="fechaFinalCHD5">
     <div class="input-group-addon">
      <span class="glyphicon glyphicon-th"></span>
    </div>
  </div>
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label>Planta</label>
  <select name="planta5" id="planta5" class="form-control" autocomplete="off">
   <option value="0">Seleccione su planta</option> 
   <?php $list= CrmPlantaChd::getListAgrupado(); foreach ($list as $obj) {echo "<option value=\"".$obj->nombrePlanta."\""; echo ">".$obj->nombrePlanta."</option>";} ?> 
 </select>
</div>
</div>    
<div class="col-md-3">
 <label>&nbsp;</label>
 <select name="localCHD5" id="localCHD5" class="form-control" autocomplete="off">
  <?php
  if($oUser->localID != '0'){
    $item= CmsParameterLang::getItem($oUser->localID, 1); 
    echo "<option value=\"".$item->parameterID."\"";
    echo ">".$item->parameterName."</option>";
  }else{
   echo "<option value=\"0\">Seleccione su local</option>";  
   $list= CmsParameterLang::getList(3, 1);
   foreach ($list as $obj) {
     echo "<option value=\"".$obj->parameterID."\"";
     echo ">".$obj->parameterName."</option>";
   }
 }   
 ?>   
</select>
</div>
<div class="col-md-4 col-md-offset-1">
 <label></label>
 <a class="btn btn-primary btn-block" name="btnCrear" id="send_CHD_5">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
</div>
</fieldset>
</div>


</div>
</div>
</div>
</div>

<script>
 $(function(){
  $('#send_CHD_5').click(function(){
   if($('#fechaInicioCHD5').val() != '' && $('#fechaFinalCHD5').val() != '' ){
    location.href = '<?php echo $URL_ROOT;?>ajax/export_5_CHD.php?fechaInicialCHD5='+$('#fechaInicioCHD5').val()+'&fechaFinalCHD5='+$('#fechaFinalCHD5').val()+'&local5='+$('#localCHD5').val()+'&planta5='+$('#planta5').val();
    //console.log('<?php echo $URL_ROOT;?>ajax/export_5_CHD.php?fechaInicialCHD5='+$('#fechaInicioCHD5').val()+'&fechaFinalCHD5='+$('#fechaFinalCHD5').val()+'&local5='+$('#localCHD5').val()+'&planta='+$('#planta').val());
  }
  else{
    alertify.error('Por favor ingrese todos los datos');
  }
});
});
</script>

<div class="modal fade bs-control-actas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content" id="modal-frame">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">Control de Actas por Planta</h4>
  </div>
  <div class="modal-body">
    <div class="row">
     <fieldset class="scheduler-border">
      <legend  class="scheduler-border" >Control</legend>
      <div class="col-md-6">
       <div class="form-group">
        <label>Fecha Inicio</label>
        <div class="input-group date" data-provide="datepicker">
         <input type="text" class="form-control" id="fechaInicioCHD6" name="fechaInicioCHD6">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-th">

          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
   <div class="form-group">
    <label>Fecha Final</label>
    <div class="input-group date" data-provide="datepicker">
     <input type="text" class="form-control" id="fechaFinalCHD6" name="fechaFinalCHD6">
     <div class="input-group-addon">
      <span class="glyphicon glyphicon-th">

      </span>
    </div>
  </div>
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label>Planta</label>
  <select name="planta" id="planta" class="form-control" autocomplete="off">
   <option value="0">Seleccione su planta</option> 
   <?php
                                    $list= CrmPlanta::getList(); //Observaciones Inusuales
                                    foreach ($list as $obj) {
                                    	echo "<option value=\"".$obj->plantaID."\"";
                                    	echo ">".$obj->nombrePlanta."</option>";
                                    }
                                    ?> 
                                  </select>
                                </div>
                              </div>    
                              <div class="col-md-3">
                               <label>&nbsp;</label>
                               <select name="localCHD6" id="localCHD6" class="form-control" autocomplete="off">
                                <?php
                                if($oUser->localID != '0'){
                                    $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                                    echo "<option value=\"".$item->parameterID."\"";
                                    // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                    echo ">".$item->parameterName."</option>";
                                  }else{
                                   echo "<option value=\"0\">Seleccione su local</option>";  
                                  $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                                  foreach ($list as $obj) {
                                  	echo "<option value=\"".$obj->parameterID."\"";
                                            // if($chi != NUll){if($obj->parameterID==$chi->localID) echo " selected";}
                                  	echo ">".$obj->parameterName."</option>";
                                  }
                                }   
                                ?>   
                              </select>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                             <label></label>
                             <a class="btn btn-primary btn-block" name="btnCrear" id="send_CHD_6">Generar Reporte&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
                           </div>
                         </fieldset>
                       </div>


                     </div>
                   </div>
                 </div>
               </div>

               <script>
                 $(function(){
                  $('#send_CHD_6').click(function(){
                   if($('#fechaInicioCHD6').val() != '' && $('#fechaFinalCHD6').val() != '' ){
                    location.href = '<?php echo $URL_ROOT;?>ajax/export_6_CHD.php?fechaInicialCHD6='+$('#fechaInicialCHD6').val()+'&fechaFinalCHD6='+$('#fechaFinalCHD6').val()+'&local6='+$('#localCHD6').val()+'&planta='+$('#plantaCHD').val();
                  }
                  else{
                    alertify.error('Por favor ingrese todos los datos');
                  }
                });
                });
              </script>