<?php
class Programs {

    function __construct() {
        require("../inclusion/db.php");
        $sql = "SELECT * from [stego_as].[dbo].[types_2]";
        $result = sqlsrv_query($conn, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->types[] = $row;
        }
        $sql = "SELECT * FROM stego_as.dbo.st_prog";
        $result = sqlsrv_query($conn, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->programs[] = $row;
        }
        $sql = "SELECT * FROM stego_as.dbo.file_as";
        $result = sqlsrv_query($conn, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->prog_files[] = $row;
        }

    }

    public function get_select_types() {
        $str = '';
        for ($i=0; $i < count($this->types); $i++) {
            $str .= "<option value=\"" . $this->types[$i]['type_stego'] . "\">" . $this->types[$i]['type_stego'] . "</option>";
        }

        return $str;
    }

    public function get_select_OS () 
    {
        $str = '';
        for ($i=0; $i < count($this->types); $i++) {
            $str .= "<option value=\"" . $this->types[$i]['type_OS'] . "\">" . $this->types[$i]['type_OS'] . "</option>";
        }

        return $str;

    }

    public function get_select_programs() {
        $str = '';
        for ($i=0; $i < count($this->programs); $i++) {
            $str .= "<option value=\"" . $this->programs[$i]['st_prog_name'] . "\">" . $this->programs[$i]['st_prog_name'] . "</option>";
        }

        return $str;
    }

    public function get_prog_info ($prog_name) 
    {
        for ($i=0; $i < count($this->programs); $i++) {
            if (trim($this->programs[$i]['st_prog_name']) == trim($prog_name)) {
                return $this->programs[$i];
            }
        }

    }

    public function get_prog_files ($prog_name)
    {
        $arr = [];
        for ($i=0; $i < count($this->prog_files); $i++) {
            if (trim($this->prog_files[$i]['st_prog_name']) == trim($prog_name)) {
                $arr [] = $this->prog_files[$i];
            }
        }
        return $arr;

    }

    public function delete_prog ($prog_name)
    {
        $sql = '';
        require("../inclusion/db.php");
        $sql = "DELETE FROM stego_as.dbo.st_prog WHERE st_prog_name = ?";
        $params = [$prog_name];
        $result = sqlsrv_query($conn, $sql, $params);
        if ($result) {
            $sql = "DELETE FROM stego_as.dbo.file_as WHERE st_prog_name = ?";
            $result = sqlsrv_query($conn, $sql, $params);
            if ($result) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    // private

    private array $types;
    private array $programs;
    private array $prog_files;


}