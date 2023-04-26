<?php


class Db_objext {

    protected static $db_table = "user";
    public static function find_all() {
        return static::find_this_query("SELECT * FROM " . static::$db_table . "");
      }
  
      public static function find_by_id($user_id){
          global $database;
          $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id=$user_id LIMIT 1");
          return !empty($the_result_array) ? array_shift($the_result_array) : false;
          
      }

      public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantion($row);
        }
        return $the_object_array;
    }

    public static function instantion($find){
        
        $colling_class = get_called_class();
        $the_object = new $colling_class;
  
        foreach ($find as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }
    
    private function has_the_attribute($the_attribute) {
        $object_property = get_object_vars($this);
       return array_key_exists($the_attribute, $object_property);
    }




} // emd


?>