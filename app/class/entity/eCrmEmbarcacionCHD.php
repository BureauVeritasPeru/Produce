<?php
	/**
	 * Object represents table 'crm_cala'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmEmbarcacionCHD{
		
		public $embarcacionID;
		public $chdID;
		public $unidadMedida;
		public $fechaRegistro;
		
		public function __construct($embarcacionID=NULL, $chdID=NULL, $unidadMedida=NULL, $fechaRegistro=NULL)
		{
			$this->embarcacionID		= $embarcacionID;
			$this->chdID				= $chdID;
			$this->unidadMedida			= $unidadMedida;
			$this->fechaRegistro		= $fechaRegistro;
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>