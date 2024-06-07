@extends('layout.layouts')

@section('title', 'Beranda')
@section('content')

<div class="ms-3 mt-3">
    <h4 class="">Hasil uji kelayakan</h4>
    <div class="border-0 scrol">
        <div class=" tbl-scrol">
        <div class="container mb-4">
            <div class="row">
            <div class="col">
                <div class="card border-0">
                <div class="card-body d-flex justify-content-between border border-0" style="background-color: #ffff">
                    <h5 class="card-title">Ambang Batar : 3.00</h5>
                    <div>
                    <a href="/ulang" class="btn btn-primary d-inline">Ulang</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <table class="table table-bordered border-1 table-sm" style="background-color: #ffff">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Kapal</th>
                    <th>Pemilik</th>
                    <th>Gt</th>
                    <th>Tahun</th>
                    <th>Nilai</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rengking as $item)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $item->kapal->nama_kapal }}</td>
                    <td>{{ $item->kapal->pemilik }}</td>
                    <td>{{ $item->kapal->gt }}</td>
                    <td>{{ $item->kapal->tahun }}</td>
                    <td>{{ $item->hasilAkhir }}</td>
                    @if ($item->hasilAkhir > 3.00)
                    <td>Layak</td>
                    @else
                    <td>Tidak Layak</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>  
    </div>
</div>  

@endsection