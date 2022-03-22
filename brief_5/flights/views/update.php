<?php

if(isset($_POST['id'])){
    $existFlight = new FlightsController();
    $flight = $existFlight->getOneFlight();
    // die(print_r($flight));
}else{
    Redirect::to('home');
}
if(isset($_POST['submit'])){
    $existFlight = new FlightsController();
    $existFlight->updateFlight();
}
?>


<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Edit A Flight</div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="post" >
                        <div class="form-group">
                            <label for="flight_num">Flight Number</label>
                           <input type="text" name="flight_num" class="form-control" placeholder="Flight Number" value="<?php echo $flight->flight_num; ?>">
                           <!-- <input type="hidden" name="id" value="<?php echo $flight->id;?>" > -->
                        </div>
                        <div class="form-group">
                            <label for="depart">Depart</label>
                            <input type="text" name="depart" class="form-control" placeholder="Depart" value="<?php echo $flight->depart;?>">
                        </div>
                        <div class="form-group">
                            <label for="arrive">Arrivé</label>
                            <input type="text" name="arrive" class="form-control" placeholder="Arrivé" value="<?php echo $flight->arrive;?>">
                        </div>
                        <div class="form-group">
                            <label for="date_depart">Date de depart</label>
                            <input type="date" name="date_depart" class="form-control"  min="<?= date("Y-m-d") ?>">
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" name="prix" class="form-control" placeholder="Prix" value="<?php echo $flight->prix;?>">
                        </div>
                        <div class="form-group">
                            <label for="nb_places">Nbr de places</label>
                            <input type="number" name="nb_places" class="form-control" placeholder="Nbr de places" value="<?php echo $flight->nb_places;?>">
                           <input type="hidden" name="id" value="<?php echo $flight->id;?>" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>