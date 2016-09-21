<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Album;
use App\User as PayeverUser;

class AlbumManager
{
    const MAX_IMAGES_PER_ALBUM = 10;
    
    /**
     * The album repository instance.
     *
     * @var AlbumRepository
     */
    protected $albums;
    
    /**
     * The request instance.
     *
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->albums = resolve('App\Repositories\AlbumRepository');
    }

    /**
     *
     * @Return {JSON}
     *
     */
    public function getAllAlbums(){
        if($this->request->user()->rank >= PayeverUser::SUPERVISOR)
        {
            $albums = Album::all();
        }else{
            $albums = $this->albums->forUser($this->request->user());
        }
        return $albums;
    }
}
