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
    public $custom_errors = array();
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
} // end


?>