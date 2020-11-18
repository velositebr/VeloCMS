<?php

namespace App\Observers;

use App\Models\Album;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageAlbumObserver
{
    public function upload(Album $album)
    {
        $extension = request()->image->extension();
        $allowed_extensions = [
            'png',
            'jpg',
            'jpeg'
        ];

        if(!in_array($extension, $allowed_extensions)){
            //throw new Exception('Extensão ' . $extension . ' não permitida!');
            request()->session()->flash('error', 'A extensão ' . $extension . ' não permitida para a imagem do álbum!');
            redirect()->route('backend.albums.index');
        }else{
            $name = bin2hex(openssl_random_pseudo_bytes(8));
            $name = $name . '.' . $extension;
            $name = 'images/albums/' . $name;

            request()->image->storeAs('', $name);
            $album->image = $name;
        }

    }

    public function creating(Album $album)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $this->upload($album);
        }
    }

    /**
     * Handle the event "updated" event.
     *
     * @param  \App\Album  $album
     * @return void
     */

    public function updating(Album $album)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $previous_image = $album->image;
            $this->upload($album);

            if($previous_image != "images/albums/albums-image.jpg"){
                Storage::delete($previous_image);
            }
        }
    }

    public function saving(Album $album)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $previous_image = $album->image;
            $this->upload($album);

            if($previous_image != "images/albums/albums-image.jpg"){
                Storage::delete($previous_image);
            }
        }
    }

    /**
     * Handle the event "deleted" event.
     *
     * @param  \App\Album  $album
     * @return void
     */
    public function deleted(Album $album)
    {
        Storage::delete($album->image);
    }

    /**
     * Handle the event "restored" event.
     *
     * @param  \App\Album  $album
     * @return void
     */
    public function restored(Album $album)
    {
        //
    }

    /**
     * Handle the event "force deleted" event.
     *
     * @param  \App\Album  $album
     * @return void
     */
    public function forceDeleted(Album $album)
    {
        //
    }
}
