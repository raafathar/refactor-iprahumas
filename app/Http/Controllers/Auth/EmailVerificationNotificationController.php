<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        try {
            $request->user()->sendEmailVerificationNotification();

            if ($request->hasFile('payment_proof')) {
                $request->validate([
                    'payment_proof' => 'image|mimes:jpeg,png,jpg|max:1024',
                ]);

                $path_payment_proof = $request->file('payment_proof')->store('images/payment_proof');

                Form::updateOrCreate(
                    ['user_id' => $request->user()->id],
                    ['payment_proof' => $path_payment_proof]
                );
            }

            toastr()->success('Tautan verifikasi telah dikirim!');
        } catch (\Throwable $th) {
            return back()->withErrors('Terjadi kesalahan saat mengirim tautan verifikasi.');
        }

        return back()->with('status', 'verification-link-sent');
    }
}