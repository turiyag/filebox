<?php
    //Requires magic quotes to be off
    if(isset($_GET['id'])) {
        if (preg_match('/^[0-9]+$/', $_GET['id']) == 1) {
            $mysqli = new mysqli("localhost", "filebox", "3Y3SUKzQVKHav8fQ", "filebox");
            $result = $mysqli->query("SELECT * FROM files WHERE ID = " . $_GET['id']);
            if (!$result) {
                printf("Errormessage: %s\n", $mysqli->error);
                die();
            }
            
            if ($row = $result->fetch_assoc()) {
                header("Content-length: " . $row['File_Size']);
                header("Content-type: " . $row['File_Type']);
                header('Content-Disposition: attachment; filename="' . $row['File_Name'] . '"');
                echo $row['File_Content'];
            }
            $result->free();
            $mysqli->close();
        } else {
            echo "Invalid id";
        }
    } else {
        echo "Missing id";
    }
?>