
<?php

    $db = mysqli_connect('localhost', 'root', '', 'BookStore');
    if(!$db) {
        echo "<p style='color: red'>The connection to the database could not be established.</p>";
        exit();
    };

    $query = "INSERT INTO `users`(`user_name`, `password`, `full_name`, `phone_number`, `email`, `birth_date`) VALUES ('mohammad_amd','12345678','mohammad ahmadi','989131234567','mohammad@gmail.com','2004/05/06');";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        echo "<p style='color: green'> The user was added to the database </p>";
    }
    else {
        echo "<p style='color: red'>The user was not added to the datase </p>";
    }

    mysqli_close($db);
?>