<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventImageObserver
{
    /**
     * Handle the event "created" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function upload(Event $event)
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
            redirect()->route('backend.events.index');
        }else{
            $name = bin2hex(openssl_random_pseudo_bytes(8));
            $name = $name . '.' . $extension;
            $name = 'images/events/' . $name;

            request()->image->storeAs('', $name);
            $event->image = $name;
        }

    }

    public function creating(Event $event)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $this->upload($event);
        }
    }

    /**
     * Handle the event "updated" event.
     *
     * @param  \App\Event  $event
     * @return void
     */

    public function updating(Event $event)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $previous_image = $event->image;
            $this->upload($event);

            if($previous_image != "images/events/event-image.jpg"){
                Storage::delete($previous_image);
            }
        }
    }

    public function saving(Event $event)
    {
        if(is_a(request()->image, UploadedFile::class) and request()->image->isValid()){
            $previous_image = $event->image;
            $this->upload($event);

            if($previous_image != "images/events/event-image.jpg"){
                Storage::delete($previous_image);
            }
        }
    }

    /**
     * Handle the event "deleted" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        Storage::delete($event->image);
    }

    /**
     * Handle the event "restored" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the event "force deleted" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
