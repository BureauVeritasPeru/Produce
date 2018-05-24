<?php $codInspector=isset($_REQUEST['codInspector'])? $_REQUEST['codInspector']:''; ?>
<div class="box box-default">
  <div class="box-header">
    <h2 class="box-title"><i class="fa <?php echo ($MODULE->moduleIcon=='')?"fa-list":$MODULE->moduleIcon; ?>"></i> <?php echo $MODULE->moduleName; ?></h2>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <div class="col-sm-10">
      <div class="form-group padding-right-10">
        <label >Codigo: </label>
        <input name="txtsearch" id="codInspector" type="text" class="form-control" placeholder="Ingrese Codigo de Inspector" maxlength="255">            
      </div>
    </div>
    <div class="col-sm-2 col-lg-1">

      <label>&nbsp;</label>
      <div class="form-group">
        <div  id="btnBuscar" type="button" class="btn btn-primary" value="Buscar" autocomplete="off">Buscar</div>
      </div>
    </div>

    <table class="table table-bordered table-hover">
      <tr> 
        <th>&nbsp;</th>
        <th><?php echo $MODULE->getSortingHeader("codigoInspector", "Codigo de Inspector");?></th>
        <th><?php echo $MODULE->getSortingHeader("nombreCompletoInspector", "Nombres");?></th>
        <th><?php echo $MODULE->getSortingHeader("nroDocumento", "Nro Documento");?></th>
        <th><?php echo $MODULE->getSortingHeader("state", "Estado");?></th>
      </tr>
      <?php
      $lCrmInspector = CrmInspector::getList_Paging_Codigo($codInspector);

      foreach ($lCrmInspector as $oItem) {
        ?>
        <tr> 
          <td><a href="<?php echo "javascript:Edit(".$oItem->inspectorID.");"; ?>"><i class="fa fa-edit"></i></a>
            <a href="<?php echo "javascript:Delete(".$oItem->inspectorID.");"; ?>"><i class="fa fa-remove"></i></a></td>
            <td><?php echo $oItem->codigoInspector; ?></td>
            <td><?php echo $oItem->nombreCompletoInspector; ?></td>
            <td><?php echo $oItem->nroDocumento; ?></td>
            <td><?php echo CrmInspector::getState($oItem->state);?></td>
          </tr>
          <?php } ?>
        </table>


      </div>
      <div class="box-footer">
        <button class="btn btn-primary" name="btnNew" onClick="addNew(this.form)">nuevo &iacute;tem</button>
        <?php echo $MODULE->getPaging();?>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
       $('#btnBuscar').on('click', function(){
        var codInspector= $('#codInspector').val();
        location.href='<?php echo SEO::get_URLROOT(); ?>admin/?moduleID=24&codInspector='+codInspector;
      });
     });
   </script>