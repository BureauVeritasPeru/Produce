<?php
	/**
	 * Object represents table 'crm_materia_prima'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmDatosMuelle{
		
		public $datosMuelleID;
		public $chdID;
		public $regionDestino;
		public $eipDestino;
		public $nroRuc;
		public $tipoUnidadTransporte;
		public $placaUnidadTransporte;
		public $nroActaInspeccion;
		public $tipoDescarga;
		public $nroParteMuestreo;
		public $moda;
		public $porTallaMenores;
		public $nroActaOcurrencia;
		public $observaciones;
		public $fechaRegistro;
		public $fechaActualizar;
		
		public function __construct($datosMuelleID=NULL,$chdID=NULL,$regionDestino=NULL,$eipDestino=NULL,$nroRuc=NULL,$tipoUnidadTransporte=NULL,$placaUnidadTransporte=NULL,$nroActaInspeccion=NULL,$tipoDescarga=NULL,$nroParteMuestreo=NULL,$moda=NULL,$porTallaMenores=NULL,$nroActaOcurrencia=NULL,$observaciones=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->datosMuelleID			=	$datosMuelleID;
			$this->chdID					=	$chdID;
			$this->regionDestino			=	$regionDestino;
			$this->eipDestino				=	$eipDestino;
			$this->nroRuc					=	$nroRuc;
			$this->tipoUnidadTransporte		=	$tipoUnidadTransporte;
			$this->placaUnidadTransporte	=	$placaUnidadTransporte;
			$this->nroActaInspeccion		=	$nroActaInspeccion;
			$this->tipoDescarga				=	$tipoDescarga;
			$this->nroParteMuestreo			=	$nroParteMuestreo;
			$this->moda						=	$moda;
			$this->porTallaMenores			=	$porTallaMenores;
			$this->nroActaOcurrencia		=	$nroActaOcurrencia;
			$this->observaciones			=	$observaciones;
			$this->fechaRegistro			=	$fechaRegistro;
			$this->fechaActualizar			=	$fechaActualizar;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>



	

