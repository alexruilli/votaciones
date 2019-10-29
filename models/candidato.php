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

        public function guardar(){

        }

    }
?>