 <?php
        
// Declare a PHP array variable.

 function getData(){
 $products = array();

// json_decode() is used to decode JSON objects and converts it into a Php Variable
// We are using second parameter (true) which is optional
// so as to convert it to array and not object
        for($i=1;$i<8;$i++){
       
    $json=@file_get_contents('http://bifeks.space/bifeksX/api/rest/products/'.$i.'');
 


// store the result into merge_user variable $merge_user = json_encode( $users );
// store the result into merge_user variable
  
    $products[] = json_decode($json, true);
        
// store the result into merge_user variable

   $merge_products = json_encode(array_filter($products));
          
            
            
        }
     
     return $merge_products;
 }

    // To see the output
      
       
   //print_r(getData());
    


                                     
    ?>