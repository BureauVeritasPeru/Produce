<?php
require_once("base/Database.php");

class CrmInfraccionDR extends Database
{

	public static function  getItem($infraccionDRID){
		$query = "SELECT * FROM crm_infraccion_dr 
		WHERE
		infraccionDRID='$infraccionDRID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCorre($chdID,$correlativo){
		$query = "SELECT * FROM crm_infraccion_dr dc INNER JOIN crm_reporte_ocurrencia_dr c ON  (dc.reporteOcurrenciaDRID = c.reporteOcurrenciaDRID)
		WHERE
		c.chdID='$chdID'
		AND dc.correlativo = '$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($reporteOcurrenciaDRID,$correlativo){
		$query = "SELECT * FROM crm_infraccion_dr 
		WHERE
		reporteOcurrenciaDRID='$reporteOcurrenciaDRID'
		AND correlativo='$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_infraccion_dr
		ORDER BY codigoInfraccion";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_infraccion_dr
		ORDER BY codigoInfraccion";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oInfraccion){
		//Search the max Id
		$query = "SELECT MAX(infraccionDRID) FROM crm_infraccion_dr";
		$result = parent::GetResult($query);
		$oInfraccion->infraccionDRID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_infraccion_dr(infraccionDRID,reporteOcurrenciaDRID,correlativo,codigoInfraccion,detalleInfraccion)
		VALUES('$oInfraccion->infraccionDRID','$oInfraccion->reporteOcurrenciaDRID','$oInfraccion->correlativo','$oInfraccion->codigoInfraccion','$oInfraccion->detalleInfraccion')";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oInfraccion){
		//Update data to table
		$query = "UPDATE crm_infraccion_dr as cd INNER JOIN crm_reporte_ocurrencia_dr as c ON cd.reporteOcurrenciaDRID = c.reporteOcurrenciaDRID SET 
		codigoInfraccion				= '$oInfraccion->codigoInfraccion',
		detalleInfraccion				= '$oInfraccion->detalleInfraccion'
		WHERE 
		c.chdID	=$oInfraccion->chdID
		AND
		cd.correlativo = $oInfraccion->correlativo";
		return parent::Execute($query);
		//echo $query;

	}

	public static function  Delete($infraccionDRID){
		$query = "DELETE FROM crm_infraccion_dr WHERE infraccionDRID='$infraccionDRID'";
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






































