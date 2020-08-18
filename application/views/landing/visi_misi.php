<?php
    $this->load->view('template/header');
?>
<main role="main" class="flex-shrink-0 bg-light">
    <div class="row ml-0 mr-0 bg-secondary pt-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0 bg-secondary rounded-0">
                    <li class="breadcrumb-item text-warning">Home</li>
                    <li class="breadcrumb-item">Tentang MTs Ishlahul Masalik</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row ml-0 mr-0">
            <div class="col-sm-4 pl-0">
                <div class="header-box">
                    <p class="ab">Agenda</p>
                </div>
                <div class="custom-scroll">
                    <?php foreach($agenda as $agenda){ ?>
                        <a class="abc" href="/Home/agenda/<?=$agenda->id?>">
                        <div class="kalender">
                            <span><?=$agenda->judul?></span> - 
                            <span class="tanggal"><?php echo date('d F Y',strtotime($agenda->tanggal)); ?></span>
                        </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 pl-0">
                <div class="header-box">
                    <p class="ab">Kalender</p>
                </div>
                <div class="custom-scroll">
                    <?php foreach($kalender as $kalender){ ?>
                        <div class="kalender">
                            <span><?=$kalender->keterangan?></span> - 
                            <span class="tanggal"><?php echo date('d F Y',strtotime($kalender->tanggal)); ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 p-0">
                <div class="header-box">
                    <p class="ab">Visi & Misi</p>
                </div>
                <div class="custom-scroll">
                    <?=$visimisi->isi?>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    $this->load->view('template/footer');
?>