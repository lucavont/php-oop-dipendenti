<?php
    require_once ('dipendenti.php');

    try {    
        $dipendente1 = new ImpiegatoSuCommissione('Luca', 'Cavretti', 'CODICEFISCALE', '00000', 1000,'Ciao',500);
    } catch (Exception $e){
        echo $e->getMessage();
    }

    
    
    ?>
    <php> <?= $dipendente1->to_string(); ?> </php>
