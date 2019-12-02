<?php

include('../owl/httpful.phar');

$sparql = <<< END
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX java: <http://www.java.websemantik.com/>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX foaf: <http://xmlns.com/foaf/0.1/>

SELECT ?Bahasa ?DikembangkanBersama
WHERE{{<http://www.java.websemantik.com/Java> <http://www.java.websemantik.com/Nama> ?Bahasa} {?Individual  <http://www.java.websemantik.com/DikembangkanBersama> ?Pengembang . ?Pengembang  <http://www.java.websemantik.com/Nama>  ?DikembangkanBersama}}
END;

$url = 'http://localhost:3030/final-web-java/query?query=' . urlencode($sparql);
$res = \Httpful\Request::get($url)->expectsJson()->send();
$arr = json_decode($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Belajar Java | Pengembang Java</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/blog-post.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Belajar Java</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Beranda
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profilJava.php">Tentang Java</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Post Content -->
		<p class="lead">Pengembang Java</p><hr>
		
		<?php foreach ($arr->results->bindings as $data) {
			echo $data->DikembangkanBersama->value, '<br>'; } ?>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

      <!-- Categories Widget -->
      <div class="card my-4">
          <h5 class="card-header">Kategori</h5>
          <div class="card-body">
            <div class="row">
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="profilJava.php">Profil Java</a></li>
                <li>Dibalik Java</li>
                <ul>
                  <li><a href="penemuJava.php">Penemu Java</a></li>
                  <li><a href="pengembangJava.php">Pengembang Java</a></li>
                </ul>
                <li><a href="memilikiBasicSintaks.php">Basic Sintaks</a></li>
                <ul>
                  <li>Control</li>
                  <ul>
                    <li><a href="memilikiIfStatement.php">Seleksi Kondisi</a></li>
                    <li><a href="memilikiLoopStatement.php">Perulangan</a></li>
                  </ul>
                  <li><a href="memilikiTipeData.php">Tipe Data</a></li>
                  <li><a href="memilikiVariabel.php">Variabel</a></li>
                </ul>
                <li>Dokumentasi</li>
                <ul>
                  <li><a href="memilikiVersi.php">Versi</a></li>
                  <li><a href="memilikiEdisi.php">Edisi</a></li>
                </ul>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Tugas Web Semantik 2019 - Kelompok Java</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>