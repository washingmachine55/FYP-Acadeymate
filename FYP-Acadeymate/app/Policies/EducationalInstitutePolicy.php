<?php

namespace App\Policies;

use App\Models\EducationalInstitute;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EducationalInstitutePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EducationalInstitute $educationalInstitute): bool
    {
        if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EducationalInstitute $educationalInstitute): bool
    {
        if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EducationalInstitute $educationalInstitute): bool
    {
        if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EducationalInstitute $educationalInstitute): bool
    {
        if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EducationalInstitute $educationalInstitute): bool
    {
        if ($user->user_role === 'Developer/Super Admin') {
			return true;
		} else {
			return false;
		}
    }
}
