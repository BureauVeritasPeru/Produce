<?php
require_once("base/Database.php");

class CrmChi extends Database
{

	public static function  getItem($chiID){
		$query = "SELECT * FROM crm_chi 
		WHERE
		chiID='$chiID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_chi
		ORDER BY fechaRegistro,localID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Paging($localID,$nombrePlanta,$startDate,$endDate){
		if($nombrePlanta!=''|| ($startDate!='')|| ($endDate!='')){
			$query ="SELECT chi.chiID,chi.localID,cha.nombrePlanta,cto.numActaInspeccion,cha.puertoPlanta,cha.zonaPlanta,cto.fechaInicial,chi.pendiente
			FROM crm_chi chi left join crm_chata cha on (chi.chiID = cha.chiID) left join  crm_tolva cto on (chi.chiID = cto.chiID)
			WHERE 1=1";
			if ($localID!='')
				$query .= " AND chi.localID = '$localID'";
			if ($nombrePlanta!='')
				$query .= " AND cto.numActaInspeccion = '$nombrePlanta'";
			if (($startDate!='') && ($endDate!=''))
				$query .= " AND (cto.fechaInicial BETWEEN '$startDate' AND '$endDate 23:59:59')";
			$query .= " ORDER BY chiID DESC LIMIT 0,20";
		}else{
			$query = "SELECT she.chiID,chi.localID,cha.nombrePlanta,cto.numActaInspeccion,cha.puertoPlanta,cha.zonaPlanta,cto.fechaInicial,chi.pendiente  FROM ( SELECT chi.chiid
			FROM crm_chi chi 
			WHERE 1=1 ";
			if ($localID!='')
				$query .= " AND chi.localID = '$localID' ";
			$query .= "ORDER BY chi.chiid DESC LIMIT 10 )  AS she INNER JOIN crm_chi chi ON (she.chiid = chi.chiid) 
			LEFT JOIN crm_chata cha ON (chi.chiID = cha.chiID) LEFT JOIN  crm_tolva cto ON (chi.chiID = cto.chiID)
			ORDER BY chi.fechaRegistro DESC LIMIT 10";
		}

		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}


	public static function  getList_Paging2($localID,$nombrePlanta,$startDate,$endDate){
		
		$query ="SELECT chi.chiID,chi.localID,cha.nombrePlanta,cto.numActaInspeccion,cha.puertoPlanta,cha.zonaPlanta,chi.fechaRegistro,chi.pendiente
		FROM crm_chi chi left join crm_chata cha on (chi.chiID = cha.chiID) left join  crm_tolva cto on (chi.chiID = cto.chiID)
		WHERE 1=1";
		if ($localID!='')
			$query .= " AND chi.localID = '$localID'";
		if ($nombrePlanta!='')
			$query .= " AND cto.numActaInspeccion = '$nombrePlanta'";
		if (($startDate!='') && ($endDate!=''))
			$query .= " AND (cto.fechaInicial BETWEEN '$startDate' AND '$endDate 23:59:59')";
		$query .= " ORDER BY chiID DESC";
		

		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}

	public static function  getWebList(){
		$query = "SELECT * FROM crm_chi
		ORDER BY fechaRegistro,localID";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oChi){
		//Search the max Id
		$query = "SELECT MAX(chiID) FROM crm_chi";
		$result = parent::GetResult($query);
		$oChi->chiID = parent::fetchScalar($result)+1;
		//Insert data to tablea
		$query = "INSERT INTO crm_chi(chiID,userID,localID,fechaRegistro,fechaActualizacion,estado,pendiente)
		VALUES('$oChi->chiID', '$oChi->userID', '$oChi->localID',NOW(),NOW(), '$oChi->estado', '$oChi->pendiente')";
		return parent::Execute($query);
	}

	public static function  Update($oChi){
		//Update data to table
		$query = "UPDATE crm_chi SET 
		fechaActualizacion	 = NOW(),
		localID			     ='$oChi->localID',
		pendiente		 	 ='$oChi->pendiente'
		WHERE 
		chiID	=$oChi->chiID";
		return parent::Execute($query);
	}

	public static function  Delete($ChiID){
		$query = "DELETE FROM crm_chi WHERE chiID='$ChiID'";
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