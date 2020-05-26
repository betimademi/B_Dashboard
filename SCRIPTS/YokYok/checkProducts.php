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
            <th>Barcode</th>
        </tr>

<?php
if (file_exists('oldyok.xml')) {
    $oldxml = simplexml_load_file('oldyok.xml');
    //Load all the old product IDs into an array
    $oldproductsarray = array();
    foreach($oldxml->xpath('Urunler/Urun') as $oldp){
        $productdata = array(
        'UrunKartiID'=>(int)$oldp->UrunKartiID
        );
        $oldproductsarray[] = $productdata;
    }
}else{
    die("Old XML does not exist");
}

if (file_exists('newyok.xml')){
    $newxml = simplexml_load_file('newyok.xml');
    //Load the new product IDs into an array
    $newproductsarray = array();
    foreach ($newxml->xpath('Urunler/Urun') as $newprod){
        $newproductsarray[] = (int)$newprod->UrunKartiID;
    }
}else{
    die("New XML file does not exist");
}

 foreach($oldxml->xpath('Urunler/Urun') as $oldproduct) {
                ob_start();
                //Add the current product's id to $x
                $x = $oldproduct->UrunKartiID;
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if(!(in_array($x, $newproductsarray))) {
                    echo '<tr class="danger">';
                    echo '<td>Out of stock</td>';
                    echo '<td>' . $oldproduct->UrunAdi . '</td>';
                    echo '<td>' . $oldproduct->UrunKartiID . '</td>';
                    echo '</tr>';
                    
                }
                echo ob_get_contents();
                    ob_end_flush();
                
            }
            unset($oldproduct);//End the loop

            //  foreach($newxml->xpath('Urunler/Urun') as $newproduct){
            //     ob_start();
            //     //Add the current product's Id to $y
            //     $y = $newproduct->UrunKartiID;
            //     //Test to see if the current product's Id is in the array of old products
            //     //if it is not it must be back in stock
            //     if(!(in_array($y, $oldproductsarray))) {
            //         echo '<tr class="success">';
            //         echo '<td>In stock</td>';
            //         echo '<td>' . $newproduct->UrunAdi . '</td>';
            //         echo '<td>' . $newproduct->UrunKartiID . '</td>';
            //         echo '</tr>';
                    
            //     }
            //     echo ob_get_contents();
            //     ob_end_flush();
            // }

            // unset($newproduct);//End loop

?>