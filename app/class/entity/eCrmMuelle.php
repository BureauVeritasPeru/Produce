<?php
	/**
	 * Object represents table 'crm_materia_prima'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmMuelle{
		
		public $muelleID;
		public $chdID;
		public $embarcacionID;
		public $nombreEmbarcacion;
		public $tipoEmbarcacion;
		public $nroRucDni;
		public $armador;
		public $estadoPermiso;
		public $baliza;
		public $muelleDesembarcadero;
		public $region;
		public $localidad;
		public $especie;
		public $totalDescargado;
		public $nroCubetas;
		public $fechaDescarga;
		public $horaIngreso;
		public $horaTermino;
		public $fuentePrimeraInformacion;
		public $nroDocumento;
		public $fechaObtencionPermiso;
		public $fechaRegistro;
		public $fechaActualizar;
		


		public function __construct($muelleID=NULL,$chdID=NULL,$embarcacionID=NULL,$nombreEmbarcacion=NULL,$tipoEmbarcacion=NULL,$nroRucDni=NULL,$armador=NULL,$estadoPermiso=NULL,$baliza=NULL,$muelleDesembarcadero=NULL,$region=NULL,$localidad=NULL,$especie=NULL,$totalDescargado=NULL,$nroCubetas=NULL,$fechaDescarga=NULL,$horaIngreso=NULL,$horaTermino=NULL,$fuentePrimeraInformacion=NULL,$nroDocumento=NULL,$fechaObtencionPermiso=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->muelleID	= $muelleID;
			$this->chdID	= $chdID;
			$this->embarcacionID	= $embarcacionID;
			$this->nombreEmbarcacion	= $nombreEmbarcacion;
			$this->tipoEmbarcacion	= $tipoEmbarcacion;
			$this->nroRucDni	= $nroRucDni;
			$this->armador	= $armador;
			$this->estadoPermiso	= $estadoPermiso;
			$this->baliza	= $baliza;
			$this->muelleDesembarcadero	= $muelleDesembarcadero;
			$this->region	= $region;
			$this->localidad	= $localidad;
			$this->especie	= $especie;
			$this->totalDescargado	= $totalDescargado;
			$this->nroCubetas	= $nroCubetas;
			$this->fechaDescarga	= $fechaDescarga;
			$this->horaIngreso	= $horaIngreso;
			$this->horaTermino	= $horaTermino;
			$this->fuentePrimeraInformacion	= $fuentePrimeraInformacion;
			$this->nroDocumento	= $nroDocumento;
			$this->fechaObtencionPermiso	= $fechaObtencionPermiso;
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





