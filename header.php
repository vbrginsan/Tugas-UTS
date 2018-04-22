<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pencarian Dokumen Undang - Undang</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><a href="index.php">INFORMATION RETRIEVAL</a></h3>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="index.php" class="active"><i class="glyphicon glyphicon-home" aria-hidden="true"></i>&nbsp Beranda</a>
                        <a href="function/upload.php"><i class="glyphicon glyphicon-open" aria-hidden="true"></i>&nbsp Unggah</a>
                        <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-search" aria-hidden="true"></i>&nbsp Kueri Kata</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
                            <li><a href="function/stem.php">Kueri Kata Dasar</a></li>
                            <li><a href="function/query.php">Kueri Boolean </a></li>
                            <li><a href="function/awalquery.php">Kueri Tf</a></li>
                            <li><a href="function/similaritas.php">Hitung Similaritas</a></li>
                            <li><a href="function/hitungbobot.php">Hitung Bobot</a></li>
                            <li><a href="function/hitungvektor.php">Hitung Vector</a></li>
                        </ul>
                        <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>&nbsp Data Master</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu2">
                            <li><a href="function/tabel_up2.php">Data Dokumen</a></li>
                            <li><a href="function/tabel_up3.php">Data Kata Dasar</a></li>
                        </ul>
                        <a href="function/about.php"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>&nbsp Tentang</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button>
                        </div>  
                        <div class="navbar-header navbar-right">
                            <h2>Sistem Pencarian Dokumen Undang - Undang</h2>
                        </div>
                    </div>
                </nav>
                <div class="main-content">
                    
                