<?php
namespace App\Repositories\Interfaces;
use App\Repositories\Interfaces\BaseRepositoryInterface;

interface VideoRepositoryInterface {

    public function createVideo($url);

    public function getVideos();
}