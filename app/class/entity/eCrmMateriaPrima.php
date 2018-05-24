<?php
	/**
	 * Object represents table 'crm_materia_prima'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmMateriaPrima{
		
		public $materiaPrimaID;
		public $chdID;
		public $plantaID;
		public $nombrePlanta;
		public $localidadPlanta;
		public $numeroActaMateria;
		public $fechaIngreso;
		public $horaIngreso;
		public $fechaTermino;
		public $horaTermino;
		public $codificacionUbicacion;
		public $tipoUnidad;
		public $placaUnidadTransporte;
		public $porcNoApto;
		public $nroActaSensorial;
		public $tipoProcedencia;
		public $nombreProcedencia;
		public $rucMatricula;
		public $especie1;
		public $tm1;
		public $destinoProcedencia;
		public $especie2;
		public $tm2;
		public $tmMateriaPrima;
		public $especie3;
		public $tm3;
		public $numeroGuia;
		public $fechaRegistro;
		public $fechaActualizar;


		public function __construct($materiaPrimaID=NULL,$chdID=NULL,$plantaID=NULL,$nombrePlanta=NULL,$localidadPlanta=NULL,$numeroActaMateria=NULL,$fechaIngreso=NULL,$horaIngreso=NULL,$fechaTermino=NULL,$horaTermino=NULL,$codificacionUbicacion=NULL,$tipoUnidad=NULL,$placaUnidadTransporte=NULL,$porcNoApto=NULL,$nroActaSensorial=NULL,$tipoProcedencia=NULL,$nombreProcedencia=NULL,$rucMatricula=NULL,$especie1=NULL,$tm1=NULL,$destinoProcedencia=NULL,$especie2=NULL,$tm2=NULL,$tmMateriaPrima=NULL,$especie3=NULL,$tm3=NULL,$numeroGuia=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->materiaPrimaID	= $materiaPrimaID;
			$this->chdID	= $chdID;
			$this->plantaID	= $plantaID;
			$this->nombrePlanta	= $nombrePlanta;
			$this->localidadPlanta	= $localidadPlanta;
			$this->numeroActaMateria	= $numeroActaMateria;
			$this->fechaIngreso	= $fechaIngreso;
			$this->horaIngreso	= $horaIngreso;
			$this->fechaTermino	= $fechaTermino;
			$this->horaTermino	= $horaTermino;
			$this->codificacionUbicacion	= $codificacionUbicacion;
			$this->tipoUnidad	= $tipoUnidad;
			$this->placaUnidadTransporte	= $placaUnidadTransporte;
			$this->porcNoApto	= $porcNoApto;
			$this->nroActaSensorial	= $nroActaSensorial;
			$this->tipoProcedencia	= $tipoProcedencia;
			$this->nombreProcedencia	= $nombreProcedencia;
			$this->rucMatricula	= $rucMatricula;
			$this->especie1	= $especie1;
			$this->tm1	= $tm1;
			$this->destinoProcedencia	= $destinoProcedencia;
			$this->especie2	= $especie2;
			$this->tm2	= $tm2;
			$this->tmMateriaPrima	= $tmMateriaPrima;
			$this->especie3	= $especie3;
			$this->tm3	= $tm3;
			$this->numeroGuia	= $numeroGuia;
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





