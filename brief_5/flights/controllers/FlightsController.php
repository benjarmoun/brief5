<?php
  class FlightsController{
      public function getAllFlights(){
          $flights = Flight::getAll();
          return $flights;
      }

      public function getOneFlight()
      {
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
        
        $flight = Flight::getFlight($data);
        return $flight;
        }
      }

      public function findFlights(){
          if(isset($_POST['search'])){
              $data= array('search' => $_POST['search']);
          }
          $flights = Flight::searchFlight($data);
          return $flights;
      }

      public function addFlight(){
            if(isset($_POST['submit'])){
                $data = array(
                    'flight_num' => $_POST['flight_num'],
                    'depart' => $_POST['depart'],
                    'arrive' => $_POST['arrive'],
                    'date_depart' => $_POST['date_depart'],
                    'prix' => $_POST['prix'],
                    'nb_places' => $_POST['nb_places'],
                );
                $result = Flight::add($data);
                if($result == 'OK'){
                    Session::set('success','flight added successfully');
                    Redirect::to('home');
                }else{
                    echo $result;
                }
            }
      }

      public function updateFlight(){
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
            $result = Flight::update($data);
            if($result === 'OK'){
                Session::set('success','flight updated successfully');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
     }   
        public function deleteFlight(){
            if(isset($_POST['id'])){
                $data['id'] = $_POST['id'];
                $result = Flight::delete($data);
                if($result === 'OK'){
                    Session::set('success','flight deleted successfully');
                    Redirect::to('home');
                }else{
                    echo $result;
                }
                
            }
        }
  
  
  
    

  

  }

