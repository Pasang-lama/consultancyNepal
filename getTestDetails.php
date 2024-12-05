<?php


include "database/Database.php";
$db = Database::Instance();
$id = intval($_GET['id']);



// Perform the database query using the classId
$test_details = $db->CustomQuery(
    "SELECT consultancies.consultancy_name, test_preparation.title, class_table.*
    FROM consultancy_test_prep
    JOIN class_table ON consultancy_test_prep.cid = class_table.cid
    JOIN consultancies ON class_table.cid = consultancies.id
    JOIN test_preparation ON class_table.tid = test_preparation.id
    WHERE class_table.id =$id group by class_table.id"
);

// Output the result
foreach ($test_details as $detail) {
    $dateString = $detail->date;
    $formattedDate = date("j M Y", strtotime($dateString));
    $timeString = $detail->time;
    $formattedTime = date("g:i A", strtotime($timeString));

    echo
    '<div class="modal-content">
            <div class="modal-header">
                <div class="title">' . $detail->title . ' class</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
            <div class="table-wrapper mt-3">
    <table class="table">
        <tbody>
            <tr>
                <td>Class</td>
                <td>:</td>
                <td>' . $detail->title . '</td>
            </tr>
            <tr>
                <td>Institute</td>
                <td>:</td>
                <td>' . $detail->consultancy_name . '</td>
            </tr>
            <tr>
                <td>Mode</td>
                <td>:</td> 
                <td>' . ($detail->mode == '1' ? '<span>Online</span>' : 'Physical') . '</td>
               
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td>' . $formattedDate . '</td>
            </tr>
            <tr>
                <td>Time</td>
                <td>:</td>
                <td>' . $formattedTime . '</td>
            </tr>';

    if (!empty($detail->trainer_name)) :
        echo '<tr>
                    <td>Lecturer</td>
                    <td>:</td>
                    <td>' . '<span>' . $detail->trainer_name . '</span>' . '</td>
                </tr>';
    endif;
    echo '<tr>
                <td>Offer</td>
                <td>:</td>
                <td>' . ($detail->offer != '' ? '<span>' . $detail->offer . '</span>' : 'No Offer') . '</td>
                </tr>
        </tbody>
    </table>
</div>

            </div>
            <button type="button" class="register-now-btn" data-bs-toggle="modal" data-bs-target="#classRegisterForm">
                Register Now
            </button>
        </div>';
}
