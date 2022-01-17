<?php

if (isset($_POST['newempid-submit'])) {
    include_once "../Classes/Employee.Class.php";

    session_start();

    $objEmp = new Employee();
    $new_emp_id = $objEmp->getEmpID();

    $_SESSION["new_emp_id"] = $new_emp_id;

    header("Location: ../Admin Tasks.php");
    exit();
}

elseif (isset($_POST['newslideshow-submit'])) {
    session_start();

    $dir = "../Images/Banner/";

    $images = array();
    $files = glob($dir . "*");
    if ($files){
        foreach ($files as $filename) {
            $images[] = $filename;
        }

        for ($i=0; $i<count($images); $i++) {
            $path = $images[$i];
            unlink($path);
        }
    }

    $files = array_filter($_FILES['banner']);
    $total_files = count($_FILES['banner']['name']);

    $exts = array('jpg', 'jpeg');

    for ($i=0; $i<$total_files; $i++) {
        $fileName = $_FILES['banner']['name'][$i];
        $fileTmpName = $_FILES['banner']['tmp_name'][$i];
        $fileSize = $_FILES['banner']['size'][$i];
        $fileError = $_FILES['banner']['error'][$i];
        $fileType = $_FILES['banner']['type'][$i];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $j = $i + 1;

        if (in_array($fileActualExt, $exts)) {
            if ($fileError === 0) {
                $fileNameNew = "Banner ".$j.".".$fileActualExt;

                $fileDestination = $dir."/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);                        

                $_SESSION["outmessage"] = "bannerchange=success";
                header("Location: ../Admin Tasks.php?".$_SESSION["outmessage"]);
            }

            else {
                $_SESSION["outmessage"] = "error=uploaderror";
                header("Location: ../Admin Tasks.php?".$_SESSION["outmessage"]);
                exit();
            }
        }

        else{
            $_SESSION["outmessage"] = "error=wronguploadformat";
            header("Location: ../Admin Tasks.php?".$_SESSION["outmessage"]);
            exit();
        }
    }
}