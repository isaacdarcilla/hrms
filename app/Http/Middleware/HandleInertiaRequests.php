<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\Notification;
use App\Models\Contact;
use App\Models\Leave;
use App\Models\EmployeeSetting;
use Illuminate\Support\Facades\DB;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? [
                        'id' => $request->user()->id,
                        'first_name' => $request->user()->first_name,
                        'last_name' => $request->user()->last_name,
                        'email' => $request->user()->email,
                        'super' => $request->user()->owner,
                        'account' => [
                            'id' => $request->user()->account->id,
                            'name' => $request->user()->account->name,
                        ],
                    ] : null,
                ];
            },
            'employee' => function () use ($request) {
                return [
                    'user' => auth()->guard('employee')->user(),
                ];
            },
            'setting' => function () use ($request) {
                $employee = auth()->guard('employee')->user();

                return [
                    'employee' => EmployeeSetting::where('contact_id', $employee ? $employee->id : null)->first(),
                ];
            },
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
            'notifiable' => function () use ($request) {
                return [
                    'count' => Notification::where('read_at', null)->count(),
                    'leaves' => Leave::where('approved_for', null)->where('disapproved_due_to', null)->where('recommendation', null)->count(),
                    'notifications' => DB::table('contacts')
                                        ->join('notifications', 'contacts.id', '=', 'notifications.contact_id')
                                        ->select('contacts.first_name', 'contacts.last_name', 'contacts.photo', 'notifications.*')
                                        ->where('read_at', null)
                                        ->get(),
                ];
            },
        ]);
    }
}
