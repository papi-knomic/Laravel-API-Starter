<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    /**
     * @throws \Exception
     */
//    private function generateUserVerificationCode(string $email ) {
//        $code = generateVerificationCodeForUser($email);
//        $firstname = getUserFirstNameFromEmail($email);
//
//        $details = [
//            'subject' => 'Verify Email Address',
//            'message' => 'Your verification code: :code',
//            'code' => $code,
//            'firstname' => $firstname
//        ];
//
//        Notification::route('mail', $email)
//            ->notify(new EmailVerificationNotification($details));
//
//    }
}
