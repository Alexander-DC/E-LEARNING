<?php  

    class class_conection{
        private $sever="127.0.0.1";
        private $usser="root";
        private $password="";
        private $database="db_elearniing";
        
        public function connect(){
            $conexion=mysqli_connect($this->sever,$this->usser,$this->password,$this->database);
            return $conexion;
        }
    }
?>