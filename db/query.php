<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 18:55
 */

  class Query
  {

      protected $servername = "localhost";
      protected $username = "root";
      protected $password = "";
      protected $dbname = "saglik_bak";
      public $conn;

      function __construct ()
      {
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
              $status = $this->conn->prepare ( 'select * from doctor' );
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
             return true;
         }catch (PDOException $e){
             return false;
         }
      }


      public  function all_adres(){
          try {
              $status = $this->conn->prepare ( 'select * from adres where adres_select =0' );
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


      public function create_doctor ($var , $place = 0 )
      {
          $old_place = 0 ;
          $selection = 0 ;
          $id = rand(1,9).rand(1,9).rand(1,9).rand(1,9);
          $query = $this->all_doctor ();

          if(count ($query) == 0 )
              $must = 1;
          else
          $must = $query[count ($query)-1]["must"]+1;

          $var = json_encode ($var,JSON_UNESCAPED_UNICODE);
          try {
              $sorgu = $this->conn->exec ( "INSERT INTO doctor (must,doctor_id,doctor_var,hizmet_puan,doctor_old_place,doctor_selection) VALUES ('$must','$id','$var','$place','$old_place','$selection')" );
              return true;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function create_adres ( $adres )
      {
          $adres_select = 0;
          $id = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
          $adres = json_encode ($adres ,JSON_UNESCAPED_UNICODE );
          try {
              $sorgu = $this->conn->exec ( "INSERT INTO adres (id,address,adres_select) VALUES ('$id','$adres','$adres_select')" );
              return true;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function update_doctor ($doctor_num , $where_update , $value)
      {
          if($where_update == "doctor_var")
              $value = json_encode ($value,JSON_UNESCAPED_UNICODE);

          try {
              $sorgu = $this->conn->exec ( "UPDATE doctor SET {$where_update} = {$value} WHERE doctor_id='$doctor_num'" );
              return true;
          } catch (PDOException $e) {
              return $e;
          }
      }


      public function update_adres ($id , $where_update , $value)
      {
          if($where_update == "address")
              $value = json_encode ($value, JSON_UNESCAPED_UNICODE);

          try {
              $sorgu = $this->conn->exec ( "UPDATE adres SET {$where_update}='$value'  WHERE id='$id'" );
              return true;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function bring_doctor ($doctor_num)
      {
          try {
              $status = $this->conn->prepare ( 'select * from doctor where doctor_id="' . $doctor_num . '"' );
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
              $status = $this->conn->prepare ( 'select * from adres where id="' . $id . '"' );
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

      function __destruct()
      {
          $this->conn = null;
      }

  }

 ?>
