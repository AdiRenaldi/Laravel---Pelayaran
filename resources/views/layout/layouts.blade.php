<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Masukkan link CSS untuk Bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    /* Tambahkan gaya kustom untuk mengisi tinggi layar */
    .vh-100 {
      height: 100vh;
      overflow: hidden;
    }
    .judul{
      background-color: #f5f5f5;
      padding-left: 20px;
      padding-top: 5px;
      margin-top: 10px;
      margin-left: 5px;
      width: 85%;
      max-height: 10%;
      overflow-wrap: break-word;
      word-wrap: break-word;
    }
    .sub-judul{
      margin-left: 5px;
      margin-top: 5px;
    }
    .box {
      background-color: #f5f5f5;
      padding: 20px;
      margin-top: 50px;
      margin-left: 50px;
      width: 85%;
      height: 80%;
      overflow: auto;
    }
    .links{
      margin-top: 50px;
    }
    #active {
      font-weight: bold;
      color: #fbfbfb;
      color: #fff;
    border-color: #eceef0;
    }
    .fokus{
      margin-top: 80px;
      margin-left: 10px;
    }
    .user{
      margin-top: 60px;
      margin-left: 25px;
      font-size: 10px;
    }
    .user p a{
      text-decoration: none;
      color: black;
    }
    .fokus a:hover {
        font-weight: bold;
        color: #f5f5f5;
    }
    .user a:hover {
        font-weight: bold;
        color: #f5f5f5;
    }
    .scrol{
      overflow: auto;
      height: 87vh;
      margin-top: 30px;
    }
    .scrol .tbl-scrol{
      padding-right: 200px;
    }
    .ambang{
      margin: 10px;
      display: inline;
    }
    .ambang2{
      display: inline-block;
    }
    .ukuran{
      width: 100%;
      height: 40px;
      margin-left: 1px;
    }
    .tampilan-kiri{
      background-color: #ff9012;
    }
    .tampilan-kanan{
      background-color: #e3f2ff
    }
    @media (max-width: 575.98px) {
      /* Atur CSS untuk layar dengan lebar maksimal 575.98px (layar small) */
      .card-body {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid vh-100 ">
    <div class="row vh-100">
      <!-- Bagian Kiri -->
      <div class="col-3 col-md-2 position-relative tampilan-kiri">
        <div class="judul position-absolute">
            <h4 class="sub-judul">PELAYARAN</h4>
        </div>
        <div class="d-flex align-items-start me-2 flex-column links fokus">
          @if (Auth::user()->role_id == 1)
            <a href="/dashboard-admin" class="btn mb-2" @if (request()->route()->uri == 'dashboard-admin')? id='active' @endif>Beranda</a>
            <a href="/halaman-user" class="btn mb-2" @if (request()->route()->uri == 'halaman-user' || request()->route()->uri == 'edit-pimpinan/{id}' || request()->route()->uri == 'tambah-pimpinan' || request()->route()->uri == 'halaman-user' || request()->route()->uri == 'edit-pimpinan/{id}' || request()->route()->uri == 'edit-kariawan/{id}')? id='active' @endif>Halaman User</a>
          @endif

          @if (Auth::user()->role_id == 2)
            <a href="/dashboard-pimpinan" class="btn mb-2" @if (request()->route()->uri == 'dashboard-pimpinan')? id='active' @endif>Beranda</a>
            <a href="/testing-pimpinan" class="btn mb-2" @if (request()->route()->uri == 'testing-pimpinan')? id='active' @endif>Testing</a>
          @endif

          @if (Auth::user()->role_id == 3)
            <a href="/dashboard-kariawan" class="btn mb-2" @if (request()->route()->uri == 'dashboard-kariawan')? id='active' @endif>Beranda</a>
            <a href="/list-kapal" class="btn mb-2" @if (request()->route()->uri == 'list-kapal' || request()->route()->uri == 'tambah-kapal' || request()->route()->uri == 'edit-kapal/{slug}')? id='active' @endif>List Kapal</a>
            <a href="/peringkat" class="btn mb-2" @if (request()->route()->uri == 'peringkat')? id='active' @endif>Peringkat</a>
            <a href="/testing" class="btn mb-2" @if (request()->route()->uri == 'testing')? id='active' @endif>Testing</a>
          @endif
        </div>
        <div class="d-flex align-items-start me-2 flex-column links user">
          <p class="mb-0 fs-5" style="color: #F0F8FF"><b>User : {{ Auth::user()->nama }}</b></p>
          @if (Auth::user()->role_id == 2)
            <p><a href="/ubah-passwordp">Ubah Password</a> | <a href="/logout">Logout</a></p>
          @endif
          @if (Auth::user()->role_id == 3)
            <p><a href="/ubah-password">Ubah Password</a> | <a href="/logout">Logout</a></p>
          @endif
          @if (Auth::user()->role_id == 1)
            <p><a href="/logout">Logout</a></p>
          @endif
        </div>
      </div>

      <!-- Bagian Kanan -->
      <div class="col-9 col-md-10 tampilan-kanan">
        {{-- startKonten --}}
          @yield('content')
        {{-- endKonten --}}
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
