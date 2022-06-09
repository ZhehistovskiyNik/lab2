<?php
function infoByVendor($db)
{
    $statement = $db->distinct("Vendor");
    echo "<div id='content'>
    <b>Vendors:</b>";
    foreach ($statement as $value) {
        echo " <br>$value";
    }
    echo "</div>";
}

function infoByAbsent($db)
{
    $statement = $db->find(["quantity" => 0]);
    echo "<div id='content'>";
    foreach ($statement->toArray() as $data) {
        echo "<br> Title: {$data['name']} ::: Price: {$data['price']} ::: Quantity: {$data['quantity']} ::: Qulity: {$data['quality']} ";
    }
    echo "</div>";
}

function infoByPrice($db)
{
    $min = intval($_POST["min_price"]);
    $max = intval($_POST["max_price"]);
    $statement = $db->find(["price" => ['$gte' => $min, '$lte' => $max ]] );
    echo "<div id='content'>";
    foreach ($statement as $data) {
        echo "<br>Title: {$data['name']} ::: Price: {$data['price']} ::: Quantity: {$data['quantity']} ::: Qulity: {$data['quality']} ";
    }
    echo "</div>";
}
