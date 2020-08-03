<?php
    $this->load->view('template/header');
?>
<main role="main" class="flex-shrink-0 bg-light">
    <div class="container">
        <!-- <div class="row ml-0 mr-0 mt-2">
            <div class="col-sm-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Home</li>
                        <li class="breadcrumb-item active"><?=$informasi->judul?></li>
                    </ol>
                </nav>
            </div>
        </div> -->
        <div class="row ml-0 mr-0">
            <div class="col-sm-8 p-0">
                <div class="box-right-content pt-4">
                    <h3 align="center"><?=$informasi->judul?></h3>
                    <div align="center" class="mt-2 mb-2">
                        <img src="/assets/images/imageUpload/<?=$informasi->image?>" width='400px' />
                    </div>
                    <ul class="ul mb-3">
                        <li class="li">
                            <i class="fas fa-user"></i>
                            Dipost Oleh : <?=$informasi->nama_admin?>
                        </li>
                        <li class="li mid">
                            <i class="fas fa-calendar"></i>
                            Tanggal : <?=$informasi->created_at?>
                        </li>
                        <li class="li">
                            <i class="fas fa-tag"></i>
                            Status : <?=$informasi->status?>
                        </li>
                    </ul>
                    <div><?=$informasi->isi?></div>
                </div>
            </div>
            <div class="col-sm-4 cp">
                <div class="header-box">
                    <p class="ab">Berita Terbaru</p>
                </div>
                <div class="news-list">
                <?php
                    foreach($list_informasi as $informasi){    
                ?>
                    <a class="news-link" href="/Home/viewBerita/<?=$informasi->id?>"><?=$informasi->judul?></a>
                    <p class="news-date"> 
                        <i class="fas fa-calendar mr-1"></i> <?php 
                            $date = strtotime($informasi->created_at);
                            echo date('d F Y',$date);
                        ?> 
                        <i class="fas fa-user ml-2 mr-1"></i> Admin
                    </p>
                <?php
                    }
                ?>

                </div>
                <div class="header-box">
                    <p class="ab">Informasi</p>
                </div>
                <div class="news-list">
                <?php
                    foreach($pengumuman as $informasi){    
                ?>
                <div class="row ml-0 mr-0">
                    <div class="col-3 p-0">
                        <i class="fas fa-volume-up fol-up"></i>
                    </div>
                    <div class="col-9 p-0">
                        <a class="news-link" href="/Home/viewBerita/<?=$informasi->id?>"><?=$informasi->judul?></a>
                        <p class="news-date"> 
                            <i class="fas fa-calendar mr-1"></i> <?php 
                                $date = strtotime($informasi->created_at);
                                echo date('d F Y',$date);
                            ?> 
                            <i class="fas fa-user ml-2 mr-1"></i> Admin
                        </p>
                    </div>
                </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row ml-0 mr-0 pt-3 pb-3">
        <div class="container">
        <h3 align="center">GALERI / DOKUMENTASI</h3>
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
</main>



<?php
    $this->load->view('template/footer');
?>