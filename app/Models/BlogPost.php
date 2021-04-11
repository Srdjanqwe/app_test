<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='blogposts';
    protected $fillable =['title','content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image','imageable');
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT,'desc');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('is_published', true);
    }


    public static function boot()
    {
        // static::addGlobalScope(new LatestScope);
        static::addGlobalScope(new DeletedAdminScope);
        parent::boot();
    }
}
