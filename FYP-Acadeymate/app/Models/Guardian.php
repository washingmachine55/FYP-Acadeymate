<?php
// WORK IN PROGRESS

namespace App\Models;

// use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
	use HasFactory;

	protected $primaryKey = 'id';

	protected $fillable = [
		'guardian_relationship_with_user', 'guardian_user_id', 'guardian_of_user_id',
	];

	/* public function user()
	{
		return $this->belongsToMany(\App\Models\User::class, 'guardians', 'guardian_user_id', 'guardian_of_user_id');
	} */

	public function usersAsDependant()
	{
		// return $this->belongsToMany(\App\Models\User::class, 'guardians', 'guardian_of_user_id', 'id' );
		return $this->belongsToMany(\App\Models\User::class, 'guardians', 'guardian_of_user_id', 'id' );
	}
	public function usersAsGuardian()
	{
		// return $this->belongsToMany(\App\Models\User::class, 'guardians', 'guardian_user_id', 'id');
		return $this->belongsToMany(\App\Models\User::class, 'guardians', 'guardian_user_id', 'id');
	}
}
