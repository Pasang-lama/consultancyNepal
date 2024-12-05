<?php
require_once "database/Database.php";
$db  = Database::Instance();

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one you want to allow
    $allowedOrigins = array('http://localhost/Consultancy-Nepal');
    if (in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
        header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

// API logic to fetch data from the database
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Query the database
    $data = $db->CustomQueryApi('select consultancies.id as id,consultancies.consultancy_name,area.area as ar, consultancies.consultancy_slug,consultancies.consultancy_address,consultancies.consultancy_phone,consultancies.consultancy_mobile,consultancies.area as city,consultancies.consultancy_logo,consultancy_pages.country_id as country from rank_consultancy join consultancies on rank_consultancy.consultancy_id=consultancies.id JOIN consultancy_pages ON consultancies.id= consultancy_pages.consultancy_id JOIN area on consultancies.area = area.id ORDER BY `rank_consultancy`.`rank` ASC');
    if (empty($data)) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(array('error' => 'Internal Server Error'));
    } else {

        header('Content-Type: application/json');
        echo json_encode($data);
        die;
    }

    // Send JSON response


} else {
    // Handle unsupported HTTP methods
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(array('error' => 'Method Not Allowed'));
}
