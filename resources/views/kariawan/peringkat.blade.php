@extends('layout.layouts')

@section('title', 'Beranda')
@section('content')

<div class="ms-3 mt-3">
    <h4 class="">Hasil Peringkat</h4>
    <div class="border-0 scrol">
        <div class=" tbl-scrol">
        <table class="table table-bordered border-1 table-sm" style="background-color: #ffff">
            <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Kapal</th>
                <th>Tipe</th>
                <th>Gt</th>
                <th>Tahun</th>
                <th>Nilai</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>  
    </div>
</div> 

@endsection