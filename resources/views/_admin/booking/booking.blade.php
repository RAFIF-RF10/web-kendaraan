<!-- resources/views/bookings/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Buat Booking Baru</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="vehicle_id" class="block text-gray-700">Pilih Kendaraan:</label>
            <select name="vehicle_id" id="vehicle_id" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                <option value="">-- Pilih Kendaraan --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->model }} ({{ $vehicle->type }})</option>
                @endforeach
            </select>
            @error('vehicle_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="driver_id" class="block text-gray-700">Pilih Driver:</label>
            <select name="driver_id" id="driver_id" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                <option value="">-- Pilih Driver --</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
            @error('driver_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Tanggal Mulai:</label>
            <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-md" required>
            @error('start_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">Tanggal Selesai:</label>
            <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-md" required>
            @error('end_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="purpose" class="block text-gray-700">Tujuan:</label>
            <input type="text" name="purpose" id="purpose" class="mt-1 block w-full border border-gray-300 rounded-md" required>
            @error('purpose')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Buat Booking</button>
    </form>
</div>
@endsection
