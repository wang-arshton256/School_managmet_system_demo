<?php
$conn = new mysqli("localhost", "wang", "hacker", "exodus");
if ($conn->connect_error) {
    die("could not connect to the database" . $conn->connect_error);
}
