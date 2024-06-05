<?php
class UploadFile
{

    const FILES_dir = 'files';

    public function __construct(array $file, string $stprog)
    {
            // создадим дирректорию для хранения самих файлов (на один уровень выше)
            if (!file_exists("../" . self::FILES_dir)) {
                chmod("../.", 0777);
                mkdir("../" . self::FILES_dir);
                chmod("../" . self::FILES_dir, 0777);
            }
            // создадим подкаталог для каждой стенопрограммы
            if (!file_exists("../" . self::FILES_dir . "/" . $stprog)) {
                mkdir("../" . self::FILES_dir . "/" . $stprog);
                chmod("../" . self::FILES_dir . "/" . $stprog, 0777);
            }
            $this->current_dir = "../" . self::FILES_dir . "/" . $stprog;
            $this->current_stprog = $stprog;
            $this->current_file = $file['file'];
            self::hash();
    }

    // если проверка пройдена, то она возвращает true

    public function checks (int $user_max_file_size) {
        // если все проверки пройдены, то возвращаем true
        if (!self::check_filesize($user_max_file_size)) {
            $this->err[] = "err_max_size";
        }
        if (!self::check_extension()) {
            $this->err[] = 'err_extension';
        }
        if (!self::check_file_error()) {
            $this->err[] = 'err_file_error';
        }
        if (empty($this->err)) {
            return true;
        }
        // иначе возвращаем массив ошибок
        else {
            return $this->err;
        }
    }

    // загрузка на сервера
    public function uploadOnServer ()
    {
        if (self::save_file() && self::uploadOnDB()) {
            return true;
        }

        // self::save_file();
        // self::uploadOnDB();
    }

    // запись в базу данных
    public function uploadOnDB () 
    {
        require("../inclusion/db.php");
        $sql = "  INSERT INTO stego_as.dbo.file_as ([file_name], [st_prog_name],[type],[size],[SHA1],[SHA256],[MD5]) VALUES (?,?,?,?,?,?,?)";
        $pearams = [$this->current_file['name'], $this->current_stprog, $this->current_file['type'], $this->current_file['size'], $this->hashs['SHA1'], $this->hashs['SHA256'], $this->hashs['MD5']];
        $result = sqlsrv_query($conn, $sql, $pearams);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function get_filename () {
        return $this->current_file['name'];
    }

    // private
    private $current_file; // array         |   загружаемый файл
    private $current_dir; // string         |   рабочая дирректория загружаемого файла
    private $current_stprog; // string      |   стеганопрограмма
    private $extension_db; // array         |   допустимые расширения. берём из бд
    private $err; // array                  |   возникающие ошибки
    private $hashs; //array                 |   хэши файлов   
    

    // проверка на максимальный размер файла
    private function check_filesize(int $user_max_file_size)
    {
        if (($this->current_file['size'] / (1_024 * 1_024)) > $user_max_file_size) {
            return false;
        } else {
            return true;
        }
    }

    // проверка расширения на совпадение с записанными в базу данных
    private function check_extension()
    {
        require("../inclusion/db.php");
        $sql = "SELECT extention FROM stego_as.dbo.st_prog WHERE st_prog_name = ?";
        $result = sqlsrv_query($conn, $sql, [$this->current_stprog]);
        if ($result) {
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $this->extension_db = trim(strtolower($row['extention']));
            }

            self::extension_from_db($this->extension_db);
            foreach ($this->extension_db as $ext) {
                if ($ext == strtolower(self::extension($this->current_file['name']))) {
                    // если разрешение совпадает с записанными в бд:
                    return true;
                }
            }
            return false;
        }
    }

    // проверка кода ошибки принятого файла

    private function check_file_error() {
        if ($this->current_file['error'] == 0) {
            return true;    
        }
        else {
            return false;
        }
    }

    // сохраняем файл
    private function save_file()
    {
        if (move_uploaded_file($this->current_file['tmp_name'], $this->current_dir . "/" . $this->current_file['name'])) {
            return true;
        }
    }

    // хэшируем файл
    public function hash () {
        $path = $this->current_file['tmp_name'];
        $this->hashs['SHA1'] = sha1_file($path);
        $this->hashs['SHA256'] = hash_file('sha256', $path);
        $this->hashs['MD5'] = md5_file($path);
    }

    // проверка расширения файла
    private function extension(string $str): string
    {
        $arr = explode('.', $str);
        return $arr[count($arr) - 1];
    }

    // расширения файлов из бд
    private function extension_from_db(string $str)
    {
        $arr = explode(",", $str);
        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i] = trim($arr[$i]);
        }
        $this->extension_db = $arr;
    }

}
