<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

	public $roleToAssign;

    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
			'user_role' => ['required', 'string', 'max:255'],
			// $this->roleAssignment($input),
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
				'user_role' => $input['user_role'],
            ]), function ($input) {
                $this->roleAssignment($input);
				// $roleToAssign = $input['user_role'];
				// dd($roleToAssign);
				// $user = User::where('id', $input->id)->first();
				// $user->assignRole('Student');
				// return $this->roleAssignment($input, $user);
            });
        });
    }

	public function roleAssignment($input): void
	{
		$roleToAssign = $input['user_role'];
		// $user = User::where('id', $id);
		// dd($roleToAssign);

		if ($roleToAssign == 'Developer/Super Admin')
		{
			// $user = User::where('id', $input->id)->first();
			$user = User::where('id', $input->id)->first();;
			$user->assignRole('Developer/Super Admin');
		}
		else if ($roleToAssign == 'Educational Institute Admin')
		{
			// $user = User::find(1);
			$user = User::where('id', $input->id)->first();;
			$user->assignRole('Educational Institute Admin');
		}
		else if ($roleToAssign == 'Lecturer')
		{
			// $user = User::find(1);
			$user = User::where('id', $input->id)->first();;
			$user->assignRole('Lecturer');
		}
		else if ($roleToAssign == 'Guardian')
		{
			// $user = User::find(1);
			$user = User::where('id', $input->id)->first();;
			$user->assignRole('Guardian');
		}
		else if ($roleToAssign == 'Student')
		{
			// $user = User::find(1);
			$user = User::where('id', $input->id)->first();;
			$user->assignRole('Student');
		} else {
			return;
		}
	}

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
