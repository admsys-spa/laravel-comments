<?php

use Admsys\Comments\Concerns\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use function Pest\Laravel\assertDatabaseHas;

class Post extends Model
{
    use HasComments;

    public static function booted()
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
}

it('se puede crear', function () {
    $post = Post::create();
    $comment = $post->comment('Hello, world!');

    assertDatabaseHas('comments', [
        'id' => $comment->getKey(),
        'content' => 'Hello, world!',
    ]);
});

it('puede pertenecer a un usuario', function () {
    login();

    $post = Post::create();
    $comment = $post->comment('Hello, world!');

    assertDatabaseHas('comments', [
        'id' => $comment->getKey(),
        'content' => 'Hello, world!',
        'user_id' => Auth::id(),
    ]);
});

it('puede pertenecer a otro comentario', function () {
    $post = Post::create();
    $parent = $post->comment('Hello, world!');
    $child = $post->comment('Thanks!', parent: $parent);

    assertDatabaseHas('comments', [
        'id' => $child->getKey(),
        'content' => 'Thanks!',
        'parent_id' => $parent->getKey(),
    ]);
});
