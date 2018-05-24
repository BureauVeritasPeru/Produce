<?php
require_once("base/Database.php");

class CrmInfraccionMP extends Database
{

	public static function  getItem($infraccionMPID){
		$query = "SELECT * FROM crm_infraccion_mp 
		WHERE
		infraccionMPID='$infraccionMPID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCorre($chdID,$correlativo){
		$query = "SELECT * FROM crm_infraccion_mp dc INNER JOIN crm_reporte_ocurrencia_mp c ON  (dc.reporteOcurrenciaMPID = c.reporteOcurrenciaMPID)
		WHERE
		c.chdID='$chdID'
		AND dc.correlativo = '$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($reporteOcurrenciaMPID,$correlativo){
		$query = "SELECT * FROM crm_infraccion_mp 
		WHERE
		reporteOcurrenciaMPID='$reporteOcurrenciaMPID'
		AND correlativo='$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_infraccion_mp
		ORDER BY codigoInfraccion";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_infraccion_mp
		ORDER BY codigoInfraccion";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oInfraccion){
		//Search the max Id
		$query = "SELECT MAX(infraccionMPID) FROM crm_infraccion_mp";
		$result = parent::GetResult($query);
		$oInfraccion->infraccionMPID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_infraccion_mp(infraccionMPID,reporteOcurrenciaMPID,correlativo,codigoInfraccion,detalleInfraccion)
		VALUES('$oInfraccion->infraccionMPID','$oInfraccion->reporteOcurrenciaMPID','$oInfraccion->correlativo','$oInfraccion->codigoInfraccion','$oInfraccion->detalleInfraccion')";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oInfraccion){
		//Update data to table
		$query = "UPDATE crm_infraccion_mp as cd INNER JOIN crm_reporte_ocurrencia_mp as c ON cd.reporteOcurrenciaMPID = c.reporteOcurrenciaMPID SET 
		codigoInfraccion				= '$oInfraccion->codigoInfraccion',
		detalleInfraccion				= '$oInfraccion->detalleInfraccion'
		WHERE 
		c.chdID	=$oInfraccion->chdID
		AND
		cd.correlativo = $oInfraccion->correlativo";
		return parent::Execute($query);
		//echo $query;

	}

	public static function  Delete($infraccionMPID){
		$query = "DELETE FROM crm_infraccion_mp WHERE infraccionMPID='$infraccionMPID'";
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






































