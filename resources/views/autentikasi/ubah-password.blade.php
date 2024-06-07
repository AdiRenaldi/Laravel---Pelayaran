@extends('layout.layouts')

@section('title', 'Ubah Password')
@section('content')

<div class="ms-3 mt-3">
    <h4 class="">Ubah Password</h4>
    <div class="border-0 scrol">
      <div class=" tbl-scrol">
        @if (Auth::user()->role_id == 2)
            <form action="/prosesUbahPasswordp" method="POST">
        @else
            <form action="/prosesUbahPassword" method="POST">
        @endif
        @csrf
          <div class="mb-3 row">
            <label for="passwordLama" class="col-md-2 col-form-label-sm">Password Lama</label>
            <div class="col-md-10">
              <input type="password" name="passwordLama" class="form-control w-50 @error('passwordLama') is-invalid @enderror" id="passwordLama">
                @error('passwordLama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if(session('error'))
                    <div style="color: red;">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passwordBaru" class="col-md-2 col-form-label-sm">Password Baru</label>
            <div class="col-md-10">
              <input type="password" name="passwordBaru" class="form-control w-50 @error('passwordBaru') is-invalid @enderror" id="passwordBaru">
                @error('passwordBaru')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="konfirmasiPassword" class="col-md-2 col-form-label-sm">konfirmasi Password</label>
            <div class="col-md-10">
              <input type="password" name="konfirmasiPassword" class="form-control w-50 @error('konfirmasiPassword') is-invalid @enderror" id="konfirmasiPassword">
                @error('konfirmasiPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if(session('errork'))
                    <div style="color: red;">
                        {{ session('errork') }}
                    </div>
                @endif
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-5">SIMPAN DATA</button>
        </form>
      </div>  
    </div>
</div>  

@endsection