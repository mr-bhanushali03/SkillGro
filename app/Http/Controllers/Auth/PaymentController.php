<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\StudentCourse;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    function payment(Request $request)
    {
        if (isset($request->payment_id) && !empty($request->payment_id)) {
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            $payment = $api->payment->fetch($request->payment_id);
            $response = $payment->capture(['amount' => $payment['amount']]);
            $payment = Payment::create([
                'payment_id' => $response['id'],
                'course_name' => $response['notes']['course_name'],
                'course_price' => $response['amount'] / 100,
                'currency' => $response['currency'],
                'payment_status' => $response['status'],
                'payment_method' => $response['method'],
                'student_name' => $response['notes']['student_name'],
                'student_email' => $response['notes']['student_email'],
                'student_phone' => $response['notes']['student_contact'],
            ]);

            $studentCourse = StudentCourse::create([
                'student_id' => $response['notes']['student_id'],
                'course_id' => $response['notes']['course_id'],
                'instructor_id' => $response['notes']['instructor_id'],
            ]);

            return redirect()->route('paymentSuccess');
        } else {
            return redirect()->route('paymentFailed');
        }
    }

    function success()
    {
        return 'Payment Successfull';
    }

    function failed()
    {
        return 'Payment Failed';
    }
}
