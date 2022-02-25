<?php

if(isset($_POST['find'])){
    $data = new EmployesController();
    $employes = $data->findEmployes(); 
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
                        <!-- <a href="<?php echo BASE_URL;?>add" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-plus"></i>
                        </a> -->
                        <a href="<?php echo BASE_URL;?>" class="btn btn-primary btn-sm ml-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <a href="<?php echo BASE_URL;?>logout" title="Log Out" class="btn btn-link btn-sm ml-2 mb-2">
                            <i class="fas fa-user ml-1"> <?php echo $_SESSION['username'];?></i>
                        </a>

                        <form class="float-right d-flex flex-row mb-2" method="post" action="">
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
                                
                                <?php foreach($employes as $employe):?>
                                    <tr>
                                        <th scope="row"><?php echo $employe['id'];?></th>
                                        <td><?php echo $employe['flight_num'];?></td>
                                        <td><?php echo $employe['depart'];?></td>
                                        <td><?php echo $employe['arrive'];?></td>
                                        <td><?php echo $employe['date_depart'];?></td>
                                        <td><?php echo $employe['prix'];?></td>
                                        <td><?php echo $employe['nb_places'];?></td>
                                        <td class="d-flex flex-row">
                                            <form method="post" class="mr-1" action="addReservation">
                                                <input type="hidden" name="id" value="<?php echo $employe['id'];?>" >
                                                <!-- <input type="hidden" name="depart" value="<?php echo $employe['depart'];?>" >
                                                <input type="hidden" name="arrive" value="<?php echo $employe['arrive'];?>" > -->
                                                <button class="btn "><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="post" class="mr-1" action="delete">
                                                <!-- <input type="hidden" name="id" value="<?php echo $employe['id'];?>" > -->
                                                <button class="btn "><i class="fa fa-trash"></i></button>
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