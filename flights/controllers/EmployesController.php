<?php
  class EmployesController{
      public function getAllEmployes(){
          $employes = Employe::getAll();
          return $employes;
      }

      public function getOneEmploye()
      {
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
        
        $employe = Employe::getEmploye($data);
        return $employe;
        }
      }

      public function findEmployes(){
          if(isset($_POST['search'])){
              $data= array('search' => $_POST['search']);
          }
          $employes = Employe::searchEmploye($data);
          return $employes;
      }

      public function addEmploye(){
            if(isset($_POST['submit'])){
                $data = array(
                    'flight_num' => $_POST['flight_num'],
                    'depart' => $_POST['depart'],
                    'arrive' => $_POST['arrive'],
                    'date_depart' => $_POST['date_depart'],
                    'prix' => $_POST['prix'],
                    'nb_places' => $_POST['nb_places'],
                );
                // die(print_r($data));
                $result = Employe::add($data);
                // die(print_r($result));
                if($result == 'OK'){
                    Session::set('success','flight added successfully');
                    Redirect::to('home');
                }else{
                    echo $result;
                }
            }
      }

      public function updateEmploye(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $_POST['id'],
                'flight_num' => $_POST['flight_num'],
                'depart' => $_POST['depart'],
                'arrive' => $_POST['arrive'],
                'date_depart' => $_POST['date_depart'],
                'prix' => $_POST['prix'],
                'nb_places' => $_POST['nb_places'],
            );
            // die(print_r($data));
            $result = Employe::update($data);
            // die(print_r($result));
            if($result === 'OK'){
                Session::set('success','flight updated successfully');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
     }   
        public function deleteEmploye(){
            if(isset($_POST['id'])){
                $data['id'] = $_POST['id'];
                $result = Employe::delete($data);
                if($result === 'OK'){
                    Session::set('success','flight deleted successfully');
                    Redirect::to('home');
                }else{
                    echo $result;
                }
                
            }
        }
  
  
  
    

  

  }

