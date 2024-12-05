<?php
function sendPushNotification($message,$imageUrl) {
    // Your OneSignal App ID and REST API Key
    $appId = 'b25cdc3d-f71f-4724-8f1c-073e773523bc';
    $apiKey = 'NmViMTk4M2QtY2M0Zi00YTk0LTg4MjItZDk2YzgxYWYwODVm';

    // Create an array with the notification contents
    $fields = array(
        'app_id' => $appId,
        'included_segments' => array('All'),
        // 'include_player_ids' => $playerIds, // An array of player IDs to send the notification to
        'data' => array("foo" => "bar"),    // Custom data payload (optional)
        'contents' => array(
            'en' => $message // The notification message
        ),
        'big_picture' => $imageUrl 
    );

    $fields = json_encode($fields);

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . $apiKey // Use your REST API Key here
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Use this option carefully in production

    // Execute cURL session and get the response
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Example usage:
// $playerIds = array("All"); // Replace with actual player IDs
$imageUrl = "http://localhost/Consultancy-Nepal/cnbackend/public/uploads/country/IMG-646c5f5ff0f171.98526430.webp";
$message = "image has been upload";

$response = sendPushNotification($message,$imageUrl);
echo "Response from OneSignal: " . $response;



// $app_id = '088551f9-b784-4bf1-bc91-a1d61a65d9eb';
// $api_key = 'YjJmYzJlNjgtYWFhNS00MjUxLWFlZjctYTczMTlhMjg0NTky';

// $url = "https://onesignal.com/api/v1/players?app_id={$app_id}&limit=100"; // Adjust limit as needed
// $headers = array(
//     'Authorization: Basic ' . base64_encode($api_key . ':'),
// );

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($ch);
// curl_close($ch);

// $players = json_decode($response, true);
// echo $players;

?>

 