<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;


class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Laravel\Fortify\Http\Requests\VerifyEmailRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify($id) {
        $user = User::findOrFail($id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return request()->wantsJson()
                ? new JsonResponse('', 204)
                : redirect(url(env('SPA_URL')).'/dashboard?verified=1');
        }
        return request()->wantsJson()
            ? new JsonResponse('', 204)
            : redirect(url(env('SPA_URL')).'/dashboard?verified=1');
    }

    public function resend() {
        request()->user()->sendEmailVerificationNotification();
        return response([
            'data' => [
                'message' => 'Request has been sent!',
            ]
        ]);
    }
}
