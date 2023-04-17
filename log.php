<?php
    session_start();
    $date = getdate();
    $s = $date['seconds'];
    $m = $date['minutes'];
    $h = $date['hours'];
    $wd = $date['weekday'];
    $md = $date['mday'];
    $M = $date['month'];
    $y = $date['year'];
    $stringDate = $wd . ' ' . $md. ' '  . $M. ' ' . $y . ' ' . $h . ':' . $m .':' . $s ;
    $instruction = 'INSERT INTO Korra_dev_Statistics(Source, IP_Adress, visite_date) VALUES ("Korra.dev/kaamelott_citation","' . $_SERVER['REMOTE_ADDR'] . '","' . $stringDate . '");';
    try{
        $db->query($instruction);
    }catch(Exception $e){
        echo('Error : '. $e->getMessage());
    }
?>