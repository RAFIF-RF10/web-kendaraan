<!-- resources/views/bookings/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Booking</h1>

    <a href="{{ route('bookings.create') }}" class="bg-green-500 text-white py-2 px-4 rounded mb-4">Buat Booking Baru</a>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">ID</th>
                <th class="border border-gray-300 p-2">Kendaraan</th>
                <th class="border border-gray-300 p-2">Driver</th>
                <th class="border border-gray-300 p-2">Tanggal Mulai</th>
                <th class="border border-gray-300 p-2">Tanggal Selesai</th>
                <th class="border border-gray-300 p-2">Tujuan</th>
                <th class="border border-gray-300 p-2">Status</th>
                <th class="border border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $booking->id }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->vehicle->model }} ({{ $booking->vehicle->type }})</td>
                    <td class="border border-gray-300 p-2">{{ $booking->driver->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->start_date }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->end_date }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->purpose }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->status }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('bookings.show', $booking->id) }}" class="text-blue-500">Detail</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
