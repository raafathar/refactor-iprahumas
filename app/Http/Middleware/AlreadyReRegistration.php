<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyReRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $formPayment = $user->form?->payment_proof;
        $formStatus = $user->form?->status;

        if (in_array($user->role, ['admin', 'superadmin'])) {
            return $next($request);
        }

        if ($formStatus == "pending" && $formPayment != null) {
            return redirect()->route("status-account");
        }
        return $next($request);
    }
}
