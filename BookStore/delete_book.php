
<?php

$db = mysqli_connect('localhost', 'root', '', 'BookStore');
if(!$db) {
    echo "<p style='color: red'>The connection to the database could not be established.</p>";
    exit();
};

$query = "DELETE FROM books WHERE book_id = 10"; 
$result = mysqli_query($db, $query);

if ($result) {
    echo "<p style='color: green'> The book was deleted </p>";
}
else {
    echo "<p style='color: red'>The book was not deleted! </p>";
}

mysqli_close($db);
?>