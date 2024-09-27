<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Mpociot\Versionable\VersionableTrait;
class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, VersionableTrait;

    protected $fillable = ['title', 'description', 'author_id', 'library_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
