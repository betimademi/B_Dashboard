<html>
<head>
    <title>Feed</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container-fluid">
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Status</th>
            <th>Title</th>
            <th>Product ID</th>
            <th>Stock Quantity</th>
        </tr>

<?php
if (file_exists('oldmarkasende.xml')) {
    $oldxml = simplexml_load_file('oldmarkasende.xml');
    //Load all the old product IDs into an array
    $oldproductsarray = array();
    foreach($oldxml->Product as $oldp){
        $productdata = array(
        'Id'=>(int)$oldp['Id']
        );
        $oldproductsarray[] = $productdata;
    }
}else{
    die("Old XML does not exist");
}

if (file_exists('newmarkasende.xml')){
    $newxml = simplexml_load_file('newmarkasende.xml');
    //Load the new product IDs into an array
    $newproductsarray = array();
    foreach ($newxml->Product as $newprod){
        $newproductsarray[] = (int)$newprod['Id'];
    }
}else{
    die("New XML file does not exist");
}

 foreach($oldxml->Product as $oldproduct) {
                //Add the current product's id to $x
                $x = $oldproduct['Id'];
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if(!(in_array($x, $newproductsarray))) {
                    echo '<tr class="danger">';
                    echo '<td>Out of stock</td>';
                    echo '<td>' . $oldproduct['Name'] . '</td>';
                    echo '<td>' . $oldproduct['Id'] . '</td>';
                    echo '<td>' . $oldproduct['StockQuantity'] . '</td>';
                    echo '</tr>';
                }
            }
            unset($oldproduct);//End the loop

             foreach($newxml->Product as $newproduct){
                //Add the current product's Id to $y
                $y = $newproduct['Id'];
                //Test to see if the current product's Id is in the array of old products
                //if it is not it must be back in stock
                if(!(in_array($y, $oldproductsarray))) {
                    echo '<tr class="success">';
                    echo '<td>In stock</td>';
                    echo '<td>' . $newproduct['Name'] . '</td>';
                    echo '<td>' . $newproduct['Id'] . '</td>';
                    echo '<td>' . $newproduct['StockQuantity'] . '</td>';
                    echo '</tr>';
                }
            }
            unset($newproduct);//End loop
?>