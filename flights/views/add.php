<?php

if(isset($_POST['submit'])){
    $newEmploye = new EmployesController();
    $newEmploye->addEmploye();
}
?>


<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Add A Flight</div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="post" >
                        <div class="form-group">
                            <label for="flight_num">Flight Number</label>
                            <input type="text" name="flight_num" class="form-control" placeholder="Flight Number">
                        </div>
                        <div class="form-group">
                            <label for="depart">Depart</label>
                            <input type="text" name="depart" class="form-control" placeholder="Depart">
                        </div>
                        <div class="form-group">
                            <label for="arrive">Arrivé</label>
                            <input type="text" name="arrive" class="form-control" placeholder="Arrivé">
                        </div>
                        <div class="form-group">
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