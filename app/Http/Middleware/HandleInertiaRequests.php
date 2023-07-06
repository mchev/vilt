<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'localization' => [
                'locales' => config('localization.locales'),
                'currentLocale' => app()->getLocale(),
                'translations' => function() {
                    $locale = app()->getLocale();
                    return Cache::rememberForever('translations.' . $locale, function () use ($locale) {
                        $translations = [];

                        // TODO : Check if there is a lang_path() function or something similar
                        $langPath = base_path('/lang/' . $locale . '.json');

                        if (File::exists($langPath)) {
                            $translations = json_decode(file_get_contents($langPath), true);
                        }

                        return $translations;
                    });
                }
            ],
        ]);
    }
}
