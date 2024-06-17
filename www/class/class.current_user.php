<?php
session_start();

class CurrentUser {
    public function __construct()
    {
        // берём из бд всю информацию о пользователе
        require("../inclusion/db.php");
        $sql = "  SELECT id_users, U.id_role, name_role, name_users, [password], max_file_size, max_files_count, max_files_current_count  FROM stego_as.dbo.users U INNER JOIN stego_as.dbo.role R
        ON U.id_role = R.id_role   
        WHERE id_users = ?";
        $params = [$_SESSION['id_users']];
        $result = sqlsrv_query($conn,$sql,$params);
        if ($result){
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                $this->user_data = $row;
            }
        }

        // обрабатываем её (тримим)
        foreach ($this->user_data as $key => $value) {
            if (gettype($value) == 'string'){
                $this->user_data[$key] = trim($value);
            }
        }


        
    }

    public function get_id () {
        return $this->user_data['id_users'];
    }

    public function get_data () {
        return $this->user_data;
    }

    // private
    private $user_data;
}