<?php

namespace App\Observers;

use App\Models\User;
use App\Jobs\SendEmailJob;

class UserObserver
{
    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if ($user->isDirty('confirmed')) {
            $details['email'] = $user->email;
            $details['confirmed'] = $user->confirmed;
            dispatch(new SendEmailJob($details));
        }
    }
}
