<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $formStatus = $user->form?->status;

        if (in_array($user->role, ['admin', 'superadmin'])) {
            return $next($request);
        }

        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        if (in_array($formStatus, ['pending', 'rejected'])) {
            return redirect()->route('status-account');
        }

        if ($formStatus === 'approved') {
            return $next($request);
        }

        return redirect()->route('verification.notice');
    }
}