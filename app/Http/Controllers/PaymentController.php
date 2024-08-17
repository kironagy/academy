<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout($courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = auth()->user();

        // Check if the user already purchased this course
        $existingOrder = Order::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->where('status', 'success')
            ->first();

        if ($existingOrder) {
            // If the user already purchased the course, redirect them to the course page or show a message

            return \redirect()->route('myCourses');
        }

        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a new Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $course->title,
                    ],
                    'unit_amount' => $course->price * 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['course' => $course->id]),
            'cancel_url' => route('payment.cancel'),
        ]);

        // Redirect to Stripe Checkout
        return redirect($session->url);
    }

    public function success(Request $request, $courseId)
    {
        // Payment was successful, grant course access or mark as paid
        $course = Course::findOrFail($courseId);
        $user = auth()->user();

        // Logic to grant course access
        Order::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'status' => 'success',
        ]); // Assuming a many-to-many relationship

        return \redirect()->route('myCourses');
    }

    public function cancel()
    {
        return 'CANCLE PAYMENT';
    }
}
