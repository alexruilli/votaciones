<?php 
    
    class candidato extends Helper{
        public $id;
        public $nombre;
        public $apellido;
        public $propuesta;
        public $descripcion;
        public $cif;

        private $image_candidato;
        private $root='fotos/';

        public function id($valor){

        }
        public function nombre($valor){

        }
        public function apellido($valor){

        }
        public function propuesta($valor){

        }
        public function descripcion($valor){

        }
        public function cif($valor){

        }
        public function imagen($file, $name){
            if($this->validateImageFile($file, $this->root, $name, 500, 500)){
                $this->image_candidato=$this->getImageName();
                return true;
            }
            else{
                return false;
            }
        }
        public function getRoot(){
            return $this->root;
        }

        public function getImage(){
            return $this->image_candidato;
        }

        function guardar(array $fields){
            //require('config\db.php');
            $mysqli = new mysqli("localhost", "root", "", "votaciones");
            if($mysqli->connect_error) {
            exit('Error connecting to database'); //Should be a message a typical user could understand in production
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $mysqli->set_charset("utf8mb4");

            $stmt = $mysqli->prepare("INSERT INTO candidatos VALUES (NULL, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(111,11);
            $stmt->execute();
            $stmt->close();
        }

    }
?>