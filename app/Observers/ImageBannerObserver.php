<?php

namespace App\Observers;

use App\Models\Banner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageBannerObserver
{
    public function upload(Banner $banner)
    {
        $extension = request()->image->extension();
        $allowed_extensions = [
            'png',
            'jpg',
            'jpeg'
        ];

        if(!in_array($extension, $allowed_extensions)){
            //throw new Exception('Extensão ' . $extension . ' não permitida!');
            request()->session()->flash('error', 'A extensão ' . $extension . ' não permitida para a imagem do evento!');
            redirect()->route('backend.banners.index');
        }else{
            $name = bin2hex(openssl_random_pseudo_bytes(8));
            $name = $name . '.' . $extension;
            $name = 'images/banners/' . $name;

            request()->image->storeAs('', $name);
            $banner->image = $name;
        }

    }

    public function creating(Banner $banner)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $this->upload($banner);
        }
    }

    /**
     * Handle the event "updated" event.
     *
     * @param  \App\Banner  $banner
     * @return void
     */

    public function updating(Banner $banner)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $previous_image = $banner->image;
            $this->upload($banner);

            if($previous_image != "images/banners/banners-image.jpg"){
                Storage::delete($previous_image);
            }
        }
    }

    public function saving(Banner $banner)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $previous_image = $banner->image;
            $this->upload($banner);

            if($previous_image != "images/banners/banners-image.jpg"){
                Storage::delete($previous_image);
            }
        }
    }

    /**
     * Handle the event "deleted" event.
     *
     * @param  \App\Banner  $banner
     * @return void
     */
    public function deleted(Banner $banner)
    {
        Storage::delete($banner->image);
    }

    /**
     * Handle the event "restored" event.
     *
     * @param  \App\Banner  $banner
     * @return void
     */
    public function restored(Banner $banner)
    {
        //
    }

    /**
     * Handle the event "force deleted" event.
     *
     * @param  \App\Banner  $banner
     * @return void
     */
    public function forceDeleted(Banner $banner)
    {
        //
    }
}
