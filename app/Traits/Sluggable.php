<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::creating(function ($model) {
            $model->generateSlug();
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->fillable[] = 'slug';
        });
    }

    protected function generateSlug()
    {
        $slug = Str::slug($this->getAttributeValue($this->sluggableField()));
        $count = 1;

        while ($this->slugExists($slug)) {
            $slug = Str::slug($this->getAttributeValue($this->sluggableField())) . '-' . $count;
            $count++;
        }

        $this->setAttribute('slug', $slug);
    }

    protected function slugExists($slug)
    {
        return static::where('slug', $slug)
            ->where('id', '<>', $this->id ?? null)
            ->exists();
    }

    protected function sluggableField()
    {
        return $this->sluggable;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
