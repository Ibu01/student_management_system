<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::latest()->get();
        return view('payment.index',compact('payments'));
    }

    public function create() {
        $enrollments = Enrollment::latest()->get();
        return view('payment.create',compact('enrollments'));
    }

    public function store(Request $request) {
        $request->validate([
            'enrollment_id'=>'required |unique:payments,enrollment_id',
            'paid_date'=>'required',
        ]);

        $enrollmentId = $request->enrollment_id;
        $existingPayment = Payment::where('enrollment_id', $enrollmentId)->exists();

        if ($existingPayment) {
           return redirect(route('payment.index'))->with('message', 'Payment for this enrollment already Done');
        }


        $payments = new Payment;

        $payments->enrollment_id = $request->enrollment_id;
        $payments->paid_date = $request->paid_date;
     

        $payments->save();

        $enrollments = Enrollment::find($request->enrollment_id);
        if($enrollments)
        {
            $enrollments->status = 'Completed';
            $enrollments->save();
        }

       return redirect(route('payment.index'))->with('message','Payment has been done');
    }

    public function delete(Payment $payments) {
        $payments->delete();
        return redirect(route('payment.index'))->with('message','Payemt Delete');
    }

    public function single(Payment $payments) {
        return view('payment.single',['payments'=>$payments]);
    }

    public function edit(Payment $payments)  {
        $enrollments = Enrollment::latest()->get();
        return view('payment.edit',['enrollments'=>$enrollments,'payments'=>$payments]);
    }

    public function update(Request $request, Payment $payments)  {
         $request->validate([
            'enrollment_id'=>'required',
            'paid_date'=>'required',
        ]);

        $payments->enrollment_id = $request->enrollment_id;
        $payments->paid_date = $request->paid_date;
     

        $payments->save();

       return redirect(route('payment.index'))->with('message','Payment has been Updated');
    }
}
