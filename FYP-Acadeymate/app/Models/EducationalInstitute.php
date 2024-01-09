<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInstitute extends Model
{
    use HasFactory;

	protected $primaryKey = 'id';

	protected $fillable = [
		'name', 'email',
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'enrolled_under');
	}
}
