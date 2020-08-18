<?php
    $this->load->view('template/header');
?>


<main role="main" class="flex-shrink-0 bg-light">
    <div class="row ml-0 mr-0 bg-secondary pt-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-secondary rounded-0">
                    <li class="breadcrumb-item text-warning">Home</li>
                    <li class="breadcrumb-item">Guru</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row ml-0 mr-0 pt-3">
            <div class="col-sm-8 p-0 right-row">
                <!-- <div class="header-box">Kegiatan Literasi Siswa/Siswi MTs Ishlahul Masalik</div> -->
                <div class="row ml-0 mr-0">
                    <?php 
                        foreach($guru as $guru){
                    ?>
                    <div class="col-sm-6 mt-4 p-sm-3 p-0">
                        <div class="image-card-berita" style="background:white;">
                            <a href="/Home/viewguru/<?=$guru->id?>">
                            <img src="/assets/images/imageUpload/<?=$guru->poto?>"/>
                            </a>
                        </div>
                        <div class="description-card-guru">
                            <p class="nama-guru"><?=$guru->nama?></p>
                            <p class="ket-guru">GUrU <?=$guru->mapel?></p>
                        </div>
                    </div>
                    <?php   } ?>
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