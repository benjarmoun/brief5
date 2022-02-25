<?php

if(isset($_POST['id'])){
    $existEmploye = new EmployesController();
    $employe = $existEmploye->getOneEmploye();
    // die(print_r($employe));
}else{
    Redirect::to('home');
}
if(isset($_POST['submit'])){
    $existEmploye = new EmployesController();
    $existEmploye->updateEmploye();
}
?>
