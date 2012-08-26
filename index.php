<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>basic</title>
</head>
<body>
<h1>Upload files to the FileBox</h1>
<p>Make a pretty nav?</p>
<input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
<p id="prog"></p>
<ul>
    <?php
        //Requires magic quotes to be off
        $mysqli = new mysqli("localhost", "filebox", "3Y3SUKzQVKHav8fQ", "filebox");
    
        $result = $mysqli->query("SELECT ID, File_Name, File_Size, File_Type FROM files");
        while ($row = $result->fetch_assoc()) {
            echo '<li><a href="file.php?id=' . $row['ID'] . '">' . $row['File_Name'] . ' - Size: ' . $row['File_Size'] . 'B, Type: ' . $row['File_Type'] . '</a></li>';
        }
        $result->free();
        $mysqli->close();
    ?>
</ul>
<script src="jquery-1.8.0.min.js"></script>
<script src="jquery.ui.widget.js"></script>
<script src="jquery.fileupload.js"></script>
<script src="jquery.iframe-transport.js"></script>
<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $("ul").append('<li><a href="file.php?id=1">111</a></li>');
        },
        progress: function (e, data) {
            $("#prog").text(e.loaded + " / " + e.total);
        }
    });
});
</script>
</body> 
</html>