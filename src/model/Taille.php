<?php
namespace catawich\model;
class Taille extends \Illuminate\Database\Eloquent\Model{
	protected $table = "taille_sandwich";
	protected $primaryKey = "id";
	public    $timestamps = false;

	public static function tailles(){
		return Taille::all();
	}
}