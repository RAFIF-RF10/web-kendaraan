<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Model booking Anda
use App\Models\Approval; // Model approval jika ada
use App\Models\Bookings;

// class ApprovalController extends Controller
// {
//     /**
//      * Display a list of bookings needing approval.
//      */
//     public function index()
//     {
//         // Mendapatkan level approval dari pengguna yang login
//         if (auth()->Auth::check()) {
//             $approvalLevel = auth()->user()->approval_level;

//             // Mendapatkan booking yang membutuhkan approval level pengguna
//             $bookings = Bookings::where('approval_level', '<=', $approvalLevel)
//                 ->where('status', 'pending')
//                 ->get();

//             return view('approvals.index', compact('bookings'));
//         } else {
//             return redirect()->route('login')->withErrors('Anda perlu login terlebih dahulu.');
//         }
//     }

//     /**
//      * Approve a booking.
//      */
//     public function approve(Request $request, $id)
//     {
//         if (auth()->Auth::check()()) {
//             $approvalLevel = auth()->user()->approval_level;
//             $booking = Bookings::findOrFail($id);

//             // Periksa apakah level pengguna cukup untuk approve booking
//             if ($booking->approval_level == $approvalLevel) {
//                 $booking->update([
//                     'status' => 'approved',
//                     'approved_by' => auth()->id(),
//                     'approved_at' => now(),
//                 ]);

//                 return redirect()->route('approvals.index')->with('success', 'Booking berhasil di-approve!');
//             } else {
//                 return redirect()->route('approvals.index')->withErrors('Anda tidak memiliki level approval yang cukup.');
//             }
//         } else {
//             return redirect()->route('login')->withErrors('Anda perlu login terlebih dahulu.');
//         }
//     }
// }
