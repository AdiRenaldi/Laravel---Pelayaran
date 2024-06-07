@extends('layout.layouts')

@section('title', 'Edit Data')
@section('content')

<div class="ms-3 mt-3">
    <h4 class="">Edit Data Kapal</h4>
    <div class="border-0 scrol">
      <div class=" tbl-scrol">

        <form action="/prosesEdit/{{ $kapal->slug }}" method="POST">
        @csrf
        @method('put')
          <div class="mb-3 row">
            <label for="nama" class="col-md-2 col-form-label-sm">Nama Kapal</label>
            <div class="col-md-10">
              <input type="text" name="nama" class="form-control w-75 @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $kapal->nama_kapal) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="pemilik" class="col-md-2 col-form-label-sm">Pemilik Kapal</label>
            <div class="col-md-10">
              <input type="text" name="pemilik" class="form-control w-75 @error('pemilik') is-invalid @enderror" id="pemilik" value="{{ old('pemilik', $kapal->pemilik) }}">
                @error('pemilik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="gt" class="col-md-2 col-form-label-sm">GT</label>
            <div class="col-md-10">
              <input type="number" name="gt" class="form-control w-50 @error('gt') is-invalid @enderror" id="gt" value="{{ old('gt', $kapal->gt) }}">
                @error('gt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tahun" class="col-md-2 col-form-label-sm">Tahun</label>
            <div class="col-md-10">
              <input type="number" name="tahun" class="form-control w-50 @error('tahun') is-invalid @enderror" id="tahun" value="{{ old('tahun', $kapal->tahun) }}">
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tipe" class="col-md-2 col-form-label-sm">Tipe Kapal</label>
            <div class="col-md-10">
              <input type="text" name="tipe" class="form-control w-50 @error('tipe') is-invalid @enderror" id="tipe" value="{{ old('tipe', $kapal->jenis_kapal) }}">
                @error('tipe')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>

          <h4 class="mt-5 mb-3">Input data spesifikasi</h4>
          <p class="mb-0"><b><i>Administrasi :</i></b></p>
            <div style="margin-left: 30px">
                <div class="mb-3 row">
                    <label for="laporan" class="col col-form-label-sm">Laporan Kedatangan & Keberangkatan Kapal</label>
                    <div class="col-md-7">
                        <select name="kedatangan" class="form-select form-select-sm @error('kedatangan') is-invalid @enderror" id="laporan" style="width: 150px;" aria-label="Default select example" value="{{ old('kedatangan') }}">
                            <option @if($administrasi->laporanKedatangan > 0) value="{{ $administrasi->laporanKedatangan }}" selected @endif>
                                @php
                                    $result = $administrasi->laporanKedatangan == 4 ? 'Sangat Baik' : ($administrasi->laporanKedatangan == 3 ? 'Baik' : ($administrasi->laporanKedatangan == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('kedatangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="awak" class="col col-form-label-sm">Daftar Awak Kapal</label>
                    <div class="col-md-7">
                        <select name="awak" class="form-select form-select-sm @error('awak') is-invalid @enderror" id="awak" style="width: 150px;" aria-label="Default select example" value="{{ old('awak') }}">
                            <option @if($administrasi->daftarAwak > 0) value="{{ $administrasi->daftarAwak }}" selected @endif>
                                @php
                                    $result = $administrasi->daftarAwak == 4 ? 'Sangat Baik' : ($administrasi->daftarAwak == 3 ? 'Baik' : ($administrasi->daftarAwak == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('awak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pernyataan" class="col col-form-label-sm">Surat Pernyataan Nahkoda Kapal</label>
                    <div class="col-md-7">
                        <select name="pernyataan" class="form-select form-select-sm @error('pernyataan') is-invalid @enderror" id="pernyataan" style="width: 150px;" aria-label="Default select example" value="{{ old('pernyataan') }}">
                            <option @if($administrasi->suratPernyataan > 0) value="{{ $administrasi->suratPernyataan }}" selected @endif>
                                @php
                                    $result = $administrasi->suratPernyataan == 4 ? 'Sangat Baik' : ($administrasi->suratPernyataan == 3 ? 'Baik' : ($administrasi->suratPernyataan == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('pernyataan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kesehatan" class="col col-form-label-sm">Buku Kesehatan Kapal</label>
                    <div class="col-md-7">
                        <select name="kesehatan" class="form-select form-select-sm @error('kesehatan') is-invalid @enderror" id="kesehatan" style="width: 150px;" aria-label="Default select example" value="{{ old('kesehatan') }}">
                            <option @if($administrasi->bukuKesehatan > 0) value="{{ $administrasi->bukuKesehatan }}" selected @endif>
                                @php
                                    $result = $administrasi->bukuKesehatan == 4 ? 'Sangat Baik' : ($administrasi->bukuKesehatan == 3 ? 'Baik' : ($administrasi->bukuKesehatan == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('kesehatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="penumpang" class="col col-form-label-sm">Manifes Penumpang</label>
                    <div class="col-md-7">
                        <select name="penumpang" class="form-select form-select-sm @error('penumpang') is-invalid @enderror" id="penumpang" style="width: 150px;" aria-label="Default select example" value="{{ old('penumpang') }}">
                            <option @if($administrasi->menifesPenumpang > 0) value="{{ $administrasi->menifesPenumpang }}" selected @endif>
                                @php
                                    $result = $administrasi->menifesPenumpang == 4 ? 'Sangat Baik' : ($administrasi->menifesPenumpang == 3 ? 'Baik' : ($administrasi->menifesPenumpang == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('penumpang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <p class="mb-0"><b><i>Permesinan :</i></b></p>
            <div style="margin-left: 30px">
                <div class="mb-3 row">
                    <label for="mesinUtama" class="col col-form-label-sm">Mesin Utama Kapal</label>
                    <div class="col-md-7">
                        <select name="mesinUtama" class="form-select form-select-sm @error('mesinUtama') is-invalid @enderror" id="mesinUtama" style="width: 150px;" aria-label="Default select example" value="{{ old('mesinUtama') }}">
                            <option @if($mesin->mesinUtama > 0) value="{{ $mesin->mesinUtama }}" selected @endif>
                                @php
                                    $result = $mesin->mesinUtama == 4 ? 'Sangat Baik' : ($mesin->mesinUtama == 3 ? 'Baik' : ($mesin->mesinUtama == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('mesinUtama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="mesinBantu" class="col col-form-label-sm">Mesin Bantu Kapal</label>
                    <div class="col-md-7">
                        <select name="mesinBantu" class="form-select form-select-sm @error('mesinBantu') is-invalid @enderror" id="mesinBantu" style="width: 150px;" aria-label="Default select example" value="{{ old('mesinBantu') }}">
                            <option @if($mesin->mesinBantu > 0) value="{{ $mesin->mesinBantu }}" selected @endif>
                                @php
                                    $result = $mesin->mesinBantu == 4 ? 'Sangat Baik' : ($mesin->mesinBantu == 3 ? 'Baik' : ($mesin->mesinBantu == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('mesinBantu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="listrik" class="col col-form-label-sm">Tenaga Listrik Utama & Darurat</label>
                    <div class="col-md-7">
                        <select name="listrik" class="form-select form-select-sm @error('listrik') is-invalid @enderror" id="listrik" style="width: 150px;" aria-label="Default select example" value="{{ old('listrik') }}">
                            <option @if($mesin->teganganListrik > 0) value="{{ $mesin->teganganListrik }}" selected @endif>
                                @php
                                    $result = $mesin->teganganListrik == 4 ? 'Sangat Baik' : ($mesin->teganganListrik == 3 ? 'Baik' : ($mesin->teganganListrik == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('listrik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bahanBakar" class="col col-form-label-sm">Jenis Bahan Bakar</label>
                    <div class="col-md-7">
                        <select name="bahanBakar" class="form-select form-select-sm @error('bahanBakar') is-invalid @enderror" id="bahanBakar" style="width: 150px;" aria-label="Default select example" value="{{ old('bahanBakar') }}">
                            <option @if($mesin->bahanBakar > 0) value="{{ $mesin->bahanBakar }}" selected @endif>
                                @php
                                    $result = $mesin->bahanBakar == 4 ? 'Sangat Baik' : ($mesin->bahanBakar == 3 ? 'Baik' : ($mesin->bahanBakar == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('bahanBakar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <p class="mb-0"><b><i>Navigasi & Alat Penolong :</i></b></p>
            <div style="margin-left: 30px">
                <div class="mb-3 row">
                    <label for="navigasi" class="col col-form-label-sm">Perlengkapan Navigasi</label>
                    <div class="col-md-7">
                        <select name="navigasi" class="form-select form-select-sm @error('navigasi') is-invalid @enderror" id="navigasi" style="width: 150px;" aria-label="Default select example" value="{{ old('navigasi') }}">
                            <option @if($navigasi->perlengkapanNavigasi > 0) value="{{ $navigasi->perlengkapanNavigasi }}" selected @endif>
                                @php
                                    $result = $navigasi->perlengkapanNavigasi == 4 ? 'Sangat Baik' : ($navigasi->perlengkapanNavigasi == 3 ? 'Baik' : ($navigasi->perlengkapanNavigasi == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('navigasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="radio" class="col col-form-label-sm">Perangkat Radio</label>
                    <div class="col-md-7">
                        <select name="radio" class="form-select form-select-sm @error('radio') is-invalid @enderror" id="radio" style="width: 150px;" aria-label="Default select example" value="{{ old('radio') }}">
                            <option @if($navigasi->perangkatRadio > 0) value="{{ $navigasi->perangkatRadio }}" selected @endif>
                                @php
                                    $result = $navigasi->perangkatRadio == 4 ? 'Sangat Baik' : ($navigasi->perangkatRadio == 3 ? 'Baik' : ($navigasi->perangkatRadio == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('radio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="komunikasi" class="col col-form-label-sm">Surat Izin Komunikasi Radio</label>
                    <div class="col-md-7">
                        <select name="komunikasi" class="form-select form-select-sm @error('komunikasi') is-invalid @enderror" id="komunikasi" style="width: 150px;" aria-label="Default select example" value="{{ old('komunikasi') }}">
                            <option @if($navigasi->izinKomunikasiRadio > 0) value="{{ $navigasi->izinKomunikasiRadio }}" selected @endif>
                                @php
                                    $result = $navigasi->izinKomunikasiRadio == 4 ? 'Sangat Baik' : ($navigasi->izinKomunikasiRadio == 3 ? 'Baik' : ($navigasi->izinKomunikasiRadio == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('komunikasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alatPenolong" class="col col-form-label-sm">Daya Apung Alat Penolong</label>
                    <div class="col-md-7">
                        <select name="alatPenolong" class="form-select form-select-sm @error('alatPenolong') is-invalid @enderror" id="alatPenolong" style="width: 150px;" aria-label="Default select example" value="{{ old('alatPenolong') }}">
                            <option @if($navigasi->dayaApungPenolong > 0) value="{{ $navigasi->dayaApungPenolong }}" selected @endif>
                                @php
                                    $result = $navigasi->dayaApungPenolong == 4 ? 'Sangat Baik' : ($navigasi->dayaApungPenolong == 3 ? 'Baik' : ($navigasi->dayaApungPenolong == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('alatPenolong')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="label" class="col col-form-label-sm">ALat Penolong Mencantumkan Nama Kapal</label>
                    <div class="col-md-7">
                        <select name="label" class="form-select form-select-sm @error('label') is-invalid @enderror" id="label" style="width: 150px;" aria-label="Default select example" value="{{ old('label') }}">
                            <option @if($navigasi->labelKapal > 0) value="{{ $navigasi->labelKapal }}" selected @endif>
                                @php
                                    $result = $navigasi->labelKapal == 4 ? 'Sangat Baik' : ($navigasi->labelKapal == 3 ? 'Baik' : ($navigasi->labelKapal == 2 ? 'Kurang' : 'Sangat Kurang'));
                                @endphp
                                {{ $result }}
                            </option>
                            <option value="4">Sangat Baik</option>
                            <option value="3">Baik</option>
                            <option value="2">Kurang</option>
                            <option value="1">Sangat Kurang</option>
                        </select>
                        @error('label')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-5">UBAH DATA</button>

        </form>

      </div>  
    </div>
</div>  
<script>
    // start Administrasi
    var laporan = document.getElementById("laporan");
    var uniqueValues = new Set();
    var optionsToRemove = [];
    // Loop melalui setiap opsi
    for (var i = 0; i < laporan.options.length; i++) {
        var value = laporan.options[i].value;
        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }
    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        laporan.remove(optionsToRemove[i]);
    }

    var awak = document.getElementById("awak");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < awak.options.length; i++) {
        var value = awak.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        awak.remove(optionsToRemove[i]);
    }

    var pernyataan = document.getElementById("pernyataan");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < pernyataan.options.length; i++) {
        var value = pernyataan.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        pernyataan.remove(optionsToRemove[i]);
    }

    var kesehatan = document.getElementById("kesehatan");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < kesehatan.options.length; i++) {
        var value = kesehatan.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        kesehatan.remove(optionsToRemove[i]);
    }

    var penumpang = document.getElementById("penumpang");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < penumpang.options.length; i++) {
        var value = penumpang.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        penumpang.remove(optionsToRemove[i]);
    }
    // end Administrasi

    // start mesin
    var mesinUtama = document.getElementById("mesinUtama");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < mesinUtama.options.length; i++) {
        var value = mesinUtama.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        mesinUtama.remove(optionsToRemove[i]);
    }

    var mesinBantu = document.getElementById("mesinBantu");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < mesinBantu.options.length; i++) {
        var value = mesinBantu.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        mesinBantu.remove(optionsToRemove[i]);
    }

    var listrik = document.getElementById("listrik");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < listrik.options.length; i++) {
        var value = listrik.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        listrik.remove(optionsToRemove[i]);
    }

    var bahanBakar = document.getElementById("bahanBakar");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < bahanBakar.options.length; i++) {
        var value = bahanBakar.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        bahanBakar.remove(optionsToRemove[i]);
    }
    // end Mesin

    // star Navigasi
    var navigasi = document.getElementById("navigasi");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < navigasi.options.length; i++) {
        var value = navigasi.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        navigasi.remove(optionsToRemove[i]);
    }

    var radio = document.getElementById("radio");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < radio.options.length; i++) {
        var value = radio.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        radio.remove(optionsToRemove[i]);
    }

    var komunikasi = document.getElementById("komunikasi");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < komunikasi.options.length; i++) {
        var value = komunikasi.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        komunikasi.remove(optionsToRemove[i]);
    }

    var alatPenolong = document.getElementById("alatPenolong");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < alatPenolong.options.length; i++) {
        var value = alatPenolong.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        alatPenolong.remove(optionsToRemove[i]);
    }

    var label = document.getElementById("label");
    var uniqueValues = new Set();
    var optionsToRemove = [];

    // Loop melalui setiap opsi
    for (var i = 0; i < label.options.length; i++) {
        var value = label.options[i].value;

        // Jika nilai sudah ada dalam uniqueValues, tandai opsi untuk dihapus
        if (uniqueValues.has(value)) {
            optionsToRemove.push(i);
        } else {
            uniqueValues.add(value);
        }
    }

    // Menghapus opsi-opsi yang sudah ditandai
    for (var i = optionsToRemove.length - 1; i >= 0; i--) {
        label.remove(optionsToRemove[i]);
    }
    // end Navigasi
</script>
@endsection