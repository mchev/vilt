<?php

namespace App\Models;

use App\Traits\Sluggable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    use Translatable;
    use Sluggable;

    protected $fillable = [
        'title',
        'content',
    ];

    protected $translatables = [
        'title',
        'content',
    ];

    protected $sluggable = 'title';

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeVisible($query)
    {
        return $query->where('visibility', 'public');
    }

}
