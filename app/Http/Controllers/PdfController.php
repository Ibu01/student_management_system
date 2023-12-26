<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function makepdf(Payment  $payments)  {
    $pdf = Pdf::loadView('payment.pdf', ['payments'=>$payments]);
    return $pdf->download('invoice.pdf');
    }

    public function enrollmentpdf()  {
        $enrollmentlist = Enrollment::all();
        $pdf = Pdf::loadView('enrollment.pdf', ['enrollmentlist'=>$enrollmentlist]);
        return $pdf->download('invoice.pdf');
    }

}
