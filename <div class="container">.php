<div class="container">
        <div class="row ml-0 mr-0 mt-2">
            <div class="col-sm-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row ml-0 mr-0">
            <div class="col-sm-8 p-0">
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
                            <img src="/assets/images/imageUpload/<?=$banner->images?>" class="d-block w-100" height="350px" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?=$banner->title?></h5>
                                <p><?=$banner->desk?></p>
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
            <div class="col-sm-4 cp">
                <div class="header-box">Sambutan Kepala Sekolah</div>
                <div class="box-right-content">
                    <p align="justify">
                        <?= substr($sambutan[0]->isi, 0,300) ?>....
                        <a href="/Home/sambutan">(Baca Selengkapnya)</a>
                    </p>
                </div>
            </div>
        </div> 
        <div class="row ml-0 mr-0 mt-3">
            <div class="col-sm-8 p-0">
                <div class="header-box">Informasi</div>
                <?php 
                    foreach($informasi as $informasi){
                ?>
                    <div class="box-right-content">
                        <h3><?=$informasi->judul?></h3>
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
                        <div><?=substr($informasi->isi, 0,300)?>....
                        <a href="Home/viewInformasi/<?=$informasi->id?>">(Baca Selengkapnya)</a></div>
                    </div>
                <?php   } ?>

                <br/>
            </div>
            <div class="col-sm-4 cp">
                <div class="header-box">Foto galeri</div>
                <div class="box-right-content">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                                $active_item = 0;
                                foreach($galeri as $galeri){
                            ?>
                            <div style="height:300px;" align="center" class="<?php if($active_item == 0){
                                echo 'carousel-item active';
                            }else{
                                echo 'carousel-item';
                            }?>">
                                <img src="/assets/images/imageUpload/<?=$galeri->image?>" width="300px">
                            </div>
                            <?php $active_item++; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>