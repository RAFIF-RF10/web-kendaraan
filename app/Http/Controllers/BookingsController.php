<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
    public function approve(Request $request, $booking_id)
    {
        $user_id = Auth::user()->id;
        $booking = Bookings::where('id', $booking_id)->first();

        if (!$booking) {
            return response()->json(['message' => 'Booking not found or already approved'], 404);
        }

        if (is_null($booking->approved_by_1)) {
            $booking->approved_by_1 = $user_id;
            $booking->status = 'approved_by_1';
        } elseif (is_null($booking->approved_by_2)) {
            $booking->approved_by_2 = $user_id;
            $booking->status = 'fully_approved';
        } else {
            return response()->json(['message' => 'Booking has already been fully approved'], 400);
        }

        // Simpan perubahan ke database
        $booking->save();
        return response()->json($booking, 200);
    }

    public function reject(Request $request, $booking_id)
    {
        $user_id = Auth::user()->id;
        $booking = Bookings::where('id', $booking_id)->where('status', 'pending')->first();

        if (!$booking) {
            return response()->json(['message' => 'Booking not found or already processed'], 404);
        }

        // Jika booking masih dalam status pending, proses penolakan
        if (is_null($booking->rejected_by_1)) {
            $booking->rejected_by_1 = $user_id;
            $booking->status = 'rejected';
        } else {
            return response()->json(['message' => 'Booking has already been processed'], 400);
        }

        // Simpan perubahan ke database
        $booking->save();
        return response()->json(['message' => 'Booking has been rejected'], 200);
    }

    // Mendapatkan semua pemesanan
    public function index()
    {
        $bookings = Bookings::with(['vehicle', 'driver', 'approvals'])->get();
        return response()->json($bookings, 200);
    }

    // Membuat pemesanan baru
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:users,id',
            // 'approved_by_1' => 'required|exists:users,id',
            // 'approved_by_2' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'purpose' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buat pemesanan baru
        $booking = Bookings::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'approved_by_1' => $request->approved_by_1,
            'approved_by_2' => $request->approved_by_2,
            'status' => 'pending',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'purpose' => $request->purpose,
        ]);

        return response()->json($booking, 201);
    }

    // Mendapatkan pemesanan berdasarkan ID
    public function show($id)
    {
        $booking = Bookings::with(['vehicle', 'driver', 'approvals'])->find($id);

        if (!$booking) {
            return response()->json(['message' => 'Bookings not found'], 404);
        }

        return response()->json($booking, 200);
    }

    // Mengupdate pemesanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'driver_id' => 'sometimes|required|exists:users,id',
            'approved_by_1' => 'sometimes|required|exists:users,id',
            'approved_by_2' => 'sometimes|required|exists:users,id',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after:start_date',
            'purpose' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $booking = Bookings::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Bookings not found'], 404);
        }

        // Update pemesanan
        $booking->update($request->all());

        return response()->json($booking, 200);
    }

    // Menghapus pemesanan
    public function destroy($id)
    {
        $booking = Bookings::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Bookings not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Bookings deleted successfully'], 200);
    }
}
