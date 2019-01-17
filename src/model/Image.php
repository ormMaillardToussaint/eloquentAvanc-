<?php
namespace catawich\model; 
class Image extends \Illuminate\Database\Eloquent\Model{
	protected $table = "image";
	protected $primaryKey = "id";
	public $timestamps = false;

	public function sandwich(){
		return $this->belongsTo("catawich\model\Sandwich", "s_id");
	}

	public static function images(){
		return Image::all();
	}
}