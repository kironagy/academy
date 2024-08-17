<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $courseId = $request->route('id'); // Assuming courseId is passed as a route parameter

        // Check if an active order exists for the given user and course
        $orderExists = Order::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->where('status', 'success')
            ->exists();

        if (! $orderExists) {

            // If no active order exists, you can redirect or abort with a 403 response
            return \redirect()->route('myCourses');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
