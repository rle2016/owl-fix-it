<?php
require_once "db_connect.php";

function sanitizeString($_db, $str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($_db, $str);
}


function SavePostToDB($_db, $_user, $_description, $_location, $_time, $_status, $_file_name)
{
    /* Prepared statement, stage 1: prepare query */
    if (!($stmt = $_db->prepare("INSERT INTO owl_wall(post_id, posted_by, post_description, post_location, post_date, post_status, image_name) VALUES ('id',?, ?, ?, ?, ?, ?)")))
    {
        echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
    }

    /* Prepared statement, stage 2: bind parameters*/
    if (!$stmt->bind_param('ssssss', $_user, $_description, $_location, $_time, $_status, $_file_name))
    {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    /* Prepared statement, stage 3: execute*/
    if (!$stmt->execute())
    {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
}

function getPostcards($_db)
{
    $query = "SELECT posted_by, post_location, post_description, post_status, image_name, post_date FROM owl_wall";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '<div class="panel panel-primary"><div class="panel-heading">"' . $row['post_location']
        . '" posted by ' . $row['posted_by'] 
        . '</div><div class="body"><img src="' . 'users/' . $row['image_name'] . '" width="300px"><br>' . $row['post_status'] . '</div></div>' ;
    }
    
    return $output;
}
?>
