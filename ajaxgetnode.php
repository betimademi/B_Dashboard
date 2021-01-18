<?php

if (isset($_POST['getfunction1'])){
              $getfunction1 = $_POST['getfunction1'];
              switch ($getfunction1) {
                case 'outputnode':
                  outputnode();
                  break;

              }
            }

            if (isset($_POST['getfunction2'])){
              $getfunction2 = $_POST['getfunction2'];
              switch ($getfunction2) {
                case 'outputnodevalue':
                  outputnodevalue();
                  break;

              }
            }

            if (isset($_POST['getfirstnode'])){
              $getfunction2 = $_POST['getfirstnode'];
              switch ($getfunction2) {
                case 'outputfirstnode':
                  outputfirstnode();
                  break;

              }
            }
            function outputnode(){
                $file = $_POST['selectfile'];

                $xml = simplexml_load_file(dirname(__FILE__) . '/uploads/'.$file);

                $array = array();
                  foreach ($xml->xpath("//Urun")[0] as $urun) {

                      $firstchild = $urun->getName();
                      $array[] = array("Product"=>$firstchild);

                      foreach ($urun->children() as $child) {

                         $secondchild = $child->getName();
                         $array[] = array("Product"=>$secondchild);


                         foreach ($child->children() as $childchild) {

                            $thirdchild = $childchild->getName();
                            $array[] = array("Product"=>$thirdchild);
                          }
                      }
                  }
                echo json_encode($array);
             }

              function outputnodevalue(){
                $file = $_POST['selectfile'];
                $node = $_POST['depart'];
                $dom = new DOMDocument();
                $file = (dirname(__FILE__).'/uploads/'.$file);
                $dom->load($file);
                $xpath = new DOMXPath($dom);

                //$node1 = "UrunKartiID";
                $nodeOne = $xpath->query("//".$node);
                $array2 = array();
                foreach ($nodeOne as $key => $value) {
                  $kat = $value->nodeValue;
                  $array2[] = array('Name'=>$kat);
                }
                //$resultkategori = super_unique($array2);
                $k = array_values(array_unique($array2,SORT_REGULAR));
                echo json_encode($k);

             }

             function outputfirstnode(){
                 $file = $_POST['selectfile'];

                 $xml = simplexml_load_file(dirname(__FILE__) . '/uploads/'.$file);

                 $array = array();
                   foreach ($xml->xpath('//Urun')[0] as $urun) {

                       $firstchild = $urun->getName();
                       $array[] = array("Product"=>$firstchild);
                   }
                 echo json_encode($array);
              }



            // function super_unique($array)
            //         {
            //  $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

            //  foreach ($result as $key => $value)
            // {
            //   if ( is_array($value) )
            //  {
            //       $result[$key] = super_unique($value);
            //  }
            //  }

            //  return $result;
            //   }








           //       if(isset($_POST['selected']) && isset($_POST['press']))
           //  {
           //      $file = $_POST['selected'];

           //       $xml = simplexml_load_file(dirname(__FILE__) . '/uploads/'.$file);


           //  foreach ($xml->xpath("//Urun")[0] as $urun) {

           //          $firstchild = $urun->getName();
           //         echo "<option value='" . $firstchild . "'>".$firstchild."</option>";

           //         foreach ($urun->children() as $child) {
           //          $str = str_repeat("&nbsp;", $depth=2);

           //          $secondchild = $child->getName();
           //           echo "<option value='" . $secondchild. "'>".$str. $secondchild."</option>";


           //             foreach ($child->children() as $childchild) {
           //              $str1 = str_repeat("&nbsp;", $depth=4);

           //              $thirdchild = $childchild->getName();
           //               echo "<option value='" .$thirdchild. "'>".$str1.$thirdchild."</option>";
           //             }
           //         }
           //     }
           //     header("location: shownode.php");
           // }

        ?>
