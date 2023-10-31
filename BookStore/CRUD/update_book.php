
<?php

$db = mysqli_connect('localhost', 'root', '', 'BookStore');
if(!$db) {
    echo "<p style='color: red'>The connection to the database could not be established.</p>";
    exit();
};

$query = "UPDATE books SET book_name = 'انقلاب هشتگ ها' ,outhor = 'مگ کیل' ,translator = 'سید علی موسوی' WHERE book_name = 'The Hashtag Revolution'"; 
$result = mysqli_query($db, $query);

if ($result) {
    echo "<p style='color: green'> The book was updated </p>";
}
else {
    echo "<p style='color: red'>The book was not updated! </p>";
}

mysqli_close($db);
?>