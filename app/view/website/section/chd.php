<?php
$localID=isset($_REQUEST['localID'])? intval($_REQUEST['localID']):'';
$nombrePlanta=isset($_REQUEST['nombrePlanta'])? $_REQUEST['nombrePlanta']:'';
$startDate=isset($_REQUEST['startDate'])? $_REQUEST['startDate']:'';
$endDate=isset($_REQUEST['endDate'])? $_REQUEST['endDate']:'';
$tipoCHD=isset($_REQUEST['tipoCHD'])? $_REQUEST['tipoCHD']:'';

if($oUser->localID != '0'){
	$list2 = CrmChd::getList_Paging($oUser->localID,$nombrePlanta,$startDate,$endDate,$tipoCHD);
}else{
	$list2 = CrmChd::getList_Paging($localID,$nombrePlanta,$startDate,$endDate,$tipoCHD);  
}
?>

<section class="content">
	<form name="frmMain" id="frmMain" class="form-horizontal" method="post" autocomplete="off" >
		<div class="box box-default" >
			<div class="box-header">
				<h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Listado de CHD</h2>
			</div>
			<br>
			<div class="box-body">
				<div class="col-sm-2">
					<div class="form-group padding-right-10">
						<label>Local: 
						</label>
						<select name="localID" id="localID" class="form-control" autocomplete="off">

							<?php
							if($oUser->localID != '0'){
                $item= CmsParameterLang::getItem($oUser->localID, 1); //Observaciones Inusuales
                echo "<option value=\"".$item->parameterID."\"";
                echo ">".$item->parameterName."</option>";
            }else{
            	echo "<option value=\"0\">Seleccione su local</option>";
              $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
              foreach ($list as $obj) {
              	echo "<option value=\"".$obj->parameterID."\"";
              	echo ">".$obj->parameterName."</option>";
              }
          }
          ?>   
      </select>
  </div>
</div>
<div class="col-sm-2">
	<div class="form-group padding-right-10">
		<label>Numero de Acta: </label>
		<input name="txtCodigo" type="text" class="form-control" id="nombrePlanta" placeholder="Ingrese aqui su Numero de Inspección" maxlength="255" autocomplete="off">
	</div>
</div>

<div class="col-sm-2">
	<div class="form-group padding-right-10">
		<label>Fecha de Descarga: </label>
		<div class="input-group date" data-provide="datepicker">
			<input type="text" class="form-control" id="startDate" name="startDate">
			<div class="input-group-addon ">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>
		
	</div>
</div>
<div class="col-sm-2">
	<div class="form-group padding-right-10">
		<label>&nbsp;</label>
		<div class="input-group date" data-provide="datepicker">
			<input type="text" class="form-control" id="endDate" name="endDate">
			<div class="input-group-addon ">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>
		
	</div>
</div>

<div class="col-sm-3">
	<div class="form-group padding-right-10">
		<label>Tipo CHD</label>
		<select name="tipoCHD" id="tipoCHD" class="form-control" autocomplete="off">
			<option value="0">Seleccione el tipo</option>
			<option value="1">Materia Prima</option>
			<option value="2">Descartes y Residuos</option>
			<option value="3">muelle</option>
		</select>
	</div>
</div>
<div class="col-sm-2 col-lg-1">
	<label>&nbsp;</label>
	<div class="form-group">
		<div  id="btnBuscar" type="button" class="btn btn-primary" value="Buscar" autocomplete="off">Buscar</div>
	</div>
</div>

<table class="table table-bordered table-hover table-responsive table-chi ">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th style="text-align:center;"><a>Local</a></th>
			<th style="text-align:center;"><a>Numero de Acta</a></th>
			<th  style="text-align:center;"><a>Fecha de Descarga</a></th>
			<th  style="text-align:center;"><a>Tipo de Acta</a></th>
		</tr>
	</thead>
	<tbody id="list-planta">
		<?php
		foreach ($list2 as $oItem_planta){
			?>
			<tr>
				<td nowrap="nowrap">
					<?php if($oItem_planta->tipoCHD == 1){ ?>
					<a href="<?php echo $URL_ROOT.'chd/materia_prima.html?action=update&chdID='.$oItem_planta->chdID; ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
					<?php } ?>
					<?php if($oItem_planta->tipoCHD == 2){ ?>
					<a href="<?php echo $URL_ROOT.'chd/descartes_residuos.html?action=update&chdID='.$oItem_planta->chdID; ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
					<?php } ?>
					<?php if($oItem_planta->tipoCHD == 3){ ?>
					<a href="<?php echo $URL_ROOT.'chd/muelle.html?action=update&chdID='.$oItem_planta->chdID; ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
					<?php } ?>
					<?php if($oUser->level != 0){ ?>
					<a href="javascript:Delete(<?php echo $oItem_planta->chdID; ?>);"><i class="fa fa-remove"></i></a>
					<?php } ?>
				</td>
				<td><?php echo CrmChd::getLocal($oItem_planta->localID); ?></td>
				<td><?php echo $oItem_planta->numActaMateria; ?></td>
				<td><?php echo $oItem_planta->fechaInicial; ?></td>
				<td><?php echo CrmChd::getTipo($oItem_planta->tipoCHD); ?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<div class="holder"></div>
</div>
<?php if($oUser->level != 0){ ?>
<div class="box-footer">
	<div class="btn btn-primary" name="btnCrear" onclick="location='<?php echo $URL_ROOT.'chd/materia_prima.html?action=insert'; ?>';">Crear Materia Prima</div>
	<div class="btn btn-primary" name="btnCrear" onclick="location='<?php echo $URL_ROOT.'chd/descartes_residuos.html?action=insert'; ?>';">Crear Residuos y Descartes</div>
	<div class="btn btn-primary" name="btnCrear" onclick="location='<?php echo $URL_ROOT.'chd/muelle.html?action=insert'; ?>';">Crear Muelle</div>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-certificacion">Certificados de Inspección</button>
	<div class="btn btn-primary" name="btnExport" id="send_export1">Exportar Listado MP</div>
	<div class="btn btn-primary" name="btnExport" id="send_export2">Exportar Listado RD</div>
	<div class="btn btn-primary" name="btnExport" id="send_export3">Exportar Listado Muelle</div>

</div>
<?php } ?>

</div>                     
</form>
</section>
<script>
	$(function(){
		$('#send_export1').click(function(){
			location.href = '<?php echo $URL_ROOT;?>ajax/export_MateriaPrima.php?localID='+$('#localID').val()+'&nombrePlanta='+$('#nombrePlanta').val()+'&startDate='+$('#startDate').val()+'&endDate='+$('#endDate').val()+'&tipoCHD='+$('#tipoCHD').val();
		});
	});
	$(function(){
		$('#send_export2').click(function(){
			location.href = '<?php echo $URL_ROOT;?>ajax/export_DescartesResiduos.php?localID='+$('#localID').val()+'&nombrePlanta='+$('#nombrePlanta').val()+'&startDate='+$('#startDate').val()+'&endDate='+$('#endDate').val()+'&tipoCHD='+$('#tipoCHD').val();
		});
	});
	$(function(){
		$('#send_export3').click(function(){
			location.href = '<?php echo $URL_ROOT;?>ajax/export_Muelle.php?localID='+$('#localID').val()+'&nombrePlanta='+$('#nombrePlanta').val()+'&startDate='+$('#startDate').val()+'&endDate='+$('#endDate').val()+'&tipoCHD='+$('#tipoCHD').val();
		});
	});
</script>



<div class="modal fade bs-certificacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="modal-frame">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Emisión de certificados de Inspección  </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<fieldset class="scheduler-border">
						<legend  class="scheduler-border">Generacion Individual</legend>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nro. Acta de Inspección</label>
								<input name="nroActaInspeccion" id="nroActaInspeccion" type="text" class="form-control"  maxlength="255" autocomplete="off"> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tipo CHD</label>
								<select name="tipoCHD" id="tipoCHD" class="form-control" autocomplete="off">
									<option value="0">Seleccione el tipo</option>
									<option value="1">Materia Prima</option>
									<option value="2">Descartes y Residuos</option>
									<option value="3">muelle</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-8">
							<label></label>
							<div class="btn btn-primary btn-block" name="btnCrear" id="send_Ind">Generar&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
						</div>
					</fieldset>
				</div>
				<div class="modal-frame" style="display: none;"></div>
			</div>
		</div>
	</div>
</div>



<script>
	$(function(){
		$('#send_Ind').click(function(){
			if($('#cert1').val() != '0' && $('#nroActaInspeccion').val() != ''){
				location.href = '<?php echo $URL_ROOT;?>ajax/certificado.php?cert1=2'+'&nroActaInspeccion='+$('#nroActaInspeccion').val();
			}
			else{
				alertify.error('Por favor ingrese todos los datos');
			}
		});

		$('#send_Mas').click(function(){
			if($('#cert2').val() != '0' && $('#fecha').val() != '' && $('#planta').val() != '0'){
				var ventana_secundaria; 
				ventana_secundaria = window.open('<?php echo $URL_ROOT;?>ajax/certificado2.php?cert2=2'+'&fecha='+$('#fecha').val()+'&planta='+$('#planta').val());
                    //location.href = '<?php echo $URL_ROOT;?>ajax/certificado2.php?cert2='+$('#cert2').val()+'&fecha='+$('#fecha').val()+'&planta='+$('#planta').val();
                }
                else{
                	alertify.error('Por favor ingrese todos los datos');
                }
            });


		$('#startDate').datepicker({
			format: 'dd/mm/yyyy',
			startDate: '-3d',
			language: 'es'
		});

		$('#btnBuscar').on('click', function(){
			localID =  $('#localID').val();
			nombrePlanta = $('#nombrePlanta').val();
			startDate = $('#startDate').val();
			tipoCHD   = $('#tipoCHD').val();
			if(tipoCHD == '0' && (nombrePlanta != '' || startDate != '')){	
				alertify.error('Por favor seleccione el tipo de CHD');
			}else{
				location.href='<?php echo SEO::get_URLROOT(); ?>chd.html?localID='+localID+'&nombrePlanta='+nombrePlanta+'&startDate='+startDate+'&tipoCHD='+tipoCHD;
			}
			
		});   


		$("div.holder").jPages({
			containerID : "list-planta",
			perPage : 10,
			delay : 20
		});


	});
	function Delete(val){
		bootbox.confirm({
			title: "Produce - Bureau Veritas",
			message: "Estas seguro de eliminar el registro?",
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
					$.getJSON('<?php echo $URL_ROOT;?>ajax/delete_chd.php?ID='+val, function(data) {
						if(data.retval==1){
							alertify.success(data.message);
							$('.sombra').show();
							setTimeout(function(){
								location.href='<?php echo SEO::get_URLROOT();?>chd.html';
							}, 1000);
						}else{
							alertify.error(data.message);
						}
					});
				}
			}
		});
	}  
</script>