@extends('layout.layouts')

@section('title', 'Beranda')
@section('content')

<div class="ms-3 mt-3">
  <h4 class="">List Data Kapal</h4>
  <div class="border-0 scrol">
    <div class=" tbl-scrol">
        @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
      <table class="table table-bordered border-1 table-sm" style="background-color: #ffff">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Pemilik</th>
            <th>GT</th>
            <th>Jenis Kapal</th>
            <th>Tahun</th>
            <th><a href="/tambah-kapal" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i> Tambah</a></th>
          </tr>
        </thead>
        <tbody>
          @if (count($kapal) > 0)
            @foreach ($kapal as $item)
              <tr>
                <th class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $item->nama_kapal }}</td>
                <td>{{ $item->pemilik }}</td>
                <td>{{ $item->gt }}</td>
                <td>{{ $item->jenis_kapal }}</td>
                <td>{{ $item->tahun }}</td>
                <td class="text-center">
                  <a href="/edit-kapal/{{ $item->slug }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                  <a href="/hapus-kapal/{{ $item->slug }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                </td>
              </tr>
            @endforeach
          @else
          <tr><td colspan="7" class="text-center">Tidak ada Data</td></tr>  
          @endif
        </tbody>
      </table>
    </div>  
  </div>
</div>  

@endsection