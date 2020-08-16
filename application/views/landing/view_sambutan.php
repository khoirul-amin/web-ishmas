<?php
    $this->load->view('template/header');
?>
<main role="main" class="flex-shrink-0 bg-light">

<div class="container">
        <div class="row ml-0 pt-2 mr-0">
            <div class="col-sm-8 pl-0 right-row">
                <div class="box-right-content pt-4">
                    <h3 align="center">Sambutan Kepala Sekolah</h3>
                    <div align="center" class="mt-2 mb-2">
                        <img src="/assets/images/imageUpload/<?=$sambutan[0]->image?>" width="300px" />
                    </div>
                    <div><?=$sambutan[0]->isi?></div>
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
                        <a class="news-link" href="/Home/viewinformasi/<?=$informasi->id?>"><?=$informasi->judul?></a>
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