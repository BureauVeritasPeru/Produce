<?php
	/**
	 * Object represents table 'crm_infraccion'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmInfraccionDR{
		
		public $infraccionDRID;
		public $reporteOcurrenciaDRID;
		public $correlativo;
		public $codigoInfraccion;
		public $detalleInfraccion;
		public $chdID;
		
		public function __construct($infraccionDRID=NULL,	$reporteOcurrenciaDRID=NULL,	$correlativo=NULL,	$codigoInfraccion=NULL,	$detalleInfraccion=NULL)
		{
			$this->infraccionDRID						= $infraccionDRID;
			$this->reporteOcurrenciaDRID				= $reporteOcurrenciaDRID;
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




	
	
	
	
	