<?php
//link to database 
$db = new PDO("sqlite:data/travel.db");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get countries from dropdown
$sql = "SELECT * FROM Countries";
$result =  $db->query($sql);
$countries = $result->fetchAll(PDO::FETCH_ASSOC);


// confirm if user selected a country
