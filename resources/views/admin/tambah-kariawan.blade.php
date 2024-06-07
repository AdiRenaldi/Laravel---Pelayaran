@extends('layout.layouts')

@section('title', 'Tambah-kariawan')
@section('content')

<div class="ms-3 mt-3">
    <h4 class="">Tambah User Kariawan</h4>
    <div class="border-0 scrol">
      <div class=" tbl-scrol">

        <form action="/prosesTambahKariawan" method="POST">
        @csrf
          <div class="mb-3 row">
            <label for="nama" class="col-md-2 col-form-label-sm">Nama</label>
            <div class="col-md-10">
              <input type="text" name="nama" class="form-control w-50 @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="username" class="col-md-2 col-form-label-sm">Username</label>
            <div class="col-md-10">
              <input type="text" name="username" class="form-control w-50 @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-md-2 col-form-label-sm">Password</label>
            <div class="col-md-10">
              <input type="password" name="password" class="form-control w-50 @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-5">SIMPAN DATA</button>
        </form>
      </div>  
    </div>
</div>  

@endsection