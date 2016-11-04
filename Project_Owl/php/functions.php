<?php
require_once "db_connect.php";

function sanitizeString($_db, $str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($_db, $str);
}


function SavePostToDB($_db, $_user, $_title, $_text, $_time, $_file_name, $_filter)
{
    /* Prepared statement, stage 1: prepare query */
    if (!($stmt = $_db->prepare("INSERT INTO WALL(USER_USERNAME, STATUS_TITLE, STATUS_TEXT, TIME_STAMP, IMAGE_NAME, IMAGE_FILTER) VALUES (?, ?, ?, ?, ?, ?)")))
    {
        echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
    }

    /* Prepared statement, stage 2: bind parameters*/
    if (!$stmt->bind_param('ssssss', $_user, $_title, $_text, $_time, $_file_name, $_filter))
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
    $query = "SELECT USER_USERNAME, STATUS_TITLE, STATUS_TEXT, TIME_STAMP, IMAGE_NAME, IMAGE_FILTER FROM WALL ORDER BY TIME_STAMP DESC";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '<div class="panel panel-primary"><div class="panel-heading">"' . $row['STATUS_TITLE']
        . '" posted by ' . $row['USER_USERNAME'] 
        . '</div><div class="body"><table><tr><td><p><button type="button" class="btn btn-default btn-sm" onclick="upvote()"><span class="glyphicon glyphicon-arrow-up"></span></button></p><p><button type="button" class="btn btn-default btn-sm" onclick="downvote()"><span class="glyphicon glyphicon-arrow-down"></span></button></p></td><td><img src="' . 'users/' . $row['IMAGE_NAME'] . '" id="' . $row['IMAGE_FILTER'] . '" width="300px"><br>' . $row['STATUS_TEXT'] . '</td></tr></table></div></div>' ;
    }
    
    return $output;
}
?>
