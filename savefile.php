<?php
    if ($_FILES && $_FILES['file']['name']) {
        $mysqli = new mysqli("localhost", "filebox", "3Y3SUKzQVKHav8fQ", "filebox");

        $fileName = $mysqli->real_escape_string($_FILES['file']['name']);
        $tmpName  = $mysqli->real_escape_string($_FILES['file']['tmp_name']);
        $fileSize = $mysqli->real_escape_string($_FILES['file']['size']);
        $fileType = $mysqli->real_escape_string($_FILES['file']['type']);
        
        $fp = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        fclose($fp);
        $content = $mysqli->real_escape_string($content);
        
        $sql = "INSERT INTO files (File_Name, File_Type, File_Size, File_Content) VALUES 
            ('" . $fileName . "', '" . $fileType . "', '".$fileSize."', '".$content."')";
            
        $res = $mysqli->query($sql);
        if ($res) {
            echo "File uploaded";
        } else {
            echo 'Error: ' . $mysqli->error;
        }
        $mysqli->close();
    } else {
        echo "asdf";
    }
?>