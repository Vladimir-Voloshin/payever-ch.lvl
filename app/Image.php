<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
	public function album()
	{
		return $this->belongsTo(Album::class);
	}
}
