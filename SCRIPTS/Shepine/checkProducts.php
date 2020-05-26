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
            <th>Product_ID</th>
            <th>Brand Code</th>
            <th>Quantity</th>
        </tr>

<?php
if (file_exists('oldshepine.xml')) {
    $oldxml = simplexml_load_file('oldshepine.xml');
    //Load all the old product IDs into an array
    $oldproductsarray = array();
    foreach($oldxml->product as $oldp){
        $productdata = array(
        'stock_code'=>(int)$oldp->stock_code
        );
        $oldproductsarray[] = $productdata;
    }
}else{
    die("Old XML does not exist");
}

if (file_exists('newshepine.xml')){
    $newxml = simplexml_load_file('newshepine.xml');
    //Load the new product IDs into an array
    $newproductsarray = array();
    foreach ($newxml->xpath('/products/product') as $newprod){
        $newproductsarray[] = (int)$newprod->stock_code;
    }
}else{
    die("New XML file does not exist");
}

 foreach($oldxml->xpath('/products/product') as $oldproduct) {
                //Add the current product's id to $x
                $x = $oldproduct->stock_code;
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if(!(in_array($x, $newproductsarray))) {
                    echo '<tr class="danger">';
                    echo '<td>Out of stock</td>';
                    echo '<td>' . $oldproduct->name . '</td>';
                    echo '<td>' . $oldproduct->stock_code . '</td>';
                    echo '<td>' . $oldproduct->brand['code'] . '</td>';
                    echo '<td>' . $oldproduct->quantity . '</td>';
                    echo '</tr>';
                }
            }
            unset($oldproduct);//End the loop

             foreach($newxml->xpath('/products/product') as $newproduct){
                //Add the current product's Id to $y
                $y = $newproduct->stock_code;
                //Test to see if the current product's Id is in the array of old products
                //if it is not it must be back in stock
                if(!(in_array($y, $oldproductsarray))) {
                    echo '<tr class="success">';
                    echo '<td>In stock</td>';
                     echo '<td>' . $newproduct->name . '</td>';
                    echo '<td>' . $newproduct->stock_code . '</td>';
                    echo '<td>' . $newproduct->brand['code'] . '</td>';
                    echo '<td>' . $newproduct->quantity . '</td>';
                    echo '</tr>';
                }
            }
            unset($newproduct);//End loop
?>