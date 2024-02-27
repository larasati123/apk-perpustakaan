<!DOCTYPE html>
<html>
<head>
  <title> Form Login Aplikasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card mt-5 mb-5">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <img src="assets/img/register.png" width="500">
                    </div>
                    <div class="col-sm-6">

                        <div class="card-body">
                            <h5> Silahkan Daftar Akun Anda Disini</h5>
                            <form method="post" action="proses_daftar.php">
                                <div class="form-group mt-2">
                                    <label>Username</label>
                                    <input type="text" name="Username" class="form-control">
                                </div>
                           
                                <div class="form-group mt-2">
                                    <label>Password </label>
                                    <input type="Password" name="Password" class="form-control">
                                </div>

                                <div class="form-group mt-2">
                                    <label>E-Mail</label>
                                    <input type="text" name="Email" class="form-control">
                                </div>

                                <div class="form-group mt-2">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="NamaLengkap" class="form-control">
                                </div>

                                <div class="form-group mt-2">
                                    <label>Alamat</label>
                                    <input type="text" name="Alamat" class="form-control">
                                </div>

                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Sudah Punya Akun Silahkan Klik :</label>
                                    <a href="index.php" class="btn btn-warning btn-sm">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
             
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist
    /umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/
    bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>