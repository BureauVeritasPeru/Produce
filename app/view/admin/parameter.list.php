<?php
$lLang=CmsLang::getList_Active();
if(CmsLang::getErrorMsg()!="") $MODULE->addError(CmsLang::getErrorMsg());
?>
<div class="box box-default">
  <div class="box-header">
    <h2 class="box-title"><i class="fa <?php echo ($MODULE->moduleIcon=='')?"fa-list":$MODULE->moduleIcon; ?>"></i> <?php echo $MODULE->moduleName; ?></h2>
  </div>
  <div class="box-body">
    
    <input type="hidden" name="groupID" value="<?php echo $groupID?>">
    <div class="col-sm-5">
      <div class="form-group">
        <label>Idioma: </label>
        <select name="langID" onChange="this.form.submit();" class="form-control">
          <?php
          foreach ($lLang as $obj) {
          if(!isset($oItem->langID)) $oItem->langID=$obj->langID;
          echo "<option value=\"$obj->langID\"";
            if($obj->langID==$oItem->langID) print " selected";
          echo ">$obj->alias</option>";
          }
          ?>
        </select>
        
      </div>
    </div>
    
    <table class="table table-bordered table-hover">
      <tr>
        <th>&nbsp;</th>
        <th><?php echo $MODULE->getSortingHeader("parameterName", "Nombre");?></th>
        <th><?php echo $MODULE->getSortingHeader("active", "Estado");?></th>
      </tr>
      <?php
      $DAO=$MODULE->StaticDAO;//CmsParameterLang
      $list=$DAO::getList_Paging($groupID, $langID);
      foreach ($list as $oItem) {
      ?>
      <tr>
        <td><a href="<?php echo "javascript:Edit(".$oItem->parameterID.");"; ?>"><i class="fa fa-edit"></i></a>
        <a href="<?php echo "javascript:Delete(".$oItem->parameterID.");"; ?>"><i class="fa fa-remove"></i></a>
      </td>
      <td><?php echo $oItem->parameterName; ?></td>
      <td><?php echo $DAO::getActive($oItem->active);?></td>
    </tr>
    <?php } ?>
  </table>
</div>
<div class="box-footer">
  <button class="btn btn-primary" name="btnNew" onClick="addNew(this.form)">nuevo</button>
  <input type="hidden" name="OrderBy" value="<?php echo $OrderBy?>">
  
  <?php echo $MODULE->getPaging();?>
  
</div>
</div>