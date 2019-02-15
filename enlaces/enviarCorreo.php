<?php
    class enviarCorreo{
        #Propiedades
            private $mensaje, $mensajeF, $asunto, $de, $para, $cabeceras;

        #Métodos
            //Constructor
                function __construct($m, $a, $d, $p){
                    $this->getMensaje($m);
                    $this->getAsunto($a);
                    $this->getDe($d);
                    $this->getPara($p);
                }
            //Getters
                public function getMensaje($mensaje){
                    $this->$mensaje = $mensaje;
                }
                public function getAsunto($asunto){
                    $this->$asunto = $asunto;
                }
                public function getDe($de){
                    $this->$de = $de;
                }
                public function getPara($para){
                    $this->$para = $para;
                }
            //Setters
                public function setMensaje(){
                    return $this->$mensaje;
                }
                public function setAsunto(){
                    return $this->$asunto;
                }
                public function setDe(){
                    return $this->$de;
                }
                public function setPara(){
                    return $this->$para;
                }
            //Construir y enviar mensaje
                public function enviarM(){
                    echo "--".$this->setMensaje()."--";
                    //Covertimos el mensaje en HTML
                        $this->$mensajeF = '
                            <!DOCTYPE HTML>
                            <html lang="es">
                                <head>
                                    <title>'.$this->$asunto.'</title>
                                    <meta name="charset" content="utf-8"/>
                                    <style>
                                        .cab{
                                            padding:.8cm;background:#ccc;;text-align:center;
                                        }
                                        .cab span{
                                            font-size:14pt;color:#444;
                                        }
                                        .cuer{
                                            padding:.2cm;
                                        }
                                    </style>
                                </head>
                                <body>
                                    <nav class="cab">
                                        <span>'.$this->asunto.'</span>
                                    </nav>
                                    <section class="cuer">
                                        '.$this->$mensaje.'
                                    </section>
                                </body>
                            </html>
                        ';
                    //Creamos las cabeceras
                        $this->$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                        $this->$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                    //Cabeceras adicionales
                        $this->$cabeceras .= 'To: <'.$this->$para.'>'."\r\n";
                        $this->$cabeceras .= 'From: <'.$de.'>'."\r\n";

                    // Enviarlo
                    return mail($this>$para, $this->$asunto, $this->$mensaje, $this->$cabeceras);
                }
    }
?>