<?php
$action  = OWASP::RequestString('action');
$chdID  = OWASP::RequestString('ID');
$ro1 = NULL;
$ro2 = NULL;
$planta = NULL;
$inspector = NULL;
for ($i=1; $i < 3; $i++) { 
	for ($j=1; $j< 4 ; $j++) { 
		${'infraccion'.$i.'_'.$j} = NULL;
	}
}
if($action == 'insert'){
	$cmd = 'insert';
	$datosMP = NULL;
	$materia_prima = CrmMateriaPrima::getItemCHD($chdID);
	if($materia_prima->plantaID != NULL){
		$planta = CrmPlantaChd::getItem($materia_prima->plantaID);
	}	
	$inspector = NULL;
}else{ 
	$cmd = 'update';
	$ro1 = CrmReporteOcurrenciaMP::getItemCHD($chdID,1);
	$datosMP = CrmDatosMP::getItemCHD($chdID);
	$materia_prima = CrmMateriaPrima::getItemCHD($chdID);
	
	if($materia_prima->plantaID != NULL){
		$planta = CrmPlantaChd::getItem($materia_prima->plantaID);			
	}

	if($datosMP == NULL){
		$cmd = 'insert';
	}else
	{ 
		
		if($datosMP->inspectorID != NUlL){
			$inspector = CrmInspector::getItem($datosMP->inspectorID); 
		}
		$count = 0;
		$countdet=0;
		$ro = CrmReporteOcurrenciaMP::getList($chdID);
		foreach ($ro as $valor) {
			$count++;
			${'ro'.$count} = new eCrmReporteOcurrenciaMP();
			${'ro'.$count} = $valor;
			$fraccion = CrmInfraccionMP::getList(${'ro'.$count}->reporteOcurrenciaMPID);
			foreach ($fraccion as $detail) {
				$countdet++;
				${'infraccion'.$count.'_'.$countdet} = new eCrmInfraccionMP();
				${'infraccion'.$count.'_'.$countdet}       = $detail;
			}
			$countdet=0;
		}
	} 

}


?>
<script>
	$(function() {
		$('.carousel').carousel('pause');

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


	<?php for ($i = 1; $i < 3; $i++) { ?>

			// Edicion de Numero de Acta con el codigo de Planta
			$("#actaReporteOcurrencia<?php echo $i; ?>").keydown(function(e) {
				if ( event.key == "Tab" || event.which == 13 ) {
					var val = $("#actaReporteOcurrencia<?php echo $i; ?>").val();
					var planta = '<?php echo $planta->codigoPlanta; ?>';
					if(planta != "" && val != ""){
						$("#actaReporteOcurrencia<?php echo $i; ?>").val(planta + "-" + formatted_string('000000',val,'l'));
					}else{
						$("#actaReporteOcurrencia<?php echo $i; ?>").val();
					}
				}
			});

			// Edicion de Numero de Acta con el codigo de Planta
			$("#actaDecomiso<?php echo $i; ?>").keydown(function(e) {
				if ( event.key == "Tab" || event.which == 13 ) {
					var val = $("#actaDecomiso<?php echo $i; ?>").val();
					var planta = '<?php echo $planta->codigoPlanta; ?>';
					if(planta != "" && val != ""){
						$("#actaDecomiso<?php echo $i; ?>").val(planta + "-" + formatted_string('000000',val,'l'));
					}else{
						$("#actaDecomiso<?php echo $i; ?>").val();
					}
				}
			});

			// Edicion de Numero de Acta con el codigo de Planta
			$("#actaRetencionPago<?php echo $i; ?>").keydown(function(e) {
				if ( event.key == "Tab" || event.which == 13 ) {
					var val = $("#actaRetencionPago<?php echo $i; ?>").val();
					var planta = '<?php echo $planta->codigoPlanta; ?>';
					if(planta != "" && val != ""){
						$("#actaRetencionPago<?php echo $i; ?>").val(planta + "-" + formatted_string('000000',val,'l'));
					}else{
						$("#actaRetencionPago<?php echo $i; ?>").val();
					}
				}
			});
			<?php for ($j = 0; $j < 4; $j++) { ?>
				$( "#codigoInfraccion<?php echo $i ?>_<?php echo $j ?>" ).change(function() {
					var dol = $("#codigoInfraccion<?php echo $i ?>_<?php echo $j ?>").val();
					$.getJSON('<?php echo $URL_ROOT;?>ajax/consulta_infraccion.php?cod='+ dol, function(data) {
						if(data.retval==1){
							$("#detalleInfraccion<?php echo $i ?>_<?php echo $j ?>").val(data.nombre);
						}else{
							alertify.error(data.message);
						}
					});
				});

				<?php } 
			} ?>		


			
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
	<form name="form_ro" id="form_ro" > 
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
					<input name="nroParteMuestreo" id="nroParteMuestreo" type="text" class="form-control" value="<?php if($datosMP != NULL){ echo $datosMP->nroParteMuestreo; } ?>"  maxlength="255" autocomplete="off"> <!-- JS Function busqueda -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>% Juvenil</label>
					<input name="porcJuvenil" id="porcJuvenil" type="text" class="form-control" value="<?php if($datosMP != NUll){ echo $datosMP->porcJuvenil; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>% Incidental</label>
					<input name="porcIncidental" id="porcIncidental" type="text" class="form-control" value="<?php if($datosMP != NUll){ echo $datosMP->porcIncidental; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Destino</label>
					<select name="destino" id="destino" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Destino</option> 
						<?php $list= CmsParameterLang::getList(10, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMP != NULL){if($obj->parameterID==$datosMP->destino) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Presentación</label>
					<select name="presentacion" id="presentacion" class="form-control" autocomplete="off">
						<option value="0">Seleccione su Presentación</option> 
						<?php $list= CmsParameterLang::getList(11, 1); foreach ($list as $obj) { echo "<option value=\"".$obj->parameterID."\""; 
						if($datosMP != NULL){if($obj->parameterID==$datosMP->presentacion) echo " selected";} echo ">".$obj->parameterName."</option>";}
						?>   
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Acta de Inspección del Produce</label>
					<input name="actaInspeccionProduce" id="actaInspeccionProduce" type="text" class="form-control" value="<?php if($datosMP != NUll){ echo $datosMP->actaInspeccionProduce; } ?>"  maxlength="255" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Acta del Muestreo del Produce</label>
					<input name="actaMuestreoProduce" id="actaMuestreoProduce" type="text" class="form-control" value="<?php if($datosMP != NUll){ echo $datosMP->actaMuestreoProduce; } ?>"  maxlength="255" autocomplete="off"> <!-- JS Function busqueda -->
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
					<input name="nombreInspector" id="nombreInspector" type="text" class="form-control" value="<?php if($datosMP != NUll){ echo $datosMP->nombreInspector; } ?>" maxlength="255" autocomplete="off">
				</div>
			</div> 
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Observaciones</label>
					<textarea name="observaciones" id="observaciones" type="text" rows="5" class="form-control" maxlength="255" autocomplete="off"><?php if($datosMP != NUll){ echo $datosMP->observaciones; } ?></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<fieldset class="scheduler-border">
				<div class="col-md-12"> 
					<div class="form-group">
						<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
							<div class="carousel-inner" role="listbox">
								<div class="item active" style="padding: 30px;">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Acta de Reporte de Ocurrencia 1</label>
												<input name="actaReporteOcurrencia1" id="actaReporteOcurrencia1" type="text" class="form-control" value="<?php if($ro1 != NUll){ echo $ro1->actaReporteOcurrencia; } ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-md-8">
										</div>
									</div>
									<div class="row">	
										<div class="col-md-12 ">
											<!-- Nav tabs -->
											<div class="col-xs-3" style="padding-right: 0px;">
												<ul class="nav nav-tabs tabs-left" style="padding-top: 0px;">
													<li role="presentation" class="active"><a href="#infraccion1_1"  data-toggle="tab" id="tab1_1" >Infraccion 1</a></li>
													<li role="presentation"><a href="#infraccion1_2" data-toggle="tab" id="tab1_2" >Infraccion 2</a></li>
													<li role="presentation"><a href="#infraccion1_3" data-toggle="tab" id="tab1_3" >Infraccion 3</a></li>
												</ul>
											</div>
											<div class="col-xs-9" style="padding-left: 0px;">
												<div class="tab-content">
													<div  class="tab-pane active" id="infraccion1_1">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Código</label>
																	<select name="codigoInfraccion1_1" id="codigoInfraccion1_1" class="form-control" autocomplete="off">
																		<option value="0">Seleccione su Codigo</option> 
																		<?php
															          $list= CmsParameterLang::getList(5, 1); //Observaciones Inusuales
															          foreach ($list as $obj) {
															          	echo "<option value=\"".$obj->parameterID."\"";
															          	if($infraccion1_1 != NULL){if($obj->parameterID==$infraccion1_1->codigoInfraccion) echo " selected";}
															          	echo ">".$obj->parameterName."</option>";
															          }
															          ?>   
															      </select>
															  </div>
															</div>
															<div class="col-md-8">
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Detalle</label>
																	<textarea name="detalleInfraccion1_1" id="detalleInfraccion1_1" type="text" class="form-control" autocomplete="off"><?php if($infraccion1_1 != NUll){ echo $infraccion1_1->detalleInfraccion; } ?></textarea> 
																</div>
															</div>
														</div>
													</div>
													<div  class="tab-pane" id="infraccion1_2">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Código</label>
																	<select name="codigoInfraccion1_2" id="codigoInfraccion1_2" class="form-control" autocomplete="off">
																		<option value="0">Seleccione su Codigo</option> 
																		<?php
															          $list= CmsParameterLang::getList(5, 1); //Observaciones Inusuales
															          foreach ($list as $obj) {
															          	echo "<option value=\"".$obj->parameterID."\"";
															          	if($infraccion1_2 != NULL){if($obj->parameterID==$infraccion1_2->codigoInfraccion) echo " selected";}
															          	echo ">".$obj->parameterName."</option>";
															          }
															          ?>   
															      </select>
															  </div>
															</div>
															<div class="col-md-8">
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Detalle</label>
																	<textarea name="detalleInfraccion1_2" id="detalleInfraccion1_2" type="text" class="form-control" autocomplete="off"><?php if($infraccion1_2 != NUll){ echo $infraccion1_2->detalleInfraccion; } ?></textarea> 
																</div>
															</div>
														</div>
													</div>
													<div  class="tab-pane" id="infraccion1_3">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Código</label>
																	<select name="codigoInfraccion1_3" id="codigoInfraccion1_3" class="form-control" autocomplete="off">
																		<option value="0">Seleccione su Codigo</option> 
																		<?php
															          $list= CmsParameterLang::getList(5, 1); //Observaciones Inusuales
															          foreach ($list as $obj) {
															          	echo "<option value=\"".$obj->parameterID."\"";
															          	if($infraccion1_3 != NULL){if($obj->parameterID==$infraccion1_3->codigoInfraccion) echo " selected";}
															          	echo ">".$obj->parameterName."</option>";
															          }
															          ?>   
															      </select>
															  </div>
															</div>
															<div class="col-md-8">
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Detalle</label>
																	<textarea name="detalleInfraccion1_3" id="detalleInfraccion1_3" type="text" class="form-control" autocomplete="off"><?php if($infraccion1_3 != NUll){ echo $infraccion1_3->detalleInfraccion; } ?></textarea> 
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Tipo Infractor</label>
												<select name="tipoInfractor1" id="tipoInfractor1" class="form-control" autocomplete="off">
													<option value="0">Seleccione su tipo de Infractor</option> 
													<?php
										          $list= CmsParameterLang::getList(6, 1); //Observaciones Inusuales
										          foreach ($list as $obj) {
										          	echo "<option value=\"".$obj->parameterID."\"";
										          	if($ro1 != NULL){if($obj->parameterID==$ro1->tipoInfractor) echo " selected";}
										          	echo ">".$obj->parameterName."</option>";
										          }
										          ?>   
										      </select>
										  </div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Acta Decomiso</label>
												<input name="actaDecomiso1" id="actaDecomiso1" type="text" class="form-control" value="<?php if($ro1 != NUll){ echo $ro1->actaDecomiso; } ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>TM Decomisado</label>
												<input name="tmDecomisado1" id="tmDecomisado1" type="text" class="form-control" value="<?php if($ro1 != NUll){ echo $ro1->tmDecomisado; } ?>" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>% Decomisado</label>
												<input name="porcDecomisado1" id="porcDecomisado1" type="text" class="form-control" value="<?php if($ro1 != NUll){ echo $ro1->porcDecomisado; } ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Acta de Retención de Pago</label>
												<input name="actaRetencionPago1" id="actaRetencionPago1" type="text" class="form-control" value="<?php if($ro1 != NUll){ echo $ro1->actaRetencionPago; } ?>" autocomplete="off">
											</div>
										</div>
									</div>
								</div>	
								<div class="item" style="padding: 30px;">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label> Número de Reporte de Ocurrencia 2</label>
												<input name="actaReporteOcurrencia2" id="actaReporteOcurrencia2" type="text" class="form-control" value="<?php if($ro2 != NUll){ echo $ro2->actaReporteOcurrencia; } ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-md-8">
										</div>
									</div>
									<div class="row">	
										<div class="col-md-12 ">
											<!-- Nav tabs -->
											<div class="col-xs-3" style="padding-right: 0px;">
												<ul class="nav nav-tabs tabs-left" style="padding-top: 0px;">
													<li role="presentation" class="active"><a href="#infraccion2_1"  data-toggle="tab" id="tab2_1" >Infraccion 1</a></li>
													<li role="presentation"><a href="#infraccion2_2" data-toggle="tab" id="tab2_2" >Infraccion 2</a></li>
													<li role="presentation"><a href="#infraccion2_3" data-toggle="tab" id="tab2_3" >Infraccion 3</a></li>
												</ul>
											</div>
											<div class="col-xs-9" style="padding-left: 0px;">
												<div class="tab-content">
													<div  class="tab-pane active" id="infraccion2_1">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Código</label>
																	<select name="codigoInfraccion2_1" id="codigoInfraccion2_1" class="form-control" autocomplete="off">
																		<option value="0">Seleccione su Codigo</option> 
																		<?php
															          $list= CmsParameterLang::getList(5, 1); //Observaciones Inusuales
															          foreach ($list as $obj) {
															          	echo "<option value=\"".$obj->parameterID."\"";
															          	if($infraccion2_1 != NULL){if($obj->parameterID==$infraccion2_1->codigoInfraccion) echo " selected";}
															          	echo ">".$obj->parameterName."</option>";
															          }
															          ?>   
															      </select>
															  </div>
															</div>
															<div class="col-md-8">
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Detalle</label>
																	<textarea name="detalleInfraccion2_1" id="detalleInfraccion2_1" type="text" class="form-control" autocomplete="off"><?php if($infraccion2_1 != NUll){ echo $infraccion2_1->detalleInfraccion; } ?></textarea> 
																</div>
															</div>
														</div>
													</div>
													<div  class="tab-pane" id="infraccion2_2">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Código</label>
																	<select name="codigoInfraccion2_2" id="codigoInfraccion2_2" class="form-control" autocomplete="off">
																		<option value="0">Seleccione su Codigo</option> 
																		<?php
															          $list= CmsParameterLang::getList(5, 1); //Observaciones Inusuales
															          foreach ($list as $obj) {
															          	echo "<option value=\"".$obj->parameterID."\"";
															          	if($infraccion2_2 != NULL){if($obj->parameterID==$infraccion2_2->codigoInfraccion) echo " selected";}
															          	echo ">".$obj->parameterName."</option>";
															          }
															          ?>   
															      </select>
															  </div>
															</div>
															<div class="col-md-8">
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Detalle</label>
																	<textarea name="detalleInfraccion2_2" id="detalleInfraccion2_2" type="text" class="form-control" autocomplete="off"><?php if($infraccion2_2 != NUll){ echo $infraccion2_2->detalleInfraccion; } ?></textarea> 
																</div>
															</div>
														</div>
													</div>
													<div  class="tab-pane" id="infraccion2_3">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Código</label>
																	<select name="codigoInfraccion2_3" id="codigoInfraccion2_3" class="form-control" autocomplete="off">
																		<option value="0">Seleccione su Codigo</option> 
																		<?php
															          $list= CmsParameterLang::getList(5, 1); //Observaciones Inusuales
															          foreach ($list as $obj) {
															          	echo "<option value=\"".$obj->parameterID."\"";
															          	if($infraccion2_3 != NULL){if($obj->parameterID==$infraccion2_3->codigoInfraccion) echo " selected";}
															          	echo ">".$obj->parameterName."</option>";
															          }
															          ?>   
															      </select>
															  </div>
															</div>
															<div class="col-md-8">
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Detalle</label>
																	<textarea name="detalleInfraccion2_3" id="detalleInfraccion2_3" type="text" class="form-control" autocomplete="off"><?php if($infraccion2_3 != NUll){ echo $infraccion2_3->detalleInfraccion; } ?></textarea> 
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12"><h2 class="box-title"></h2></div> <!--espaciado -->
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Tipo Infractor</label>
												<select name="tipoInfractor2" id="tipoInfractor2" class="form-control" autocomplete="off">
													<option value="0">Seleccione su tipo de Infractor</option> 
													<?php
										          $list= CmsParameterLang::getList(6, 1); //Observaciones Inusuales
										          foreach ($list as $obj) {
										          	echo "<option value=\"".$obj->parameterID."\"";
										          	if($ro1 != NULL){if($obj->parameterID==$ro1->tipoInfractor) echo " selected";}
										          	echo ">".$obj->parameterName."</option>";
										          }
										          ?>   
										      </select>
										  </div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Acta Decomiso</label>
												<input name="actaDecomiso2" id="actaDecomiso2" type="text" class="form-control" value="<?php if($ro2 != NUll){ echo $ro2->actaDecomiso; } ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>TM Decomisado</label>
												<input name="tmDecomisado2" id="tmDecomisado2" type="text" class="form-control" value="<?php if($ro2 != NUll){ echo $ro2->tmDecomisado; } ?>" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>% Decomisado</label>
												<input name="porcDecomisado2" id="porcDecomisado2" type="text" class="form-control" value="<?php if($ro2 != NUll){ echo $ro2->porcDecomisado; } ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Acta de Retención de Pago</label>
												<input name="actaRetencionPago2" id="actaRetencionPago2" type="text" class="form-control" value="<?php if($ro2 != NUll){ echo $ro2->actaRetencionPago; } ?>" autocomplete="off">
											</div>
										</div>
									</div>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background-image: none !important;width:0;">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background-image: none !important;width:0;">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
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
					<div class="btn btn-info btn-block" name="btnCrear" id="back_ro"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;regresar</div>
				</div>
				<div class="col-md-2">
					<label></label>
					<div class="btn btn-primary btn-block" name="btnCrear" id="send_chata">Siguiente&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
				</div>
			</div>

		</form>

		<script type="text/javascript">

			$(function(){
				prepareForm('#form_ro');
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
									if (!isValidate('#form_ro')){ 
										alertify.error('Porfavor ingrese datos validos.'); 
										return false; 
									}
									var fields3=$('#form_ro').serialize();
									<?php if($cmd!='update'){ ?>
										$.getJSON('<?php echo $URL_ROOT;?>ajax/form_mp.php?cmd=insert&'+fields3, function(data) {
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
											$.getJSON('<?php echo $URL_ROOT;?>ajax/form_mp.php?cmd=update&ID=<?php echo $chdID;?>&'+fields3, function(data) {
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

			$('#back_ro').click(function(){
				location.href='<?php echo $URL_ROOT;?>chd/embarcacion.html?action=update&ID=<?php echo $chdID; ?>';
			});
		</script>




	</section>