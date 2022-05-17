<?php 
namespace App\Utils;

class VideoHelper {
    public static function getVideoId($url) {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $url, $matches);

        return $matches[1] ?? null;
    }

    public static function getVideoInfo($videoUrl) {
        $videoId = getVideoId($videoUrl);
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

        return $videoInfo;
    }
}