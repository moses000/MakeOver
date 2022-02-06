<?php

    function clean_data($data) {
        /* trim whitespace */
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    } 

?>