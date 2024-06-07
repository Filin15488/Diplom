<?php
// $data = [
//     "user_id" => json_decode($_POST[]),
// ];

require_once("../class/class.users.php");
$users = new Users;
// echo ((json_encode($users->get_users_info(1))));

$json_data = file_get_contents('php://input');

// Распарсиваем JSON данные
$data = json_decode($json_data);

// Проверяем успешность распарсивания
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    // Возникла ошибка при распарсивании JSON данных
    $response = array("error" => "Ошибка при распарсивании JSON данных");
    http_response_code(400); // Устанавливаем статус код ответа 400 Bad Request
    echo json_encode($response);
} else {
    // JSON данные успешно распарсены
    // $data содержит ваши данные в виде объекта или массива
    // Например, вы можете получить значение 'value' из пришедших данных
    $value = $data->value;
    
    // Делаем что-то с полученными данными, например, отправляем ответ обратно
    // $response = array("success" => true, "value" => $value);
    echo json_encode($users->get_users_info($value));
}
?>
