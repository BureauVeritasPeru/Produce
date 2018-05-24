<?php
$userAdmin  =AdmLogin::getUserSession();
?>
<style>
  .checkbox-inline, .radio-inline {
    padding-left: 0px;
  }
  .icheckbox_flat-blue {
    margin-right: 6px;
    background-position: 0 0;
    margin-bottom: 4px;
  }
</style>
<script type="text/javascript">
  function on_submit(xform){
    if(xform.password.value ==""){
      alert("Please, enter [Password]");
      xform.password.focus(); return false;}
      xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
      xform.submit();
    }
  </script>
  <div class="box box-default">
    <div class="box-header">
      <h2 class="box-title"><i class="fa fa-edit"></i>  <?php echo ($MODULE->FormView=="edit")?$oItem->userName:$MODULE->moduleName; ?></h2><i class="fa fa-close pull-right"  onClick="javascript:Back();"></i>
    </div>
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label ">Usuario</label>
        
        <div class="col-sm-10">
          <input name="userName" autocomplete="off" type="text" id="userName" class="form-control" value="<?php echo $oItem->userName; ?>" maxlength="15">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label ">Contrase&ntilde;a</label>
        
        <div class="col-sm-10">
          <input name="password" autocomplete="off" type="password" id="password" class="form-control" value="<?php echo $oItem->password; ?>" maxlength="15">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label ">Nombre</label>
        
        <div class="col-sm-10">
          <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $oItem->firstName; ?>" maxlength="30">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label ">Apellido</label>
        
        <div class="col-sm-10">
          <input name="lastName" type="text" class="form-control" id="lastName" value="<?php echo $oItem->lastName; ?>" maxlength="30">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label ">Email</label>
        
        <div class="col-sm-10">
          <input name="email" type="text" class="form-control" id="email" value="<?php echo $oItem->email; ?>" maxlength="40">
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
        <label class="col-sm-2 control-label ">Level</label>
        <div class="col-sm-10">
          <label for="radio4">
            <input type="radio" class="flat-blue" id="radio4" name="level" value="1" <?php if($oItem->level==1) echo "checked";?>>
            Administrador
          </label>
          <label for="radio5">
            <input type="radio" class="flat-blue" id="radio5" name="level" value="0" <?php if($oItem->level==0) echo "checked";?>>
            
            Solo Lectura
          </label>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label ">Clasificacion</label>
        <div class="col-sm-10">
          <label class="checkbox-inline"><input type="checkbox"  class="flat-blue" id="chi" name="chi" <?php if($oItem->chi==1) echo "checked";?> >CHI</label>
          <label class="checkbox-inline"><input type="checkbox" class="flat-blue" id="chd" name="chd" <?php if($oItem->chd==1) echo "checked";?>>CHD</label>
          <label class="checkbox-inline"><input type="checkbox"  class="flat-blue" id="reportes" name="reportes" <?php if($oItem->reportes==1) echo "checked";?>>Reportes</label>
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