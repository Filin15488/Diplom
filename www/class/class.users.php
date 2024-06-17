<?php
session_start();
require_once("../inclusion/security_admin.php");


class Users {

    public function __construct()
    {
        $sql = '  SELECT id_users, name_role, stego_as.dbo.users.id_role, [activate] ,name_users, max_file_size, max_files_count, max_files_current_count, stego_as.dbo.users.[password] FROM stego_as.dbo.users 
        INNER JOIN stego_as.dbo.role ON stego_as.dbo.users.id_role = stego_as.dbo.role.id_role';

        require("../inclusion/db.php");

        $result = sqlsrv_query($conn,$sql);
    
        while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
        {
            $this->users_info[$row['id_users']] = $row;
        }

        foreach ($this->users_info as $key => $arr)
        {
            foreach($arr as $key2 => $value){
                if(is_string($value) && $key2 != 'password')
                {
                $this->users_info[$key][$key2] = trim($value);
                }
            }
        }


    }

    public function get_users_info($user_id){
        $arr = [] ;
        foreach ($this->users_info[$user_id] as $key => $value) {
            if ($key != 'password') {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }

    public function get_select_options()
    {
        $str = "";
        foreach ($this->users_info as $key => $value) {
            $str .= "<option value=\"" . $this->users_info[$key]['id_users'] . "\">" . $this->users_info[$key]['name_users'] . "</option>";
        }
        return $str;
    }

    public function get_count_users () {
        return count($this->users_info);
    }

    public function get_all_users_id () {
        $arr = [];
        foreach ($this->users_info as $key => $value) {
            $arr [] += $key;
        }
        return $arr;
    }



    // private
    private array $users_info = [];
}
