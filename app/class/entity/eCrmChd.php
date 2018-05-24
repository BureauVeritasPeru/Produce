<?php
	/**
	 * Object represents table 'crm_chd'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmChd{
		
		public $chdID;
		public $userID;
		public $localID;
		public $fechaRegistro;
		public $fechaActualizacion;
		public $estado;
		public $tipoCHD;
		public $nombrePlanta;
		public $localidadPlanta;
		public $numActaMateria;
		public $fechaInicial;
		

		public function __construct($chiID=NULL, $userID=NULL, $localID=NULL, $fechaRegistro=NULL, $fechaActualizacion=NULL, $estado=NULL, $tipoCHD=NULL)
		{
			$this->chiID				= $chiID;
			$this->userID				= $userID;
			$this->localID				= $localID;
			$this->fechaRegistro		= $fechaRegistro;
			$this->fechaActualizacion	= $fechaActualizacion;
			$this->estado				= $estado;
			$this->tipoCHD			= $tipoCHD;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>