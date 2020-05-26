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
            <th>Stok Code</th>
            <th>Quantity</th>
        </tr>

<?php
if (file_exists('oldebijuteri.xml')) {
    $oldxml = simplexml_load_file('oldebijuteri.xml');
    //Load all the old product IDs into an array
    $oldproductsarray = array();
    foreach($oldxml->Urun as $oldp){
        $productdata = array(
        'product_id'=>(int)$oldp->product_id
        );
        $oldproductsarray[] = $productdata;
    }
}else{
    die("Old XML does not exist");
}

if (file_exists('newebijuteri.xml')){
    $newxml = simplexml_load_file('newebijuteri.xml');
    //Load the new product IDs into an array
    $newproductsarray = array();
    foreach ($newxml->xpath('/Urunler/Urun') as $newprod){
        $newproductsarray[] = (int)$newprod->product_id;
    }
}else{
    die("New XML file does not exist");
}

 foreach($oldxml->xpath('/Urunler/Urun') as $oldproduct) {
                //Add the current product's id to $x
                $x = $oldproduct->product_id;
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if(!(in_array($x, $newproductsarray))) {
                    echo '<tr class="danger">';
                    echo '<td>Out of stock</td>';
                    echo '<td>' . $oldproduct->adi . '</td>';
                    echo '<td>' . $oldproduct->product_id . '</td>';
                    echo '<td>' . $oldproduct->stok_kodu . '</td>';
                    echo '<td>' . $oldproduct->miktar . '</td>';
                    echo '</tr>';
                }
            }
            unset($oldproduct);//End the loop

             foreach($newxml->xpath('/Urunler/Urun') as $newproduct){
                //Add the current product's Id to $y
                $y = $newproduct->product_id;
                //Test to see if the current product's Id is in the array of old products
                //if it is not it must be back in stock
                if(!(in_array($y, $oldproductsarray))) {
                    echo '<tr class="success">';
                    echo '<td>In stock</td>';
                    echo '<td>' . $newproduct->adi . '</td>';
                    echo '<td>' . $newproduct->product_id . '</td>';
                    echo '<td>' . $newproduct->stok_kodu . '</td>';
                    echo '<td>' . $newproduct->miktar . '</td>';
                    echo '</tr>';
                }
            }
            unset($newproduct);//End loop
?>