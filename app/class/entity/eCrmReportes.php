<?php
	/**
	 * Object represents table 'crm_reportes'
	 *
     	 * @author: Junior Huallullo
     	 * @date: 2012-11-30 17:14
	 */
	class eCrmReportes{
		
		public $regionPlanta;
		public $puertoPlanta;
		public $nombrePlanta;
		public $nombreEmbarcacion;
		public $matriculaEmbarcacion;
		public $numReporteCala;
		public $correlativo;
		public $fechaCala;
		public $codigoFaenaWeb;
		public $horaCala;
		public $latitud;
		public $minLat;
		public $segLat;
		public $longitud;
		public $minLong;
		public $segLong;
		public $tmDeclaradas;
		public $porcJuveniles;
		public $porcEspecie;
		public $especie;
		public $comentarios;
		public $pendiente;
		public $descargaTM;
		public $fechaDescarga;
		public $moda;
		public $estadio;
		public $observaciones;
		public $zonaPlanta;
		public $armador;
		public $nroTolva;
		public $nroReportePesaje;
		public $capacidadBodega;
		public $tmDescargado;
		public $pescaDeclarada;
		public $numActaInspeccion;
		public $fechaInicial;
		public $horaInicio;
		public $fechaFinal;
		public $horaTermino;
		public $empresaSupervisora;
		public $numReporteOcurrencia;
		public $infractor;
		public $actaDecomiso;
		public $tmDecomisado;
		public $subCodigoNumeroDecomiso;
		public $nroParteMuestreo;
		public $nroActa;
		public $tipoActa;
		public $obsInusuales;
		public $pesoTM;
		public $frecuencia;
		public $frecuencia7_5;
		public $frecuencia8;
		public $frecuencia8_5;
		public $frecuencia9;
		public $frecuencia9_5;
		public $frecuencia10;
		public $frecuencia10_5;
		public $frecuencia11;
		public $frecuencia11_5;
		public $frecuencia12;
		public $frecuencia12_5;

		public $frecuencia13;
		public $frecuencia13_5;
		public $frecuencia14;
		public $frecuencia14_5;
		public $frecuencia15;
		public $frecuencia15_5;
		public $frecuencia16;
		public $frecuencia16_5;
		public $frecuencia17;
		public $frecuencia17_5;
		public $nombre1;
		public $codigo1;
		public $nombre2;
		public $codigo2;
		public $nombre3;
		public $codigo3;
		public $numeroActaDesembarque;
		public $numeroActaMuestreo;
		public $cierrePuerto;
		public $frecuencia18;
		public $pregunta1;
		public $pregunta2;
		public $pregunta3;
		public $pregunta4;
		public $pregunta5;
		public $pregunta6;
		public $pregunta7;
		public $pregunta8;
		public $pregunta9;
		public $pregunta10;
		public $pregunta11;
		public $pregunta12;
		public $reporteCala;
		public $zonaPesca;


		public function __toString()
		{
			return Collection::objectToString($this);
		}		
	}
	?>


