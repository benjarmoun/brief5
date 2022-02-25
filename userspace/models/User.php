<?php
class User{
    static public function login($data){
        $username = $data['username'];
        // die(print_r($data));
        try{
           $query = 'SELECT * FROM user WHERE username = :username';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array(":username" => $username));
           $user = $stmt->fetch(PDO::FETCH_OBJ);
           return $user;
           if($stmt->execute()){
               return 'OK';
           }
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }


}