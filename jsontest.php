 <?php



/* $i=1;

while ($i <=4 ) {
                                         
$json=file_get_contents('http://bifeks.space/bifeksX/api/rest/products/'.$i.'');
                                           
$datap =  json_decode($json);
    
    if($datap){

echo $datap->name."<br>";
    
    echo "<br>";
    
    $i++;
    
}
    else {
        
        try {
    file_get_contents('http://bifeks.space/bifeksX/api/rest/products/'.$i.'');
}
catch (Exception $e) {
    echo $e->getMessage();
}
    }
       
}
    */

    /* $connect = mysqli_connect("","","");     THIS IS THE SCRIPT THAT INSERTS DATA FROM JSON FILE TO MYSQL DATABASE TABLE

    $filename = "";

    $data = file_get_contents($filename);

    $array = json_decode($data, true);

    foreach ($array as $row)
    {


        $sql = "INSERT INTO wp_products (id,name,description,price,sku,stock) VALUES( ".$row['id'].", ".$row['name'].")";

        mysqli_query($connect,$sql);
    }

        echo "Products data inserted ";
    */


    for($i=1;$i<=5;$i++){
    

         $json=@file_get_contents('http://bifeks.space/bifeksX/api/rest/products/'.$i.'');
     $datap = json_decode($json);
        
        
        if($datap){
            
            echo $datap->name."<br><br>";
            
            
        }
        
        else {
            
            try{
    
        throw new Exception("No data available <br><br>");
        
    }
        
        catch (Exception $e) {
    
   echo $e->getMessage();
   
}
    }
    }
    
   
 
                                     
    ?>