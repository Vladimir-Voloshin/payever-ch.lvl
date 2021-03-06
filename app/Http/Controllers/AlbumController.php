<?php

namespace App\Http\Controllers;

use App\Managers\AlbumManager;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Album;
use App\Repositories\AlbumRepository;

use Symfony\Component\HttpFoundation\JsonResponse;
use \Validator;
use Illuminate\Support\Facades\Auth; //get data from auth-ed user


class AlbumController extends Controller
{
    /**
     * The album manager instance.
     *
     * @var AlbumManager
     */
    protected $manager;
    
    public function __construct(AlbumManager $manager)
    {
        $this->middleware('auth');
        $this->manager = $manager;
    }

    /**
     * Display a list of all of the user's albums.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('albums.list', [
            'albums' => $this->manager->getAllAlbums($request),
        ]);
    }
    
    /**
     * Display a list of all of the user's albums.
     *
     * @param  Request  $request
     * @return Response
     */
    public function api(Request $request)
    {
        return JsonResponse::create('api');
    }

    /**
     * Create a new album.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'album_name' => 'required|unique:albums|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $album = new Album;
        $album->album_name = $request->album_name;
        $album->user_id = Auth::id();
        $album->save();

        return redirect('/web/albums');
    }
    
    /**
     * Update an album.
     *
     * @param  Request  $request
     * @param  Album  $album
     * @return Response
     */
    public function update(Request $request, Album $album)
    {
        $validator = Validator::make($request->all(), [
            'album_name' => 'required|unique:albums|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $album->album_name = $request->album_name;
        $album->save();

        return redirect('/web/albums');
    }

    /**
     * Destroy the given album.
     *
     * @param  Request  $request
     * @param  Album  $album
     * @return Response
     */
    public function delete(Request $request, Album $album)
    {
//        var_dump(__LINE__, $request);die();
        $this->authorize('delete', $album);

        $album->delete();

        return redirect('/web/albums');
    }
}
