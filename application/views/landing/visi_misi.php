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
                        <li class="breadcrumb-item active">Tentang MTs Ishlahul Masalik</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row ml-0 mr-0">
            <div class="col-sm-8 p-0">
                <div class="header-box">Tentang MTs Ishlahul Masalik</div>
                <div class="box-right-content pt-4" align="center">
                    <img src="/assets/images/imageUpload/<?=$tentang->image?>" width="200"/>
                    <h3 align="center" class="mt-3 mb-3"><?=$tentang->judul?></h3>
                    <?=$tentang->isi?>
                </div>
            </div>
            <div class="col-sm-4 cp">
                <div class="header-box">Visi & Misi</div>
                <div class="box-right-content">
                    <?=$visimisi->isi?>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    $this->load->view('template/footer');
?>