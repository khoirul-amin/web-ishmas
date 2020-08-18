<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <title>MTs Ishlahul Masalik</title>
    <link rel="icon" href="/assets/images/imageWeb/Logo.png" />
    <style>
        .sticky {
            position: fixed;
            top: 0;
            z-index: 1030;
            width:100%;
        }
    </style>
</head>
<header>
    <?php
        $halaman = "home";
        $active = "active1";
    ?>
    <div class="col-sm-12 pt-3 pb-3 bg-dark">
        <div class="container text-light"> 
            <div class="row ml-0 mr-0">
                <div class="col-sm-6 center-head">
                    <ul class="ul-top">
                        <li>
                            <a href="#"><i class="fas fa-phone"></i>085967176079</a>
                        </li>
                        <li>
                            <a href="#"><i class="far fa-envelope"></i>mtsishlahulmasalik@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 center-head" align="right">
                    <ul class="ul-top-right">
                        <li>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 p-0" style="background:#99ffbb">
        <div class="container">
            <div class="row ml-0 mr-0 align-items-center">
                <div class="pt-2 pb-2" align="center">
                    <img src="/assets/images/imageWeb/Logo.png" width="140px" height="140px" />
                </div>
                <div class="col-sm">
                    <h2>MTs Ishlahul Masalik</h2>
                    <div class="row ml-0 mr-0">
                        <div class="col pl-0"><h5>NPSN : 20582894</h5></div>
                        <!-- <div class="col">NPSN : </div> -->
                    </div>
                    <h5>Alamat : Jl.Proklamasi, No. 35, Ds. Tebluru, Kec. Solokuro, Kab. Lamongan, Prov. Jawa Timur, Kode Pos:62265</h5>
                </div>
            </div>
        </div>
    </div>
    <div id="navbar" class="col-sm-12 p-0 bg-dark">
        <div class="container">
            <!-- <a class="home-nav" href="#">Home</a> -->
            <div class="row ml-0 mr-0">
            <div class="navbar-custom w-100">
                <div class="nav-home">
                    <b>MENU</b>
                </div>
                <div class="navbar-toggle" onClick="myFunction1()">
                    <i class="fas fa-bars"></i>
                </div>
                <ul class="nav-bar responsive" id="custom-nav">
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "") echo $active; ?>" href="/Home">Home</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "berita") echo $active; ?>" href="/Home/berita">Berita</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "literasi") echo $active; ?>" href="/Home/literasi">Literasi</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "galeri") echo $active; ?>" href="/Home/galeri">Galeri</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "pengumuman") echo $active; ?>" href="/Home/pengumuman">Pengumuman</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "profil") echo $active; ?>" href="/Home/profil">Tentang Kami</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "sejarah") echo $active; ?>" href="/Home/sejarah">Sejarah Sekolah</a>
                    </li>
                    <li>
                        <a class="<?php if($this->uri->segment(2) == "guru") echo $active; ?>" href="/Home/guru">Guru</a>
                    </li>
                    <li>
                        <!-- <a class="<?php if($this->uri->segment(2) == "alumni") echo $active; ?>" href="/Home/alumni">Alumni</a> -->
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </div>
</header>