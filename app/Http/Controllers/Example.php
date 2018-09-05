<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
	protected $table = 'example';

	public $timestamps = false;
	
	public $fillable = ['name', 'surname'];
}