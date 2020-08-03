<?php
    $this->load->view('template/header');
?>


<main role="main" class="flex-shrink-0 bg-light">
    <div class="col-sm-12 p-0" style="border-top:3px solid green">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                    $jumlahData = 0;
                    foreach($banner1 as $banner1){
                ?>
                    <li data-target="#carouselExampleCaptions" data-slide-to="<?=$jumlahData?>" class="<?php
                        if($jumlahData == 0){
                            echo 'active';
                        }else{
                            echo '';
                        }
                    ?>"></li>
                <?php $jumlahData++; }?>
            </ol>
            <div class="carousel-inner">
                <?php 
                    $jumlahBanner = 0;
                    foreach($banner as $banner){
                ?>
                <div class="<?php
                        if($jumlahBanner == 0){
                            echo 'carousel-item active';
                        }else{
                            echo 'carousel-item';
                        }
                    ?>">
                    <img src="/assets/images/imageUpload/<?=$banner->images?>" class="d-block img-slide" alt="...">
                    <div class="caption-slide">
                        <div class="content-slide">
                            <h5><?=$banner->title?></h5>
                            <p><?=$banner->desk?></p>
                        </div>
                    </div>
                </div>
                <?php $jumlahBanner++; }?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="col-sm-12 p-0 mb-2 mt-5">
        <div class="container">
            <h3>MTS Ishlahul Masalik Tebluru</h3>
            <div class="row m-0">
                <div class="col-sm-6 p-0" align="center">
                    <img src="/assets/images/imageUpload/<?=$sambutan[0]->image?>" class="img-smbtn" />
                </div>
                <div class="col-sm-6 p-2">
                    <h4>Sambutan Kepala Sekolah</h4>
                    <p align="justify">
                        <?= substr($sambutan[0]->isi, 0,300) ?>....
                    </p>
                    <a href="/Home/sambutan" class="more-berita">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Informasi -->
    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">INFORMASI</h3>
        <div class="container">
            <?php 
                foreach($informasi as $informasi){
            ?>
            <div class="bingkai-info">
                <div class="row m-0">
                    <div class="col-sm-6 pt-3 pb-0 bg-informasi">
                        <img src="/assets/images/imageWeb/Logo.png" />
                    </div>
                    <div class="col-sm-6 p-2 bg-light"><br/>
                    <h5><?=$informasi->judul?></h5>
                        <ul class="ul">
                            <li class="li">
                                <i class="fas fa-user"></i>
                                <?=$informasi->nama_admin?>
                            </li>
                            <li class="li mid">
                                <i class="fas fa-calendar"></i>
                                <?=$informasi->created_at?>
                            </li>
                            <li class="li">
                                <i class="fas fa-tag"></i>
                                <?=$informasi->status?>
                            </li>
                        </ul>
                        <hr class="my-4">
                        <div>
                            <?=substr($informasi->isi, 0,300)?>....</br></br>
                            <a href="Home/viewInformasi/<?=$informasi->id?>"  class="more-berita">Baca Selengkapnya</a>
                            </br></br>
                        </div>
                    </div>
                </div>
            </div>
            <?php   } ?>
            <div align="center" class="mt-4 mb-4">
                <a class="button-more" href="#" >LIHAT SEMUA INFORMASI</a>
            </div>
        </div>
    </div>

    <!-- Guru -->
    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">TENAGA PENDIDIK</h3>
        <div class="container">
            <div class="section-body">
                <div id="slider-tools-1"></div>
                <div class="owl-carousel" id="tenaga-pendidik-slider">
                    <div class="custom-section-item">
                        <div class="custom-section-tendik">
                            <div class="image-card-guru">
                                <img src="https://drive.google.com/uc?id=1o-QsWAeIjFqtd9_b9NnpdUrVbnwEpTRA"/>
                            </div>
                            <div class="description-card-guru">
                                <p class="nama-guru">GURU 1, S.Pd.I</p>
                                <p class="ket-guru">GUrU BAHASA INGGRIS</p>
                            </div>
                        </div>
                    </div>
                    <div class="custom-section-item">
                        <div class="custom-section-tendik">
                            <div class="image-card-guru">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSbaNyFxt-kaa4jAmqM7BTkjVirln5Djr_CTg&usqp=CAU"/>
                            </div>
                            <div class="description-card-guru">
                                <p class="nama-guru">GURU 1, S.Pd.I</p>
                                <p class="ket-guru">GURU BAHASA INDONESIA</p>
                            </div>
                        </div>
                    </div>
                    <div class="custom-section-item">
                        <div class="custom-section-tendik">
                            <div class="image-card-guru">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSbaNyFxt-kaa4jAmqM7BTkjVirln5Djr_CTg&usqp=CAU"/>
                            </div>
                            <div class="description-card-guru">
                                <p class="nama-guru">GURU 1, S.Pd.I</p>
                                <p class="ket-guru">GURU MATEMATIKA</p>
                            </div>
                        </div>
                    </div>
                    <div class="custom-section-item">
                        <div class="custom-section-tendik">
                            <div class="image-card-guru">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSbaNyFxt-kaa4jAmqM7BTkjVirln5Djr_CTg&usqp=CAU"/>
                            </div>
                            <div class="description-card-guru">
                                <p class="nama-guru">GURU 1, S.Pd.I</p>
                                <p class="ket-guru">GURU BIMBINGAN KONSELING</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div align="center" class="mt-4 mb-4">
                <a class="button-more" href="#" >LIHAT SEMUA GURU</a>
            </div>
        </div>
    </div>

    <!-- Alumni -->
    <div class="col-sm-12 pb-4" style="background:#009688;">
        <div class="container">
            <h4 align="center" class="pt-5 pb-5">PROFIL ALUMNI</h4>
            <div class="section-body">
                <div id="slider-tools-2"></div>
                <div class="owl-carousel" id="alumni-slider">
                    <div class="custom-section-item">
                        <div class="custom-section-alumni">
                            <div class="row ml-0 mr-0 p-2">
                                <div class="col-sm-6 p-0 image-card-alumni">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRhAzUzjlh9WQnodVS8b7qtSwVh3UGn5RHYQQ&usqp=CAU"/>
                                </div>
                                <div class="description-card-alumni col-sm-6">
                                    <p class="name-alumni">Khoirul Amin</p>
                                    <p class="desk-alumni">WEB Programmer, BackEnd Developer, FrontEnd Developer, JavaScript Framework (ReactJs), PHP Framework (Laravel,Codeigniter 3).</p>
                                    </br> <a class="more-alumni" href="#" >Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-section-item">
                        <div class="custom-section-alumni">
                            <div class="row ml-0 mr-0 p-2">
                                <div class="col-sm-6 p-0 image-card-alumni">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRhAzUzjlh9WQnodVS8b7qtSwVh3UGn5RHYQQ&usqp=CAU"/>
                                </div>
                                <div class="description-card-alumni col-sm-6">
                                    <p class="name-alumni">Khoirul Amin</p>
                                    <p class="desk-alumni">WEB Programmer, BackEnd Developer, FrontEnd Developer, JavaScript Framework (ReactJs), PHP Framework (Laravel,Codeigniter 3).</p>
                                    </br> <a class="more-alumni" href="#" >Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri Kegiatan -->
    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">GALERI / DOKUMENTASI</h3>
        <div class="container">
            <div class="section-body">
                <div id="slider-tools-3"></div>
                <div class="owl-carousel" id="galeri-slider">
                    <?php
                        foreach($galeri as $galeri){
                    ?>
                    <div class="custom-section-item">
                        <div class="custom-section-tendik">
                            <div class="image-card-guru">
                                <img src="/assets/images/imageUpload/<?=$galeri->image?>"/>
                            </div>
                            <div class="description-card-guru">
                                <p class="nama-guru"><?=$galeri->judul?></p>
                                <p class="ket-guru">kegiatan Literasi siswa</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                        foreach($galeri1 as $galeri1){
                    ?>
                    <div class="custom-section-item">
                        <div class="custom-section-tendik">
                            <div class="image-card-guru">
                                <img src="/assets/images/imageUpload/<?=$galeri1->image?>"/>
                            </div>
                            <div class="description-card-guru">
                                <p class="nama-guru"><?=$galeri1->judul?></p>
                                <p class="ket-guru">berita seputar sekolah</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div align="center" class="mt-4 mb-4">
            <a class="button-more" href="/Home/galeri" >LIHAT SEMUA GALERI</a>
            </div>
        </div>
    </div>

    <!-- Berita -->
    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">BERITA & LITERASI</h3>
        <div class="container">
            <div class="row ml-0 mr-0">
                <?php
                    foreach($berita as $berita){
                ?>
                <div class="col-sm-4 mt-4">
                    <div class="image-card-berita">
                        <img src="/assets/images/imageUpload/<?=$berita->image?>"/>
                    </div>
                    <div class="description-card-berita">
                        <h5 class="judul-berita"><?=$berita->judul?></h5>
                        <p class="isi-berita"><?=substr($berita->isi, 0,200)?>...</p>
                        <span class="info-admin"><i class="fa fa-user mr-2"></i> <?=$berita->nama_admin?></span>
                        <span class="info-admin"> <?=$berita->ket?></span>
                    </div>
                </div>
                <?php }  ?>
            </div>

            <div align="center" class="mt-4 mb-4">
                <a class="button-more" href="#" >LIHAT SEMUA BERITA</a>
            </div>
        </div>
    </div>
</main>


<?php
    $this->load->view('template/footer');
?>