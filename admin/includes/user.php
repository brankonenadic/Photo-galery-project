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
    public $temp_path;
    public $errors = array();
    public $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error, the file uploaded with success.",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Cannot write to target directory. Please fix CHMOD.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    );
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
  
    public function save_user_and_image(){
     
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->user_img) || empty($this->temp_path)) {
                $this->errors[] = "The file wos not available";
                return false;
            }
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_img;
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->user_img} already exist";
                return false;
            }
            if (move_uploaded_file($this->temp_path,$target_path)) {
                
                    unset($this->temp_path);
                    return true;
                
            } else {
                $this->errors[] = "The file directory das not have promision";
            } 
        
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