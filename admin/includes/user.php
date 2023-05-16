<?php

class User extends Db_objext {

    protected static $db_table = "user";
    protected static $db_table_fields = array('username' , 'password' , 'first_name' , 'last_name' , 'user_img');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_img;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";
    
    public function img_path_placehold(){
        return empty($this->user_img ) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_img;
    }
    public static function verify_user($username , $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE username='{$username}' AND password='{$password}' LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public function delete_user() {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_img;
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

} // end User class



?>