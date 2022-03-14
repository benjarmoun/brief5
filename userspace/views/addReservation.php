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
                        
                    <?php
                        for($i=0; $i<2;$i++):
                    ?>
                    <h5>Passager <?php echo $i+1 ?> </h5>
                        <div class="form-group">
                            <label class="m-2 mb-0" for="passenger_fname">passenger's first name</label>
                            <input type="text" name="passenger_fname" class="form-control m-2" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label class="m-2 mb-0" for="passenger_lname">passenger's last name</label>
                            <input type="text" name="passenger_lname" class="form-control m-2" placeholder="Last name">
                            <input type="hidden" name="flight_id" value="<?php echo $employe->id;?>" >
                            <input type="hidden" name="depart" value="<?php echo $employe->depart;?>" >
                            <input type="hidden" name="arrive" value="<?php echo $employe->arrive;?>" >
                            <input type="hidden" name="depart_date" value="<?php echo $employe->date_depart;?>" >
                            <br><br>
                        </div>
                        
                        <!-- <label class="m-2" for="myCheck">add passenger:</label> 
                        <input type="checkbox" id="myCheck" onclick="myFunction()">

                        
                        <div id="text" style="display:none">
                            <h5> <br> passenger 1</h5>
                            <div class="form-group">
                                <label class="m-2 mb-0" for="passenger_fname">passenger's first name</label>
                                <input type="text" name="passenger_fname" class="form-control m-2" placeholder="First name">
                            </div>
                            <div class="form-group">
                                <label class="m-2 mb-0" for="passenger_lname">passenger's last name</label>
                                <input type="text" name="passenger_lname" class="form-control m-2" placeholder="Last name">
                                <label class="m-2 mb-0" for="birth_date">passenger's birth date</label>
                                <input type="date" name="birth_date" class="form-control m-2" placeholder="Birthd ate">

                            </div>
                        </div> -->
                    <?php
                        endfor;
                    ?>

                    

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary m-2">ADD</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>