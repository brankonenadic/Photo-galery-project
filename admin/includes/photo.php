<?php 

class Photo extends Db_objext {

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title' , 'discription' , 'filename' ,'type' , 'size');
    public $photo_id;
    public $title;
    public $discription;
    public $filename;
    public $type;
    public $size;
    public $temp_path;
    public $upload_directory = "images";
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

    public function set_file($file){
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file upload here.";
            return false;
        } else if($file['error'] !=0) {
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
        $this->filename = basename($file['name']);
        $this->temp_path = $file['tmp_name'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        }
        
    }
    public function photo_path(){
        return $this->upload_directory . DS . $this->filename;
    }
    public function save(){
        if ($this->photo_id) {
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->filename) || empty($this->temp_path)) {
                $this->errors[] = "The file wos not available";
                return false;
            }
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exist";
                return false;
            }
            if (move_uploaded_file($this->temp_path,$target_path)) {
                if ($this->create()) {
                    unset($this->temp_path);
                    return true;
                }
            } else {
                $this->errors[] = "The file directory das not have promision";
            }
        
        }
    }

} // end


?>