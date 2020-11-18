<?php

namespace App\Observers;

use App\Models\User;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AvatarUserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function upload(User $user)
    {
        $extension = request()->avatar->extension();
        $allowed_extensions = [
            'png',
            'jpg',
            'jpeg'
        ];

        if(!in_array($extension, $allowed_extensions)){
            //throw new Exception('Extensão ' . $extension . ' não permitida!');
            request()->session()->flash('error', 'A extensão ' . $extension . ' não permitida para o avatar!');
            redirect()->route('backend.users.index');
        }else{
            $name = bin2hex(openssl_random_pseudo_bytes(8));
            $name = $name . '.' . $extension;
            $name = 'images/avatars/' . $name;

            request()->avatar->storeAs('', $name);
            $user->avatar = $name;
        }

    }

    public function creating(User $user)
    {
        if(is_a(request()->avatar, UploadedFile::class) and request()->avatar->isValid()){
            $this->upload($user);
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */

    public function updating(User $user)
    {
        if(is_a(request()->avatar, UploadedFile::class) and request()->avatar->isValid()){
            $previous_avatar = $user->avatar;
            $this->upload($user);

            if($previous_avatar != "images/avatars/profile-pic.png"){
                Storage::delete($previous_avatar);
            }
        }
    }

    public function saving(User $user)
    {
        if(is_a(request()->avatar, UploadedFile::class) and request()->avatar->isValid()){
            $previous_avatar = $user->avatar;
            $this->upload($user);

            if($previous_avatar != "images/avatars/profile-pic.png"){
                Storage::delete($previous_avatar);
            }
        }
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        Storage::delete($user->avatar);
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
