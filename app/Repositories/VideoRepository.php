<?php
namespace App\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class VideoRepository implements VideoRepositoryInterface {
 
    protected $video;

    public function __construct(Video $video) {
        $this->video = $video;
    }

    public function createVideo($videoUrl) {
        $videoInfo = $this->getVideoInfo($videoUrl);

        $this->video->title = $videoInfo['title'];
        $this->video->description = $videoInfo['description'];
        $this->video->like_count = $videoInfo['statistics']['likeCount'];
        $this->video->url = $videoInfo['url'];
        $this->video->embed_url = $videoInfo['embedUrl'];
        $this->video->author_id = auth()->user()->id;

        $this->video->save();
    }

    public function getVideos() {
        $videos = DB::table('videos')->join('users', 'videos.author_id', '=', 'users.id')
                    ->select('videos.*', 'users.email')->paginate(20);

        var_dump($videos); die();
        return $videos;
    }

    private function getVideoInfo($videoUrl) {
        $videoId = $this->getVideoId($videoUrl);
        $apiUrl = env('YOUTUBE_API_URL', "");
        $apiUrl = str_replace("{VIDEO_ID_PARAM}", $videoId, $apiUrl);
        $json = file_get_contents($apiUrl);
        $data = json_decode( $json , true);

        if (!isset($data['items']) || !count($data['items']) ) {
            return null;
        }

        $items = $data['items'][0];

        $videoInfo = [];
        $videoInfo['title'] = $items['snippet']['title'];
        $videoInfo['description'] = $items['snippet']['description'];
        $videoInfo['thumbnails'] = $items['snippet']['thumbnails'];
        $videoInfo['statistics'] = $items['statistics'];
        $videoInfo['embedUrl'] = $this->getEmbedUrl($videoId);
        $videoInfo['url'] = $videoUrl;

        return $videoInfo;
    }

    private function getVideoId($url) {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $url, $matches);

        return $matches[1] ?? null;
    }

    private function getEmbedUrl($videoId) {
        return "https://www.youtube.com/embed/$videoId";
    }
}