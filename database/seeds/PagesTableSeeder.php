<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();

        Page::create([
            'title' => '13 anos de carreira',
            'subtitle' => 'Conheça a nossa história',
            'menu' => 'Home',
            'slug' => 'home',
            'type' => 'text',
            'content' => '',
            'code' => '',
            'link' => '',
        ]);

        Page::create([
            'title' => 'Lucas Akira e Fábio',
            'subtitle' => 'Conheça a nossa história',
            'menu' => 'Sobre',
            'slug' => 'sobre',
            'type' => 'text',
            'content' => '',
            'code' => '',
            'link' => '',
        ]);

        Page::create([
            'title' => 'Agenda - Em breve',
            'subtitle' => 'Confira nossos próximos shows',
            'menu' => 'Agenda',
            'slug' => 'agenda',
            'type' => 'events',
            'content' => '',
            'code' => '',
            'link' => '',
        ]);

        Page::create([
            'title' => 'Músicas',
            'subtitle' => '',
            'menu' => 'Músicas',
            'slug' => 'musicas',
            'type' => 'link',
            'content' => '',
            'code' => '',
            'link' => 'https://open.spotify.com/artist/2EaDSEBebaEs4A24AJJepr',
        ]);

        Page::create([
            'title' => 'Vídeos',
            'subtitle' => '',
            'menu' => 'Vídeos',
            'slug' => 'videos',
            'type' => 'link',
            'content' => '',
            'code' => '',
            'link' => 'https://www.youtube.com/watch?v=22XtOiG8pFc&feature=youtu.be'
        ]);

        Page::create([
            'title' => 'Fotos',
            'subtitle' => 'Confira nossas últimas',
            'menu' => 'Fotos',
            'slug' => 'fotos',
            'type' => 'code',
            'content' => '',
            'code' => '',
            'link' => '',
        ]);

        Page::create([
            'title' => 'Lucas Akira e Fábio',
            'subtitle' => 'Entre em contato com',
            'menu' => 'Contato',
            'slug' => 'contato',
            'type' => 'contact',
            'content' => '',
            'code' => '',
            'link' => '',
        ]);
    }
}
