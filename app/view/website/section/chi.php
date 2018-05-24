<?php
$localID=isset($_REQUEST['localID'])? intval($_REQUEST['localID']):'';
$nombrePlanta=isset($_REQUEST['nombrePlanta'])? $_REQUEST['nombrePlanta']:'';
$startDate=isset($_REQUEST['startDate'])? $_REQUEST['startDate']:'';
$endDate=isset($_REQUEST['endDate'])? $_REQUEST['endDate']:'';

if($oUser->localID != '0'){
	$list2 = CrmChi::getList_Paging($oUser->localID,$nombrePlanta,$startDate,$endDate);
}else{
	$list2 = CrmChi::getList_Paging($localID,$nombrePlanta,$startDate,$endDate);  
}
?>

<section class="content">
	<form name="frmMain" id="frmMain" class="form-horizontal" method="post" autocomplete="off" >
		<div class="box box-default" >
			<div class="box-header">
				<h2 class="box-title"><i class="fa fa-inbox"></i>&nbsp; Listado de CHI</h2>
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
                      </div>
                      <div class="col-sm-3">
                       <div class="form-group padding-right-10">
                        <label>Numero de Acta de Inspección: </label>
                        <input name="txtCodigo" type="text" class="form-control" id="nombrePlanta" placeholder="Ingrese aqui su Numero de Inspección" maxlength="255" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-sm-3">
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

                <div class="col-sm-3">
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
             <th style="text-align:center;"><a>Nombre de Planta</a></th>
             <th style="text-align:center;"><a>Numero de Acta de Inspección</a></th>
             <th  style="text-align:center;"><a>Puerto</a></th>
             <th  style="text-align:center;"><a>Zona</a></th>
             <th  style="text-align:center;"><a>Fecha de Descarga</a></th>
             <th  style="text-align:center;"><a>Pendiente</a></th>
           </tr>
         </thead>
         <tbody id="list-planta">
          <?php
          foreach ($list2 as $oItem_planta){
           ?>
           <tr>
            <td nowrap="nowrap">
             <a href="<?php echo $URL_ROOT.'chi/chata.html?action=update&chiID='.$oItem_planta->chiID; ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
             <?php if($oUser->level != 0){ ?>
             <a href="javascript:Delete(<?php echo $oItem_planta->chiID; ?>);"><i class="fa fa-remove"></i></a>
             <?php } ?>
           </td>
           <td><?php echo $oItem_planta->nombrePlanta; ?></td>
           <td><?php echo $oItem_planta->numActaInspeccion; ?></td>
           <td><?php echo $oItem_planta->puertoPlanta; ?></td>
           <td><?php echo $oItem_planta->zonaPlanta; ?></td>
           <td><?php echo $oItem_planta->fechaInicial; ?></td>
           <td><?php if($oItem_planta->pendiente != 0){echo 'si';}else{echo 'no';}; ?></td>
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
   <div class="btn btn-primary" name="btnCrear" onclick="location='<?php echo $URL_ROOT.'chi/chata.html?action=insert'; ?>';">crear</div>
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-certificacion">Certificados de Inspección</button>
   <div class="btn btn-primary" name="btnExport" id="send_export">Exportar Listado</div>
 </div>
 <?php } ?>

</div>                     
</form>
</section>
<script>
  $(function(){
    $('#send_export').click(function(){
      location.href = '<?php echo $URL_ROOT;?>ajax/export.php?localID='+$('#localID').val()+'&nombrePlanta='+$('#nombrePlanta').val()+'&startDate='+$('#startDate').val()+'&endDate='+$('#endDate').val();
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
						<legend  class="scheduler-border" >Generacion Individual</legend>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nro. Acta de Inspección</label>
								<input name="nroActaInspeccion" id="nroActaInspeccion" type="text" class="form-control"  maxlength="255" autocomplete="off"> 
							</div>
						</div>

						<div class="col-md-4 col-md-offset-8">
							<label></label>
							<div class="btn btn-primary btn-block" name="btnCrear" id="send_Ind">Generar&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
						</div>
					</fieldset>
				</div>
				<div class="row">
					<fieldset class="scheduler-border">
						<legend  class="scheduler-border">Generación Masiva</legend>
						<div class="col-md-6">
							<div class="form-group">
								<label>Fecha</label>
								<div class="input-group date" data-provide="datepicker">
									<input type="text" class="form-control" id="fecha" name="fecha">
									<div class="input-group-addon ">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Planta</label>
								<select name="planta" id="planta" class="form-control" autocomplete="off">
									<option value="0">Seleccione su planta</option> 
									<?php
                                    $list= CrmPlanta::getList(); //Observaciones Inusuales
                                    foreach ($list as $obj) {
                                    	echo "<option value=\"".$obj->plantaID."\"";
                                    	echo ">".$obj->codigoPlanta . ' - '.$obj->nombrePlanta."</option>";
                                    }
                                    ?> 
                                  </select>
                                </div>
                              </div>
                              
                           <div class="col-md-4 col-md-offset-2">
                             <label></label>
                             <div class="btn btn-primary btn-block" name="btnCrear" id="send_Mas">Generar&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
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
                   endDate   = $('#endDate').val();
                   location.href='<?php echo SEO::get_URLROOT(); ?>chi.html?localID='+localID+'&nombrePlanta='+nombrePlanta+'&startDate='+startDate+'&endDate='+endDate;
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
                   $.getJSON('<?php echo $URL_ROOT;?>ajax/delete_chi.php?ID='+val, function(data) {
                    if(data.retval==1){
                     alertify.success(data.message);
                     $('.sombra').show();
                     setTimeout(function(){
                      location.href='<?php echo SEO::get_URLROOT();?>chi.html';
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