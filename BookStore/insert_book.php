
<?php

$db = mysqli_connect('localhost', 'root', '', 'BookStore');
if(!$db) {
    echo "<p style='color: red'>The connection to the database could not be established.</p>";
    exit();
};

$query = "INSERT INTO `books`(`book_name`, `subject`, `outhor`, `price`, `isbn`, `book_size`, `translator`, `cover_type`, `print_series`, `publish_date`, `pages`, `details`, `publisher`, `statuse`) VALUES ('The Hashtag Revolution','Media','Meg kale',1100000,123-456-7890-0,'midle','Sayyed Ali Musavi','gelase',1,1401/01/01,210,'the good book about media and slactivist humans','Nasle Roshan','visible')"; 
$result = mysqli_query($db, $query);

if ($result) {
    echo "<p style='color: green'> The book was added to the database </p>";
}
else {
    echo "<p style='color: red'>The book was not added to the datase </p>";
}

mysqli_close($db);
?>