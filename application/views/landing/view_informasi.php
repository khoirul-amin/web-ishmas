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
                        <li class="breadcrumb-item active"><?=$informasi->judul?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row ml-0 mr-0">
            <div class="col-sm-8 p-0">
                <div class="box-right-content pt-4">
                    <h3 align="center"><?=$informasi->judul?></h3>
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
                <div class="header-box">Sambutan Kepala Sekolah</div>
                <div class="box-right-content">
                    <p align="justify">
                        <?= substr($sambutan[0]->isi, 0,300) ?>....
                        <a href="/Home/sambutan">(Baca Selengkapnya)</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    $this->load->view('template/footer');
?>