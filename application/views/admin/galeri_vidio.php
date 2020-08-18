<?php
    $this->load->view('admin/template/header');
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Galeri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Admin/Home">Home</a></li>
              <li class="breadcrumb-item active">Galeri</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                Galeri Vidio
            </div>
            <div class="card-body">
                <div class="row ml-0 mr-0 mb-2">
                    <span class="btn btn-primary btn-sm" style="cursor:pointer;"
                    data-toggle="modal" data-target="#modalForm"> Galeri Baru</span>
                </div>
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kegiatan</th>
                            <th>Vidio</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- Modal -->
    <div class="modal fade" id="modalView" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalViewLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div align="center">
                    <iframe width="560" height="315" id="viewVidio" src="" frameborder="0"  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                    <!-- <iframe width="420" height="315"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1">
                    </iframe> -->
                </div>
            </div>
            </div>
        </div>
    </div>
  <!-- Modal Input -->
    <div class="modal fade" id="modalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <form id="formInformasi" enctype="multipart/form-data" class="modal-content">
                <input type="hidden" name="id" id="id" />
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Form Informasi</h5>
                    <button type="button" onclick="clearForm('formInformasi')" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputJudul">Judul</label>
                        <input type="text" name="kegiatan" class="form-control" id="kegiatan" placeholder="..." required>
                    </div>
                    <div class="form-group">
                        <label for="inputJudul">Vidio</label>
                        <input type="text" name="vidio" class="form-control" id="vidio" placeholder="..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="clearForm('formInformasi')" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

<?php
    $this->load->view('admin/template/footer');
?>
  <script>
        getData()
        function getData(){
            $('#example1').DataTable({
                lengthMenu: [[10, 50, 200, 1000], [10, 50, 200, 1000]],
                ajax:{
                    url: "<?php echo base_url("Admin/Galerividio/get_datatables");?>",
                    type: "POST",
                    cache: false,
                },
            });
        }
        function setModalInformasi(vidio){
            $('#viewVidio').attr('src', vidio)
        }
        function updateInformasi(id){
            $.ajax({
                type: "GET",
                url: `/Admin/Galerividio/getByID/${id}`,
                cache: false,
                success: function(data){
                    const dataOk = JSON.parse(data)
                    $('#id').val(dataOk.id)
                    $('#kegiatan').val(dataOk.kegiatan)
                    $('#vidio').val(dataOk.vidio)
                }
            })
        }
        $('#formInformasi').on('submit',function(e){
            e.preventDefault()
            if($('#id').val() === ''){
                $.ajax({
                    url: "/Admin/Galerividio/insertData",
                    method: 'POST',
                    type: 'POST',
                    dataType: 'json',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (response, textStatus, jqXHR){
                    clearForm('formInformasi')
                    $('#example1').DataTable().ajax.reload();
                    $('#modalForm').modal('hide')
                    toastr.success(response.respMessage)
                }).fail(function (jqXHR, textStatus, errorThrown){
                    toastr.error(errorThrown)
                })
            }else{
                $.ajax({
                    url: "/Admin/Galerividio/updateData",
                    method: 'POST',
                    type: 'POST',
                    dataType: 'json',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (response, textStatus, jqXHR){
                    clearForm('formInformasi')
                    $('#example1').DataTable().ajax.reload();
                    $('#modalForm').modal('hide')
                    toastr.success(response.respMessage)
                }).fail(function (jqXHR, textStatus, errorThrown){
                    toastr.error(errorThrown)
                })
            }
            
        });
        function clearForm(data){
            $('#id').val('')
            document.getElementById(data).reset();
        }
  </script>
