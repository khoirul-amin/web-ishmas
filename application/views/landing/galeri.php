<?php
    $this->load->view('template/header');
?>
<main role="main" class="flex-shrink-0 bg-light">
    <div class="row ml-0 mr-0 bg-secondary pt-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0 bg-secondary rounded-0">
                    <li class="breadcrumb-item text-warning">Home</li>
                    <li class="breadcrumb-item">Galeri</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row ml-0 mr-0 pt-3">
            <div class="col-sm-8 p-0">
                <!-- <div class="header-box">Galeri Kegiatan MTs Ishlahul Masalik</div> -->
                <div class="box-right-content pt-4">
                    <h4><u>Kegiatan Literasi Siswa</u></h4>
                    <div class="row align-items-center ml-0 mr-0 mb-4">
                    <?php
                        foreach($literasi as $literasi){
                    ?>
                        <div align="center" class="col-sm-6 box-galeri">
                            <img  class="custom-galeri" src="/assets/images/imageUpload/<?=$literasi->image?>" width="250px" />
                            <div class="custom-info">
                                <a href="/Home/viewLiterasi/<?=$literasi->id?>" class="link"><?=$literasi->judul?></a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <h4><u>Berita Seputar Sekolah</u></h4>
                    <div class="row align-items-center ml-0 mr-0 mb-4">
                    <?php
                        foreach($berita as $berita){
                    ?>
                        <div align="center" class="col-sm-6 box-galeri">
                            <img  class="custom-galeri" src="/assets/images/imageUpload/<?=$berita->image?>" width="250px" />
                            <div class="custom-info">
                                <a href="/Home/viewBerita/<?=$berita->id?>" class="link"><?=$berita->judul?></a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="row ml-0 mr-0 pt-4 justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="galeri/1">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                        </ul>
                    </nav>
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
</main>



<?php
    $this->load->view('template/footer');
?>