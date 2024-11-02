@extends('_layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h3 class="fw-bolder">Kendaraan</h3>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{route('vehicle.create')}}" class="btn btn-primary text-center">
                                <b>Tambah Data</b></a>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover table-md">
                        <thead>
                          <tr class="table-light">
                            <th width="5%" class="text-center fs-4 text-muted">No.</th>
                            <th width="40%" class="fs-4 text-muted">Tipe</th>
                            <th width="40%" class="fs-4 text-muted">Model</th>
                            <th width="15%" class="text-center fs-4 text-muted">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                            $increment = 1
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-black-50" scope="row">{{ $increment++ }}</td>
                                <td class="fs-4 fw-bold text-black-50">{{ $item->type }}</td>
                                <td class="fs-4 fw-bold text-black-50">{{ $item->model }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('vehicle.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form action="{{ route('vehicle.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                      @if (!count($data))
                        <div class="text-center my-5">
                            <h4>Data Belum Tersedia 😐</h4>
                            <p>Silahkan melakukan penambahan data</p>
                        </div>
                    @endif
                    <div>
                        {{ count($data) ? $data->links('pagination::bootstrap-5') : '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection
