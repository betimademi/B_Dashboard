<?PHP
//require 'upload-single.php';
require 'translate.php';
require 'classtranslate.php';

$objSQ = new Translate;
$objMK = new Translate;
$objEN = new Translate;

$objSQ->category=$KategoriTRAL;
$objSQ->category_tree=$TreeTRAL;
$objSQ->color=$colorTRAL;

$objSQ->renk="Ngjyra";
$objSQ->beden="Madhësia";
$objSQ->numara="Numri";



$objMK->category=$KategoriTRMK;
$objMK->category_tree=$TreeTRMK;
$objMK->color=$colorTRMK;
$objMK->renk="Color";


$objMK->beden="Size";
$objMK->numara="Number";



if(isset($_POST['renk'])){
$objMK->translaterenk();
}
elseif(isset($_POST['ngjyra'])){
	$objSQ->translaterenk();
}


if(isset($_POST['shqip'])){
	if(isset($_POST['category'])){
		$objSQ->translatekategori();
	}
	if(isset($_POST['categorytree'])){
		$objSQ->translatekategoritree();
	}
	if(isset($_POST['color'])){
		$objSQ->translatecolor();
	}
	if(isset($_POST['category']) && isset($_POST['color'])){
		$objSQ->translatekategori();
		$objSQ->translatecolor();
	}
	if(isset($_POST['category']) && isset($_POST['categorytree'])){
		$objSQ->translatekategori();
		$objSQ->translatekategoritree();
	}
	if(isset($_POST['color']) && isset($_POST['categorytree'])){
		$objSQ->translatekategoritree();
		$objSQ->translatecolor();
	}
	if(isset($_POST['category']) && isset($_POST['categorytree']) && isset($_POST['color'])){
		$objSQ->translatekategori();
		$objSQ->translatekategoritree();
		$objSQ->translatecolor();
	}
}
elseif((isset($_POST['maqedonisht']))){
	if(isset($_POST['category'])){
		$objMK->translatekategori();
	}
	if(isset($_POST['categorytree'])){
		$objMK->translatekategoritree();
	}
	if(isset($_POST['color'])){
		$objMK->translatecolor();
	}
	if(isset($_POST['category']) && isset($_POST['color'])){
		$objMK->translatekategori();
		$objMK->translatecolor();
	}
	if(isset($_POST['category']) && isset($_POST['categorytree'])){
		$objMK->translatekategori();
		$objMK->translatekategoritree();
	}
	if(isset($_POST['color']) && isset($_POST['categorytree'])){
		$objMK->translatekategoritree();
		$objMK->translatecolor();
	}
	if(isset($_POST['category']) && isset($_POST['categorytree']) && isset($_POST['color'])){
		$objMK->translatekategori();
		$objMK->translatekategoritree();
		$objMK->translatecolor();
	}
}



   //   ------- THIS    IS    FOR    REPOOOO    ONLYYYYY    COLOR
       // $root = $dom->getElementsByTagName("subproduct");
       //   foreach($root as $urun){

       //     $kategori = $urun->getElementsByTagName("type1");

       //       $kategori->item(0)->nodeValue = strtr(htmlspecialchars($kategori->item(0)->nodeValue),$colorTRAL);
       //      }
       //
       //
       //        /* ------- TRANSLATE KATEGORI TREE --------*/

        /*-----Ebijuteri: kategori, AnaKategori---------*/

         /*-----YokYok: Kategori, KategoriTree---------*/

         /*-----Repo: Urun->product,  cat3name, category_path, color->type1 ---------*/
