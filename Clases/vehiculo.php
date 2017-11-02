<?php
	Class Vehiculo
	{
		private $_patente;
		private $_marca;
		private $_color;
		private $_discapacitado;

		public function __construct($patente=NULL,$marca=NULL,$color=NULL,$discapacitado=NULL)
		{
		    $this->_patente=$patente;
		    $this->_marca=$marca;
		    $this->_color=$color;
		    $this->_discapacitado=$discapacitado;
		}

		public function getPatente()
		{ return $this->_patente; }
		public function getMarca()
		{ return $this->_marca;	}
		public function getColor()
		{ return $this->_color; }
		public function getDiscapacitado()
		{ return $this->_discapacitado; }
	}
?>