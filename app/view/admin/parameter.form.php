<?php

//if(!isset($oItem->attribute['icono'])) $oItem->attribute['icono']=null;
?>
<script type="text/javascript" src='<?php echo $URL_BASE;?>plugins/ckeditor/ckeditor.js'></script>
<script type="text/javascript" src='<?php echo $URL_BASE;?>plugins/ckfinder/ckfinder.js'></script>
<?php //include('../app/include/admin/galleries.php');?>
<script type="text/javascript">
$(document).ready(function(){
    CKFinder.setupCKEditor( null, '<?php echo $URL_BASE;?>plugins/ckfinder/' );
    //FileManager('icono', {title: 'Seleccione una icono', basePath: '../userfiles/cupones/local/', fileExt: '*.jpg;*.gif;*.png'} );
});
</script>
<script type="text/javascript">
function on_submit(xform){
	if($("#parameterName").val() ==""){
		alert("Por favor, ingrese el campo [Nombre]");
		$("#parameterName").focus();
		return false;
	}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>

<div class="box box-default">
  <div class="box-header">
    <h2 class="box-title"><i class="fa fa-edit"></i>  <?php echo ($MODULE->FormView=="edit")?$oItem->parameterName:$MODULE->moduleName; ?></h2><i class="fa fa-close pull-right"  onClick="javascript:Back();"></i>
  </div>
  <div class="box-body">

<input type="hidden" name="groupID" value="<?php echo $oItem->groupID?>">
<input type="hidden" name="langID" value="<?php echo $oItem->langID?>">


    <div class="form-group">
      <label class="col-sm-2 control-label ">Nombre</label>
      <div class="col-sm-10">
        <input name="parameterName" type="text" class="form-control" class="text" id="parameterName" value="<?php echo $oItem->parameterName; ?>" maxlength="255">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label ">Descripci&oacute;n</label>
      <div class="col-sm-10">
        <textarea name="description" id="description" class="form-control" rows="4"><?php echo $oItem->description; ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label ">Estado</label>
      <div class="col-sm-10">
        <input type="checkbox" class="flat-blue form-control" name="active" value="1" <?php if($oItem->active==1) print "checked";?>> Activo
      </div>
    </div>

  </div>
  <div class="box-footer">
    <input type="button" class="btn btn-primary" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
    <input type="button" class="btn btn-primary" name="btnCancel" value="cancelar" onClick="javascript:Back();">
  </div>
</div>
