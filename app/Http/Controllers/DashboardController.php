<?php
// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua kendaraan beserta jumlah pemakaian dari relasi Booking
        $vehicles = Vehicles::withCount('bookings')->get();

        // Siapkan data untuk grafik
        $chartData = [
            'labels' => $vehicles->pluck('type'),
            'data' => $vehicles->pluck('bookings_count')
        ];

        return view('_admin.dashboard', compact('chartData'));
        // return view('admin.dashboard');
    }
}


