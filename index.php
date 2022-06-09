<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/market.php";
use MongoDB\Client;

$client = new \MongoDB\Client("mongodb://127.0.0.1/");
$db = $client->market->items;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maksim</title>
    <script src = "script.js"></script>
</head>
<body>
<form action="" method="post">
    <input type="submit" value="Vendors" name="vendor"><br>

</form>
<br>
<form action="" method="post">
    <input type="submit" value="Absent Items" name="items"><br>

</form>
<br>
<form action="" method="post">
    <input placeholder="Min price:" type="text" name="min_price">
    <input placeholder="Max price:" type="text" name="max_price">
    <input type="submit" value="Find"><br>

</form>

<button onclick="LoadData()">Load Data</button>
<button onclick="SaveData()">Save Data</button>

<div id="savedContent"></div>

<?php
if (isset($_POST["vendor"])) {
    infoByVendor($db);
} elseif (isset($_POST["items"])) {
    infoByAbsent($db);
} elseif (isset($_POST["min_price"])) {
    infoByPrice($db);
}
?>
</body>
</html>
