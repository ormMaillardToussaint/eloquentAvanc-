<?php
namespace catawich\model;
class Sandwich extends \Illuminate\Database\Eloquent\Model{
	protected $table = "sandwich";
	protected $primaryKey = "id";

	public function images(){
		return $this->hasMany("catawich\model\Image", "s_id");
	}

	public function categories(){
		return $this->belongsToMany("catawich\model\Categorie", "sand2cat", "sand_id", "cat_id");		
	}

	public function tailles(){
		return $this->belongsToMany("catawich\model\Taille", "tarif", "sand_id", "taille_id");
	}
	
	public static function sandwiches(){
		return Sandwich::select("nom", "description", "type_pain")->get();		
	}

	public static function sandwichesByTypePain(){
		return Sandwich::select("nom", "description", "type_pain")->orderby("type_pain", "asc")->get();
	}

	public static function sandwichById($id){
		$sandwich = Sandwich::find($id);
		if($sandwich != null){ 
			return $sandwich;
		}
		return false;
	}

	public static function sandwichesBaguette(){
		return Sandwich::where("type_pain", "like", "baguette%")->orderby("type_pain", "asc")->get();
	}

	public static function sandwichesImages(){
		return Sandwich::with("images")->orderby("type_pain", "asc")->get();
	}

	public static function categoriesImages(){
		return Sandwich::with("categories", "images")->where("type_pain", "like", "baguette%")->get();
	}

	public static function baguetteTraditionnel(){
		return Sandwich::join("sand2cat", "sandwich.id", "=", "sand2cat.sand_id")->join("categorie", "sand2cat.cat_id", "=", "categorie.id")->where("type_pain", "like", "baguette%")->where("categorie.nom", "like", "%traditionnel%")->get();
	}

	public function imagesTypeDefX(){
		return Sandwich::join("image", "sandwich.id", "=", "image.s_id")->where("image.taille", "=", "image/jpeg")->where("def_x", ">", "720")->get();
	}

	public static function countImages(){
		return Sandwich::has("images", ">", 4)->get();
	}

	public static function typeTaille(){
		return Sandwich::select("sandwich.id", "nom", "description", "type_pain")->distinct("sandwich.id")->join("image", "sandwich.id", "=", "image.s_id")->where("image.type", "=", "image/jpeg")->where("image.taille", ">", 18000)->get();
	}

	public static function typeTailleTraditionnel(){
		return Sandwich::select("sandwich.id", "sandwich.nom", "sandwich.description", "sandwich.type_pain")->distinct("sandwich.id")->join("image", "sandwich.id", "=", "image.s_id")->join("sand2cat", "sandwich.id", "=", "sand2cat.sand_id")->join("categorie", "sand2cat.cat_id", "=", "categorie.id")->where("image.taille", ">", 18000)->where("categorie.nom", "=", "traditionnel")->where("image.type", "=", "image/jpeg")->get();
	}

	public function taillePrix(){
		return Taille::select("taille_sandwich.nom")->distinct("taille_sandwich.nom")->join("tarif", "tarif.taille_id", "=", "id")->where("prix", ">", 7)->get();
	}
}