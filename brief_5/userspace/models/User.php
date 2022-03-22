<?php
class User{
    static public function login($data){
        $usern = $data['usern'];
        // die(print_r($data));
        try{
           $query = 'SELECT * FROM user WHERE usern = :usern';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array(":usern" => $usern));
           $user = $stmt->fetch(PDO::FETCH_OBJ);
           return $user;
           if($stmt->execute()){
               return 'OK';
           }
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }

    static public function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO user(nom,prenom,usern,password,adresse,tele) VALUES(:nom,:prenom,:usern,:password,:adresse,:tele);');
        
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':usern',$data['usern']);
        $stmt->bindParam(':password',$data['password']);
        $stmt->bindParam(':adresse',$data['adresse']);
        $stmt->bindParam(':tele',$data['tele']);

        if($stmt->execute()){
            // echo "<script>alert('yes');</script>";
            return 'OK';
        }else{
            echo "<script>alert('No');</script>";
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }


}