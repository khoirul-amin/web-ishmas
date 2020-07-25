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
                        <a href="/Home/sambutan">(Baca Selengkapnya)</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">INFORMASI</h3>
        <div class="container">
            <?php 
                foreach($informasi as $informasi){
            ?>
            <div class="bingkai-info">
                <div class="row m-0">
                    <div class="col-sm-6 p-0 bg-informasi"></div>
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
                                <?=substr($informasi->isi, 0,300)?>....
                                <a href="Home/viewInformasi/<?=$informasi->id?>">(Baca Selengkapnya)</a>
                                <br/><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php   } ?>
        </div>
    </div>

    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">TENAGA PENDIDIK</h3>
        <div class="container">
            <div id="slider-tools-1"></div>
            <div class="owl-carousel" id="tenaga-pendidik-slider">
                <div class="custom-section-item">
                    <h1>Test 1</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 2</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 3</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 4</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12" style="background:#009688;">
        <div class="container">
            <h4 align="center" class="pt-5 pb-5">PROFIL ALUMNI</h4>
            <div id="slider-tools-2"></div>
            <div class="owl-carousel" id="alumni-slider">
                <div class="custom-section-item">
                    <h1>Test 1</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 2</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 3</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 4</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 pb-1 pl-0 pt-0 pr-0 mb-2 mt-5">
        <h3 align="center">GALERI / DOKUMENTASI</h3>
        <div class="container">
            <div id="slider-tools-3"></div>
            <div class="owl-carousel" id="galeri-slider">
                <div class="custom-section-item">
                    <h1>Test 1</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 2</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 3</h1>
                </div>
                <div class="custom-section-item">
                    <h1>Test 4</h1>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
    $this->load->view('template/footer');
?>