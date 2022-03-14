<?php
 class UserController{
    
    public function auth(){
        if(isset($_POST['submit'])){
            $data['usern'] = $_POST['usern'];
            // die(print_r($data));
            $result = User::login($data);
            if($result->usern === $_POST['usern'] && $result->password === $_POST['password'] ){
                $_SESSION['log'] = true;
                $_SESSION['usern'] = $result->usern;
                Redirect::to('home');
            }else{
                Session::set('error','incorrect usern or password');
                Redirect::to('login');
            }
            
        }    
    }

    public function register(){
        if(isset($_POST['submit'])){
            $options = [
                'cost' => 12
            ];
            $password = $_POST['password'];
            $data = array(
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'usern' => $_POST['usern'],
                'password' => $_POST['password'],
                'adresse' => $_POST['adresse'],
                'tele' => $_POST['tele'],
            );
            // die(print_r($data));
            $result = User::createUser($data);
            // die(print_r($result));
            if($result == 'OK'){
                Session::set('success','signed up successfully');
                Redirect::to('login');
            }else{
                echo $result;
            }
        }
     }
    static public function logout(){
        session_destroy();

    }
}