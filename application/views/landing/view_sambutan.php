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
                        <li class="breadcrumb-item active">Sambuatn Kepala Sekolah</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row ml-0 mr-0">
            <div class="col-sm-12 p-0">
                <div class="header-box">Sambutan Kepala Sekolah</div>
                <div class="box-right-content pt-4">
                    <div align="center" class="mt-3 mb-3">
                        <img src="/assets/images/imageUpload/<?=$sambutan[0]->image?>" width="300px" />
                    </div>
                    <div><?=$sambutan[0]->isi?></div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    $this->load->view('template/footer');
?>