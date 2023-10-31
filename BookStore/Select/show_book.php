
<?php
    $rol = "user";
$db = new mysqli('localhost', 'root', '');
if($db ->   connect_error) 
    {
    echo "<p style='color: red'>The connection to the database could not be established.</p>";
    exit();
    };
$db -> select_db('bookstore');

if($db ->connect_error)
    {
    echo "<p style='color: red'>The connection to the selected database could not be established.</p>";
    exit();
    };

    if($rol == "admin") 
    {
        $query = "SELECT * FROM `books` WHERE book_id =11";    
        $result = $db -> query($query);
        if( $db ->error)
            {
                echo "cannt run your sql <br>";
            }
        else
        {
            $row = $result -> fetch_assoc();
            $json = json_encode($row);
            echo $json;    
        }
    }
 
    elseif($rol == "user")
    {
            
        $query = "SELECT book_id ,book_name ,outhor ,price FROM books where book_id = 11";    
        $result = $db -> query($query);
        if( $db ->  error)
            {
                echo "cannt run your sql <br>";
            }
        else
            {
                $row = $result -> fetch_assoc();
                $json = json_encode($row);
                echo $json;    
        
            }
        }
        