<?php
require_once("base/Database.php");

class CrmDetalleEmbarcacion extends Database
{

	public static function  getItem($embarcacionID){
		$query = "SELECT * FROM crm_detalle_embarcacion 
		WHERE
		embarcacionID='$embarcacionID'";
		return parent::GetObject(parent::GetResult($query));
	}


	public static function  getItemCorre($chdID,$correlativo){
		$query = "SELECT * FROM crm_detalle_embarcacion dc INNER JOIN crm_embarcacion_chd c ON  (dc.embarcacionID = c.embarcacionID)
		WHERE
		c.chdID='$chdID'
		AND dc.correlativo = '$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT dc.* FROM crm_detalle_embarcacion dc INNER JOIN crm_embarcacion_chd c ON  (dc.embarcacionID = c.embarcacionID)
		WHERE
		c.chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($chdID){
		$query = "SELECT * FROM crm_detalle_embarcacion dc
		INNER JOIN crm_embarcacion_chd c ON  (dc.embarcacionID = c.embarcacionID)
		WHERE
		c.chdID='$chdID'
		ORDER BY c.embarcacionID,dc.correlativo";
		return parent::GetCollection(parent::GetResult($query));
	}



	public static function  getWebList(){
		$query = "SELECT * FROM crm_detalle_embarcacion
		ORDER BY embarcacionID,correlativo";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oDetalleEmbarcacion){
		//Search the max Id
		$query = "SELECT MAX(detalleEmbarcacionID) FROM crm_detalle_embarcacion";
		$result = parent::GetResult($query);
		$oDetalleEmbarcacion->detalleEmbarcacionID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_detalle_embarcacion(detalleEmbarcacionID,embarcacionID,correlativo,matricula,nombreEmbarcacion,nroCubetas,especie1,nroCubetas1,especie2,nroCubetas2,especie3,nroCubetas3,reportePesaje,numeroGuia,fechaRegistro,fechaActualizar)
		VALUES('$oDetalleEmbarcacion->detalleEmbarcacionID','$oDetalleEmbarcacion->embarcacionID','$oDetalleEmbarcacion->correlativo','$oDetalleEmbarcacion->matricula','$oDetalleEmbarcacion->nombreEmbarcacion','$oDetalleEmbarcacion->nroCubetas','$oDetalleEmbarcacion->especie1','$oDetalleEmbarcacion->nroCubetas1','$oDetalleEmbarcacion->especie2','$oDetalleEmbarcacion->nroCubetas2','$oDetalleEmbarcacion->especie3','$oDetalleEmbarcacion->nroCubetas3','$oDetalleEmbarcacion->reportePesaje','$oDetalleEmbarcacion->numeroGuia',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}


	public static function  Update($oDetalleEmbarcacion){
		//Update data to table
		$query = "UPDATE crm_detalle_embarcacion as cd INNER JOIN crm_embarcacion_chd as c ON cd.embarcacionID = c.embarcacionID SET 
		cd.matricula		 =	'$oDetalleEmbarcacion->matricula',
		cd.nombreEmbarcacion =	'$oDetalleEmbarcacion->nombreEmbarcacion',
		cd.nroCubetas		 =	'$oDetalleEmbarcacion->nroCubetas',
		cd.especie1			 =	'$oDetalleEmbarcacion->especie1',
		cd.nroCubetas1		 =	'$oDetalleEmbarcacion->nroCubetas1',
		cd.especie2			 =	'$oDetalleEmbarcacion->especie2',
		cd.nroCubetas2		 =	'$oDetalleEmbarcacion->nroCubetas2',
		cd.especie3			 =	'$oDetalleEmbarcacion->especie3',
		cd.nroCubetas3		 =	'$oDetalleEmbarcacion->nroCubetas3',
		cd.reportePesaje	 =	'$oDetalleEmbarcacion->reportePesaje',
		cd.numeroGuia		 =	'$oDetalleEmbarcacion->numeroGuia',
		cd.fechaActualizar	 =	NOW()
		WHERE 
		c.chdID	=$oDetalleEmbarcacion->chdID
		AND
		cd.correlativo = $oDetalleEmbarcacion->correlativo ";
		return parent::Execute($query);
		//echo $query;

	}
	
	public static function  Delete($embarcacionID){
		$query = "DELETE FROM crm_detalle_embarcacion WHERE embarcacionID='$embarcacionID'";
		return parent::Execute($query);
	}

	public static function  getState($state){
		switch($state){
			case 1: 	return "Activo"; break;
			case 2: 	return "Bloqueado"; break;
			case 0: 	return "Inactivo"; break;
		}
		return "";
	}


	

}

?>

































