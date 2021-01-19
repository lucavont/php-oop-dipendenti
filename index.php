<?php
    require_once ('dipendenti.php');
    
    $dipendente1 = new ImpiegatoSuCommissione('Luca', 'Cavretti', 'CODICEFISCALE', '00000', 1000,'Ciao',500);

    echo $dipendente1->to_string();


?>