<?php
$userAdmin  =AdmLogin::getUserSession();
?>
<script type="text/javascript">
  function on_submit(xform){
    xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
    xform.submit();
  }
</script>
<div class="box box-default">
  <div class="box-header">
    <h2 class="box-title"><i class="fa fa-edit"></i>  <?php echo ($MODULE->FormView=="edit")?$oItem->nombrePlanta:$MODULE->moduleName; ?></h2><i class="fa fa-close pull-right"  onClick="javascript:Back();"></i>
  </div>
  <div class="box-body">
    <div class="form-group">
      <label class="col-sm-2 control-label ">Codigo de Planta</label>
      
      <div class="col-sm-10">
        <input name="codigoPlanta" autocomplete="off" type="text" id="codigoPlanta" class="form-control" value="<?php echo $oItem->codigoPlanta; ?>" maxlength="10">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label ">Nombre de Planta</label>
      
      <div class="col-sm-10">
        <input name="nombrePlanta" autocomplete="off" type="text" id="nombrePlanta" class="form-control" value="<?php echo $oItem->nombrePlanta; ?>" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label ">Localidad de Planta</label>
      <div class="col-sm-10">
        <input name="localidadPlanta" type="text" class="form-control" id="localidadPlanta" value="<?php echo $oItem->localidadPlanta; ?>" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label ">Region de Planta</label>  
      <div class="col-sm-10">
        <input name="regionPlanta" type="text" class="form-control" id="regionPlanta" value="<?php echo $oItem->regionPlanta; ?>" maxlength="50">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label ">Provincia de Planta</label>  
      <div class="col-sm-10">
        <input name="provinciaPlanta" type="text" class="form-control" id="provinciaPlanta" value="<?php echo $oItem->provinciaPlanta; ?>" maxlength="50">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label ">Tipo CHD</label>
      <div class="col-sm-10">
        <label for="tipoCHD1">
          <input type="radio" class="flat-blue" id="tipoCHD1" name="tipoCHD" value="1" <?php if($oItem->tipoCHD==1) echo "checked";?>>
          
          Materia Prima
        </label>
        <label for="tipoCHD2">
          <input type="radio" class="flat-blue" id="tipoCHD2" name="tipoCHD" value="2" <?php if($oItem->tipoCHD==2) echo "checked";?>>
          
          Descarte y Residuos
        </label>
        
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 control-label ">Estado</label>
      <div class="col-sm-10">
        <label for="radio1">
          <input type="radio" class="flat-blue" id="radio1" name="state" value="1" <?php if($oItem->state==1) echo "checked";?>>
          
          Activo
        </label>
        <label for="radio2">
          <input type="radio" class="flat-blue" id="radio2" name="state" value="2" <?php if($oItem->state==2) echo "checked";?>>
          
          Bloqueado
        </label>
        
        <label for="radio3">
          <input type="radio" class="flat-blue" id="radio3" name="state" value="0" <?php if($oItem->state==0) echo "checked";?>>
          
          Inactivo
        </label>
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label ">Localidad</label>
      <div class="col-sm-10">
        <select name="localID" id="localID" class="form-control" autocomplete="off">
          <option value="0">Seleccione su local</option> 
          <?php
          $list= CmsParameterLang::getList(3, 1); //Observaciones Inusuales
          foreach ($list as $obj) {
            echo "<option value=\"".$obj->parameterID."\"";
            if($oItem != NUll){if($obj->parameterID==$oItem->localID) echo " selected";}
            echo ">".$obj->parameterName."</option>";
          }
          ?>   
        </select>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <input type="button" class="btn btn-primary" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
    <input type="button" class="btn btn-primary" name="btnCancel" value="cancelar" onClick="javascript:Back();">
  </div>
</div>