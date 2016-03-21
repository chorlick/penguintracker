<?php

    function log_to_stdio($string) {
    $pfile = fopen('php://stderr', 'w');
    fwrite($pfile, "[DEBUG] " .$string . "\n");
       fclose($pfile);
    }
    
?>

