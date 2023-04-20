<?php

class User{

    public function find_all_users() {
        global $database;

        $result_set = $database->query("SELECT * FROM user");
        return $result_set;
    }

}



?>