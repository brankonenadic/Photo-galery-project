<?php

class User{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users() {
      return self::find_this_query("SELECT * FROM user");
    }

    public static function find_user_by_id($user_id){
        global $database;
        $result_set = self::find_this_query("SELECT * FROM user WHERE id=$user_id LIMIT 1");
        $user_faund = mysqli_fetch_array($result_set);
        return $user_faund;
    }


   public static function find_this_query($sql){
    global $database;
    $result_set = $database->query($sql);
    return $result_set;
   } 

   public static function instantation($the_record){
    $the_object = new self;
    /* $the_object->id =$found_user['id'];
    $the_object->username =$found_user['username'];
    $the_object->password =$found_user['password'];
    $the_object->first_name =$found_user['first_name'];
    $the_object->last_name =$found_user['last_name']; */

    foreach ($the_record as $the_attribute => $value) {
        if ($the_object->has_the_attribute($the_attribute)) {
           $the_object->the_attribute = $value;
        }
    }

    return $the_object;
   }
   private function has_the_attribute($the_attribute){
    $object_properties = get_object_vars($this);
    array_key_exists($the_attribute,$object_properties);
   }
}



?>