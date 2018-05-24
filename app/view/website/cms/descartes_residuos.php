<?php
$action  = OWASP::RequestString('action');

if($action == 'insert'){
	$cmd = 'insert';
	$descartes_residuos= NULL;
	$planta = NULL;
	$chd = NULL;
}else{
	$cmd = 'update';
	$ID = OWASP::RequestString('chdID');
	$chd = CrmChd::getItem($ID);
	$descartes_residuos = CrmDescartesResiduos::getItemCHD($ID);
	if($descartes_residuos->plantaID != NULL){
		$planta = CrmPlantaChd::getItem($descartes_residuos->plantaID);
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
			$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_planta_chd_2.php?cod='+ dol, function(data) {
				if(data.retval==1){
					$('#nombrePlanta').val(data.nombre);
					$('#regionPlanta').val(data.region);
					$('#provinciaPlanta').val(data.provincia);
					$('#localidadPlanta').val(data.localidad);
				}else{
					alertify.error(data.message);
				}
			});
		});
	// Edicion de Numero de Acta con el codigo de Planta
	$("#nroActaDR").keydown(function(e) {
		if ( event.key == "Tab" || event.which == 13 ) {
			var val = $("#nroActaDR").val();
			var planta = $("#codigoPlanta").val();
			var acta;
			if(planta != ""){
				$("#nroActaDR").val(planta + "-" + formatted_string('000000',val,'l'));
			}else{
				$("#nroActaDR").val();
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
	<form name="form_descartes_residuos" id="form_descartes_residuos" > 
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Descartes y Residuos </h2></div>
		</div>
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Codigo de Planta</label>
					<select class="js-example-basic-single form-control" name="codigoPlanta" id="codigoPlanta">
						<option value="">SELECCIONE SU PLANTA</option> 
						<?php 	$list= CrmPlantaChd::getListxTipo(2,$oUser->localID); 
						foreach ($list as $obj) { echo "<option value=\"".$obj->codigoPlanta."\"";if($planta != NUll){if($obj->codigoPlanta==$planta->codigoPlanta) echo " selected";}
						echo ">".$obj->codigoPlanta.' - '.$obj->nombrePlanta."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Planta Pesquera</label>
					<input name="nombrePlanta" id="nombrePlanta" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->nombrePlanta; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Region</label>
					<input name="regionPlanta" id="regionPlanta" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->regionPlanta; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Provincia</label>
					<input name="provinciaPlanta" id="provinciaPlanta" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->provinciaPlanta; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Localidad </label>
					<input name="localidadPlanta" id="localidadPlanta" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->localidadPlanta; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro del Acta de Descartes o Residuos</label>
					<input name="nroActaDR" id="nroActaDR" type="text" class="form-control required" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->nroActaDR; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Fecha de Ingreso </label>
					<div class="input-group date" data-provide="datepicker">
						<input type="text" class="form-control" id="fechaIngreso" name="fechaIngreso"  value="<?php if($descartes_residuos != NUll){ echo  str_replace('00:00:00','',$descartes_residuos->fechaIngreso); } ?>" >
						<div class="input-group-addon ">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Hora de Ingreso </label>
					<input name="horaIngreso" id="horaIngreso"  class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->horaIngreso; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fecha de Termino </label>
					<div class="input-group date" data-provide="datepicker">
						<input type="text" class="form-control" id="fechaTermino" name="fechaTermino"  value="<?php if($descartes_residuos != NUll){ echo  str_replace('00:00:00','',$descartes_residuos->fechaTermino); } ?>" >
						<div class="input-group-addon ">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Hora de Termino </label>
					<input name="horaTermino" id="horaTermino"  class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->horaTermino; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Tipo de Procedencia</label>
					<select name="tipoProcedencia" id="tipoProcedencia" class="form-control" autocomplete="off">
						<option value="0">Seleccione su tipo de procedencia</option> 
						<?php
				          $list= CmsParameterLang::getList(8, 1); //Observacion0es Inusuales
				          foreach ($list as $obj) {
				          	echo "<option value=\"".$obj->parameterID."\"";
				          	if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->tipoProcedencia) echo " selected";}
				          	echo ">".$obj->parameterName."</option>";
				          }
				          ?>   
				      </select>
				  </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nombre de la Procedencia</label>
						<select name="nombreProcedencia" id="nombreProcedencia" autocomplete="off" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->nombreProcedencia; } ?>">
							<?php
			          $list= CmsParameterLang::getList(9, 1); //Observacion0es Inusuales
			          if($descartes_residuos == NUll){
			          	echo '<option value="0">Seleccione su nombre de procedencia</option>';
			          	foreach ($list as $obj) {
			          		echo "<option value=\"".$obj->parameterID."\"";
			          		if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->nombreProcedencia) echo " selected";}
			          		echo ">".$obj->parameterName."</option>";
			          	}
			          }else{
			          	$valor = '';
			          	$list= CmsParameterLang::getList(9, 1); //Observacion0es Inusuales
			          	foreach ($list as $obj) {
			          		if($obj->parameterID==$descartes_residuos->nombreProcedencia){
			          			$valor = '<option value="'.$obj->parameterID.'" selected>'.$obj->parameterName.'</option>';
			          			break;
			          		}else{ 
			          			$valor ='<option value="'.$descartes_residuos->nombreProcedencia.'" selected>'.$descartes_residuos->nombreProcedencia.'</option>';
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
			      	})


			      </script>
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>RUC</label>
					<input type="text" class="form-control" id="ruc" name="ruc"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->ruc; } ?>" >
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tipo de Unidad de Transporte</label>
					<select name="tipoUnidadTransporte" id="tipoUnidadTransporte" class="form-control" autocomplete="off">
						<option value="0">Seleccione su tipo de unidad</option> 
						<?php $list= CmsParameterLang::getList(7, 1);  foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\"";
						if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->tipoUnidadTransporte) echo " selected";}
						echo ">".$obj->parameterName."</option>"; }
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Placa de Unidad de Transporte</label>
					<input type="text" class="form-control" id="placaUnidadTransporte" name="placaUnidadTransporte"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->placaUnidadTransporte; } ?>" >
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tipo de EIP </label>
					<select name="tipoEIP" id="tipoEIP" class="form-control" autocomplete="off">
						<option value="0">Seleccione su EIP</option> 
						<?php $list= CmsParameterLang::getList(12, 1);  foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\"";
						if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->tipoEIP) echo " selected";}
						echo ">".$obj->parameterName."</option>"; }
						?>   
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<?php 
					$count=0;
					$list= CmsParameterLang::getList(13,1);
					foreach($list as $obj){ $var ='';
					if($descartes_residuos != NULL){ 
						if($descartes_residuos->tipoTM == $obj->parameterID){ $var = 'checked'; }
					}
					$count++;
					echo "<label for=\"radio".$count."\">";
					echo "<input type=\"radio\" name=\"tipoTM\" id=\"tipoTM\" class=\"flat-blue tipo_tm\"  value=\"".$obj->parameterID."\" ".$var;
					echo ">&nbsp;&nbsp;&nbsp;".$obj->parameterName."</label>&nbsp;&nbsp;&nbsp;";
				}
				?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label>TM</label>
				<input type="text" class="form-control" id="tm" name="tm"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->tm; } ?>" >
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>TM No Apto</label>
				<input type="text" class="form-control" id="tmNoApto" name="tmNoApto"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->tmNoApto; } ?>" >
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>% No Apto</label>
				<input type="text" class="form-control" id="porcNoApto" name="porcNoApto"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->porcNoApto; } ?>" >
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Numero de Acta Sensorial</label>
				<input type="text" class="form-control" id="nroActaSensorial" name="nroActaSensorial"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->nroActaSensorial; } ?>" >
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Destino / Procedencia</label>
				<input type="text" class="form-control" id="destinoProcedencia" name="destinoProcedencia"  value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->destinoProcedencia; } ?>" >
			</div>
		</div>

	</div>
	<div class="row">
		<fieldset class="scheduler-border">
			<legend  class="scheduler-border" >Especie</legend>
			<div class="col-md-12"> 
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Especie 1</label>
								<select name="especie1" id="especie1" class="form-control" autocomplete="off">
									<option value="0">Seleccione su Especie</option> 
									<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
									if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->especie1) echo " selected";} echo ">".$obj->parameterName."</option>";}
									?>   
								</select>
							</div>
						</div> 
						<div class="col-md-3">
							<label>TM</label>
							<input name="tm1" id="tm1" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->tm1; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label>Guia</label>
							<input name="guia1" id="guia1" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->guia1; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label> RP </label>
							<input name="rp1" id="rp1" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->rp1; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Especie 2</label>
								<select name="especie2" id="especie2" class="form-control" autocomplete="off">
									<option value="0">Seleccione su Especie</option> 
									<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
									if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->especie2) echo " selected";} echo ">".$obj->parameterName."</option>";}
									?>   
								</select>
							</div>
						</div> 
						<div class="col-md-3">
							<label>TM</label>
							<input name="tm2" id="tm2" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->tm2; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label>Guia</label>
							<input name="guia2" id="guia2" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->guia2; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label> RP </label>
							<input name="rp2" id="rp2" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->rp2; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Especie 3</label>
								<select name="especie3" id="especie3" class="form-control" autocomplete="off">
									<option value="0">Seleccione su Especie</option> 
									<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
									if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->especie3) echo " selected";} echo ">".$obj->parameterName."</option>";}
									?>   
								</select>
							</div>
						</div> 
						<div class="col-md-3">
							<label>TM</label>
							<input name="tm3" id="tm3" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->tm3; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label>Guia</label>
							<input name="guia3" id="guia3" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->guia3; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label> RP </label>
							<input name="rp3" id="rp3" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->rp3; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Especie 4</label>
								<select name="especie4" id="especie4" class="form-control" autocomplete="off">
									<option value="0">Seleccione su Especie</option> 
									<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
									if($descartes_residuos != NULL){if($obj->parameterID==$descartes_residuos->especie4) echo " selected";} echo ">".$obj->parameterName."</option>";}
									?>   
								</select>
							</div>
						</div> 
						<div class="col-md-3">
							<label>TM</label>
							<input name="tm4" id="tm4" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->tm4; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label>Guia</label>
							<input name="guia4" id="guia4" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->guia4; } ?>"  maxlength="255" autocomplete="off">
						</div>
						<div class="col-md-3">
							<label> RP </label>
							<input name="rp4" id="rp4" type="text" class="form-control" value="<?php if($descartes_residuos != NUll){ echo $descartes_residuos->rp4; } ?>"  maxlength="255" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
		</fieldset>
	</div>

	<div class="row">

		<div class="col-md-6">
			<div class="form-group">
				<label>Local del CHD</label>
				<select name="localID" id="localID" class="form-control" autocomplete="off">
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
              	<div class="btn btn-info btn-block" name="btnCrear" id="back_descartes_residuos"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
              </div>
              <div class="col-md-3">
              	<label></label>
              	<div class="btn btn-primary btn-block" name="btnCrear" id="send_dr">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
              </div>
          </div>

      </form>

      <script type="text/javascript">
      	$(function(){
      		prepareForm('#form_descartes_residuos');
      		$('#send_dr').click(function(){
      			<?php if($oUser->level != 0){ ?>
      				<?php if($cmd!='update'){ ?>
      					$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_acta_descartes.php?cmd=insert&acta='+ $("#nroActaDR").val(), function(data) {
      						if(data.retval==1){
      						}else{
      							$("#nroActaDR").focus();
      							alertify.error(data.message);
      							return false; 
      						}
      					});
      					<?php }else{ ?>
      						$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_acta_descartes.php?cmd=update&ID=<?php echo $ID;?>&acta='+ $("#nroActaDR").val(), function(data) {
      							if(data.retval==1){
      							}else{
      								$("#nroActaDR").focus();
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
      									if (!isValidate('#form_descartes_residuos')){ 
      										alertify.error('Porfavor ingrese datos validos.'); 
      										return false; 
      									}
      									var fields3=$('#form_descartes_residuos').serialize();
      									<?php if($cmd!='update'){ ?>
      										$.getJSON('<?php echo $URL_ROOT;?>ajax/form_descartes_residuos.php?cmd=insert&'+fields3, function(data) {
      											if(data.retval==1){
      												alertify.success(data.message);
      												$('.sombra').show();
      												setTimeout(function(){
      													location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_dr.html?action=insert&ID='+data.chdID;
      												}, 100);
      											}else{
      												alertify.error(data.message);
      											}
      										});
      										<?php }else{ ?>
      											$.getJSON('<?php echo $URL_ROOT;?>ajax/form_descartes_residuos.php?cmd=update&ID=<?php echo $ID;?>&'+fields3, function(data) {
      												if(data.retval==1){
      													alertify.success(data.message);
      													$('.sombra').show();
      													setTimeout(function(){
      														location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_dr.html?action=update&ID='+data.chdID;
      													}, 100);
      												}else{S
      													alertify.error(data.message);
      												}
      											});
      											<?php } ?>
      										}
      									}
      								});

      						<?php }else{ ?>
      							location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_dr.html?action=update&ID=<?php echo $ID; ?>';

      							<?php } ?>
      						});
      	});

      	$('#back_descartes_residuos').click(function(){
      		location.href='<?php echo $URL_ROOT;?>chd.html';
      	});
      </script>




  </section>