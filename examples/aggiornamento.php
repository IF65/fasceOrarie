<?php
    @ini_set('memory_limit','512M');

    require(realpath(__DIR__ . '/..').'/vendor/autoload.php');
    require(realpath(__DIR__ . '/..').'/src/Database/autoload.php');

    use Database\Database;

    $timeZone = new \DateTimeZone('Europe/Rome');
    
    echo '- Inizio elaborazione            : '.(new \DateTime())->setTimezone($timeZone)->format('H:i:s')."\n\n";
    $db = new Database($sqlDetails);

    //$db->percentili->aggiorna();
    $dati = $db->percentili->ricerca();
    
    echo '- Fine elaborazione            : '.(new \DateTime())->setTimezone($timeZone)->format('H:i:s')."\n\n";
    print_r($dati);
?>