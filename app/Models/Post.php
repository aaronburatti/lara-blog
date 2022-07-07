<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Eloquent\Facades\File;
use Illuminate\Support\Facades\File as FacadesFile;

class Post
{
    public static function find($slug)
    {
        base_path();
        if(!file_exists($path = resource_path("posts/{$slug}.html"))){
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));
    }

    public static function all()
    {
        $files = FacadesFile::files(resource_path("posts/"));
        return array_map(fn($file) => $file->getContents(), $files);
    }
}