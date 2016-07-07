<?php

// A list of permitted file extensions
$allowed = array('doc', 'docx', 'txt', 'pdf');
$response = array('status' => 'error');

if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {

    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($extension), $allowed)) {
        $response = array('status' => 'error');
    }

    if (move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/' . $_FILES['upl']['name'])) {
        $response = array('status' => 'success', 'id' => 0);
    }
}

header('Content-type: application/json');
echo json_encode($response);
