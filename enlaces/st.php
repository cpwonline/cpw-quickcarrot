<?php
    require_once('mysqli_db.php');
    session_start();
    if(isset($_POST["null"])){
        $con = $mysqli->query("SELECT * FROM estadisticas");
        while($ro = $con->fetch_assoc()){
            $e_id = $ro["e_id"];
            $e_ayer_1 = $ro["e_ayer_1"];
            $e_ayer_2 = $ro["e_ayer_2"];
            $e_ayer_3 = $ro["e_ayer_3"];
            $e_ayer_4 = $ro["e_ayer_4"];
            $e_ayer_5 = $ro["e_ayer_5"];
            $e_ayer_6 = $ro["e_ayer_6"];
            $e_semana_1 = $ro["e_semana_1"];
            $e_semana_2 = $ro["e_semana_2"];
            $e_semana_3 = $ro["e_semana_3"];
            $e_semana_4 = $ro["e_semana_4"];
            $e_semana_5 = $ro["e_semana_5"];
            $e_semana_6 = $ro["e_semana_6"];
            $e_semana_7 = $ro["e_semana_7"];
            $e_mes_1 = $ro["e_mes_1"];
            $e_mes_2 = $ro["e_mes_2"];
            $e_mes_3 = $ro["e_mes_3"];
            $e_mes_4 = $ro["e_mes_4"];
            $e_agno_1 = $ro["e_agno_1"];
            $e_agno_2 = $ro["e_agno_2"];
            $e_agno_3 = $ro["e_agno_3"];
            $e_agno_4 = $ro["e_agno_4"];
            $e_agno_5 = $ro["e_agno_5"];
            $e_agno_6 = $ro["e_agno_6"];
            $e_agno_7 = $ro["e_agno_7"];
            $e_agno_8 = $ro["e_agno_8"];
            $e_agno_9 = $ro["e_agno_9"];
            $e_agno_10 = $ro["e_agno_10"];
            $e_agno_11 = $ro["e_agno_11"];
            $e_agno_12 = $ro["e_agno_12"];

            //Valores pred.
                $c = ","; $p = "."; $g = "-";

            //Impresión con formato para estadísticas
                //Ayer  
                    echo $e_ayer_1.$g.$e_ayer_2.$g.$e_ayer_3.$g.$e_ayer_4.$g.$e_ayer_5.$g.$e_ayer_6.$c;
                //Semana
                    echo $e_semana_1.$g.$e_semana_2.$g.$e_semana_3.$g.$e_semana_4.$g.$e_semana_5.$g.$e_semana_6.$g.$e_semana_7.$g.$c;
                //Meses
                    echo $e_mes_1.$g.$e_mes_2.$g.$e_mes_3.$g.$e_mes_4.$g.$c;
                //Agno
                    echo $e_agno_1.$g.$e_agno_2.$g.$e_agno_3.$g.$e_agno_4.$g.$e_agno_5.$g.$e_agno_6.$g.$e_agno_7.$g.$e_agno_8.$g.$e_agno_9.$g.$e_agno_10.$g.$e_agno_11.$g.$e_agno_12.$g.$c.$p;
        }
    }else
        echo "Disculpe, esta p&aacute;gina es un m&oacute;dulo importante de QuickCarrot.";
?>
