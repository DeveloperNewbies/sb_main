<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 18:58
 */

//clear fonksiyonu çağrılıre
//dönen değer true ise kelime uygun
//dönen değer false ise kelime uygun değil

class sql_inj{
    private  $sql_string = NULL ;
    private $filter_sql_string = NULL ;
    private static $sql_syntax = array ("'","/","\\","=","or","select","where","from","insert","by","delete","^","£","$","#","join","union","root");

    function __construct(){

    }


    public function root($string, $option = false){
      $this->sql_string = trim($string);
        // html tag clear
        $this->filter_sql_string = strip_tags($this->sql_string);
        //sql code clear
        if($option == true)
        $this->filter_sql_string = str_ireplace(self::$sql_syntax , " ", $this->filter_sql_string);

        //ASCII code 32<variable<127 decode
        //$this->filter_sql_string =filter_var($this->filter_sql_string, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        //$this->filter_sql_string =filter_var($this->filter_sql_string, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_LOW);
        if( isset($this->sql_string) || isset($this->filter_sql_string)){

          //first variable and clear second variable ?=
          if($this->sql_string == $this->filter_sql_string){
              return true;
          }
          else{
            return false;
          }
        }else{
          return false;
        }
    }
    function __destruct(){
      unset($this->sql_string);
      unset($this->filter_sql_string);
    }
}
?>
