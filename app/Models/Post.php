<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($t, $e, $d, $b)
    {
        $this->title = $t;
        $this->excerpt = $e;
        $this->date = $d;
        $this->body = $b;
    }
    public static function all() {
        $files = File::files(resource_path('posts/'));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/$slug.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts.{$slug}", now()->addSeconds(5), fn () => file_get_contents($path));
    }
}
