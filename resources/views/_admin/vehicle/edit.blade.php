@extends('_layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="fw-bolder mb-4">Edit Kendaraan</h3>

                    {{-- Display any error messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Kendaraan</label>
                            <input type="text" name="type" class="form-control" id="type" value="{{ $vehicle->type }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model Kendaraan</label>
                            <input type="text" name="model" class="form-control" id="model" value="{{ $vehicle->model }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('vehicle.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
