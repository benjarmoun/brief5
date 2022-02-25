<?php
 class Employe {
    static public function getAll(){
         $stmt = DB::connect()->prepare('SELECT * FROM flight');
         $stmt->execute();
         return $stmt->fetchAll();
         $stmt->close();
         $stmt = null;
     }

    static public function getEmploye($data){
         $id = $data['id'];
         try{
            $query = 'SELECT * FROM flight WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $employe = $stmt -> fetch(PDO::FETCH_OBJ);
            return $employe;
         } catch(PDOExeption $ex){
            echo 'erreur' . $ex->getMessage();
         }
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO flight(flight_num,depart,arrive,date_depart,prix,nb_places) VALUES(:flight_num,:depart,:arrive,:date_depart,:prix,:nb_places);');
        
        $stmt->bindParam(':flight_num',$data['flight_num']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':arrive',$data['arrive']);
        $stmt->bindParam(':date_depart',$data['date_depart']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':nb_places',$data['nb_places']);

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
     
    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE flight SET 
            flight_num = :flight_num,depart = :depart,arrive = :arrive,date_depart = :date_depart,prix = :prix,nb_places = :nb_places WHERE id = :id');
        
        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':flight_num',$data['flight_num']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':arrive',$data['arrive']);
        $stmt->bindParam(':date_depart',$data['date_depart']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':nb_places',$data['nb_places']);
        // die (print_r($data));
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
    
    static public function delete($data){
         $id = $data['id'];
         try{
            $query = 'DELETE FROM flight WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if($stmt->execute()){
                return 'OK';
            }
         } catch(PDOExeption $ex){
            echo 'erreur' . $ex->getMessage();
         }
    }

    static public function searchEmploye($data){
        $search = $data['search'];
        try{
           $query = 'SELECT * FROM flight WHERE depart LIKE ? or arrive LIKE ?';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
            return $employes= $stmt->fetchAll();
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }

}