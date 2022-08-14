<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>

  <div class="fluid-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">FIREBASE LENI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="{{url('dashboard')}}">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('dosen')}}">Dosen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('mahasiswa')}}">Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('matakuliah')}}">Matakuliah</a>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center mt-5">
      <h2>HALAMAN DOSEN</h2>

    </div>
    <div class="card">
      <div class="card-header">
        <a href="{{url('dosen/tambah')}}" class="btn btn-primary btn-sm float-right">Tambah Dosen</a>
      </div>
      <div class="card-body">
        @if(session('status'))
        <h5 class="alert alert-danger">{{session('status')}}</h5>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Mengampu Matakuliah</th>
              <th>Jumlah Mahasiswa dibimbing</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($listDosen as $key => $x)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{ $x['nama'] }}</td>
              <td>{{ $x['matakuliah'] }}</td>
              <td>{{ $x['bimbingan'] }}</td>
              <td>
                <a href="{{ url('dosen/edit/'.$key) }}" class="btn btn-success btn-sm">Edit</a>
                <a href="{{ url('dosen/hapus/'.$key) }}" class="btn btn-danger btn-sm">hapus</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4">-</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>

</html>