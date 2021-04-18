<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>

  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/dropzone/min/dropzone.min.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Gallery</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('gallery.index'); ?>">Gallery</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Tambah Gallery</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('gallery.store'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambar" id="attachGambar">
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('judul'); ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="judul Kategori">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('judul'); ?></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10 col-lg-10 col-md-10" >
                          <div id="actions" class="row">
                            <div class="col-lg-6">
                              <div class="btn-group w-100">
                                <span class="btn btn-success col fileinput-button">
                                  <i class="fas fa-plus"></i>
                                  <span>Pilih Gambar</span>
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                              <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="table table-striped files" id="previews">
                            <div id="template" class="row mt-2">
                              <div class="col-auto">
                                  <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                              </div>
                              <div class="col d-flex align-items-center">
                                  <p class="mb-0">
                                    <span class="lead" data-dz-name></span>
                                    (<span data-dz-size></span>)
                                  </p>
                                  <strong class="error text-danger" data-dz-errormessage></strong>
                              </div>
                              <div class="col-4 d-flex align-items-center">
                                  <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                  </div>
                              </div>
                              <div class="col-auto d-flex align-items-center">
                                <div class="btn-group">
                                  <button data-dz-remove class="btn btn-danger delete">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="deskripsi" class="col-sm-2 col-form-label">&nbsp;</label>
                      <div class="col-sm-12 col-lg-10 col-md-10">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="terbit" name="status" value="0" checked>
                          <label for="terbit" class="custom-control-label">Terbitkan</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="draf"  name="status" value="1">
                          <label for="draf" class="custom-control-label">Draf</label>
                      </div>     
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('gallery.index'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<!-- dropzonejs -->
<script src="<?= base_url('admin_assets/plugins/dropzone/min/dropzone.min.js'); ?>"></script>
<script>

  const inputGambar = $("#attachGambar")
  var arrayPhoto = [];
  var arrayData = [];
  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "<?= route_to('gallery.upload'); ?>", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: true, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    // file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })
  myDropzone.on("removedfile", function(file) {
    // Hookup the start button
    // file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    let removedFile = arrayPhoto.find((item)=> item.uid === file.upload.uuid)
    // console.log(file);
    $.ajax({
        data: {src : removedFile.nama},
        type: "POST",
        url: "<?= route_to('gallery.delete'); ?>",
        cache: false,
        success: function(response) {
            // console.log(response);
        }
    });
    arrayPhoto = arrayPhoto.filter((item)=> item.uid !== file.upload.uuid)
    arrayData = arrayPhoto.map((item)=>item.nama)
    inputGambar.val(JSON.stringify( arrayData ))
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    // file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })
  myDropzone.on("success", function(file,res) {
    arrayPhoto.push({
      nama:res.gambar,
      uid:file.upload.uuid
    })
    arrayData = arrayPhoto.map((item)=>item.nama)
    inputGambar.val(JSON.stringify( arrayData ))
    console.log(arrayData);
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // DropzoneJS Demo Code End
</script>
<?= $this->endSection(); ?>
  
