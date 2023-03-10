<?php
//Triệu gọi đến file xử lý thông qua request
// đường dẫn
$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_role() . DIRECTORY_SEPARATOR .  get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';
// nếu đường dẫn có file
if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

// get method if get default null
// lấy method. nếu method lấy được là get thì là string rỗng còn khác get thì lấy method đó
$method = $_SERVER['REQUEST_METHOD'] === 'GET' ? '' : $_SERVER['REQUEST_METHOD'];
//cài đặt action_name mặc định là indexAction
$action_name = get_action() . ucfirst(strtolower($method)) . 'Action';
// nếu method là post thì sẽ lấy action với tên method ở giữa ví dụ indexPostAction
call_function(array('construct', $action_name));
//gọi các funtion_name