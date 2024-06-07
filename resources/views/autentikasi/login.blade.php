<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <title>Login Page</title>
  <style>
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #F0F8FF;
    }
    .validasi{
        font-size: 20px;
    }
    .tampilan{
        background-color: #ffff;
    }
  </style>
</head>
<body>
    <div class="container border border-dark p-5 tampilan">
        <h1 class="text-center">SISTEM KELAYAKAN PELAYARAN <br> KAPAL</h1>
        <h3 class="text-center mb-3">Welcome</h3>
            @error('ststus')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <form action="/prosesLogin" method="post">
                            @csrf
                            <div class="mb-3 mt-3">
                                <input type="text" name="username" class="form-control text-center border border-3 border-dark form-control-lg @error('username') is-invalid @enderror" id="email" placeholder="Username" value="{{ old('username') }}">
                                @error('username')
									<div class="invalid-feedback validasi">
										{{ $message }}
									</div>
								@enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control text-center border border-3 border-dark form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                @error('password')
									<div class="invalid-feedback validasi">
										{{ $message }}
									</div>
								@enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-50">Login</button>
                            </div><br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>