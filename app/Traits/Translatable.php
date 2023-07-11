<?php

namespace App\Traits;

trait Translatable
{
    public function translate($key, $value, $locale = null)
    {
        if (! in_array($key, $this->translatables)) {
            abort(500, 'Attribute is not translatable');
        }

        if (! $locale) {
            $locale = app()->getLocale();
        }

        $translation = $this->translations()->updateOrCreate(
            ['locale' => $locale, 'key' => $key],
            ['value' => $value]
        );

        return $translation;
    }

    public function getTranslation($attribute, $locale = null)
    {
        if (! $locale) {
            $locale = app()->getLocale();
        }

        $translation = $this->translations()
            ->where('locale', $locale)
            ->where('key', $key)
            ->first();

        return $translation ? $translation->$attribute : null;
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function getAttribute($key)
    {
        $translationAttribute = $this->getTranslationAttribute($key);
        if ($translationAttribute) {
            return $translationAttribute;
        }

        return parent::getAttribute($key);
    }

    public function getTranslationAttribute($key)
    {
        if (in_array($key, $this->translatables)) {
            return $this->getTranslation($key);
        }

        return null;
    }
}
