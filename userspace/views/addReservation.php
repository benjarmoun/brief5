<?php
if(isset($_POST['id'])){
    $Employe = new EmployesController();
    $employe = $Employe->getOneEmploye();
    // die(print_r($employe));
}
if(isset($_POST['submit'])){
    $newReservation = new ReservationController();
    $newReservation->addReservation();
}
?>


<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Booking</div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="post" >
                        <!-- <div class="form-group">
                            <label for="flight_id">Flight id</label>
                            <input type="text" name="flight_id" class="form-control" placeholder="Flight Number">
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="passenger_id">passenger_id</label>
                            <input type="text" name="passenger_id" class="form-control" placeholder="Depart">
                        </div> -->
                        <div class="form-group">
                            <label for="passenger_fname">pass fname</label>
                            <input type="text" name="passenger_fname" class="form-control" placeholder="Depart">
                        </div>
                        <div class="form-group">
                            <label for="passenger_lname">pass lname</label>
                            <input type="text" name="passenger_lname" class="form-control" placeholder="Arrivé">
                            <input type="hidden" name="flight_id" value="<?php echo $employe->id;?>" >
                            <input type="hidden" name="depart" value="<?php echo $employe->depart;?>" >
                            <input type="hidden" name="arrive" value="<?php echo $employe->arrive;?>" >
                        </div>
                        <!-- <div class="form-group">
                            <label for="date_depart">Date de depart</label>
                            <input type="date" name="date_depart" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" name="prix" class="form-control" placeholder="Prix">
                        </div>
                        <div class="form-group">
                            <label for="nb_places">Nbr de places</label>
                            <input type="number" name="nb_places" class="form-control" placeholder="Nbr de places">
                        </div> -->
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>