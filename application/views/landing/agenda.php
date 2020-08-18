<?php
    $this->load->view('template/header');
?>
<main role="main" class="flex-shrink-0 bg-light">
    <div class="row ml-0 mr-0 bg-secondary pt-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0 bg-secondary rounded-0">
                    <li class="breadcrumb-item text-warning">Home</li>
                    <li class="breadcrumb-item text-warning">View</li>
                    <li class="breadcrumb-item"><?=$agenda->judul?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row ml-0 pt-2 mr-0">
            <div class="col-sm-8 pl-0 right-row">
                <div class="box-right-content pt-4">
                    <div class="judul-agenda mb-3">
                        <h3 class="mb-1"><?=$agenda->judul?></h3>
                        <p style="font-size:10pt;font-weight: 300;" class="p-0 news-date">
                            <i class="fas fa-user mr-1"></i> Di Tulis Oleh : Admin
                        </p>
                    </div>
                    <div class="waktu-agenda pb-2 mb-3">
                        <p class="mb-1"><i class="fas fa-calendar mr-1"></i> Tanggal Pelaksanaan : <?=date('d F Y',strtotime($agenda->tanggal))?> </p>
                        <p class="mb-1"><i class="fas fa-clock mr-1"></i> Waktu Pelaksanaan : <?=$agenda->waktu?></p>
                        <p class="mb-1"><i class="fas fa-building mr-1"></i> Tempat Pelaksanaan : <?=$agenda->tempat?></p>
                    </div>
                    <div class="ket-agenda pb-2 mb-3">
                        <p class="ket mb-1"><i class="fas fa-file mr-1"></i> Keterangan : </p>
                        <p><?=$agenda->keterangan?></p>
                    </div>

                    <!-- Sharer -->
                    <div class="sharer">
                        <div style="float:left;padding-top:7px">Share :</div>
                        <a href="https://facebook.com/sharer/sharer.php?u=mtsishlahulmasalik.sch.id<?=$_SERVER['REQUEST_URI']?>" class="link-share"> <div class="icon-share"><i class="fab fa-facebook-f"></i></div> </a> 
                        <a href="https://twitter.com/intent/tweet?url=mtsishlahulmasalik.sch.id<?=$_SERVER['REQUEST_URI']?>" class="link-share"><div class="icon-share"><i class="fab fa-twitter"></i></div></a>
                    </div>
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