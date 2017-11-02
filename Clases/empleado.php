<?php
    include_once 'AccesoDatos.php';
    Class Empelado
    {
        private $_nombre;
        private $_apellido;
        private $_turno;
        private $_fecha_crecion;
        private $_hrIngreso;//Verificar
        private $_hrSalida;//Verificar
        private $_operaciones;//Verificar

        public function __construct($pNombre=NULL, $pApellido=NULL, $pTurno=NULL)
        {
            $this->_nombre = $pNombre;
            $this->apellido = $pApellido;
            $this->_turno = $pTurno;
            $this->_hrIngreso = time();//Verificar
            //-----------La fecha ahora esta asignada en el alta--------------
            //$fecha= date_default_timezone_set ('America/Argentina/Buenos_Aires'); 
            //$this->_fecha_crecion = date("Y-m-d");
        }

        public function getNombre()
        { return $this->_nombre; }
        public function getTurno()
        { return $this->_turno; }
        public function getFecha_creacion()
        { return $this->_fecha_crecion; }
        public function getHsIngreso()//Verificar
        { return $this->_hsIngreso; }//Verificar
        public function getHsSalida()//Verificar
        { return $this->_hsSalida; }//Verificar
        public function getOperaciones()//Verificar
        { return $this->_operaciones; }//Verificar
        
        public function setOperaciones($operaciones)//Verificar
        { $this->_operaciones=$operaciones; }//Verificar
        public function setHsSalida($hora)//Verificar
        { $this->_hsSalida=$hora; }//Verificar
    }
?>