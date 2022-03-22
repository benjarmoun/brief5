<?php
 class AdminController{
    
    public function auth(){
        if(isset($_POST['submit'])){
            $data['username'] = $_POST['username'];
            // die(print_r($data));
            $result = Admin::login($data);
            if($result->username === $_POST['username'] && password_verify($_POST['password'],$result->password )  ){
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $result->username;
                
                Redirect::to('home');
            }else{
                Session::set('error','incorrect username or password');
                Redirect::to('login');
            }
            
        }    
    }

    static public function logout(){
        session_destroy();

    }
 }