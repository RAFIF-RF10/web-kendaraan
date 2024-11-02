@extends('_layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="fw-bolder">Tambah Kendaraan</h3>
                    <form action="{{ route('vehicle.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Kendaraan</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Masukkan tipe kendaraan" required>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model Kendaraan</label>
                            <input type="text" class="form-control" id="model" name="model" placeholder="Masukkan model kendaraan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
