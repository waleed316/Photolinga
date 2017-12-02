<?php

namespace App\Policies;

use App\User;
use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job.
     *
     * @param  \App\User $user
     * @param  \App\Job $job
     *
     * @return mixed
     */
    public function view(User $user, Job $job)
    {
        //
    }

    /**
     * Determine whether the user can create jobs.
     *
     * @param  \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the job.
     *
     * @param  \App\User $user
     * @param  \App\Job $job
     *
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        return $user->id == $job->contractor->id;
    }

    /**
     * Determine whether the user can delete the job.
     *
     * @param  \App\User $user
     * @param  \App\Job $job
     *
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        return $user->id == $job->contractor->id;
    }


    /**
     * Determine whether the user can apply to the job.
     *
     * @param User $user
     * @param Job $job
     *
     * @return bool
     */
    public function apply(User $user, Job $job)
    {
        return $user->id != $job->contractor->id and $job->proposals()->where('user_id', $user->id)->count() == 0;
    }

    public function award(User $user, Job $job)
    {
        return $user->id == $job->contractor->id and !$job->in_progress;
    }
}
