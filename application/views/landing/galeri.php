<?php
    $this->load->view('template/header');
?>
<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row ml-0 mr-0 mt-2">
            <div class="col-sm-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Home</li>
                        <li class="breadcrumb-item active">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row ml-0 mr-0">
            <div class="col-sm-12 p-0">
                <div class="header-box">Galeri Kegiatan MTs Ishlahul Masalik</div>
                <div class="box-right-content pt-4">
                    <h4><u>Kegiatan Literasi Siswa</u></h4>
                    <div class="row align-items-center ml-0 mr-0 mb-4">
                    <?php
                        foreach($literasi as $literasi){
                    ?>
                        <div align="center" class="col-sm-4 box-galeri">
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
                        <div align="center" class="col-sm-4 box-galeri">
                            <img  class="custom-galeri" src="/assets/images/imageUpload/<?=$berita->image?>" width="250px" />
                            <div class="custom-info">
                                <a href="/Home/viewBerita/<?=$berita->id?>" class="link"><?=$berita->judul?></a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    $this->load->view('template/footer');
?>