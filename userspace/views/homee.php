<?php

if(isset($_POST['find'])){
    $data = new EmployesController();
    $employes = $data->findEmployes2(); 

}else{
    $data = new EmployesController();
    $employes = $data->getAllEmployes(); 
}

?>

<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php');
            ?>
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <h2></h2>
                        <form class="d-flex flex-column"  method="post" action="">
                            <div class=" d-flex  col-xs-3">
                                <div class="col-sm-6 p-3">
                                    <input type="text" class="form-control mb-3 " name="depart" placeholder="Depart">
                                    <input type="text" class="form-control mb-3" name="arrive" placeholder="Arrive">
                                </div>
                                <div class="col-sm-6 p-3">
                                    <input type="date" class="form-control mb-3" name="dated" >
                                </div>
                            </div>
                            <button class="btn btn-primary mt-0 m-3" name="find"  type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-3">
        <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php');
            ?>
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <h2 class="p-3">All flights</h2>
                        <!-- <a href="<?php echo BASE_URL;?>add" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-plus"></i>
                        </a> -->
                        <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <a id="mar" href="<?php echo BASE_URL;?>reservations" class="btn btn-primary btn-sm ml-2 mb-2">
                        <button class="btn btn-sm ">RESERVATIONS</button>
                        </a>
                        <a href="<?php echo BASE_URL;?>logout" title="Log Out" class="btn btn-link btn-sm ml-2 mb-2">
                            <i class="fas fa-user ml-1"> <?php echo $_SESSION['usern'];?></i>
                        </a>

                        <!-- <form class="float-right d-flex flex-row mb-2" method="post" action="">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                            <button class="btn btn-info btn-sm" name="find"  type="submit"><i class="fas fa-search"></i></button>
                        </form> -->
                        <!-- <div class="table-responsive"> -->
                        <table class="table caption-top table-striped ">
                        <!-- <caption>Flights list</caption> -->
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">flight Number</th>
                                <th scope="col">Depart</th>
                                <th scope="col">Arrivé</th>
                                <th scope="col">Date de depart</th>
                                <th scope="col">prix</th>
                                <th scope="col">Nbr de places</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach($employes as $employe):
                                // if(empty($employes)){
                                    
                                // }
                                    ?>
                                    
                                    <tr>
                                        <th scope="row"><?php echo $employe['id'];?></th>
                                        <td><?php echo $employe['flight_num'];?></td>
                                        <td><?php echo $employe['depart'];?></td>
                                        <td><?php echo $employe['arrive'];?></td>
                                        <td><?php echo $employe['date_depart'];?></td>
                                        <td><?php echo $employe['prix'];?></td>
                                        <td><?php echo $employe['nb_places'];?></td>
                                        <td >
                                            <form method="post" class="mr-1" action="addReservation">
                                                <input type="hidden" name="id" value="<?php echo $employe['id'];?>" >
                                                <!-- <input type="hidden" name="depart" value="<?php echo $employe['depart'];?>" >
                                                <input type="hidden" name="arrive" value="<?php echo $employe['arrive'];?>" > -->
                                                <button id="test" class="btn btn-primary">BOOK</button>
                                            </form>
                                            <!-- <form method="post" class="mr-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $employe['id'];?>" >
                                                <button class="btn "><i class="fa fa-trash"></i></button>
                                            </form> -->
                                        </td>                                    
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>