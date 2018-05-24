<?php
$action  = OWASP::RequestString('action');
$chdID  = OWASP::RequestString('ID');

if($action == 'insert'){
	$cmd = 'insert';
	$datosDR = NULL;
	$descartes_residuos = CrmDescartesResiduos::getItemCHD($chdID);
	if($descartes_residuos->plantaID != NULL){
		$planta = CrmPlantaChd::getItem($descartes_residuos->plantaID);
	}	
	$plantaO=NULL;
	$plantaD=NULL;
	$inspector = NULL;
}else{ 
	$cmd = 'update';
	$datosDR = CrmDatosDR::getItemCHD($chdID);
	$descartes_residuos = CrmDescartesResiduos::getItemCHD($chdID);
	if($descartes_residuos->plantaID != NULL){
		$planta = CrmPlantaChd::getItem($descartes_residuos->plantaID);
	}
	if($datosDR == NULL){
		$cmd = 'insert';
		$plantaO=NULL;
		$plantaD=NULL;
		$inspector = NULL;
	}else
	{	$plantaO= new eCrmPlantaChd();
		$plantaD= new eCrmPlantaChd();
		if($datosDR->inspectorID != NULL){
			$inspector = CrmInspector::getItem($datosDR->inspectorID); 
		}  
		if($datosDR->plantaOID != NULL){
			$plantaO = CrmPlantaChd::getItem($datosDR->plantaOID);
			if($plantaO == NULL){
				$plantaO= new eCrmPlantaChd();
				$plantaO->codigoPlanta = $datosDR->plantaOID;
			}
		}
		if($datosDR->plantaDID != NULL){
			$plantaD = CrmPlantaChd::getItem($datosDR->plantaDID);
			if($plantaD == NULL){
				$plantaD= new eCrmPlantaChd();
				$plantaD->codigoPlanta = $datosDR->plantaDID;
			}
		}
	}
	
}


?>
<script>
	$(function() {

		$( "#codigoInspector" ).change(function() {
			var dol = $("#codigoInspector").val();
			$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_inspector.php?cod='+ dol, function(data) {
				if(data.retval==1){
					$('#nombreInspector').val(data.nombre);
				}else{
					alertify.error(data.message);
				}
			});
		});


		$( "#codigoPlantaO" ).change(function() {
			var dol = $("#codigoPlantaO").val();
			$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_planta_chd_2.php?cod='+ dol, function(data) {
				if(data.retval==1){
					$('#nombrePlantaO').val(data.nombre);
					$('#regionPlantaO').val(data.region);
					$('#provinciaPlantaO').val(data.provincia);
				}else{
					alertify.error(data.message);
				}
			});
		});

		$( "#codigoPlantaD" ).change(function() {
			var dol = $("#codigoPlantaD").val();
			$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_planta_chd_2.php?cod='+ dol, function(data) {
				if(data.retval==1){
					$('#nombrePlantaD').val(data.nombre);
					$('#regionPlantaD').val(data.region);
					$('#provinciaPlantaD').val(data.provincia);
				}else{
					alertify.error(data.message);
				}
			});
		});

	// Edicion de Numero de Acta con el codigo de Planta
	$("#nroParteMuestreo").keydown(function(e) {
		if ( event.key == "Tab" || event.which == 13 ) {
			var val = $("#nroParteMuestreo").val();
			var planta = '<?php echo $planta->codigoPlanta; ?>';
			if(planta != "" && val != ""){
				$("#nroParteMuestreo").val(planta + "-" + formatted_string('000000',val,'l'));
			}else{
				$("#nroParteMuestreo").val();
			}
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
	<form name="form_dr" id="form_dr" > 
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Datos Secundarios</h2></div>
		</div>
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro. Parte de Muestreo</label>
					<input name="nroParteMuestreo" id="nroParteMuestreo" type="text" class="form-control" value="<?php if($datosDR != NULL){ echo $datosDR->nroParteMuestreo; } ?>"  maxlength="255" autocomplete="off"> <!-- JS Function busqueda -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>% Juvenil</label>
					<input name="porcJuvenil" id="porcJuvenil" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->porcJuvenil; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>% Incidental</label>
					<input name="porcIncidental" id="porcIncidental" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->porcIncidental; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tipo de Procedencia</label>
					<select name="tipoProcedencia" id="tipoProcedencia" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Tipo de Procedencia</option> 
						<?php $list= CmsParameterLang::getList(14, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosDR != NULL){if($obj->parameterID==$datosDR->tipoProcedencia) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Estado de residuos</label>
					<select name="estadoResiduos" id="estadoResiduos" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Estado de Residuos</option> 
						<?php $list= CmsParameterLang::getList(15, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosDR != NULL){if($obj->parameterID==$datosDR->estadoResiduos) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tipo</label>
					<select name="tipo" id="tipo" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Tipo</option> 
						<?php $list= CmsParameterLang::getList(16, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosDR != NULL){if($obj->parameterID==$datosDR->tipo) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tipo de Envase</label>
					<select name="tipoEnvase" id="tipoEnvase" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Tipo de Envase</option> 
						<?php $list= CmsParameterLang::getList(17, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosDR != NULL){if($obj->parameterID==$datosDR->tipoEnvase) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Codigo del Inspector </label>
					<select class="js-example-basic-single form-control" name="codigoInspector" id="codigoInspector">
						<option value="">SELECCIONE SU INSPECTOR</option> 
						<?php $list= CrmInspector::getList(); foreach ($list as $obj) { echo "<option value=\"".$obj->codigoInspector."\"";
						if($inspector != NUll){if($obj->codigoInspector==$inspector->codigoInspector) echo " selected";} echo ">".$obj->codigoInspector.' - '.$obj->nombreCompletoInspector."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nombre del Inspector</label>
					<input name="nombreInspector" id="nombreInspector" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->nombreInspector; } ?>" maxlength="255" autocomplete="off">
				</div>
			</div> 
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Observaciones</label>
					<textarea name="observaciones" id="observaciones" type="text" rows="5" class="form-control" maxlength="255" autocomplete="off"><?php if($datosDR != NUll){ echo $datosDR->observaciones; } ?></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<fieldset class="scheduler-border">
				<legend  class="scheduler-border" >Planta Pesquera de Origen - Reporte Generación  y Salida DyR </legend>
				<div class="col-md-12"> 
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Codigo de Planta</label>
									<select name="codigoPlantaO" id="codigoPlantaO"  autocomplete="off" value="<?php if($plantaO != NUll){ echo $plantaO->nombrePlanta; } ?>">
										<?php
										$list= CrmPlantaChd::getListxTipo(1,$oUser->localID); 
										if($plantaO == NUll){
											echo '<option value="0">Seleccione su planta</option>';
											foreach ($list as $obj) {
												echo "<option value=\"".$obj->codigoPlanta."\"";												
												echo ">".$obj->codigoPlanta.' - '.$obj->nombrePlanta."</option>";
											}
										}else{
											$valor = '';
											$list= CrmPlantaChd::getListxTipo(1,$oUser->localID); 
											foreach ($list as $obj) {
												if($obj->codigoPlanta==$plantaO->codigoPlanta){
													$valor = '<option value="'.$obj->codigoPlanta.'" selected>'.$obj->codigoPlanta.' - '.$obj->nombrePlanta.'</option>';
													break;
												}else{ 
													$valor ='<option value="'.$plantaO->codigoPlanta.'" selected>'.$plantaO->codigoPlanta.'</option>';
												}
											}
											echo $valor;
											foreach ($list as $obj) {
												echo "<option value=\"".$obj->codigoPlanta."\"";
												echo ">".$obj->codigoPlanta.' - '.$obj->nombrePlanta."</option>";
											}
										}
										?>   
									</select>
									<script type="text/javascript">
										$(function(){
											$('#codigoPlantaO').selectize({
												create: true,
												sortField: 'text'
											});	
										});
									</script>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label>Planta Pesquera</label>
									<input name="nombrePlantaO" id="nombrePlantaO" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->nombrePlantaO; } ?>"  maxlength="255" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Region</label>
									<input name="regionPlantaO" id="regionPlantaO" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->regionPlantaO; } ?>"  maxlength="255" autocomplete="off">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label>Provincia</label>
									<input name="provinciaPlantaO" id="provinciaPlantaO" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->provinciaPlantaO; } ?>"  maxlength="255" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="row">
			<fieldset class="scheduler-border">
				<legend  class="scheduler-border" >Planta Pesquera de Destino. - Reporte Generación  y Salida DyR </legend>
				<div class="col-md-12"> 
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Codigo de Planta</label>
									<select name="codigoPlantaD" id="codigoPlantaD"  autocomplete="off" value="<?php if($plantaD != NUll){ echo $plantaD->nombrePlanta; } ?>">
										<?php
										$list= CrmPlantaChd::getListxTipo(2,$oUser->localID); 
										if($plantaO == NUll){
											echo '<option value="0">Seleccione su planta</option>';
											foreach ($list as $obj) {
												echo "<option value=\"".$obj->codigoPlanta."\"";												
												echo ">".$obj->codigoPlanta.' - '.$obj->nombrePlanta."</option>";
											}
										}else{
											$valor = '';
											$list= CrmPlantaChd::getListxTipo(2,$oUser->localID); 
											foreach ($list as $obj) {
												if($obj->codigoPlanta==$plantaD->codigoPlanta){
													$valor = '<option value="'.$obj->codigoPlanta.'" selected>'.$obj->codigoPlanta.' - '.$obj->nombrePlanta.'</option>';
													break;
												}else{ 
													$valor ='<option value="'.$plantaD->codigoPlanta.'" selected>'.$plantaD->codigoPlanta.'</option>';
												}
											}
											echo $valor;
											foreach ($list as $obj) {
												echo "<option value=\"".$obj->codigoPlanta."\"";
												echo ">".$obj->codigoPlanta.' - '.$obj->nombrePlanta."</option>";
											}
										}
										?>   
									</select>
									<script type="text/javascript">
										$(function(){
											$('#codigoPlantaD').selectize({
												create: true,
												sortField: 'text'
											});	
										});
									</script>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label>Planta Pesquera</label>
									<input name="nombrePlantaD" id="nombrePlantaD" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->nombrePlantaD; } ?>"  maxlength="255" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Region</label>
									<input name="regionPlantaD" id="regionPlantaD" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->regionPlantaD; } ?>"  maxlength="255" autocomplete="off">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label>Provincia</label>
									<input name="provinciaPlantaD" id="provinciaPlantaD" type="text" class="form-control" value="<?php if($datosDR != NUll){ echo $datosDR->provinciaPlantaD; } ?>"  maxlength="255" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>

		<div class="row">
			<div class="col-md-8">
			</div> 
			<input type="hidden" value="<?php echo $oUser->userID; ?>" name="userID" id="userID" > 
			<input type="hidden" value="<?php echo $chdID; ?>" name="ID" id="ID" > 
			<div class="col-md-2">
				<label></label>
				<div class="btn btn-info btn-block" name="btnCrear" id="back_dr"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
			</div>
			<div class="col-md-2">
				<label></label>
				<div class="btn btn-primary btn-block" name="btnCrear" id="send_chata">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
			</div>
		</div>

	</form>

	<script type="text/javascript">

		$(function(){
			prepareForm('#form_dr');
			$('#send_chata').click(function(){
				<?php if($oUser->level != 0){ ?>
					bootbox.confirm({
						title: "Produce - Bureau Veritas",
						message: "Estas seguro de guardar los datos secundarios?",
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
								if (!isValidate('#form_dr')){ 
									alertify.error('Porfavor ingrese datos validos.'); 
									return false; 
								}
								var fields3=$('#form_dr').serialize();
								<?php if($cmd!='update'){ ?>
									$.getJSON('<?php echo $URL_ROOT;?>ajax/form_datos_dr.php?cmd=insert&'+fields3, function(data) {
										if(data.retval==1){
											alertify.success(data.message);
											$('.sombra').show();
											setTimeout(function(){
												location.href='<?php echo $URL_ROOT;?>chd/ro_dr.html?action=insert&ID='+data.chdID;
											}, 100);
										}else{
											alertify.error(data.message);
										}
									});
									<?php }else{ ?>
										$.getJSON('<?php echo $URL_ROOT;?>ajax/form_datos_dr.php?cmd=update&ID=<?php echo $chdID;?>&'+fields3, function(data) {
											if(data.retval==1){
												alertify.success(data.message);
												$('.sombra').show();
												setTimeout(function(){
													location.href='<?php echo $URL_ROOT;?>chd/ro_dr.html?action=update&ID='+data.chdID;
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
						location.href='<?php echo $URL_ROOT;?>chd/ro_dr.html';

						<?php } ?>


					});
		});

		$('#back_dr').click(function(){
			location.href='<?php echo $URL_ROOT;?>chd/descartes_residuos.html?action=update&chdID=<?php echo $chdID; ?>';
		});
	</script>




</section>