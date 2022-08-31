<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tugas 01</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= form_error('home', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            </div>


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0 title-form">Add Data Nasabah</h4>

                        <?= form_open('home', "id='form-nasabah'") ?>
                            <input type="hidden" name="accountId" value="" id="accountId" >
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                            </div>
                           <div class="d-flex">
                                <button type="submit" class="btn btn-primary waves-effect waves-light btnSubmit">Submit</button>
                                <button type="reset" class="d-none ml-2 btn btn-info btnCancel" onclick="resetForm()">Cancel</button>
                           </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0">Data Nasabah</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="20%">Account Id</th>
                                            <th>Name</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($nasabah as $item): ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $item['accountId']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td>
                                                <button class="border-0 badge badge-info badge-sm" onclick="editNasabah(<?=$item['accountId']?>, `<?=$item['name']?>`)">Edit</button>
                                                <a href="<?= base_url('home/deleteNasabah/') . $item['accountId']; ?>" class="badge badge-primary badge-sm btn-delete">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i+=1; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- End Row -->

    </div>
</div>
<!-- end wrapper -->

<script>  
  editNasabah = (id, name) => {
    $('.title-form').html('Edit Data Nasabah')
    $('#accountId').val(id)
    $('#name').val(name)
    $('#form-nasabah').attr('action', `<?= base_url('home/editNasabah') ?>`)
    $('.btnSubmit').html('Save')
    $('.btnCancel').removeClass('d-none')
  }

  resetForm = () => {
    $('.title-form').html('Add Data Nasabah')
    $('#form-nasabah').attr('action', `<?= base_url('home') ?>`)
    $('.btnSubmit').html('Submit')
    $('.btnCancel').addClass('d-none')
  }
</script>