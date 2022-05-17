<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Services\VideoService;
use App\Http\Requests\VideoRequest;

class HomeController extends Controller
{
    protected $videoService;

    function __construct(VideoService $videoService) {

        $this->videoService = $videoService;
   }

    public function index() 
    {
        $videos = DB::table('videos')->join('users', 'videos.author_id', '=', 'users.id')
                    ->select('videos.*', 'users.email')->paginate(20);
        return view('home.index', ['videos' => $videos]);
    }

    public function share() 
    {
        return view('home.share');
    }

    /**
     * Handle update youtube video
     * 
     * @param VideoRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateVideo(VideoRequest $request) {
        $request->validated();

        $this->videoService->create($request);

        return redirect('/')->with('success', "Created shared video successfully.");
    }
}
