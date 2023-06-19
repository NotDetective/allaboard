<?php

if (isset($_POST['submit'])) {

    require_once 'conn.php';

    session_start();

    $id = $_SESSION['users-id'];



    $targetDir = "../upload-user-images/";

    $fileName = basename($_FILES["profile-picture"]["name"]);

    $targetFilePath = $targetDir . $fileName;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (in_array($fileType, $allowTypes)) {

        if (move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $targetFilePath)) {

            $data = [
                'id' => $id,
                'profile' => $fileName
            ];

            $sql = "UPDATE users SET profile=:profile WHERE id=:id";

            $stmt = $conn->prepare($sql);

            $stmt->execute($data);

            $_SESSION['users-avatar'] = $fileName;


            header("location: ../account-page-information.php");
        }
    } else {
    }
} else {
    header("Location: ../index.php");
}
