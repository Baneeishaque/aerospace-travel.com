<?php
$target = "pics/";
$target = $target . basename($_FILES['Filename']['name']);

//This gets all the other information from the form
$Filename = basename($_FILES['Filename']['name']);
$Description = $_POST['Description'];


//Writes the Filename to the server
if (move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
    //Tells you if its all ok
    echo "The file " . basename($_FILES['Filename']['name']) . " has been uploaded, and your information has been added to the directory";
    // Connects to your Database
    mysql_connect("localhost", "filebirb_test", "9287393415") or die(mysql_error());
    mysql_select_db("filebirb_test") or die(mysql_error());

    //Writes the information to the database
    mysql_query("INSERT INTO picture (Filename,Description)
    VALUES ('$Filename', '$Description')");
} else {
    //Gives and error if its not
    echo "Sorry, there was a problem uploading your file.";
}


?>
