<?php

if(isset($_POST['submit'])){
    $loginAdmin = new AdminController();
    $loginAdmin->auth(); 
}else{
    // die(print('error'));

}

?>


<div class="container">
    <div class="row my-3">
        <div class="col-md-5 mx-auto">
            <?php include('./views/includes/alerts.php');
            ?>
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <div class="card-header">
                            <h3 class="text-center">Connexion </h3>
                        </div>
                        <form method="post" class="mr-1" >
                            <div class="form-group">
                                <input type="text" name="username" placeholder="User name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <button name="submit" class="btn btn-sm btn-primary">Connexion</button>
                        </form>
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>