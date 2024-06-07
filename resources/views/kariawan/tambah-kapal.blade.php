@extends('layout.layouts')

@section('title', 'Tambah Data')
@section('content')

<div class="ms-3 mt-3">
    <h4 class="">Tambah Data Kapal</h4>
    <div class="border-0 scrol">
      <div class=" tbl-scrol">

        <form action="/prosesTambah" method="POST">
        @csrf
          <div class="mb-3 row">
            <label for="nama" class="col-md-2 col-form-label-sm">Nama Kapal</label>
            <div class="col-md-10">
              <input type="text" name="nama" class="form-control w-75 @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">
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
              <input type="text" name="pemilik" class="form-control w-75 @error('pemilik') is-invalid @enderror" id="pemilik" value="{{ old('pemilik') }}">
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
              <input type="number" name="gt" class="form-control w-50 @error('gt') is-invalid @enderror" id="gt" value="{{ old('gt') }}">
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
              <input type="number" name="tahun" class="form-control w-50 @error('tahun') is-invalid @enderror" id="tahun" value="{{ old('tahun') }}">
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
              <input type="text" name="tipe" class="form-control w-50 @error('tipe') is-invalid @enderror" id="tipe" value="{{ old('tipe') }}">
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
                            <option selected disabled>Pilih Status</option>
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
            <button type="submit" class="btn btn-primary btn-block mb-5">SIMPAN DATA</button>

        </form>

      </div>  
    </div>
</div>  

@endsection