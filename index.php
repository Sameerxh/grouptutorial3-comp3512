<?php
//link to database 
$db = new PDO("sqlite:data/travel.db");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get countries from dropdown
$sql = "SELECT * FROM Countries";
$result =  $db->query($sql);
$countries = $result->fetchAll(PDO::FETCH_ASSOC);


// confirm if user selected a country
if (isset($_GET['country']) && $_GET['country'] != 'all') {
    // get images for country selected
    $selectedcountry = $_GET['country'];
    $sql = "SELECT * FROM ImageDetails WHERE CountryCode = 'selectedCountry'";

} else {
    // get all images
    $sql = "SELECT * FROM ImageDetails";
}

$result = $db->query(sql);
$images = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Images</title>
</head>
<body>
    <form method="get" action="index.php">
        <label>Countries:</label>
        <select name="country">
            <option value="all">All countries</option>
            <?php foreach ($countries as $country) { ?>
                <option value="<?php echo $country['CountryCode']; ?>">
                    <?php echo $country['CountryName']; ?>
            </option>
            <?php } ?>
        </select>
        <button type="submit">Filter</button>
</form>
