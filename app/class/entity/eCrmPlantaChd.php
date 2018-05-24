<?php
	/**
	 * Object represents table 'crm_planta'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmPlantaChd{
		
		public $plantaID;
		public $codigoPlanta;
		public $nombrePlanta;
		public $localidadPlanta;
		public $regionPlanta;
		public $provinciaPlanta;
		public $tipoCHD;
		public $localID;
		public $state;

		public function __construct($plantaID=NULL,$codigoPlanta=NULL,$nombrePlanta=NULL,$localidadPlanta=NULL,$regionPlanta=NULL,$provinciaPlanta=NULL,$tipoCHD=NULL,$localID=NULL,$state=NULL)
		{
			$this->plantaID				= $plantaID;
			$this->codigoPlanta			= $codigoPlanta;
			$this->nombrePlanta			= $nombrePlanta;
			$this->localidadPlanta		= $localidadPlanta;
			$this->regionPlanta			= $regionPlanta;
			$this->provinciaPlanta		= $provinciaPlanta;
			$this->tipoCHD				= $tipoCHD;
			$this->localID				= $localID;
			$this->state				= $state;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>








