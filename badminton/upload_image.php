<?php 

session_start();
include_once 'dbConfig.php';

$user_id = $_SESSION["user_id"];

// File upload path
$targetDir = "uploads/";

if (isset($_POST['submit_facilities'])) {
    if (!empty($_FILES["file"]["name"])) {
        $activity_id = $_POST['activity_id'];
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $db->query("INSERT INTO `m_image`(
                    `image_name`,
                    `activity_id`,
                    `create_date`,
                    `edit_date`,
                    `create_by`,
                    `edit_by`
                )
                VALUES(
                    $fileName,
                    $activity_id,
                    NOW(),
                    NOW(),
                    $user_id,
                    $user_id
                );");
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: facilities_admin.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: facilities_admin.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: facilities_admin.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: facilities_admin.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: facilities_admin.php");
    }
}

?>