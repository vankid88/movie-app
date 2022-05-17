<?php
namespace App\services;
use App\Services\BaseService;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;

class VideoService extends BaseService {

    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository) {
        $this->videoRepository = $videoRepository;
    }

    public function create(VideoRequest $request) {
        $this->videoRepository->createVideo($request->get('url'));
    }

    public function getVideos() {
        $this->videoRepository->getVideos();
    }
}