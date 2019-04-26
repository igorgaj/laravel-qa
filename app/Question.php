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
	
	public function getUrlAttribute() {
		return route('question.show', $this->slug);
	}	

	public function getCreatedDateAttribute() {
		return $this->created_at->diffForHumans();
	}	
	
	public function getStatusAttribute() 
	{
		if ($this->answers_count > 0) {
			if ($this->best_answer) {
				return "answered-accepted";
			}
			return "answered";
		}
		return "unanswered";
	}
	
	public function getBodyHtmlAttribute() {
		return \Parsedown::instance()->text($this->body);
	}
	
	public function answers() {
		return $this->hasMany(Answer::class);
	}
}
