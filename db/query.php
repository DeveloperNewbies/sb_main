<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 18:55
 */
if(!isset($_SESSION["gb_donem"])){
    session_start();
}

  class Query
  {

      protected $servername = "localhost";
      protected $username = "root";
      protected $password = "";
      protected $dbname = "saglik_bak";
      public $conn;

      public $donem ;

      function __construct ()
      {
          $this->donem = $_SESSION["gb_donem"] ;
          try {
              $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
              // set the PDO error mode to exception
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $this->conn-> exec("SET CHARACTER SET utf8");

          } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
          }
      }

      public  function all_doctor(){
          try {
              $status = $this->conn->prepare ( 'select * from doctor where donem="'.$this->donem.'"' );
              $status->execute ();

              $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

              $data = array();
              foreach ($status->fetchAll () as $key) {
                  if(isset($key["doctor_var"]))
                      $key["doctor_var"] = json_decode ($key["doctor_var"] , JSON_UNESCAPED_UNICODE);

                  array_push ($data , $key);
              }
          } catch (PDOException $err) {
              return false;
          }
          return $data;
      }

      public function doctor_adres($id,$adres){
          try{
              $query =$this->bring_doctor ($id);
                  if($query[0]["doctor_old_place"]!=0)
                    $this->update_adres ($query[0]["doctor_old_place"],"adres_select",0);

              $this->update_doctor ($id,"doctor_old_place",$adres);
              $this->update_doctor ($id,"doctor_selection","1");
              $this->update_adres ($adres,"adres_select",$id);
              $this->log_save ($id." id li doktorun adresi ".$adres." olarak değişti ");
                 return true;
          }catch (PDOException $e ){
              return false;
          }
      }

      public function doctor_durum($id,$durum){
          if($durum == "pas")
              $durum = 2;
          else if($durum == "gelmedi")
              $durum = 3;
         try{
             $this->update_doctor ($id,"doctor_selection",$durum);
             $this->log_save ($id." id li doktorun durumu ".$durum." olarak değişti");
             return true;
         }catch (PDOException $e){
             return false;
         }
      }

      public function create_komisyon_üye($name, $donem){
          $id=rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
        try {
            $sorgu = $this->conn->exec ( "INSERT INTO komisyon_üye (id,name,dönem) VALUES ('$id','$name','$donem')" );
            $this->log_save ($id." id li komisyon üyesi eklendi eklendi");
            return true;
        } catch (PDOException $e) {
            return false;
        }
      }

      public function doctor_var_num(){
          $data = array(
              "0"=>0,//yeni kayıt
              "1"=>0,//adres seçerse
              "2"=>0,//pas
              "3"=>0//gelmedi
             );

             $res_data = $this->all_doctor () ;

             if($res_data != false){
                 foreach ($res_data as $value) {
                     if($value["doctor_selection"] == "0" )
                       $data["0"] = $data["0"]+1;
                       if($value["doctor_selection"] == "1" )
                       $data["1"] = $data["1"]+1;
                       if($value["doctor_selection"] == "2" )
                       $data["2"] = $data["2"]+1;
                       if($value["doctor_selection"] == "3" )
                       $data["3"] = $data["3"]+1;
                 }
             }

             return $data;
      }


      public  function all_adres(){
          try {
              $status = $this->conn->prepare ( 'select * from adres where adres_select =0 and donem="'.$this->donem.'"' );
              $status->execute ();

              $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

              $data = array();
              foreach ($status->fetchAll () as $key) {
                  if(isset($key["address"]))
                      $key["address"] = json_decode ($key["address"] , JSON_UNESCAPED_UNICODE);

                  array_push ($data , $key);
              }
          } catch (PDOException $err) {
              return false;
          }
          return $data;
      }


      public function create_doctor ($var , $place = 0 , $old_place = 0 , $must , $donem  )
      {
          $selection = 0 ;
          $var = json_encode ($var,JSON_UNESCAPED_UNICODE);
          try {
              $sorgu = $this->conn->exec ( "INSERT INTO doctor (must,doctor_id,doctor_var,hizmet_puan,doctor_old_place,doctor_selection,donem) VALUES ('$must','$must','$var','$place','$old_place','$selection','$donem')" );
              $this->log_save ($must." id li doktor eklendi");
              return true;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function create_adres ( $adres , $adres_select = 0 , $donem )
      {
          $id = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
          $adres = json_encode ($adres ,JSON_UNESCAPED_UNICODE );
          try {
              $sorgu = $this->conn->exec ( "INSERT INTO adres (id,address,adres_select,donem) VALUES ('$id','$adres','$adres_select','$donem')" );
              $this->log_save ($id." id li adres eklendi");
              return $id;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function bring_donem($id){
        try {
            $status = $this->conn->prepare ( 'select * from donem_var where donem="'.$this->donem. '"' );
            $status->execute ();

            $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

            $data = array();
            foreach ($status->fetchAll () as $key) {
                array_push( $data , $key );
            }
        } catch (PDOException $err) {
            return false;
        }
        return $data;
      }


      public function all_donem(){
        try {
            $status = $this->conn->prepare ( 'select * from donem_var ' );
            $status->execute ();
            $result = $status->setFetchMode ( PDO::FETCH_ASSOC );
            $data = array();
            foreach ($status->fetchAll () as $key) {

                array_push( $data , $key );
            }
        } catch (PDOException $err) {
            return false;
        }
        return $data;
      }


      public function create_donem($id , $dn_name = ''){
        try {
            $sorgu = $this->conn->exec ( "INSERT INTO donem_var (id,dn_name) VALUES ('$id','$dn_name')");
            $this->log_save ($id." id li dönem eklendi");
            return true;
        } catch (PDOException $e) {
            return false;
        }
      }


      public function update_doctor ($doctor_num , $where_update , $value)
      {
          if($where_update == "doctor_var")
          {
              $value = json_encode ($value,JSON_UNESCAPED_UNICODE);
              try {
                  $sorgu = $this->conn->exec ( "UPDATE doctor SET {$where_update} = '".$value."' WHERE doctor_id = '{$doctor_num}' and  donem='".$this->donem."'" );
                  $this->log_save ($doctor_num." id li doktorun ".$where_update." sütunu güncellendi");
                  return true;
              } catch (PDOException $e) {
                  return $e;
              }
          }
          try {
              $sorgu = $this->conn->exec ( "UPDATE doctor SET {$where_update} = ".$value." WHERE doctor_id = '{$doctor_num}' and  donem='".$this->donem."'" );
              $this->log_save ($doctor_num." id li doktorun ".$where_update." sütunu güncellendi");
              return true;
          } catch (PDOException $e) {
              return $e;
          }

      }


      public function update_adres ($id , $where_update , $value)
      {
              $value = json_encode ($value, JSON_UNESCAPED_UNICODE);

          try {
              $sorgu = $this->conn->exec ( "UPDATE adres SET {$where_update}= {$value} WHERE id='$id' and  donem='".$this->donem."'" );
              $this->log_save ($id." id li adresin  ".$where_update." sütunu güncellendi");
              return true;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function bring_doctor ($doctor_num)
      {

          try {
              $status = $this->conn->prepare ( 'select * from doctor where doctor_id="' . $doctor_num . '" and  donem="'.$this->donem.'"' );
              $status->execute ();

              $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

              $data = array();
              foreach ($status->fetchAll () as $key) {
                  if(isset($key["doctor_var"]))
                       $key["doctor_var"] = json_decode ($key["doctor_var"],JSON_UNESCAPED_UNICODE);

                  array_push ($data , $key);
              }
          } catch (PDOException $err) {
              return false;
          }

          return $data;
      }


      public function bring_adres ($id)
      {
          try {
              $status = $this->conn->prepare ( 'select * from adres where id="' . $id . '" and  donem="'.$this->donem.'"' );
              $status->execute ();

              $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

              $data = array();
              foreach ($status->fetchAll () as $key) {
                  if(isset($key["address"]))
                      $key["address"] = json_decode ($key["address"],JSON_UNESCAPED_UNICODE);
                  array_push ($data , $key);
              }
          } catch (PDOException $err) {
              return false;
          }
          return $data;
      }


      private function log_save($tip = "", $ip= "0"){

          try {
              $sorgu = $this->conn->exec ( "INSERT INTO log_save (tip,user_ip) VALUES ('$tip', '$ip')" );
          } catch (PDOException $e) {

          }
      }

      function __destruct()
      {
          $this->conn = null;
      }

  }

 ?>
