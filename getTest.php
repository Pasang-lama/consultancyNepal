<?php

include "database/Database.php";
$db = Database::Instance();
$id = intval($_GET['id']);

if($id==0)
{

$upcoming_classes = $db->CustomQuery("SELECT consultancies.consultancy_name,test_preparation.title,class_table.* from consultancy_test_prep join class_table 
on consultancy_test_prep.cid=class_table.cid join consultancies on class_table.cid=consultancies.id join test_preparation 
on class_table.tid = test_preparation.id group by class_table.id limit 5");
}
else{

    $upcoming_classes = $db->CustomQuery("SELECT consultancies.consultancy_name,test_preparation.title,class_table.* from consultancy_test_prep join class_table 
on consultancy_test_prep.cid=class_table.cid join consultancies on class_table.cid=consultancies.id join test_preparation 
on class_table.tid = test_preparation.id where tid=$id group by class_table.id");
}


echo '<table class="table">
<thead>
    <tr>
        <th>S.N</th>
        <th>Test Preparation</th>
        <th>Consultancy Name</th>
        <th>Start Date</th>
        <th>Class Time</th>
        <th>Offers</th>
        <th>Register Now</th>
    </tr>
</thead>

<tbody>';
   foreach ($upcoming_classes  as $key => $class) {
    $dateString=$class->date;
    $formattedDate = date("j M Y", strtotime($dateString));
    $timeString = $class->time;
    $formattedTime = date("g:i A", strtotime($timeString));

    echo '<tr>
    <td>'.++$key.'</td>
    <td>' . $class->title . '</td>
    <td>' . $class->consultancy_name . '</td>
    <td>' . $formattedDate . '</td>
    <td>' . $formattedTime . '</td>
    <td class="Offer">' . ($class->offer != '' ? '<span>' . $class->offer . '</span>' : 'No Offer') . '</td>
    <td>
    <div class="action-buttons">
        <button type="button" class="view-details-btn" data-bs-toggle="modal" onclick="testDetails(' . $class->id . ')" data-bs-target="#classDetailsModal">
            View Details
        </button>
        <button type="button" class=" register-now-btn" data-bs-toggle="modal" data-bs-target="#classRegisterForm">
            Register Now
        </button>
    </div>
</td>
</tr>';
}
echo "</tbody>
</table>";
