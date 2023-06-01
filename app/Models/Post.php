<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($t, $e, $d, $b, $s)
    {
        $this->title = $t;
        $this->excerpt = $e;
        $this->date = $d;
        $this->body = $b;
        $this->slug = $s;
    }
    public static function all()
    {
        return collect(File::files(resource_path('posts/')))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($doc) => new Post($doc->title, $doc->excerpt, $doc->date, $doc->body(), $doc->slug));
    }
    public static function find($slug)
    {
        $posts = static::all();
        $post = $posts->firstWHere('slug', $slug);
    }
}