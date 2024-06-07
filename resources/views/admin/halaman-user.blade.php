@extends('layout.layouts')

@section('title', 'halaman-pimpinan')
@section('content')

<div class="ms-3 mt-3">
    <div class="border-0 scrol">
        <div class=" tbl-scrol">
            <h2>Data User Pimpinan</h2>
            @if (session('statusp'))
                <div class="alert alert-success">
                    {{ session('statusp') }}
                </div>
            @endif
            <table class="table table-bordered border-1 table-sm" style="background-color: #ffff">
                <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th><a href="/tambah-pimpinan" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i> Tambah</a></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pimpinan as $item)
                        <tr class="text-center">
                            <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->username }}</td>
                            <td class="text-center">
                                <a href="/edit-pimpinan/{{ $item->id }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/hapus-pimpinan/{{ $item->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2 class="mt-5">Data User Kariawan</h2>
            @if (session('statusk'))
                <div class="alert alert-success">
                    {{ session('statusk') }}
                </div>
            @endif
            <table class="table table-bordered border-1 table-sm" style="background-color: #ffff">
                <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th><a href="/tambah-kariawan" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i> Tambah</a></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($kariawan as $item)
                    <tr class="text-center">
                        <th class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td class="text-center">
                            <a href="/edit-kariawan/{{ $item->id }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                            <a href="/hapus-kariawan/{{ $item->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>  
    </div>
</div> 

@endsection