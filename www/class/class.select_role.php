<?php

class SelectRole
{
    public function __construct()
    {
        require("../inclusion/db.php");
        $sql = "SELECT id_role, name_role FROM stego_as.dbo.role";
        $result = sqlsrv_query($conn, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->list_role[] = trim($row['name_role']);
            $this->id_role[] = (int) $row['id_role'];
        }
    }

    public function get_list_roles(): array
    {
        return $this->list_role;
    }

    public function get_select_options()
    {
        $str = '';
        foreach ($this->list_role as $key => $value) {
            $str .= "<option value=\"" . $this->list_role[$key] . "\">" . $this->list_role[$key] . "</option>";

        }
        return $str;
    }

    public function get_select_options_id() {
        $str = '';
        foreach ($this->list_role as $key => $value) {
            $str .= "<option value=\"" . $this->id_role[$key] . "\">" . $this->list_role[$key] . "</option>";
        }
        return $str;
    }

    // private
    private $list_role;
    private $id_role;
}
