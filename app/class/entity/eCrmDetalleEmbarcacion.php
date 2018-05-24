<?php
	/**
	 * Object represents table 'crm_detalle_cala'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmDetalleEmbarcacion{
		
		public $detalleEmbarcacionID;
		public $embarcacionID;
		public $correlativo;
		public $matricula;
		public $nombreEmbarcacion;
		public $nroCubetas;
		public $especie1;
		public $nroCubetas1;
		public $especie2;
		public $nroCubetas2;
		public $especie3;
		public $nroCubetas3;
		public $reportePesaje;
		public $numeroGuia;
		public $fechaRegistro;
		public $fechaActualizar;
		public $chdID;

		public function __construct($detalleEmbarcacionID=NULL,$embarcacionID=NULL,$correlativo=NULL,$matricula=NULL,$nombreEmbarcacion=NULL,$nroCubetas=NULL,$especie1=NULL,$nroCubetas1=NULL,$especie2=NULL,$nroCubetas2=NULL,$especie3=NULL,$nroCubetas3=NULL,$reportePesaje=NULL,$numeroGuia=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->detalleEmbarcacionID		= $detalleEmbarcacionID;
			$this->embarcacionID			= $embarcacionID;
			$this->correlativo				= $correlativo;
			$this->matricula				= $matricula;
			$this->nombreEmbarcacion	    = $nombreEmbarcacion;
			$this->nroCubetas				= $nroCubetas;
			$this->especie1					= $especie1;
			$this->nroCubetas1				= $nroCubetas1;
			$this->especie2					= $especie2;
			$this->nroCubetas2				= $nroCubetas2;
			$this->especie3					= $especie3;
			$this->nroCubetas3				= $nroCubetas3;
			$this->reportePesaje			= $reportePesaje;
			$this->numeroGuia				= $numeroGuia;
			$this->fechaRegistro			= $fechaRegistro;
			$this->fechaActualizar			= $fechaActualizar;

			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>


