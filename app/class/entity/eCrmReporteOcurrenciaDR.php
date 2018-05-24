<?php
	/**
	 * Object represents table 'crm_reporte_ocurrencia'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmReporteOcurrenciaDR{
		
		public $reporteOcurrenciaDRID;
		public $chdID;
		public $correlativo;
		public $actaReporteOcurrencia;
		public $actaDecomiso;
		public $tipoInfractor;
		public $tmDecomisado;
		public $porcDecomisado;
		public $actaRetencionPago;
		public $fechaRegistro;
		public $fechaActualizar;
		

		
		public function __construct($reporteOcurrenciaDRID=NULL,$chdID=NULL,$correlativo=NULL,$actaReporteOcurrencia=NULL,$actaDecomiso=NULL,$tmDecomisado=NULL,$porcDecomisado=NULL,$actaRetencionPago=NULL,$tipoInfractor=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->reporteOcurrenciaDRID		=	$reporteOcurrenciaDRID;
			$this->chdID						=	$chdID;
			$this->correlativo					=	$correlativo;
			$this->actaReporteOcurrencia		=	$actaReporteOcurrencia;
			$this->actaDecomiso					=	$actaDecomiso;
			$this->tmDecomisado					=	$tmDecomisado;
			$this->porcDecomisado				=	$porcDecomisado;
			$this->actaRetencionPago			=	$actaRetencionPago;
			$this->tipoInfractor				=	$tipoInfractor;
			$this->fechaRegistro				=	$fechaRegistro;
			$this->fechaActualizar				=	$fechaActualizar;
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>



