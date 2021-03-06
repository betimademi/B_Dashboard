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
            <th>Count</th>
            <th>Status</th>
            <th>Title</th>
            <th>UrunKartiID</th>
            </tr>

<?php
if (file_exists('twister.xml')) {
    $oldxml = simplexml_load_file('twister.xml');
    //Load all the old product IDs into an array
    $oldproductsarray = array();
    foreach($oldxml->xpath('//Urun') as $oldp){
        $productdata = array(
        'UrunKartiID'=>(int)$oldp->UrunKartiID
        );
        $oldproductsarray[] = $productdata;
    }
}else{
    die("Old XML does not exist");
}

if (file_exists('newtwister.xml')){
    $newxml = simplexml_load_file('newtwister.xml');
    //Load the new product IDs into an array
    $newproductsarray = array();
    foreach ($newxml->xpath('//Urun') as $newprod){
        $newproductsarray[] = (int)$newprod->UrunKartiID;
    }
}else{
    die("New XML file does not exist");
}
$i=1;
 foreach($oldxml->xpath('//Urun') as $oldproduct) {
                //Add the current product's id to $x
                $x = $oldproduct->UrunKartiID;
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if(!(in_array($x, $newproductsarray))) {

                    if(isset($oldproduct->Resimler)){
                    
                    echo '<tr class="danger">';
                    echo '<td>'.$i.'</td>';
                    echo '<td>Out of stock</td>';
                    echo '<td>' . $oldproduct->UrunAdi . '</td>';
                    echo '<td>' . $oldproduct->UrunKartiID . '</td>';
                    echo '</tr>';
                     $i++;
                }
            }
                
            }

            unset($oldproduct);//End the loop

             foreach($newxml->xpath('//Urun') as $newproduct){
                //Add the current product's Id to $y
                $y = $newproduct->UrunKartiID;
                //Test to see if the current product's Id is in the array of old products
                //if it is not it must be back in stock
                if(!(in_array($y, $oldproductsarray))) {
                    echo '<tr class="success">';
                    echo '<td>In stock</td>';
                    echo '<td>' . $newproduct->UrunAdi . '</td>';
                    echo '<td>' . $newproduct->UrunKartiID . '</td>';
                    echo '</tr>';
                }
            }
            unset($newproduct);//End loop
?>