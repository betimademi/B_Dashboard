<?PHP

$oldfile = (dirname(__FILE__).'/uploads/oldifondi.xml');
$newfile = (dirname(__FILE__).'/uploads/newifondi.xml');


if (file_exists($newfile))
{

    $newxml = simplexml_load_file($newfile);
    //Load the new product IDs into an array
    foreach ($newxml->xpath('//Urun') as $newprod){
        $newproductsarray[] = (int)$newprod->UrunKartiID;
    }
}
else
{
    die("New XML file does not exist");
}

if (file_exists($oldfile))
{

$oldxml = simplexml_load_file($oldfile);
 foreach($oldxml->xpath('//Urun') as $oldproduct) {

                //Add the current product's id to $x
                $x = $oldproduct->UrunKartiID;
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if(!in_array($x, $newproductsarray)) {
                    echo '<tr class="danger">';
                    echo '<td>Removed</td>';
                    echo '<td>' . $oldproduct->UrunAdi . '</td>';
                    echo '<td>' . $oldproduct->UrunKartiID . '</td>';
                    echo '</tr>';

                }


            }
            unset($oldproduct);  //End the loop
}
else
{
    die("Old file does not exist");
}
