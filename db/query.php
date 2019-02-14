<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 18:55
 */


require_once($rota."db/db_con.php");
require_once($rota."sec/sql_inj.php");

  class Query extends database
  {

      function __construct ($db_name)
      {
          parent::__construct ( $db_name );
      }

      public  function all_doctor(){
          try {
              $status = $this->conn->prepare ( 'select * from doctor' );
              $status->execute ();

              $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

              $data = array();
              foreach ($status->fetchAll () as $key) {
                  array_push ($data , $key);
              }
          } catch (PDOException $err) {
              return false;
          }
          return $data;
      }


      public  function all_adres($parameters = 0){
          try {
              $status = $this->conn->prepare ( 'select * from adres where adres_status ='.$parameters );
              $status->execute ();

              $result = $status->setFetchMode ( PDO::FETCH_ASSOC );

              $data = array();
              foreach ($status->fetchAll () as $key) {
                  array_push ($data , $key);
              }
          } catch (PDOException $err) {
              return false;
          }
          return $data;
      }


      public function create_doctor ($num ,$id, $var , $place = 0 , $old_place = 0 , $selection = 0)
      {
          $var = json_encode ($var,JSON_UNESCAPED_UNICODE);
          try {
              $sorgu = $this->conn->exec ( "INSERT INTO doctor (must,doctor_id,doctor_var,doctor_place_id,doctor_old_place,doctor_selection) VALUES ('$num','$id','$var','$place','$old_place','$selection')" );
              return true;
          } catch (PDOException $e) {
              return false;
          }
      }


      public function create_adres ($id , $adres , $adres_select , $adres_status)
      {
          try {
              $sorgu = $this->conn->exec ( "INSERT INTO adres (id,address,adres_select,adres_status) VALUES ('$id','$adres','$adres_select','$adres_status')" );
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
                  $data[0] = $key["must"];
                  $data[1] = $key["doctor_id"];
                  $data[2] = json_decode ($key["doctor_var"],JSON_UNESCAPED_UNICODE);
                  $data[3] = $key["doctor_place_id"];
                  $data[4] = $key["doctor_old_place"];
                  $data[5] = $key["doctor_selection"];
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
                  $data[0] = $key["id"];
                  $data[1] = $key["address"];
                  $data[2] = $key["adres_select"];
                  $data[3] = $key["adres_status"];
              }
          } catch (PDOException $err) {
              return false;
          }

          return $data;
      }

  }

 ?>