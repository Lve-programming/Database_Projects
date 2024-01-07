
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
        $query = "SELECT * FROM `messages`";    
        $result = $db -> query($query);
        if( $db ->error)
            {
                echo "cannt run your sql <br>";
            }
        else
        {
            $table = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($table as $row) {
            $json = json_encode($row);
            echo $json;    
            echo "<br><br>";
        }
    }
 }
    elseif($rol == "user")

    {
            
            $query = "SELECT * FROM `messages`";    
            $result = $db -> query($query);
            if( $db ->  error)
                {
                    echo "cannt run your sql <br>";
                }
            else
                {
                $table = $result -> fetch_all(MYSQLI_ASSOC);
                foreach ($table as $row) {
                    $json = json_encode($row);
                    echo $json ;    
                }
            }
        
     }
