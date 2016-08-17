<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Album;
use App\Repositories\AlbumRepository;

class AlbumController extends Controller
{
	/**
	 * The task repository instance.
	 *
	 * @var AlbumRepository
	 */
	protected $albums;
	
    public function __construct(TaskRepository $albums)
	{
		$this->middleware('auth');
		$this->albums = $albums;
	}

	/**
	 * Display a list of all of the user's albums.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
//    	$albums = Album::orderBy('created_at', 'asc')->get();

		$albums = $this->albums->forUser($request->user());
		
		return view('albums', [
			'albums' => $albums,
		]);
	}

	/**
	 * Create a new album.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function create(Request $request)
	{
		$this->validate($request, [
			'album_name' => 'required|max:255',
		]);

		$request->user()->albums()->create([
			'album_name' => $request->album_name,
		]);

		return redirect('/');
	}

	/**
	 * Destroy the given album.
	 *
	 * @param  Request  $request
	 * @param  Album  $album
	 * @return Response
	 */
	public function destroy(Request $request, Album $album)
	{
		$this->authorize('delete', $album);

		$album->delete();

		return redirect('/');
	}
}
