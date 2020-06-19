<?php
    $this->load->view('template/header');
?>


<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row ml-0 mr-0 mt-2">
            <div class="col-sm-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Literasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row ml-0 mr-0 mt-3">
            <div class="col-sm-8 p-0">
                <div class="header-box">Kegiatan Literasi Siswa/Siswi MTs Ishlahul Masalik</div>
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
                        <a href="/Home/viewLiterasi/<?=$informasi->id?>">(Baca Selengkapnya)</a></div>
                    </div>
                <?php   } ?>

                <br/>
            </div>
            <div class="col-sm-4 cp">
                <div class="header-box">Literasi Terbaru</div>
                <div class="box-right-content">
                <?php
                    $limit = 0;
                    foreach($list_informasi as $informasi){    
                ?>
                    <h4><?=$informasi->judul?></h4>
                    <p> <i class="fas fa-calendar"></i> <?=$informasi->created_at?><br/>
                        <a href="/Home/viewLiterasi/<?=$informasi->id?>">(Baca Selengkapnya)</a></p>
                <?php
                    $limit++;
                    if($limit == 9){
                        break;
                    }
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