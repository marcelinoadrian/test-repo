<?php
function OpenCon()
{
    $servername = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "test-repo";

    $conn = new mysqli($servername, $dbuser, $dbpass, $db) or die ("Connect failed: " %s\n. $conn -> error);
    return $conn;
}




?>