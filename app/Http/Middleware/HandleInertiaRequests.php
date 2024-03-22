<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'toast' => function () use ($request) {
                return [
                    'success' => $request->session()->get('toast.success'),
                    'warning' => $request->session()->get('toast.warning'),
                    'info' => $request->session()->get('toast.info'),
                    'error' => $request->session()->get('toast.error'),
                ];
            },
             // saas_url
             'saas_url' => function () {
                return config('app.url');
            },
            // version
            'version' => function () {
                return [
                    'versionnr' => config('starter_eleven.version.versionnr'),
                    'versionsdatum' => config('starter_eleven.version.versionsdatum'),
                ];
            },
            // applications
            'applications' => function () {
                return [
                    'app_admin' => 'admin',
                    'app_employee' => 'employee',
                    'app_customer' => 'customer',
                    'app_admin_name' => 'Administrator-Anwendung',
                    'app_customer_name' => 'Kunden-Anwendung',
                    'app_employee_name' => 'Mitarbeiter-Anwendung',
                    'brand_name_1' => 'Starter',
                    'brand_name_2' => 'Eleven',
                    'brand_name_subtitle_app_admin' => 'für Administratoren',
                    'brand_name_subtitle_app_employee' => 'für Mitarbeiter',
                    'brand_name_subtitle_app_customer' => 'für Kunden',
                ];
            },
            // Userdaten
            'userdata' => function () {
                //
                $user_id = null;
                //
                $user = Auth::user();
                //
                if ($user) {
                    $user_id = $user->id;
                }
                //
                return [
                    'user_id' => $user_id,
                ];
            },
        ]);
    }
}
