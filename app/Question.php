<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	protected $fillable = ['name','body'];
	
	public function user() {
		return $this->belongsTo(User::class);
	}
	
	public function setNameAttribute($value) {
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = str_slug($value);
	}	
}
