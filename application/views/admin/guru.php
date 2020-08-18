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
            <h1 class="m-0 text-dark">Data Sekolah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Admin/Home">Home</a></li>
              <li class="breadcrumb-item active">Data Guru</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                Data Guru
            </div>
            <div class="card-body">
                <div class="row ml-0 mr-0 mb-2">
                    <span class="btn btn-primary btn-sm" style="cursor:pointer;"
                    data-toggle="modal" onclick="addInformasi()" data-target="#modalForm"> Tambah</span>
                </div>
                <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Mapel</th>
                            <th>Poto</th>
                            <th>Profil</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
                <div align="center" class="mb-3" width="300px" height="100px" id="imageBerita"></div>
                <p><span>Mapel : </span><span id="mapelView"></span></p>
                <p id="isimodalView" align="justify">

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
            </div>
        </div>
    </div>
  <!-- Modal Input -->
    <div class="modal fade" id="modalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <form id="formInformasi" class="modal-content">
                <input type="hidden" name="id" id="id" />
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Form Informasi</h5>
                    <button type="button" onclick="clearForm('formInformasi')" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputJudul">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Sertakan Gelar Jika Ada" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image" required />
                        <span id="ketImage"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputIsi">Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control" id="mapel" placeholder="Mata Pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label for="inputIsi">Profil</label>
                        <textarea class="ckeditor" name="profil" id="ckedtor" required></textarea>
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
                    url: "<?php echo base_url("Admin/Guru/get_datatables");?>",
                    type: "POST",
                    cache: false,
                },
            });
        }
        function setModalInformasi(id){
            $.ajax({
                type: "GET",
                url: `/Admin/Guru/getByID/${id}`,
                cache: false,
                success: function(data){
                    const dataOk = JSON.parse(data)
                    const image = `<img src='/assets/images/imageUpload/${dataOk.poto}' width='300px' height='300px' />`

                    $('#imageBerita').html(image)
                    $('#modalViewLabel').html(dataOk.nama)
                    $('#mapelView').html(dataOk.mapel)
                    $('#isimodalView').html(dataOk.profil)
                }
            })
        }
        function updateInformasi(id){
            $.ajax({
                type: "GET",
                url: `/Admin/Guru/getByID/${id}`,
                cache: false,
                success: function(data){
                    const dataOk = JSON.parse(data)
                    $('#id').val(id)
                    $('#nama').val(dataOk.nama)
                    CKEDITOR.instances['ckedtor'].setData(dataOk.profil);
                    // $('#inputIsi').text(isi)
                    $('#mapel').val(dataOk.mapel)
                    $('#ketImage').text('image sudah ada, masukkan image jika mau merubah image')
                    $('#image').removeAttr('required')
                }
            })
        }
        function addInformasi(){
            $("image").prop('required',true);
        }
        $('#formInformasi').on('submit',function(e){
            e.preventDefault()
            for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances['ckedtor'].updateElement();
            }
            if($('#id').val() === ''){
                $.ajax({
                    url: "/Admin/Guru/insertData",
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
                    url: "/Admin/Guru/updateData",
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
            CKEDITOR.instances['ckedtor'].setData('');
            $('#ketImage').text('')
        }
  </script>
