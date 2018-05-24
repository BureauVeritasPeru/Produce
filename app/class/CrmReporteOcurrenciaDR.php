<?php
require_once("base/Database.php");

class CrmReporteOcurrenciaDR extends Database
{

	public static function  getItem($reporteOcurrenciaDRID){
		$query = "SELECT * FROM crm_reporte_ocurrencia_dr 
		WHERE
		reporteOcurrenciaDRID='$reporteOcurrenciaDRID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID,$correlativo){
		$query = "SELECT * FROM crm_reporte_ocurrencia_dr 
		WHERE
		chdID='$chdID'
		AND correlativo='$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHISinCorrelativo($chdID){
		$query = "SELECT * FROM crm_reporte_ocurrencia_dr 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($chdID){
		$query = "SELECT * FROM crm_reporte_ocurrencia_dr
		WHERE
		chdID='$chdID'
		ORDER BY actaReporteOcurrencia";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_reporte_ocurrencia_dr
		ORDER BY actaReporteOcurrencia";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oReporteOcurrenciaDR){
		//Search the max Id
		$query = "SELECT MAX(reporteOcurrenciaDRID) FROM crm_reporte_ocurrencia_dr";
		$result = parent::GetResult($query);
		$oReporteOcurrenciaDR->reporteOcurrenciaDRID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_reporte_ocurrencia_dr(reporteOcurrenciaDRID,chdID,correlativo,actaReporteOcurrencia,actaDecomiso,tipoInfractor,tmDecomisado,porcDecomisado,actaRetencionPago,fechaRegistro,fechaActualizar)
		VALUES('$oReporteOcurrenciaDR->reporteOcurrenciaDRID','$oReporteOcurrenciaDR->chdID','$oReporteOcurrenciaDR->correlativo','$oReporteOcurrenciaDR->actaReporteOcurrencia','$oReporteOcurrenciaDR->actaDecomiso','$oReporteOcurrenciaDR->tipoInfractor','$oReporteOcurrenciaDR->tmDecomisado','$oReporteOcurrenciaDR->porcDecomisado','$oReporteOcurrenciaDR->actaRetencionPago',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}
	
	public static function  Update($oReporteOcurrenciaDR){
		//Update data to table
		$query = "UPDATE crm_reporte_ocurrencia_dr SET 
		actaReporteOcurrencia	=	'$oReporteOcurrenciaDR->actaReporteOcurrencia',
		actaDecomiso	=			'$oReporteOcurrenciaDR->actaDecomiso',
		tipoInfractor	=			'$oReporteOcurrenciaDR->tipoInfractor',
		tmDecomisado	=			'$oReporteOcurrenciaDR->tmDecomisado',
		porcDecomisado	=			'$oReporteOcurrenciaDR->porcDecomisado',
		actaRetencionPago	=		'$oReporteOcurrenciaDR->actaRetencionPago',
		fechaActualizar	=			NOW()
		WHERE 
		chdID	=$oReporteOcurrenciaDR->chdID
		AND correlativo = $oReporteOcurrenciaDR->correlativo";
		return parent::Execute($query);
	}


	public static function  Delete($reporteOcurrenciaDRID){
		$query = "DELETE FROM crm_reporte_ocurrencia_dr WHERE reporteOcurrenciaDRID='$reporteOcurrenciaDRID'";
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


































