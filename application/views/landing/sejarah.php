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
                        <li class="breadcrumb-item active">Sejarah MTs Ishlahul Masalik</li>
                    </ol>
                </nav>
            </div>
        </div> -->
        <div class="row ml-0 mr-0">
            <div class="col-sm-8 p-0">
                <!-- <div class="header-box">Sejarah MTs Ishlahul Masalik</div> -->
                <div class="view-content pt-4" align="center">
                    <img src="/assets/images/imageUpload/<?=$sejarah->image?>" width="200"/>
                    <p class="judul-view"><?=$sejarah->judul?></p>
                    <?=$sejarah->isi?>
                </div>
            </div>
            <div class="col-sm-4 cp">
                <div class="header-box">
                    <p class="ab">Visi & Misi</p>
                </div>
                <div class="news-list">
                    <?=$visimisi->isi?>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    $this->load->view('template/footer');
?>