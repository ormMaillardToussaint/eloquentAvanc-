<?php
require_once 'vendor/autoload.php';

use catawich\model\Categorie as Categorie;
use catawich\model\Image as Image;
use catawich\model\Sand2cat as Sand2cat;
use catawich\model\Sandwich as Sandwich;
use catawich\model\Taille as Taille;
use catawich\model\Tarif as Tarif;

$config = parse_ini_file("conf/config.ini");

$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$html = "";

/* 1 1
$sandwiches = Sandwich::sandwiches();
foreach ($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/* 1 2
$sandwiches = Sandwich::sandwichesByTypePain();
foreach ($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/* 1 3
$sandwich = Sandwich::sandwichById(42);
if(!$sandwich){
	echo "Ce sandwich n'existe pas";
}
else{
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain;
}
*/

/* 1 4
$sandwiches = Sandwich::sandwichesBaguette();
foreach ($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/* 1 5
$sandwich = new Sandwich();
$sandwich->nom = "jambon-beaucoup de beurre";
$sandwich->description = "le jambon-beurre traditionnel, mais avec beaucoup de beurre";
$sandwich->type_pain = "baguette";
$dandwich->save();
*/

/* 2 1
$sandwich = Sandwich::sandwichById(4);
if(!$sandwich){
	echo "Ce sandwich n'existe pas";
}
else{
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
	$images = $sandwich->images()->get();
	foreach($images as $image){
		$html .= $image->titre."/".$image->filename."<br><br>";
	}
}
*/

/* 2 2
$sandwiches = Sandwich::sandwichesImages();
foreach($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
	foreach($sandwich->images as $image){
		$html .= $image->titre."/".$image->filename."<br><br>";
	}
}
*/

/* 2 3
$images = Image::images();
foreach ($images as $image){
	$sandwich = $image->sandwich()->first();
	$html .= $image->titre."/".$image->filename."///".$sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";	
}
*/

/*2 4
$image1 = new Image();
$image1->titre = "bcp_beurre_0";
$image1->type = "image/png";
$image1->def_x = "800";
$image1->def_y = "1080";
$image1->taille = "13500";
$image1->filename = "img_5a045cd796f93.jpeg";
$image1->s_id = 11;
$image1->save();
$image2 = new Image();
$image2->titre = "bcp_beurre_1	";
$image2->type = "image/gif";
$image2->def_x = "600";
$image2->def_y = "480";
$image2->taille = "4500";
$image2->filename = "img_5a045cd79b534.gif";
$image2->s_id = 11;
$image2->save();
$image3 = new Image();
$image3->titre = "bcp_beurre_2";
$image3->type = "image/gif";
$image3->def_x = "1280";
$image3->def_y = "900";
$image3->taille = "19200";
$image3->filename = "img_5a045cd79f1d4.gif";	
$image3->s_id = 11;
$image3->save();
*/

/*2 5
$image = Image::find(45);
$image->s_id = 6;
$image->save();
*/

/*3 1
$sandwich = Sandwich::find(5);
$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."/";
$categories = $sandwich->categories()->get();
foreach ($categories as $categorie){
	$html .= $categorie->nom."/";
}
*/

/*3 2
$categories = Categorie::categorieSandwiches();
foreach($categories as $categorie) {
	$html .= $categorie->nom."<br>";
	foreach($categorie->sandwiches as $sandwich) {
		$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
	}
}
*/

/*3 3
$sandwiches = Sandwich::categoriesImages();
foreach ($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br>";
	foreach ($sandwich->categories as $categorie) {
		$html .= $categorie->nom."<br>";
	}
	foreach($sandwich->images as $image){
		$html .= $image->titre."/".$image->filename."<br>";
	}
	$html .= "<br>";
}
*/

/*3 4
$sand2cat1 = new Sand2cat();
$sand2cat1->sand_id = 11;
$sand2cat1->cat_id = 1;
$sand2cat1->save();
$sand2cat2 = new Sand2cat();
$sand2cat2->sand_id = 11;
$sand2cat2->cat_id = 3;
$sand2cat2->save();
*/

/*4 1
$sandwich = Sandwich::find(5);
$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br>";
$tailles = $sandwich->tailles()->get();
foreach ($tailles as $taille) {
	$html .= $taille->nom."<br>";
}
*/

/*4 2
$sandwich = Sandwich::find(5);
$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br>";
$tailles = $sandwich->tailles()->get();
foreach ($tailles as $taille) {
	$tarif = Tarif::where("taille_id", "=", $taille->id)->where("sand_id", "=", $sandwich->id)->first();
	$html .= $taille->nom."/".$tarif->prix."€<br>";
}
*/

/*4 3
$tailles = Taille::tailles();
$prix = 4;
foreach ($tailles as $taille) {
	$tarif = new Tarif();
	$tarif->taille_id = $taille->id;
	$tarif->sand_id = 11;
	$tarif->prix = $prix;
	$tarif->save();
	$prix += 1.5;
}
*/

/*5 1
$sandwiches = Sandwich::baguetteTraditionnel();
foreach ($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/*5 2
$sandwich = Sandwich::find(5);
$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br>";
$images = $sandwich->imagesTypeDefX();
foreach($sandwich->images as $image){
	$html .= $image->titre."/".$image->filename."<br>";
}
*/

/*5 3
$sandwiches = Sandwich::countImages();
foreach($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/*5 4
$categories = Categorie::countImages();
foreach($categories as $categorie){
	$html .= $categorie->nom."<br><br>";
}
*/

/*5 5
$categories = Categorie::baguette();
foreach($categories as $categorie) {
	$html .= $categorie->nom."<br>";	
}
*/

/*5 6
$sandwiches = Sandwich::typeTaille();
foreach($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/*5 7
$categories = Categorie::typeTaille();
foreach($categories as $categorie){
	$html .= $categorie->nom."<br><br>";
}
*/

/*5 8
$sandwiches = Sandwich::typeTailleTraditionnel();
foreach($sandwiches as $sandwich){
	$html .= $sandwich->nom."/".$sandwich->description."/".$sandwich->type_pain."<br><br>";
}
*/

/*5 9
$sandwich = Sandwich::sandwichById(7);
$tailles = $sandwich->taillePrix();
foreach ($tailles as $taille) {
	$html .= $taille->nom."<br><br>";
}
*/

echo $html;
?>