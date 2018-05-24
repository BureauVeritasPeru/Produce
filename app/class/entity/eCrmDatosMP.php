<?php
	/**
	 * Object represents table 'crm_muestreo'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmDatosMP{
		
		public $datosMPID;
		public $chdID;
		public $nroParteMuestreo;
		public $porcJuvenil;
		public $porcIncidental;
		public $destino;
		public $presentacion;
		public $actaInspeccionProduce;
		public $actaMuestreoProduce;
		public $inspectorID;
		public $nombreInspector;
		public $observaciones;
		public $fechaRegistro;
		public $fechaActualizar;
		

		public function __construct($datosMPID=NULL,$chdID=NULL,$nroParteMuestreo=NULL,$porcJuvenil=NULL,$porcIncidental=NULL,$destino=NULL,$presentacion=NULL,$actaInspeccionProduce=NULL,$actaMuestreoProduce=NULL,$inspectorID=NULL,$nombreInspector=NULL,$observaciones=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->datosMPID	= $datosMPID;
			$this->chdID	= $chdID;
			$this->nroParteMuestreo	= $nroParteMuestreo;
			$this->porcJuvenil	= $porcJuvenil;
			$this->porcIncidental	= $porcIncidental;
			$this->destino	= $destino;
			$this->presentacion	= $presentacion;
			$this->actaInspeccionProduce	= $actaInspeccionProduce;
			$this->actaMuestreoProduce	= $actaMuestreoProduce;
			$this->inspectorID	= $inspectorID;
			$this->nombreInspector	= $nombreInspector;
			$this->observaciones	= $observaciones;
			$this->fechaRegistro	= $fechaRegistro;
			$this->fechaActualizar	= $fechaActualizar;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>






