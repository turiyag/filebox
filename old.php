<?php
    //Requires magic quotes to be off
    $mysqli = new mysqli("localhost", "filebox", "3Y3SUKzQVKHav8fQ", "filebox");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FileBox</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="jquery.fileupload.js"></script>
    <script type="text/javascript">
        $(function() {
            $("input[type=file]").fileupload({
                done: function (e, data) {
                    alert("hahahahahahaha");
                    $("p").html("hahahahahahahahha");
                }
            });
        });
    </script>
</head>

<body>
    <div id="header">
    </div>
    <div id="content">
        <form action="./savefile.php" method="POST" enctype="multipart/form-data" name="upload_form" id="upload_form">
            <label>Title:</label><input name="title" type="text" id="title" value="asdf" size="35">
            <label>File:</label><input type="file" name="file">    
            <input name="action" type="hidden" id="action" value="add_document">
            <input type="submit" />
        </form>
        <p id="progressp">0%</p>
        <ul>
            <?php
                echo "test";
                $result = $mysqli->query("SELECT ID, File_Name, File_Size, File_Type FROM files");
                while ($row = $result->fetch_assoc()) {
                    echo '<li><a href="file.php?id=' . $row['ID'] . '">' . $row['File_Name'] . $row['File_Size'] . $row['File_Type'] . '</a></li>';
                }
                $result->free();
                echo "test2";
            ?>
        </ul>
    </div>
    <div id="footer">
    </div>
</body>
</html>

<?php
    $mysqli->close();
?>
