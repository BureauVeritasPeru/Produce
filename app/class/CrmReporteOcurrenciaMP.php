<?php
require_once("base/Database.php");

class CrmReporteOcurrenciaMP extends Database
{

	public static function  getItem($reporteOcurrenciaMPID){
		$query = "SELECT * FROM crm_reporte_ocurrencia_mp 
		WHERE
		reporteOcurrenciaMPID='$reporteOcurrenciaMPID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID,$correlativo){
		$query = "SELECT * FROM crm_reporte_ocurrencia_mp 
		WHERE
		chdID='$chdID'
		AND correlativo='$correlativo'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHISinCorrelativo($chdID){
		$query = "SELECT * FROM crm_reporte_ocurrencia_mp 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList($chdID){
		$query = "SELECT * FROM crm_reporte_ocurrencia_mp
		WHERE
		chdID='$chdID'
		ORDER BY actaReporteOcurrencia";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_reporte_ocurrencia_mp
		ORDER BY actaReporteOcurrencia";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oReporteOcurrenciaMP){
		//Search the max Id
		$query = "SELECT MAX(reporteOcurrenciaMPID) FROM crm_reporte_ocurrencia_mp";
		$result = parent::GetResult($query);
		$oReporteOcurrenciaMP->reporteOcurrenciaMPID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_reporte_ocurrencia_mp(reporteOcurrenciaMPID,chdID,correlativo,actaReporteOcurrencia,actaDecomiso,tipoInfractor,tmDecomisado,porcDecomisado,actaRetencionPago,fechaRegistro,fechaActualizar)
		VALUES('$oReporteOcurrenciaMP->reporteOcurrenciaMPID','$oReporteOcurrenciaMP->chdID','$oReporteOcurrenciaMP->correlativo','$oReporteOcurrenciaMP->actaReporteOcurrencia','$oReporteOcurrenciaMP->actaDecomiso','$oReporteOcurrenciaMP->tipoInfractor','$oReporteOcurrenciaMP->tmDecomisado','$oReporteOcurrenciaMP->porcDecomisado','$oReporteOcurrenciaMP->actaRetencionPago',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}
	
	public static function  Update($oReporteOcurrenciaMP){
		//Update data to table
		$query = "UPDATE crm_reporte_ocurrencia_mp SET 
		actaReporteOcurrencia	=	'$oReporteOcurrenciaMP->actaReporteOcurrencia',
		actaDecomiso	=			'$oReporteOcurrenciaMP->actaDecomiso',
		tipoInfractor	=			'$oReporteOcurrenciaMP->tipoInfractor',
		tmDecomisado	=			'$oReporteOcurrenciaMP->tmDecomisado',
		porcDecomisado	=			'$oReporteOcurrenciaMP->porcDecomisado',
		actaRetencionPago	=		'$oReporteOcurrenciaMP->actaRetencionPago',
		fechaActualizar	=			NOW()
		WHERE 
		chdID	=$oReporteOcurrenciaMP->chdID
		AND correlativo = $oReporteOcurrenciaMP->correlativo";
		return parent::Execute($query);
	}


	public static function  Delete($reporteOcurrenciaMPID){
		$query = "DELETE FROM crm_reporte_ocurrencia_mp WHERE reporteOcurrenciaMPID='$reporteOcurrenciaMPID'";
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


































