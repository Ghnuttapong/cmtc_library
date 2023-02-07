<?php
include '../db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // required username 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 1) {
        $sql = 'SELECT * FROM staffs WHERE username = ? AND password = ?';
    }else {
        $sql = 'SELECT * FROM members WHERE username = ? AND password = ?';
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $password]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count == 0) {
        http_response_code(400);
        echo json_encode(['msg' => 'Invalid ' . $username]);
        return;
    }

    foreach ($stmt->fetchAll() as $value) {
        $_SESSION['user_id'] = $value['id'];
        $_SESSION['fullname'] = $value['fullname'];
        $_SESSION['username'] = $value['username'];
        $role == 1 ? $_SESSION['position'] = $value['position'] : '';
    }

    http_response_code(200);
    echo json_encode(['msg' => 'logined succesfully.']);
} else {
    http_response_code(500);
    echo 'Server Error';
}
