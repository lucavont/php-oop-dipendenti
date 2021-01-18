<?php
    require_once ('dipendenti.php');

    echo $dipendente1->to_string().'<br>Compenso: '. $dipendente1->calcola_compenso().'€';

?>