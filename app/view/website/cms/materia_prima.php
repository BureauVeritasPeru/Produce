<?php
$action  = OWASP::RequestString('action');

if($action == 'insert'){
	$cmd = 'insert';
	$materia_prima= NULL;
	$planta = NULL;
	$chd = NULL;
}else{
	$cmd = 'update';
	$ID = OWASP::RequestString('chdID');
	$chd = CrmChd::getItem($ID);
	$materia_prima = CrmMateriaPrima::getItemCHD($ID);
	if($materia_prima->plantaID != NULL){
		$planta = CrmPlantaChd::getItem($materia_prima->plantaID);
	}
}

?>
<script>
	$(function() {
		$(".js-example-basic-single").select2();
		var timepicker = new TimePicker(['horaIngreso','horaTermino'], {
		  theme: 'dark', // or 'blue-grey'
		  lang: 'pt' // 'en', 'pt' for now
		});
		timepicker.on('change', function(evt){
			console.info(evt);

			var value = (evt.hour || '00') + ':' + (evt.minute || '00');
			evt.element.value = value;
		});

		$( "#codigoPlanta" ).change(function() {
			var dol = $("#codigoPlanta").val();
			$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_planta_chd.php?cod='+ dol, function(data) {
				if(data.retval==1){
					$('#nombrePlanta').val(data.nombre);
					$('#localidadPlanta').val(data.localidad);
				}else{
					alertify.error(data.message);
				}
			});
		});
	// Edicion de Numero de Acta con el codigo de Planta
	$("#numeroActaMateria").keydown(function(e) {
		if ( event.key == "Tab" || event.which == 13 ) {
			var val = $("#numeroActaMateria").val();
			var planta = $("#codigoPlanta").val();
			var acta;
			if(planta != ""){
				$("#numeroActaMateria").val(planta + "-" + formatted_string('000000',val,'l'));
			}else{
				$("#numeroActaMateria").val();
			}
		}
	});
	// Edicion de Numero de Acta con el codigo de Planta
	$("#nroActaSensorial").keydown(function(e) {
		if ( event.key == "Tab" || event.which == 13 ) {
			var val = $("#nroActaSensorial").val();
			var planta = $("#codigoPlanta").val();
			var acta;
			if(planta != ""){
				$("#nroActaSensorial").val(planta + "-" + formatted_string('000000',val,'l'));
			}else{
				$("#nroActaSensorial").val();
			}
		}
	});

	// Edicion de Numero de Acta con el codigo de Planta
	$("#nombreProcedencia").keydown(function(e) {
		if ( event.key == "Tab" || event.which == 13 ) {
			var val = $("#nombreProcedencia").text();
			$('#destinoProcedencia').val(val);
		}
	});
	// Edicion de Numero de Acta con el codigo de Planta
	$("#nombreProcedencia").change(function() {
		var val = $("#nombreProcedencia").text();
		$('#destinoProcedencia').val(val);
	});

});


	function formatted_string(pad, user_str, pad_pos)
	{
		if (typeof user_str === 'undefined') 
			return pad;
		if (pad_pos == 'l'){
			return (pad + user_str).slice(-pad.length);
		}
		else{
			return (user_str + pad).substring(0, pad.length);
		}
	}

</script>
<section class="content">
	<form name="form_materia_prima" id="form_materia_prima" > 
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Materia Prima</h2></div>
		</div>
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Codigo de Planta</label>
					<select class="js-example-basic-single form-control" name="codigoPlanta" id="codigoPlanta" tabindex="1">
						<option value="">SELECCIONE SU PLANTA</option> 
						<?php
								$list= CrmPlantaChd::getListxTipo(1,$oUser->localID); //Observaciones Inusuales
								foreach ($list as $obj) {
									echo "<option value=\"".$obj->codigoPlanta."\"";
									if($planta != NUll){if($obj->codigoPlanta==$planta->codigoPlanta) echo " selected";}
									echo ">".$obj->codigoPlanta.' - '.$obj->nombrePlanta."</option>";
								}
								?>   
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Nombre de la Planta</label>
							<input name="nombrePlanta" id="nombrePlanta" type="text" class="form-control"value="<?php if($materia_prima != NUll){ echo $materia_prima->nombrePlanta; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Localidad</label>
							<input name="localidadPlanta" id="localidadPlanta" type="text" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->localidadPlanta; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Número de Acta de Materia </label>
							<input name="numeroActaMateria" id="numeroActaMateria" type="text" tabindex="2" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->numeroActaMateria; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Fecha de Ingreso </label>
							<div class="input-group date" data-provide="datepicker">
								<input type="text" class="form-control" id="fechaIngreso" name="fechaIngreso" tabindex="3" value="<?php if($materia_prima != NUll){ echo  str_replace('00:00:00','',$materia_prima->fechaIngreso); } ?>" >
								<div class="input-group-addon ">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Hora de Ingreso </label>
							<input name="horaIngreso" id="horaIngreso"  class="form-control" tabindex="4" value="<?php if($materia_prima != NUll){ echo $materia_prima->horaIngreso; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Fecha de Termino </label>
							<div class="input-group date" data-provide="datepicker">
								<input type="text" class="form-control" id="fechaTermino" name="fechaTermino"  tabindex="5" value="<?php if($materia_prima != NUll){ echo  str_replace('00:00:00','',$materia_prima->fechaTermino); } ?>" >
								<div class="input-group-addon ">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Hora de Termino </label>
							<input name="horaTermino" id="horaTermino"  class="form-control" tabindex="6" value="<?php if($materia_prima != NUll){ echo $materia_prima->horaTermino; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Codificación de Ubicación Física de Acta (Caja) </label>
							<input name="codificacionUbicacion" id="codificacionUbicacion" type="text" tabindex="7" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->codificacionUbicacion; } ?>"  maxlength="255" autocomplete="off">	
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tipo de Unidad de Transporte</label>
							<select name="tipoUnidad" id="tipoUnidad" class="form-control" tabindex="8" autocomplete="off">
								<option value="0">Seleccione su tipo de unidad</option> 
								<?php
								$list= CmsParameterLang::getList(7, 1);
								foreach ($list as $obj) {
									echo "<option value=\"".$obj->parameterID."\"";
									if($materia_prima != NULL){if($obj->parameterID==$materia_prima->tipoUnidad) echo " selected";}
									echo ">".$obj->parameterName."</option>";
								}
								?>   
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Placa de la Unidad de Transporte</label>
							<input name="placaUnidadTransporte" id="placaUnidadTransporte" type="text"  tabindex="9" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->placaUnidadTransporte; } ?>"  maxlength="255" autocomplete="off">	
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>% No Apto </label>
							<input name="porcNoApto" id="porcNoApto" type="text" class="form-control" tabindex="10" value="<?php if($materia_prima != NUll){ echo $materia_prima->porcNoApto; } ?>"  maxlength="255" autocomplete="off">	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Nro de Acta Sensorial </label>
							<input name="nroActaSensorial" id="nroActaSensorial" type="text" class="form-control" tabindex="11" value="<?php if($materia_prima != NUll){ echo $materia_prima->nroActaSensorial; } ?>"  maxlength="255" autocomplete="off">	
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tipo de Procedencia</label>
							<select name="tipoProcedencia" id="tipoProcedencia" class="form-control" autocomplete="off" tabindex="12">
								<option value="0">Seleccione su tipo de procedencia</option> 
								<?php
				          $list= CmsParameterLang::getList(8, 1); //Observacion0es Inusuales
				          foreach ($list as $obj) {
				          	echo "<option value=\"".$obj->parameterID."\"";
				          	if($materia_prima != NULL){if($obj->parameterID==$materia_prima->tipoProcedencia) echo " selected";}
				          	echo ">".$obj->parameterName."</option>";
				          }
				          ?>   
				      </select>
				  </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Nombre de la Procedencia</label>
						<select name="nombreProcedencia" id="nombreProcedencia" autocomplete="off" tabindex="13" value="<?php if($materia_prima != NUll){ echo $materia_prima->nombreProcedencia; } ?>">
							<?php
			          $list= CmsParameterLang::getList(9, 1); //Observacion0es Inusuales
			          if($materia_prima == NUll){
			          	echo '<option value="0">Seleccione su nombre de procedencia</option>';
			          	foreach ($list as $obj) {
			          		echo "<option value=\"".$obj->parameterID."\"";
			          		if($materia_prima != NULL){if($obj->parameterID==$materia_prima->nombreProcedencia) echo " selected";}
			          		echo ">".$obj->parameterName."</option>";
			          	}
			          }else{
			          	$valor = '';
			          	$list= CmsParameterLang::getList(9, 1); //Observacion0es Inusuales
			          	foreach ($list as $obj) {
			          		if($obj->parameterID==$materia_prima->nombreProcedencia){
			          			$valor = '<option value="'.$obj->parameterID.'" selected>'.$obj->parameterName.'</option>';
			          			break;
			          		}else{ 
			          			$valor ='<option value="'.$materia_prima->nombreProcedencia.'" selected>'.$materia_prima->nombreProcedencia.'</option>';
			          		}
			          	}
			          	echo $valor;
			          	foreach ($list as $obj) {
			          		echo "<option value=\"".$obj->parameterID."\"";
			          		echo ">".$obj->parameterName."</option>";
			          	}
			          }
			          ?>   
			      </select>
			      <script type="text/javascript">
			      	$(function(){
			      		$('#nombreProcedencia').selectize({
			      			create: true,
			      			sortField: 'text'
			      		});	
			      	});
			      </script>
			  </div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>RUC y/o Matricula </label>
					<input name="rucMatricula" id="rucMatricula" type="text" class="form-control" tabindex="14" value="<?php if($materia_prima != NUll){ echo $materia_prima->rucMatricula; } ?>"  maxlength="255" autocomplete="off">	
				</div>
			</div>
		</div>

		<div class="row">
			<fieldset class="scheduler-border">
				<legend  class="scheduler-border" >Para Reporte de Cámara y/o Facturación</legend>
				<div class="col-md-12"> 
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Especie 1</label>
									<select name="especie1" id="especie1" class="form-control" tabindex="15"  autocomplete="off">
										<option value="0">Seleccione su Especie</option> 
										<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
										if($materia_prima != NULL){if($obj->parameterID==$materia_prima->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
										?>   
									</select>
								</div>
							</div> 
							<div class="col-md-4">
								<label>TM 1 </label>
								<input name="tm1" id="tm1" type="text" class="form-control" tabindex="16" value="<?php if($materia_prima != NUll){ echo $materia_prima->tm1; } ?>"  maxlength="255" autocomplete="off">
							</div>
							<div class="col-md-4">
								<label> Destino / Procedencia </label>
								<input name="destinoProcedencia" id="destinoProcedencia" type="text" tabindex="17" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->destinoProcedencia; } ?>"  maxlength="255" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Especie 2</label>
									<select name="especie2" id="especie2" class="form-control" tabindex="18" autocomplete="off">
										<option value="0">Seleccione su Especie</option> 
										<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
										if($materia_prima != NULL){if($obj->parameterID==$materia_prima->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
										?>   
									</select>
								</div>
							</div> 
							<div class="col-md-4">
								<label>TM 2 </label>
								<input name="tm2" id="tm2" type="text" class="form-control" tabindex="19" value="<?php if($materia_prima != NUll){ echo $materia_prima->tm2; } ?>"  maxlength="255" autocomplete="off">
							</div>
							<div class="col-md-4">
								<label> TM Materia Prima (fresco) </label>
								<input name="tmMateriaPrima" id="tmMateriaPrima" type="text" tabindex="20" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->tmMateriaPrima; } ?>"  maxlength="255" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Especie 3</label>
									<select name="especie3" id="especie3" class="form-control" tabindex="21" autocomplete="off">
										<option value="0">Seleccione su Especie</option> 
										<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
										if($materia_prima != NULL){if($obj->parameterID==$materia_prima->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
										?>   
									</select>
								</div>
							</div> 
							<div class="col-md-4">
								<label>TM 3</label>
								<input name="tm3" id="tm3" tabindex="22" type="text" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->tm3; } ?>"  maxlength="255" autocomplete="off">
							</div>
							<div class="col-md-4">
								<label> Número de Guia </label>
								<input name="numeroGuia" id="numeroGuia" tabindex="23" type="text" class="form-control" value="<?php if($materia_prima != NUll){ echo $materia_prima->numeroGuia; } ?>"  maxlength="255" autocomplete="off">
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
		<script type="text/javascript">
			$(function(){
				$( "#tm1" ).change(function() {
					var index1 = $("#tm1").val();
					var index2 = $("#tm2").val();
					var index3 = $("#tm3").val();
					$('#tmMateriaPrima').val( parseFloat(index1)+ parseFloat(index2)+ parseFloat(index3));
				});
				$( "#tm2" ).change(function() {
					var index1 = $("#tm1").val();
					var index2 = $("#tm2").val();
					var index3 = $("#tm3").val();
					$('#tmMateriaPrima').val( parseFloat(index1)+ parseFloat(index2)+ parseFloat(index3));
				});
				$( "#tm3" ).change(function() {
					var index1 = $("#tm1").val();
					var index2 = $("#tm2").val();
					var index3 = $("#tm3").val();
					$('#tmMateriaPrima').val( parseFloat(index1)+ parseFloat(index2)+ parseFloat(index3));
				});
			});
		</script>
		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label>Local del CHD</label>
					<select name="localID" id="localID" class="form-control" tabindex="24" autocomplete="off">
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
                              	if($chd != NUll){if($obj->parameterID==$chd->localID) echo " selected";}
                              	echo ">".$obj->parameterName."</option>";
                              }
                          }
                          ?>   
                      </select>
                  </div>
              </div>
              <input type="hidden" value="<?php echo $oUser->userID; ?>" name="userID" id="userID" > 
              <div class="col-md-3">
              	<label></label>
              	<div class="btn btn-info btn-block" name="btnCrear" id="back_materia_prima"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
              </div>
              <div class="col-md-3">
              	<label></label>
              	<div class="btn btn-primary btn-block" name="btnCrear" id="send_mp" tabindex="25" >Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
              </div>
          </div>

      </form>

      <script type="text/javascript">
      	$(function(){
      		prepareForm('#form_materia_prima');
      		$('#send_mp').click(function(){
      			<?php if($oUser->level != 0){ ?>
      				<?php if($cmd!='update'){ ?>
      					$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_acta_materia.php?cmd=insert&acta='+ $("#numeroActaMateria").val(), function(data) {
      						if(data.retval==1){
      						}else{
      							$("#numeroActaMateria").focus();
      							alertify.error(data.message);
      							return false; 
      						}
      					});
      					<?php }else{ ?>
      						$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_acta_materia.php?cmd=update&ID=<?php echo $ID;?>&acta='+ $("#numeroActaMateria").val(), function(data) {
      							if(data.retval==1){

      							}else{
      								$("#numeroActaMateria").focus();
      								alertify.error(data.message);
      								return false; 
      							}
      						});

      						<?php } ?>


      						if($('#localID').val() == '0'){alertify.error('Seleccione porfavor el local.'); return false;  }

      						bootbox.confirm({
      							title: "Produce - Bureau Veritas",
      							message: "Estas seguro de guardar los datos?",
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
      									if (!isValidate('#form_materia_prima')){ 
      										alertify.error('Porfavor ingrese datos validos.'); 
      										return false; 
      									}
      									var fields3=$('#form_materia_prima').serialize();
      									<?php if($cmd!='update'){ ?>
      										$.getJSON('<?php echo $URL_ROOT;?>ajax/form_materia_prima.php?cmd=insert&'+fields3, function(data) {
      											if(data.retval==1){
      												alertify.success(data.message);
      												$('.sombra').show();
      												setTimeout(function(){
      													location.href='<?php echo $URL_ROOT;?>chd/embarcacion.html?action=insert&ID='+data.chdID;
      												}, 100);
      											}else{
      												alertify.error(data.message);
      											}
      										});
      										<?php }else{ ?>
      											$.getJSON('<?php echo $URL_ROOT;?>ajax/form_materia_prima.php?cmd=update&ID=<?php echo $ID;?>&'+fields3, function(data) {
      												if(data.retval==1){
      													alertify.success(data.message);
      													$('.sombra').show();
      													setTimeout(function(){
      														location.href='<?php echo $URL_ROOT;?>chd/embarcacion.html?action=update&ID='+data.chdID;
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
      							location.href='<?php echo $URL_ROOT;?>chd/embarcacion.html?action=update&ID=<?php echo $ID; ?>';

      							<?php } ?>
      						});
      	});

      	$('#back_materia_prima').click(function(){
      		location.href='<?php echo $URL_ROOT;?>chd.html';
      	});
      </script>




  </section>