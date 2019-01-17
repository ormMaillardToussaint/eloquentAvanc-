<?php
namespace catawich\model;
class Categorie extends \Illuminate\Database\Eloquent\Model{
	protected $table = "categorie";
	protected $primaryKey = "id";
	public    $timestamps = false;

	public function sandwiches(){
		return $this->belongsToMany("catawich\model\Sandwich", "sand2cat", "cat_id", "sand_id");		
	}

	public static function categorieSandwiches(){
		return Categorie::with("sandwiches")->get();
	}

	public static function baguette(){
		return Categorie::select("categorie.nom")->distinct("categorie.nom")->join("sand2cat", "categorie.id", "=", "sand2cat.cat_id")->join("sandwich", "sand2cat.sand_id", "=", "sandwich.id")->where("type_pain", "like", "baguette%")->get();
	}

	public static function countImages(){
		return Categorie::has("sandwiches.images", ">", 6)->get();
	}

	public static function typeTaille(){
		return Categorie::select("categorie.nom")->distinct("categorie.nom")->join("sand2cat", "categorie.id", "=", "sand2cat.cat_id")->join("sandwich", "sand2cat.sand_id", "=", "sandwich.id")->join("image", "sandwich.id", "=", "image.s_id")->where("image.type", "=", "image/jpeg")->where("image.taille", ">", 18000)->get();
	}
}