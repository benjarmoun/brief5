<?php

if(isset($_POST['id'])){
    $existFlight = new FlightsController();
    $existFlight->deleteFlight();
}

?>