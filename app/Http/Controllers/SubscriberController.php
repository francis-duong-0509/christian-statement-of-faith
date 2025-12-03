<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Notifications\NewSubscriberNotification;
use App\Services\AdminNotifiable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Honeypot check - if filled, it's a bot
        if ($request->filled('website')) {
            return response()->json(['success' => true]);
        }

        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:subscribers,email',
            ],
        ], [
            'email.required' => __t('Vui lòng nhập địa chỉ email', 'Please provide an email address'),
            'email.email' => __t('Địa chỉ email không hợp lệ', 'Please provide a valid email address'),
            'email.unique' => __t('Địa chỉ email đã được đăng ký', 'This email address is already subscribed'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Create subscriber
            $subscriber = Subscriber::create([
                'email' => $request->input('email'),
                'status' => 'active',
                'subscribed_at' => now(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'locale' => app()->getLocale(),
            ]);

            // Notify admin
            (new AdminNotifiable())->notify(new NewSubscriberNotification($subscriber));

            Log::info('New subscriber created', [
                'email' => $subscriber->email,
                'locale' => $subscriber->locale,
            ]);

            return response()->json([
                'success' => true,
                'message' => __t(
                    'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ gửi bạn tin mới nhất.',
                    'Thank you for subscribing! We will send you the latest updates.'
                ),
            ]);
        } catch (\Throwable $th) {
            Log::error('Subscriber creation failed', [
                'email' => $request->input('email'),
                'error' => $th->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => __t(
                    'Có lỗi xảy ra. Vui lòng thử lại.',
                    'An error occurred. Please try again.'
                ),
            ], 500);
        }
    }
}
