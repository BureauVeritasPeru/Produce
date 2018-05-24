<?php
	/**
	 * Object represents table 'crm_materia_prima'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmDatosDR{
		
		public $datosDRID;
		public $chdID;
		public $nroParteMuestreo;
		public $porcJuvenil;
		public $porcIncidental;
		public $tipoProcedencia;
		public $estadoResiduos;
		public $tipo;
		public $tipoEnvase;
		public $inspectorID;
		public $nombreInspector;
		public $observaciones;
		public $plantaOID;
		public $nombrePlantaO;
		public $regionPlantaO;
		public $provinciaPlantaO;
		public $plantaDID;
		public $nombrePlantaD;
		public $regionPlantaD;
		public $provinciaPlantaD;
		public $fechaRegistro;
		public $fechaActualizar;
		
		public function __construct($datosDRID=NULL,$chdID=NULL,$nroParteMuestreo=NULL,$porcJuvenil=NULL,$porcIncidental=NULL,$tipoProcedencia=NULL,$estadoResiduos=NULL,$tipo=NULL,$tipoEnvase=NULL,$inspectorID=NULL,$nombreInspector=NULL,$observaciones=NULL,$plantaOID=NULL,$nombrePlantaO=NULL,$regionPlantaO=NULL,$provinciaPlantaO=NULL,$plantaDID=NULL,$nombrePlantaD=NULL,$regionPlantaD=NULL,$provinciaPlantaD=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->datosDRID			=	$datosDRID;
			$this->chdID				=	$chdID;
			$this->nroParteMuestreo		=	$nroParteMuestreo;
			$this->porcJuvenil			=	$porcJuvenil;
			$this->porcIncidental		=	$porcIncidental;
			$this->tipoProcedencia		=	$tipoProcedencia;
			$this->estadoResiduos		=	$estadoResiduos;
			$this->tipo					=	$tipo;
			$this->tipoEnvase			=	$tipoEnvase;
			$this->inspectorID			=	$inspectorID;
			$this->nombreInspector		=	$nombreInspector;
			$this->observaciones		=	$observaciones;
			$this->plantaOID			=	$plantaOID;
			$this->nombrePlantaO		=	$nombrePlantaO;
			$this->regionPlantaO		=	$regionPlantaO;
			$this->provinciaPlantaO		=	$provinciaPlantaO;
			$this->plantaDID			=	$plantaDID;
			$this->nombrePlantaD		=	$nombrePlantaD;
			$this->regionPlantaD		=	$regionPlantaD;
			$this->provinciaPlantaD		=	$provinciaPlantaD;
			$this->fechaRegistro		=	$fechaRegistro;
			$this->fechaActualizar		=	$fechaActualizar;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>



	

