

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <h2>Register</h2>
            <form action="{{ route ('aksi_register')}}" method="post">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                @if(Session::has ('register'))
                <div class="alert alert-primary">
                    {{ Session::get('register')}}
                </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama"  placeholder="masukan nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="varchar" name="email"  placeholder="masukan email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password"  placeholder="masukan password" class="form-control">
                <button type="submit" class="btn btn-primary mt-3 ">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>