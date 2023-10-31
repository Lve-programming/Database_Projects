
<?php

    $db = mysqli_connect('localhost', 'root', '', 'BookStore');
    if(!$db) {
        echo "<p style='color: red'>The connection to the database could not be established.</p>";
        exit();
    };

    $query = "INSERT INTO `messages`(`title`, `body`, `email`) VALUES ('hello','hello world','mohammad@gamil.com')";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        echo "<p style='color: green'> The message was sent </p>";
    }
    else {
        echo "<p style='color: red'>The message was not sent </p>";
    }

    mysqli_close($db);
?>