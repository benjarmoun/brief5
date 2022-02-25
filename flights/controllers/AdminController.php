<?php
 class AdminController{
    
    public function auth(){
        if(isset($_POST['submit'])){
            $data['username'] = $_POST['username'];
            // die(print_r($data));
            $result = Admin::login($data);
            if($result->username === $_POST['username'] && $result->password === $_POST['password'] ){
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $result->username;
                Redirect::to('home');
            }else{
                Session::set('error','incorrect username or password');
                Redirect::to('login');
            }
            
        }    
    }

    // public function register(){
    //     if(isset($_POST['submit'])){
    //         $options = [
    //             'cost' => 12
    //         ];
    //         $password = $_POST['password'];
    //         $data = array(
    //             'flight_num' => $_POST['flight_num'],
    //             'depart' => $_POST['depart'],
    //             'arrive' => $_POST['arrive'],
    //         );
    //         // die(print_r($data));
    //         $result = Employe::add($data);
    //         // die(print_r($result));
    //         if($result == 'OK'){
    //             Session::set('success','flight added successfully');
    //             Redirect::to('home');
    //         }else{
    //             echo $result;
    //         }
    //     }
    //  }
    static public function logout(){
        session_destroy();

    }
 }