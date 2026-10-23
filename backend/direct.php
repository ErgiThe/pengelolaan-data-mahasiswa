<?php
    function direct($url, $getParam) {
        if (!($getParam == "")) {
            // $concat = $url . "?message=" . urlencode($message); 
            $concat = $url . $getParam; 
        } else {
            $concat = $url;
        }
        header("Location: " . $concat); 
        exit;
    }
?>