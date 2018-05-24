<?php
require_once("base/Database.php");

class CrmChd extends Database
{

	public static function  getItem($chdID){
		$query = "SELECT * FROM crm_chd 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_chd
		ORDER BY fechaRegistro,localID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Paging($localID,$nombrePlanta,$startDate,$endDate,$tipoCHD){
		if($nombrePlanta!=''|| ($startDate!='') || ($endDate!='') || ($tipoCHD!='')){
			$query ="SELECT chd.chdID,chd.localID,IFNULL(IFNULL(cha.numeroActaMateria,cto.nroActaDR),cdm.nroActaInspeccion) as numActaMateria,IFNULL(IFNULL(cha.fechaIngreso,cto.fechaIngreso),cmu.fechaDescarga) as fechaInicial,chd.tipoCHD
			FROM crm_chd chd left join crm_materia_prima cha ON (chd.chdID = cha.chdID) LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) LEFT JOIN crm_muelle cmu ON (chd.chdID = cmu.chdID) LEFT JOIN crm_datos_muelle cdm ON (chd.chdID = cdm.chdID)
			WHERE 1=1";
			if ($localID!='')
				$query .= " AND chd.localID = '$localID'";
			if (($nombrePlanta!='') && ($tipoCHD == '1'))
				$query .= " AND cha.numeroActaMateria = '$nombrePlanta'";
			if (($nombrePlanta!='') && ($tipoCHD == '2'))
				$query .= " AND cto.nroActaDR = '$nombrePlanta'";
			if (($nombrePlanta!='') && ($tipoCHD == '3'))
				$query .= " AND cdm.nroActaInspeccion = '$nombrePlanta'";

			if (($startDate!='') && ($endDate!='') && ($tipoCHD == '1'))
				$query .= " AND (cha.fechaIngreso BETWEEN '$startDate' AND '$endDate 23:59:59')";
			if (($startDate!='') && ($endDate!='') && ($tipoCHD == '2'))
				$query .= " AND (cto.fechaIngreso BETWEEN '$startDate' AND '$endDate 23:59:59')";
			if (($startDate!='') && ($endDate!='') && ($tipoCHD == '3'))
				$query .= " AND (cmu.fechaIngreso BETWEEN '$startDate' AND '$endDate 23:59:59')";
			if ($tipoCHD == '1')
				$query .= " AND chd.tipoCHD = '1'";
			if ($tipoCHD == '2')
				$query .= " AND chd.tipoCHD = '2'";
			if ($tipoCHD == '3')
				$query .= " AND chd.tipoCHD = '3'";
			$query .= "GROUP BY chd.chdid  ORDER BY chdID DESC LIMIT 0,100";
		}else{
			$query ="SELECT she.chdID,chd.localID,IFNULL(IFNULL(cha.numeroActaMateria,cto.nroActaDR),cdm.nroActaInspeccion) as numActaMateria,IFNULL(IFNULL(cha.fechaIngreso,cto.fechaIngreso),cmu.fechaDescarga) as fechaInicial,chd.tipoCHD FROM ( SELECT chd.chdid
			FROM crm_chd chd 
			WHERE 1=1 ";
			if ($localID!='')
				$query .= " AND chd.localID = '$localID' ";
			$query .= "ORDER BY chd.chdid DESC LIMIT 100 )  AS she INNER JOIN crm_chd chd ON (she.chdid = chd.chdid) 
			LEFT JOIN  crm_materia_prima cha ON (chd.chdID = cha.chdID) LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) LEFT JOIN crm_muelle cmu ON (chd.chdID = cmu.chdID) LEFT JOIN crm_datos_muelle cdm ON (chd.chdID = cdm.chdID)
			GROUP BY she.chdId ORDER BY chd.fechaRegistro DESC LIMIT 100";
		}

		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}


	public static function  getList_Paging2($localID,$nombrePlanta,$startDate,$tipoCHD){
		
		$query ="SELECT chd.chdID,chd.localID,IFNULL(IFNULL(cha.numeroActaMateria,cto.nroActaDR),cdm.nroActaInspeccion) as numActaMateria,IFNULL(IFNULL(cha.fechaIngreso,cto.fechaIngreso),cmu.fechaDescarga) as fechaInicial,chd.tipoCHD
		FROM crm_chd chd left join crm_materia_prima cha ON (chd.chdID = cha.chdID) LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) LEFT JOIN crm_muelle cmu ON (chd.chdID = cmu.chdID) LEFT JOIN crm_datos_muelle cdm ON (chd.chdID = cdm.chdID)
		WHERE 1=1";
		if ($localID!='')
			$query .= " AND chd.localID = '$localID'";
		if ($nombrePlanta!='')
			$query .= " AND cto.numActaInspeccion = '$nombrePlanta'";
		if (($startDate!='') && ($tipoCHD == '1'))
			$query .= " AND cha.fechaIngreso = '$startDate'";
		if (($startDate!='') && ($tipoCHD == '2'))
			$query .= " AND cto.fechaIngreso = '$startDate'";
		if (($startDate!='') && ($tipoCHD == '3'))
			$query .= " AND cmu.fechaDescarga = '$startDate'";
		if ($tipoCHD == '1')
			$query .= " AND chd.tipoCHD = '1'";
		if ($tipoCHD == '2')
			$query .= " AND chd.tipoCHD = '2'";
		if ($tipoCHD == '3')
			$query .= " AND chd.tipoCHD = '3'";

		$query .= " ORDER BY chdID DESC";
		

		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}

	public static function  getListxReporte1($fechaInicio,$fechaFinal,$local){
		$dateI = new DateTime($fechaInicio);
		$dateI = date_format($dateI, 'y/m/d');
		$dateF = new DateTime($fechaFinal);
		$dateF = date_format($dateF, 'y/m/d');
		
		$query ="SELECT chd.chdID,chd.tipoCHD
		FROM crm_chd chd LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) 
		WHERE 1=1 ";
		if($local!='0'){$query.= " AND chd.localID = '".$local."'";} 
		$query .= " AND cto.fechaIngreso >= '".$dateI."' AND cto.fechaIngreso <= '".$dateF."'";
		$query .= " AND cto.tipoTM in (157,158,160,161)";
		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}
	public static function  getListxReporte2($fechaInicio,$fechaFinal,$local){
		$dateI = new DateTime($fechaInicio);
		$dateI = date_format($dateI, 'y/m/d');
		$dateF = new DateTime($fechaFinal);
		$dateF = date_format($dateF, 'y/m/d');
		
		$query ="SELECT crm_chd.chdID,crm_chd.tipoCHD
		FROM   crm_chd,
		(
		SELECT chd.chdID,chd.tipoCHD
		FROM crm_chd chd LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) 
		WHERE 1=1";
		if($local!='0'){$query.= " AND chd.localID = '".$local."'";}
		$query .= " AND cto.fechaIngreso >= '".$dateI."' AND cto.fechaIngreso <= '".$dateF."'";
		$query .= " AND cto.tipoTM in (157,159,160,162)";
		$query .= " GROUP BY chd.chdID ) AS dr ";
		$query .= " WHERE  crm_chd.chdID = dr.chdID UNION ALL
		SELECT crm_chd.chdID,crm_chd.tipoCHD FROM crm_chd, ( SELECT chd.chdID,chd.tipoCHD
			FROM crm_chd chd LEFT JOIN crm_materia_prima cmp ON (chd.chdID = cmp.chdID) 
			WHERE 1=1";
			if($local!='0'){$query.= " AND chd.localID = '".$local."'";}
			$query .= " AND cmp.fechaIngreso >= '".$dateI."' AND cmp.fechaIngreso <= '".$dateF."'";
			$query .= " GROUP BY chd.chdID
		) AS mp
		WHERE crm_chd.chdID = mp.chdID
		GROUP BY crm_chd.chdID;";
		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}
	public static function  getListxReporte3($fechaInicio,$fechaFinal,$local){
		$dateI = new DateTime($fechaInicio);
		$dateI = date_format($dateI, 'y/m/d');
		$dateF = new DateTime($fechaFinal);
		$dateF = date_format($dateF, 'y/m/d');
		
		$query ="SELECT crm_chd.chdID,crm_chd.tipoCHD
		FROM   crm_chd,
		(
		SELECT chd.chdID,chd.tipoCHD
		FROM crm_chd chd LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) 
		INNER JOIN crm_reporte_ocurrencia_dr rodr ON (chd.chdID = rodr.chdID)
		WHERE 1=1";
		if($local!='0'){$query.= " AND chd.localID = '".$local."'";}
		$query .= " AND cto.fechaIngreso >= '".$dateI."' AND cto.fechaIngreso <= '".$dateF."'";
		$query .= " GROUP BY chd.chdID ) AS dr ";
		$query .= " WHERE  crm_chd.chdID = dr.chdID UNION ALL
		SELECT crm_chd.chdID,crm_chd.tipoCHD FROM crm_chd, ( SELECT chd.chdID,chd.tipoCHD
			FROM crm_chd chd LEFT JOIN crm_materia_prima cmp ON (chd.chdID = cmp.chdID) 
			INNER JOIN crm_reporte_ocurrencia_mp romp ON (chd.chdID = romp.chdID)
			WHERE 1=1";
			if($local!='0'){$query.= " AND chd.localID = '".$local."'";}
			$query .= " AND cmp.fechaIngreso >= '".$dateI."' AND cmp.fechaIngreso <= '".$dateF."'";
			$query .= " GROUP BY chd.chdID
		) AS mp
		WHERE crm_chd.chdID = mp.chdID
		GROUP BY crm_chd.chdID;";
		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}

	public static function  getListxReporte4($fechaInicio,$fechaFinal,$local,$planta){
		$dateI = new DateTime($fechaInicio);
		$dateI = date_format($dateI, 'y/m/d');
		$dateF = new DateTime($fechaFinal);
		$dateF = date_format($dateF, 'y/m/d');
		
		$query ="SELECT crm_chd.chdID,crm_chd.tipoCHD
		FROM   crm_chd,
		(
		SELECT chd.chdID,chd.tipoCHD
		FROM crm_chd chd LEFT JOIN crm_descartes_residuos cto ON (chd.chdID = cto.chdID) INNER JOIN crm_planta_chd pla ON (cto.plantaID = pla.plantaID)
		WHERE 1=1";
		if($local!='0'){$query.= " AND chd.localID = '".$local."'";}
		if($planta!='0'){$query.= " AND pla.nombrePlanta = '".$planta."'";}
		$query .= " AND cto.fechaIngreso >= '".$dateI."' AND cto.fechaIngreso <= '".$dateF."'";
		$query .= " GROUP BY chd.chdID ) AS dr ";
		$query .= " WHERE  crm_chd.chdID = dr.chdID UNION ALL
		SELECT crm_chd.chdID,crm_chd.tipoCHD FROM crm_chd, ( SELECT chd.chdID,chd.tipoCHD
			FROM crm_chd chd LEFT JOIN crm_materia_prima cmp ON (chd.chdID = cmp.chdID) INNER JOIN crm_planta_chd pla ON (cmp.plantaID = pla.plantaID)
			WHERE 1=1";
			if($local!='0'){$query.= " AND chd.localID = '".$local."'";}
			if($planta!='0'){$query.= " AND pla.nombrePlanta = '".$planta."'";}
			$query .= " AND cmp.fechaIngreso >= '".$dateI."' AND cmp.fechaIngreso <= '".$dateF."'";
			$query .= " GROUP BY chd.chdID
		) AS mp
		WHERE crm_chd.chdID = mp.chdID
		GROUP BY crm_chd.chdID;";
		return parent::GetCollection(parent::GetResult($query));
		//echo $query;
	}

	public static function  getWebList(){
		$query = "SELECT * FROM crm_chd
		ORDER BY fechaRegistro,localID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  AddNew($ochd){
		//Search the max Id
		$query = "SELECT MAX(chdID) FROM crm_chd";
		$result = parent::GetResult($query);
		$ochd->chdID = parent::fetchScalar($result)+1;
		//Insert data to tablea
		$query = "INSERT INTO crm_chd(chdID,userID,localID,fechaRegistro,fechaActualizacion,estado,tipoCHD)
		VALUES('$ochd->chdID', '$ochd->userID', '$ochd->localID',NOW(),NOW(), '$ochd->estado', '$ochd->tipoCHD')";
		return parent::Execute($query);
	}

	public static function  Update($ochd){
		//Update data to table
		$query = "UPDATE crm_chd SET 
		fechaActualizacion	 = NOW(),
		localID			     ='$ochd->localID',
		tipoCHD		 	 ='$ochd->tipoCHD'
		WHERE 
		chdID	=$ochd->chdID";
		return parent::Execute($query);
	}

	public static function  Delete($chdID){
		$query = "DELETE FROM crm_chd WHERE chdID='$chdID'";
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

	public static function  getLocal($state){
		switch($state){
			case 8: 	return "Supe"; break;
			case 9: 	return "Chimbote Sur"; break;
			case 10: 	return "Chimbote Norte"; break;
			case 11: 	return "Samanco"; break;
		}
		return "";
	}

	public static function  getTipo($state){
		switch($state){
			case 1: 	return "Materia Prima"; break;
			case 2: 	return "Descartes y Residuos"; break;
			case 3: 	return "Muelle"; break;
		}
		return "";
	}

}

?>