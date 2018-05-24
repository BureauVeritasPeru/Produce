<?php
$action  = OWASP::RequestString('action');

if($action == 'insert'){
	$cmd = 'insert';
	$muelle= NULL;
	$chd = NULL;
	$embarcacion = NULL;
}else{
	$cmd = 'update';
	$ID = OWASP::RequestString('chdID');
	$chd = CrmChd::getItem($ID);
	$muelle = CrmMuelle::getItemCHD($ID);
	if($muelle->embarcacionID != NULL){
		$embarcacion = CrmEmbarcacion::getItem($muelle->embarcacionID);
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

	// Codigo para que con enter o tab funcione la busqueda interna de la planta
	$("#matriculaEmbarcacion").keydown(function(e) {
		if ( event.key == "Tab" || event.which == 13 ) {
			var dol = $("#matriculaEmbarcacion").val();
			$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_embarcacion_2.php?mat='+ dol, function(data) {
				if(data.retval==1){
					$('#nombreEmbarcacion').val(data.nombre);
					$('#matriculaEmbarcacion').val(data.matricula);
					$('#tipoEmbarcacion').val(data.regimen);
					$('#armador').val(data.armador);
					$('#estadoPermiso').val(data.permisoPesca);
				}else{
					alertify.error(data.message);
				}
			});
		}
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
	<form name="form_muelle" id="form_muelle" > 
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Muelle </h2></div>
		</div>
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Matrícula</label>
					<input name="matriculaEmbarcacion" id="matriculaEmbarcacion" type="text" class="form-control" value="<?php if($embarcacion != NULL){ echo $embarcacion->matriculaEmbarcacion; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Embarcación</label>
					<input name="nombreEmbarcacion" id="nombreEmbarcacion" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->nombreEmbarcacion; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>TipoEmbarcacion</label>
					<input name="tipoEmbarcacion" id="tipoEmbarcacion" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->tipoEmbarcacion; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro RUC / DNI</label>
					<input name="nroRucDni" id="nroRucDni" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->nroRucDni; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Armador </label>
					<input name="armador" id="armador" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->armador; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Estado de Permiso</label>
					<input name="estadoPermiso" id="estadoPermiso" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->estadoPermiso; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Baliza</label>
					<input name="baliza" id="baliza" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->baliza; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Muelle / Desembarcadero </label>
					<select class="form-control" name="muelleDesembarcadero" id="muelleDesembarcadero">
						<option value="0">Seleccione el muelle</option> 
						<option value="1" <?php if($muelle != NULL){if($muelle->muelleDesembarcadero == '1'){ echo 'selected';} } ?> >MUELLE MUNICIPAL CENTENARIO</option> 
						<option value="2" <?php if($muelle != NULL){if($muelle->muelleDesembarcadero == '2'){ echo 'selected';} } ?> >MUELLE IMMSA - EX. GILDEMEISTER</option> 
						<option value="3" <?php if($muelle != NULL){if($muelle->muelleDesembarcadero == '3'){ echo 'selected';} } ?> >MUELLE VLACAR S.A.C</option> 
						<option value="4" <?php if($muelle != NULL){if($muelle->muelleDesembarcadero == '4'){ echo 'selected';} } ?> >MUELLE CRIDANI</option> 
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Region</label>
					<input name="region" id="region" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->region; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Localidad</label>
					<input name="localidad" id="localidad" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->localidad; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Especie </label>
					<select name="especie" id="especie" class="form-control" autocomplete="off">
						<option value="0">Seleccione su especie</option> 
						<?php $list= CmsParameterLang::getList(4, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\"";
						if($muelle != NULL){if($obj->parameterID==$muelle->especie) echo " selected";}
						echo ">".$obj->parameterName."</option>"; }
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Total Descargado (TM) </label>
					<input name="totalDescargado" id="totalDescargado"  class="form-control" value="<?php if($muelle != NULL){ echo $muelle->totalDescargado; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Nro. de Cubetas</label>
					<input name="nroCubetas" id="nroCubetas" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->nroCubetas; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fecha de Descarga </label>
					<div class="input-group date" data-provide="datepicker">
						<input type="text" class="form-control" id="fechaDescarga" name="fechaDescarga"  value="<?php if($muelle != NULL){ echo  str_replace('00:00:00','',$muelle->fechaDescarga); } ?>" >
						<div class="input-group-addon ">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Hora de Ingreso </label>
					<input name="horaIngreso" id="horaIngreso"  class="form-control" value="<?php if($muelle != NULL){ echo $muelle->horaIngreso; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Hora de Termino </label>
					<input name="horaTermino" id="horaTermino"  class="form-control" value="<?php if($muelle != NULL){ echo $muelle->horaTermino; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Fuente Primaria de Información</label>
					<select name="fuentePrimeraInformacion" id="fuentePrimeraInformacion" class="form-control" autocomplete="off">
						<option value="0">Seleccione su fuente de primera información</option> 
						<?php $list= CmsParameterLang::getList(18, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\"";
						if($muelle != NULL){if($obj->parameterID==$muelle->fuentePrimeraInformacion) echo " selected";}
						echo ">".$obj->parameterName."</option>"; }
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro Documento (RD)</label>
					<input name="nroDocumento" id="nroDocumento" type="text" class="form-control" value="<?php if($muelle != NULL){ echo $muelle->nroDocumento; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Fecha de Obtencion del Permiso </label>
					<div class="input-group date" data-provide="datepicker">
						<input type="text" class="form-control" id="fechaObtencionPermiso" name="fechaObtencionPermiso"  value="<?php if($muelle != NULL){ echo  str_replace('00:00:00','',$muelle->fechaObtencionPermiso); } ?>" >
						<div class="input-group-addon ">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
			</div>
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
                                // if($chi != NULL){if($obj->parameterID==$chi->localID) echo " selected";}
                                echo ">".$item->parameterName."</option>";
                            }else{
                            	echo "<option value=\"0\">Seleccione su local</option>";
                              $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
                              foreach ($list as $obj) {
                              	echo "<option value=\"".$obj->parameterID."\"";
                              	if($chd != NULL){if($obj->parameterID==$chd->localID) echo " selected";}
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
              	<div class="btn btn-info btn-block" name="btnCrear" id="back_muelle"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
              </div>
              <div class="col-md-3">
              	<label></label>
              	<div class="btn btn-primary btn-block" name="btnCrear" id="send_muelle">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
              </div>
          </div>

      </form>

      <script type="text/javascript">
      	$(function(){
      		prepareForm('#form_muelle');
      		$('#send_muelle').click(function(){

      			<?php if($oUser->level != 0){ ?>

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
      							if (!isValidate('#form_muelle')){ 
      								alertify.error('Porfavor ingrese datos validos.'); 
      								return false; 
      							}
      							var fields3=$('#form_muelle').serialize();
      							<?php if($cmd!='update'){ ?>
      								$.getJSON('<?php echo $URL_ROOT;?>ajax/form_muelle.php?cmd=insert&'+fields3, function(data) {
      									if(data.retval==1){
      										alertify.success(data.message);
      										$('.sombra').show();
      										setTimeout(function(){
      											location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_muelle.html?action=insert&ID='+data.chdID;
      										}, 100);
      									}else{
      										alertify.error(data.message);
      									}
      								});
      								<?php }else{ ?>
      									$.getJSON('<?php echo $URL_ROOT;?>ajax/form_muelle.php?cmd=update&ID=<?php echo $ID;?>&'+fields3, function(data) {
      										if(data.retval==1){
      											alertify.success(data.message);
      											$('.sombra').show();
      											setTimeout(function(){
      												location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_muelle.html?action=update&ID='+data.chdID;
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
      					location.href='<?php echo $URL_ROOT;?>chd/datos_secundarios_muelle.html?action=update&ID=<?php echo $ID; ?>';
      					<?php } ?>
      				});
      	});

      	$('#back_muelle').click(function(){
      		location.href='<?php echo $URL_ROOT;?>chd.html';
      	});
      </script>




  </section>