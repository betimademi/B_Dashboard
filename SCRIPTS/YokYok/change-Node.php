<?php
$dom = new DOMDocument();
$dom->load('translate.xml');
$xpath = new DOMXPath($dom);


//  $xml = $xpath->query('//Ozellik')->length;
    
 //for ($i=1; $i < $xml; $i++) { 

  $nodeOne = $xpath->query('//Ozellik[@Tanim="BEDEN"]')->item(1); 
  $nodeTwo = $xpath->query('//Ozellik[@Tanim="Renk"]')->item(1); 

  // if ($nodeOne->getAttribute('Tanim') === 'BEDEN' && $nodeTwo->getAttribute('Tanim') === 'Renk'){


        if(!$nodeOne->isSameNode($nodeTwo)){

         // remember parent and position of the second node
       $parent = $nodeTwo->parentNode;
       $target = $nodeTwo->nextSibling;

       // move the second node
       $nodeOne->parentNode->insertBefore($nodeTwo, $nodeOne->nextSibling);

       // move the first node
       $parent->insertBefore($nodeOne, $target);
     }
       
       

else {

  echo "Next Comparision";
}


 


  

// if ($nodeOne->getAttribute('Tanim') === 'BEDEN' && $nodeTwo->getAttribute('Tanim') === 'Renk'){

//          // remember parent and position of the second node
//        $parent = $nodeTwo->parentNode;
//        $target = $nodeTwo->nextSibling;

//        // move the second node
//        $nodeOne->parentNode->insertBefore($nodeTwo, $nodeOne->nextSibling);

//        // move the first node
//        $parent->insertBefore($nodeOne, $target);
       
       
// }
// else {

//   echo "Next Comparision";
// }



 $dom->save('translate.xml');

?>