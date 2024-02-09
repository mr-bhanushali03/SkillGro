<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        if (isset($input['profession']) && isset($input['qualification']) && isset($input['workplace']) && isset($input['youtube']) && isset($input['instagram']) && isset($input['linkedin']) && isset($input['twitter'])){
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
                'dob' => 'required|date',
                'mobile' => 'required|string|max:10',
                'profession' => 'required|string|max:255',
                'qualification' => 'required|string|max:255',
                'workplace' => 'required|string|max:255',
                'youtube' => 'required|string|max:255',
                'instagram' => 'required|string|max:255',
                'linkedin' => 'required|string|max:255',
                'twitter' => 'required|string|max:255',
            ])->validateWithBag('updateProfileInformation');
        } else {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
                'dob' => 'required|date',
                'mobile' => 'required|string|max:10',
            ])->validateWithBag('updateProfileInformation');
        }

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            if(isset($input['profession']) && isset($input['qualification']) && isset($input['workplace']) && isset($input['youtube']) && isset($input['instagram']) && isset($input['linkedin']) && isset($input['twitter'])){
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'dob' => $input['dob'],
                    'mobile' => $input['mobile'],
                    'profession' => $input['profession'],
                    'qualification' => $input['qualification'],
                    'workplace' => $input['workplace'],
                    'youtube' => $input['youtube'],
                    'instagram' => $input['instagram'],
                    'linkedin' => $input['linkedin'],
                    'twitter' => $input['twitter'],
                    'profile_photo_url' => $input['profile_photo_url'],
                ])->save();
            } else {
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'dob' => $input['dob'],
                    'mobile' => $input['mobile'],
                    'profile_photo_url' => $input['profile_photo_url'],
                ])->save();
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        if(isset($input['profession']) && isset($input['qualification']) && isset($input['workplace']) && isset($input['youtube']) && isset($input['instagram']) && isset($input['linkedin']) && isset($input['twitter'])){
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'dob' => $input['dob'],
                'mobile' => $input['mobile'],
                'profession' => $input['profession'],
                'qualification' => $input['qualification'],
                'workplace' => $input['workplace'],
                'youtube' => $input['youtube'],
                'instagram' => $input['instagram'],
                'linkedin' => $input['linkedin'],
                'twitter' => $input['twitter'],
                'profile_photo_url' => $input['profile_photo_url'],
            ])->save();
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'dob' => $input['dob'],
                'mobile' => $input['mobile'],
                'profile_photo_url' => $input['profile_photo_url'],
            ])->save();
        }

        $user->sendEmailVerificationNotification();
    }
}
