<?php
	/**
	 * Object represents table 'crm_infraccion'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmInfraccionMP{
		
		public $infraccionMPID;
		public $reporteOcurrenciaMPID;
		public $correlativo;
		public $codigoInfraccion;
		public $detalleInfraccion;
		public $chdID;
		
		public function __construct($infraccionMPID=NULL,	$reporteOcurrenciaMPID=NULL,	$correlativo=NULL,	$codigoInfraccion=NULL,	$detalleInfraccion=NULL)
		{
			$this->infraccionMPID						= $infraccionMPID;
			$this->reporteOcurrenciaMPID				= $reporteOcurrenciaMPID;
			$this->correlativo						= $correlativo;
			$this->codigoInfraccion					= $codigoInfraccion;
			$this->detalleInfraccion				= $detalleInfraccion;
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>




	
	
	
	
	