<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

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
                'currentLocale' => $request->session()->get('locale'),
                'translations' => function () use ($request) {
                    $locale = $request->session()->get('locale');
                    $langPath = base_path('lang/'.$locale.'.json');

                    return Cache::rememberForever('translations.'.$locale.'.'.filemtime($langPath), function () use ($langPath) {
                        if (File::exists($langPath)) {
                            return json_decode(file_get_contents($langPath), true);
                        }

                        return [];
                    });
                },
            ],
        ]);
    }
}
