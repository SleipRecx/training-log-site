<?php
session_start();
include_once("connection.php");
if(empty($_SESSION['logged_in'])) {
    header('Location: ../index.php');
    exit;
}
if(!empty($_POST["exercise_name"])){

    $name = $_POST["exercise_name"];
    $group = $_POST["muscle_group"];
    $category = $_POST["category"];
    $personid_fk = $_POST["personid_fk"];

    $sql = /** @lang text */
        "INSERT INTO exercise(exercise_name,muscle_group,category,personid_fk)
     VALUES ('$name','$group','$category','$personid_fk')";

    $retval = mysql_query($sql);

    if(! $retval) {
        die('Could not enter data: ' . mysql_error());
    }
}

header('Location: exercise.php');

