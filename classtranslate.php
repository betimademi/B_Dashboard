<?PHP

class Translate {

	
	public $category;
	public $category_tree;
	public $color;
	public $renk;
	public $beden;
	public $numara;
	public $atribut;

	public function translatekategori(){
	 		
	 		if(isset($_POST['selected-file']) && isset($_POST[
	 			'kategori']))
	 		{
	 			$cat = $_POST['kategori'];
	 		$file =$_POST['selected-file'];
	 		$dom = new DOMDocument();
			
			$dom->load((dirname(__FILE__).'/uploads/'.$file));
			$dom->formatOutput = true;
			$root = $dom->getElementsByTagName("Urun");
	    	foreach($root as $urun){
	                       
		    	$kategori = $urun->getElementsByTagName($cat);

		 		$kategori->item(0)->nodeValue = strtr(htmlspecialchars($kategori->item(0)->nodeValue),$this->category);
	  
	 		}
	 		
	 		$dom->save((dirname(__FILE__).'/uploads/'.$file));
	        echo 'Translate done!';
	        header("location: convert.php");
	 }
	 else
	 {
	 	echo "SOMETHING NOT SELECTED PROPERLY OR MISSPELLED NODE CATEGORY";
	 }
	}

	 public function translatekategoritree(){
	 		
	 		if(isset($_POST['selected-file']) && isset($_POST['kategoritree']))
	 		{
	 		$kategoritree = $_POST['kategoritree'];
	 		$file =$_POST['selected-file'];
	 		$dom = new DOMDocument();
			
	 			$dom->load((dirname(__FILE__).'/uploads/'.$file));
				$dom->formatOutput = true;
				$root = $dom->getElementsByTagName("Urun");
	    		foreach($root as $urun){
	                       
		    	$kategori = $urun->getElementsByTagName($kategoritree);

		 		$kategori->item(0)->nodeValue = strtr(htmlspecialchars($kategori->item(0)->nodeValue),$this->category_tree);
	  
			}
	 		
	 		$dom->save((dirname(__FILE__).'/uploads/'.$file));
	        echo 'Translate done!';
	        header("location: convert.php");
	 }
	 else
	 {
	 	echo "SOMETHING NOT SELECTED PROPERLY OR MISSPELLED NODE CATEGORY TREE";
	 }
	}

	 public function translatecolor(){

	 	if(isset($_POST['selected-file']))
	 		{

				$file =$_POST['selected-file'];
	 			$dom = new DOMDocument();
			    $dom->load((dirname(__FILE__).'/uploads/'.$file));
				$dom->formatOutput = true;	
	 		    $color = $dom->getElementsByTagName('Ozellik');
	           foreach($color as $c){
	 				if($c->getAttribute('Tanim')===$this->renk){
		        		$c->nodeValue = strtr(htmlspecialchars($c->nodeValue),$this->color);
		        		$c->setAttribute('Deger',strtr(htmlspecialchars($c->nodeValue),$this->color));
	                }
	           }
	           //$dom->save('/app/public/dashboard/uploads/newebijuteri.xml');
	           $dom->save((dirname(__FILE__).'/uploads/'.$file));
	           header("location: convert.php");
	       	    
	 }
	 
	}

	 public function translaterenk() {

	 	if(isset($_POST['selected-file']))
	 		{

				$file =$_POST['selected-file'];
	 			$dom = new DOMDocument();
			    $dom->load((dirname(__FILE__).'/uploads/'.$file));
				$dom->formatOutput = true;				
				$color = $dom->getElementsByTagName('Ozellik');
				foreach($color as $c){
					if(stristr($c->getAttribute('Tanim'),'Renk')){
                 		$c->setAttribute('Tanim',$this->renk);
            		}
	            	if (stristr($c->getAttribute('Tanim'),'BEDEN')){
	                 	$c->setAttribute('Tanim',$this->beden);
	           		 }
	             	if (stristr($c->getAttribute('Tanim'),'NUMARA')){
	                 	$c->setAttribute('Tanim',$this->numara);
	           		 }
            
				}
				$dom->save((dirname(__FILE__).'/uploads/'.$file));
				header("location: convert.php");
				
			}
		
			
	}
}

		
	

class Button {

	public $url;
	public $file_name;
	public $language;

		public function downloadxml(){

			$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_URL,$this->url);

	//$dir = '/app/public/dashboard/uploads/';
	
	$save_file_loc = (dirname(__FILE__).'/uploads/') .$this->language.$this->file_name;

	$fp = fopen($save_file_loc, 'w+');
	/**
	* Ask cURL to write the contents to a file
	*/
	curl_setopt($ch, CURLOPT_FILE, $fp);

	curl_exec ($ch);

	curl_close ($ch);

	fclose($fp);

	header("location: convert.php");
		}




}




?>