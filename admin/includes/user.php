<?php 



class User extends Db_object {

	protected static $db_table = "user";
	protected static $db_table_fields = array('username' , 'password' , 'first_name' , 'last_name' , 'user_img');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_img;
	public $tmp_path;
	public $upload_directory = "images";
	public $image_placeholder = "http://placehold.it/400x400&text=image";

	public function upload_photo() {

		if (!empty($this->errors)) {
			return false;
		}
		if (empty($this->user_img) || empty($this->tmp_path)) {
			$this->errors[] = "The file wos not available";
			return false;
		}
		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_img;
		if (file_exists($target_path)) {
			$this->errors[] = "The file {$this->user_img} already exist";
			return false;
		}
		if (move_uploaded_file($this->tmp_path,$target_path)) {
			
				unset($this->tmp_path);
				return true;
			
		} else {
			$this->errors[] = "The file directory das not have promision";
		} 


	}
	public function image_path_and_placeholder() {

		return empty($this->user_img) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_img;

	}
	public static function verify_user($username, $password ) {
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);


		$sql = "SELECT * FROM " . self::$db_table . " WHERE ";
		$sql .= "username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";

		$the_result_array = self::find_by_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

}
public function ajax_save_user_img($user_img, $user_id) {


		global $database;

		$user_img = $database->escape_string($user_img);
		$user_id = $database->escape_string($user_id);

		$this->user_img = $user_img;
		$this->id         = $user_id;

		$sql  = "UPDATE " . self::$db_table . " SET user_img = '{$this->user_img}' ";
		$sql .= " WHERE id = {$this->id} ";
		$update_image = $database->query($sql);

		
		echo $this->image_path_and_placeholder();

	}
public function delete_photo() {

		if($this->delete()) {

			$target_path = SITE_ROOT.DS. 'admin' . DS . $this->upload_directory . DS . $this->user_img;

			return unlink($target_path) ? true : false;

		} else {

			return false;

		}

	}

} // End of Class User


 ?>


















