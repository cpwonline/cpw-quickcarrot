<?php
    class enviarCorreo{
        #Propiedades o instancias
            private $mensaje;
            private $mensajeF;
            private $asunto;
            private $de;
            private $para;
            private $cabeceras;

        #Métodos
            //Constructor
                function __construct($m, $a, $d, $p){
                    $this->$mensaje = "mensaje Codigo";
                    $this->$asunto = "Prueba desde codigo";
                    $this->$de = "desarrollador";
                    $this->$para = "lector";

                    echo "<br><br>Mensaje: ".$this->$mensaje.", Asunto: ".$this->$asunto;
                    echo "<br>De: ".$this->de.", Para: ".$this->$para;
                    #echo "<br><br>Mensaje: ".$m.", Asunto: ".$a;
                    #echo "<br>De: ".$d.", Para: ".$p;
                }
            //Construir y enviar mensaje
                public function enviarM(){
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
                        $this->$cabeceras .= 'From: <'.$this->$de.'>'."\r\n";

                    // Enviarlo
                    //return mail($this->$para, $this->$asunto, $this->$mensaje, $this->$cabeceras);
                }
    }
?>