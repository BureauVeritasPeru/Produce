<?php
	/**
	 * Object represents table 'crm_materia_prima'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmDescartesResiduos{
		
		public $descartesResiduosID;
		public $chdID;
		public $plantaID;
		public $nombrePlanta;
		public $regionPlanta;
		public $provinciaPlanta;
		public $localidadPlanta;
		public $nroActaDR;
		public $fechaIngreso;
		public $horaIngreso;
		public $fechaTermino;
		public $horaTermino;
		public $tipoProcedencia;
		public $nombreProcedencia;
		public $ruc;
		public $tipoUnidadTransporte;
		public $placaUnidadTransporte;
		public $tipoEIP;
		public $tipoTM;
		public $tm;
		public $tmNoApto;
		public $porcNoApto;
		public $nroActaSensorial;
		public $destinoProcedencia;
		public $especie1;
		public $tm1;
		public $guia1;
		public $rp1;
		public $especie2;
		public $tm2;
		public $guia2;
		public $rp2;
		public $especie3;
		public $tm3;
		public $guia3;
		public $rp3;
		public $especie4;
		public $tm4;
		public $guia4;
		public $rp4;
		public $fechaRegistro;
		public $fechaActualizar;


		public function __construct($descartesResiduosID=NULL,$chdID=NULL,$plantaID=NULL,$nombrePlanta=NULL,$regionPlanta=NULL,$provinciaPlanta=NULL,$localidadPlanta=NULL,$nroActaDR=NULL,$fechaIngreso=NULL,$horaIngreso=NULL,$fechaTermino=NULL,$horaTermino=NULL,$tipoProcedencia=NULL,$nombreProcedencia=NULL,$ruc=NULL,$tipoUnidadTransporte=NULL,$placaUnidadTransporte=NULL,$tipoEIP=NULL,$tipoTM=NULL,$tm=NULL,$tmNoApto=NULL,$porcNoApto=NULL,$nroActaSensorial=NULL,$destinoProcedencia=NULL,$especie1=NULL,$tm1=NULL,$guia1=NULL,$rp1=NULL,$especie2=NULL,$tm2=NULL,$guia2=NULL,$rp2=NULL,$especie3=NULL,$tm3=NULL,$guia3=NULL,$rp3=NULL,$especie4=NULL,$tm4=NULL,$guia4=NULL,$rp4=NULL,$fechaRegistro=NULL,$fechaActualizar=NULL)
		{
			$this->descartesResiduosID		= $descartesResiduosID;
			$this->chdID					= $chdID;
			$this->plantaID					= $plantaID;
			$this->nombrePlanta				= $nombrePlanta;
			$this->regionPlanta				= $regionPlanta;
			$this->provinciaPlanta			= $provinciaPlanta;
			$this->localidadPlanta			= $localidadPlanta;
			$this->nroActaDR				= $nroActaDR;
			$this->fechaIngreso				= $fechaIngreso;
			$this->horaIngreso				= $horaIngreso;
			$this->fechaTermino				= $fechaTermino;
			$this->horaTermino				= $horaTermino;
			$this->tipoProcedencia			= $tipoProcedencia;
			$this->nombreProcedencia		= $nombreProcedencia;
			$this->ruc						= $ruc;
			$this->tipoUnidadTransporte		= $tipoUnidadTransporte;
			$this->placaUnidadTransporte	= $placaUnidadTransporte;
			$this->tipoEIP					= $tipoEIP;
			$this->tipoTM					= $tipoTM;
			$this->tm						= $tm;
			$this->tmNoApto					= $tmNoApto;
			$this->porcNoApto				= $porcNoApto;
			$this->nroActaSensorial			= $nroActaSensorial;
			$this->destinoProcedencia		= $destinoProcedencia;
			$this->especie1					= $especie1;
			$this->tm1						= $tm1;
			$this->guia1					= $guia1;
			$this->rp1						= $rp1;
			$this->especie2					= $especie2;
			$this->tm2						= $tm2;
			$this->guia2					= $guia2;
			$this->rp2						= $rp2;
			$this->especie3					= $especie3;
			$this->tm3						= $tm3;
			$this->guia3					= $guia3;
			$this->rp3						= $rp3;
			$this->especie4					= $especie4;
			$this->tm4						= $tm4;
			$this->guia4					= $guia4;
			$this->rp4						= $rp4;
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



	

	