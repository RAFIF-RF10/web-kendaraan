<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\User;
use App\Models\Vehicles;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
    public function approve(Request $request, $booking_id)
    {
        // Implementasi approval booking
    }

    public function reject(Request $request, $booking_id)
    {
        // Implementasi reject booking
    }

    public function index()
    {
        $bookings = Bookings::with(['vehicle', 'driver', 'approvals'])->get();
        return view('_admin.booking.create', [
            'data' => $bookings
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'purpose' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $booking = Bookings::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'status' => 'pending',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'purpose' => $request->purpose,
        ]);

        return response()->json($booking, 201);
    }

    public function show($id)
    {
        $booking = Bookings::with(['vehicle', 'driver', 'approvals'])->find($id);

        if (!$booking) {
            return response()->json(['message' => 'Bookings not found'], 404);
        }

        return response()->json($booking, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'driver_id' => 'sometimes|required|exists:users,id',
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

        $booking->update($request->all());

        return response()->json($booking, 200);
    }

    public function destroy($id)
    {
        $booking = Bookings::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Bookings not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Bookings deleted successfully'], 200);
    }

    public function create()
    {
        $vehicles = Vehicles::all(); // Ambil data kendaraan
        $drivers = Driver::all();    // Ambil data driver

        return view('bookings.create', compact('vehicles', 'drivers')); // Pastikan view berada di resources/views/bookings
    }
}
