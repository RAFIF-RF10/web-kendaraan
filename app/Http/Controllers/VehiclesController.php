<?php
namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Vehicles::paginate(10);

        return view('_admin.vehicle.list', [
            'data' => $kendaraan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('_admin.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'model' => 'required|string|max:255', // Tambahkan validasi untuk 'model'
        ]);

        Vehicles::create($request->all());

        return redirect()->route('vehicle.index')->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicles::findOrFail($id);
        return view('_admin.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'model' => 'required|string',
        ]);

        $vehicle = Vehicles::findOrFail($id);
        $vehicle->update([
            'type' => $request->input('type'),
            'model' => $request->input('model'),
        ]);

        return redirect()->route('vehicle.index')->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicles::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicle.index')->with('success', 'Data kendaraan berhasil dihapus!');
    }

    /**
     * Show the vehicle usage dashboard.
     */
    public function dashboard()
    {
        $vehicles = Vehicles::with('bookings')->get();

        // Menghitung pemakaian kendaraan per bulan
        $monthlyUsage = [];
        foreach ($vehicles as $vehicle) {
            $monthlyUsage[$vehicle->type] = $vehicle->bookings()
                ->whereYear('created_at', Carbon::now()->year)
                ->selectRaw('MONTH(created_at) as month, COUNT(*) as usage_count')
                ->groupBy('month')
                ->pluck('usage_count', 'month')
                ->toArray();
        }

        return view('admin.dashboard', [
            'monthlyUsage' => $monthlyUsage
        ]);
    }
}
