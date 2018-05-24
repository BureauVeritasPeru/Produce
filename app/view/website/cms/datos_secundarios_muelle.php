<?php
$action  = OWASP::RequestString('action');
$chdID  = OWASP::RequestString('ID');

if($action == 'insert'){
	$cmd = 'insert';
	$datosMuelle = NULL;
}else{ 
	$cmd = 'update';
	$datosMuelle = CrmDatosMuelle::getItemCHD($chdID);
}
?>
<script>
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
	<form name="form_datos_muelle" id="form_datos_muelle" > 
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Datos Secundarios</h2></div>
		</div>
		<div class="row">
			<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Region Destino</label>
					<input name="regionDestino" id="regionDestino" type="text" class="form-control required" value="<?php if($datosMuelle != NULL){ echo $datosMuelle->regionDestino; } ?>"  maxlength="255" autocomplete="off"> <!-- JS Function busqueda -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>EIP Destino</label>
					<select name="eipDestino" id="eipDestino" class="form-control" autocomplete="off">
						<option value="0">Seleccione su EIP</option> 
						<?php $list= CmsParameterLang::getList(19, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMuelle != NULL){if($obj->parameterID==$datosMuelle->eipDestino) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro RUC (EIP Destino)</label>
					<input name="nroRuc" id="nroRuc" type="text" class="form-control" value="<?php if($datosMuelle != NUll){ echo $datosMuelle->nroRuc; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tipo de Unidad de Transporte</label>
					<select name="tipoUnidadTransporte" id="tipoUnidadTransporte" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Tipo de unidad de transporte</option> 
						<?php $list= CmsParameterLang::getList(20, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMuelle != NULL){if($obj->parameterID==$datosMuelle->tipoUnidadTransporte) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Placa Unidad de Transporte</label>
					<input name="placaUnidadTransporte" id="placaUnidadTransporte" type="text" class="form-control" value="<?php if($datosMuelle != NUll){ echo $datosMuelle->placaUnidadTransporte; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro de Acta de Inspección</label>
					<input name="nroActaInspeccion" id="nroActaInspeccion" type="text" class="form-control" value="<?php if($datosMuelle != NUll){ echo $datosMuelle->nroActaInspeccion; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Tipo de Descarga</label>
					<select name="tipoDescarga" id="tipoDescarga" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Tipo de Descarga</option> 
						<?php $list= CmsParameterLang::getList(21, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMuelle != NULL){if($obj->parameterID==$datosMuelle->tipoDescarga) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro Parte de Muestreo</label>
					<select name="nroParteMuestreo" id="nroParteMuestreo" class="form-control" autocomplete="off">
						<option value="0">Seleccione su numero de Parte de Muestreo</option> 
						<?php $list= CmsParameterLang::getList(22, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMuelle != NULL){if($obj->parameterID==$datosMuelle->nroParteMuestreo) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Moda</label>
					<select name="moda" id="moda" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Moda</option> 
						<?php $list= CmsParameterLang::getList(23, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMuelle != NULL){if($obj->parameterID==$datosMuelle->moda) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>% Tallas Menores</label>
					<select name="porcTallasMenores" id="porcTallasMenores" class="form-control" autocomplete="off">
						<option value="0">Seleccione sus tallas menores</option> 
						<?php $list= CmsParameterLang::getList(24, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMuelle != NULL){if($obj->parameterID==$datosMuelle->porcTallasMenores) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nro de Acta de Reporte de Ocurrencias</label>
					<input name="nroActaOcurrencia" id="nroActaOcurrencia" type="text" class="form-control" value="<?php if($datosMuelle != NUll){ echo $datosMuelle->nroActaOcurrencia; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Observaciones</label>
					<textarea name="observaciones" id="observaciones" type="text" rows="5" class="form-control" maxlength="255" autocomplete="off"><?php if($datosMuelle != NUll){ echo $datosMuelle->observaciones; } ?></textarea>
				</div>
			</div>
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
				<div class="btn btn-primary btn-block" name="btnCrear" id="send_muelle">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
			</div>
		</div>

	</form>

	<script type="text/javascript">

		$(function(){
			prepareForm('#form_datos_muelle');
			$('#send_muelle').click(function(){
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
								if (!isValidate('#form_datos_muelle')){ 
									alertify.error('Porfavor ingrese datos validos.'); 
									return false; 
								}
								var fields3=$('#form_datos_muelle').serialize();
								<?php if($cmd!='update'){ ?>
									$.getJSON('<?php echo $URL_ROOT;?>ajax/form_datos_muelle.php?cmd=insert&'+fields3, function(data) {
										if(data.retval==1){
											alertify.success(data.message);
											$('.sombra').show();
											setTimeout(function(){
												location.href='<?php echo $URL_ROOT;?>chd.html';
											}, 100);
										}else{
											alertify.error(data.message);
										}
									});
									<?php }else{ ?>
										$.getJSON('<?php echo $URL_ROOT;?>ajax/form_datos_muelle.php?cmd=update&ID=<?php echo $chdID;?>&'+fields3, function(data) {
											if(data.retval==1){
												alertify.success(data.message);
												$('.sombra').show();
												setTimeout(function(){
													location.href='<?php echo $URL_ROOT;?>chd.html';
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
						location.href='<?php echo $URL_ROOT;?>chd.html';

						<?php } ?>


					});
		});

		$('#back_dr').click(function(){
			location.href='<?php echo $URL_ROOT;?>chd/muelle.html?action=update&chdID=<?php echo $chdID; ?>';
		});
	</script>




</section>