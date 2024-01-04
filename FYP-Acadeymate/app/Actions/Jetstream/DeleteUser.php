<?php

namespace App\Actions\Jetstream;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Contracts\DeletesTeams;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * The team deleter implementation.
     *
     * @var \Laravel\Jetstream\Contracts\DeletesTeams
     */
    protected $deletesTeams;

    /**
     * Create a new action instance.
     */
    public function __construct(DeletesTeams $deletesTeams)
    {
        $this->deletesTeams = $deletesTeams;
    }

    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
		$assignedRole = $user['user_role'];

		if ($assignedRole == 'Developer/Super Admin')
		{
			// $user = User::where('id', $input->id)->first();
			$user = User::where('id', $user->id)->first();;
			$user->removeRole('Developer/Super Admin');
		}
		else if ($assignedRole == 'Educational Institute Admin')
		{
			// $user = User::find(1);
			$user = User::where('id', $user->id)->first();;
			$user->removeRole('Educational Institute Admin');
		}
		else if ($assignedRole == 'Lecturer')
		{
			// $user = User::find(1);
			$user = User::where('id', $user->id)->first();;
			$user->removeRole('Lecturer');
		}
		else if ($assignedRole == 'Guardian')
		{
			// $user = User::find(1);
			$user = User::where('id', $user->id)->first();;
			$user->removeRole('Guardian');
		}
		else if ($assignedRole == 'Student')
		{
			// $user = User::find(1);
			$user = User::where('id', $user->id)->first();;
			$user->removeRole('Student');
		} else {
			return;
		}
        DB::transaction(function () use ($user) {
            $this->deleteTeams($user);
            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();
        });
    }

    /**
     * Delete the teams and team associations attached to the user.
     */
    protected function deleteTeams(User $user): void
    {
        $user->teams()->detach();

        $user->ownedTeams->each(function (Team $team) {
            $this->deletesTeams->delete($team);
        });
    }
}
