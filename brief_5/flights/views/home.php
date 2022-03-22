<?php

if(isset($_POST['find'])){
    $data = new FlightsController();
    $flights = $data->findFlights(); 
}else{
    $data = new FlightsController();
    $flights = $data->getAllFlights(); 
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
                        <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <a href="<?php echo BASE_URL;?>add" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a href="<?php echo BASE_URL;?>reservations" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-clipboard-check"></i>
                        </a>
                        <a href="<?php echo BASE_URL;?>logout" title="Log Out" class="btn btn-link btn-sm ml-2 mb-2">
                            <i class="fas fa-user ml-1"> <?php echo $_SESSION['username'];?></i>
                        </a>

                        <form class="float-right d-flex flex-row mb-2" method="post">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                            <button class="btn btn-info btn-sm" name="find"  type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <table class="table table-striped">
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
                                
                                <?php foreach($flights as $flight):?>
                                    <tr>
                                        <th scope="row"><?php echo $flight['id'];?></th>
                                        <td><?php echo $flight['flight_num'];?></td>
                                        <td><?php echo $flight['depart'];?></td>
                                        <td><?php echo $flight['arrive'];?></td>
                                        <td><?php echo $flight['date_depart'];?></td>
                                        <td><?php echo $flight['prix'];?></td>
                                        <td><?php echo $flight['nb_places'];?></td>
                                        <td class="d-flex flex-row">
                                            <form method="post" class="mr-1" action="update">
                                                <input type="hidden" name="id" value="<?php echo $flight['id'];?>" >
                                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="post" class="mr-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $flight['id'];?>" >
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
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