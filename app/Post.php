<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string|null $excerpt
 * @property string $body
 * @property string $status
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 */
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    //Un post pertenece a UN usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Un post pertenece a UNA categoría
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Un post puede tener y pertenecer a N etiquetas
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
