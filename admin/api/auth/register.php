<?php
include '../db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // required username 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];

        $check_sql = "SELECT * FROM members WHERE username = :username";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bindParam(':username', $username);
        $check_stmt->execute();

        if ($check_stmt->rowCount() > 0) {
            throw new Error(json_encode(['msg' => 'Username already exists.']));
        }
        $insert_sql = "INSERT INTO members (username, password, fullname, phone)
        VALUES (:username, :password, :fullname, :phone)";

        $insert_stmt = $conn->prepare($insert_sql);

        $insert_stmt->bindParam(':username', $username);
        $insert_stmt->bindParam(':password', $password);
        $insert_stmt->bindParam(':fullname', $fullname);
        $insert_stmt->bindParam(':phone', $phone);
        $insert_stmt->execute();
        http_response_code(200);
        echo json_encode(['msg' => 'registration succesfully.']);
    } catch (\Throwable $th) {
        http_response_code(500);
        echo json_encode(['msg' => 'Server error.']);
    }
} else {
    http_response_code(500);
    echo 'Server Error';
}
