<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Concerns\ConvertsMarkdownToHtml;

class Post extends Model
{
    use HasFactory;
    use ConvertsMarkdownToHtml;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function title(): Attribute
    {
        return Attribute::set(fn($value) => Str::title($value));
    }

    public function showRoute(array $parameters = [])
    {
        return route('posts.show', [$this, Str::slug($this->title), ...$parameters]);
    }
}
