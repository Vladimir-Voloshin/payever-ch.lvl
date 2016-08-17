<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albumsAmount = 5;
        $imagesPerAlbum = 5;
        factory(App\User::class, $albumsAmount)->create()->each(function ($u) use (&$imagesPerAlbum) {
            $album = factory(App\Album::class)->create();
            $u->albums()->save($album);
            factory(App\Image::class, $imagesPerAlbum)->create([
                'album_id' => $album->id,
            ]);
            $imagesPerAlbum += 15;
        });
    }
}
