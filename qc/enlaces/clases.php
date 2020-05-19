<?php
    class principal{
        private $mensaje, $titulo, $usuario;

        function __construct($m, $t, $u){
            $this->$mensaje = $m;
        }

        public function getMensaje($mensaje){
            $this->$mensaje = $mensaje;
        }
        public function setMensaje(){
            return $this->$mensaje;
        }
        public function main(){
            echo "en el main";
            echo $this->$mensaje;
        }
    }
    echo "hello";
    $ob = new principal("hola que tal", "Hola mundo", "junior");
    $ob->main();
?>