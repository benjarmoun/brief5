<?php

if(isset($_POST['id'])){
    $existEmploye = new EmployesController();
    $existEmploye->deleteEmploye();
    // die(print_r($employe));
}

?>