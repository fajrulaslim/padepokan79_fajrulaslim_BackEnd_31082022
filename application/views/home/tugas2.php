<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tugas 02</h4>
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


            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0 title-form">Add Data Transaksi</h4>
                        <div id="data-form-transaksi">
                            <?= form_open('home/tugas2', "id='form-transaksi'") ?>
                                <input type="hidden" name="id" value="" id="id" >
                                <div class="form-group">
                                    <label for="accountId">Nasabah (Account Id)</label>
                                    <select class="form-control" name="accountId" id="accountId" required>
                                        <option value="" selected disabled>Choose nasabah</option>
                                        <?php foreach ($nasabah as $item): ?>
                                            <option value="<?= $item['accountId']; ?>"><?= $item['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transactionDate">Transaction Date</label>
                                    <input type="date" class="form-control" name="transactionDate" id="transactionDate" placeholder="Enter transaction date" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" required>
                                </div>
                                <div class="form-group">
                                    <label for="debitCreditStatus">Debit Credit</label>
                                    <select class="form-control" name="debitCreditStatus" id="debitCreditStatus" required>
                                        <option value="" selected disabled>Choose status</option>
                                        <option value="D">Debit (D)</option>
                                        <option value="C">Credit (C)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount (Rp)</label>
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" onkeypress="return onlyNumberKey(event)" required>
                                </div>
                               <div class="d-flex">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btnSubmit">Submit</button>
                                    <button type="reset" class="d-none ml-2 btn btn-info btnCancel" onclick="resetForm()">Cancel</button>
                               </div>
                            <?= form_close() ?>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0">Data Transaksi</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Nasabah</th>
                                            <th>Transaction Date</th>
                                            <th>Description</th>
                                            <th>Debit Credit</th>
                                            <th>Amount</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($transaksi as $item): ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $item['nasabah']; ?></td>
                                            <td><?= date('Y-m-d', strtotime($item['transactionDate'])); ?>  </td>
                                            <td><?= $item['description']; ?></td>
                                            <td><?= $item['debitCreditStatus']; ?></td>
                                            <td><?= number_format($item['amount']); ?></td>
                                            <td>
                                                <button class="border-0 badge badge-info badge-sm" onclick="editTransaksi(<?= $item['id']; ?>)">Edit</button>
                                                <a href="<?= base_url('home/deleteTransaksi/') . $item['id']; ?>" class="badge badge-primary badge-sm btn-delete">Delete</a>
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
    editTransaksi = (id) => {
      $.ajax({
        url: `<?= base_url('home/transaksiById'); ?>`,
        type: 'post',
        data: {
          id: id
        },
        success: function(data){
            const newdata = JSON.parse(data)
            const date = new Date(newdata.transactionDate);
            $('.title-form').html('Edit Data Transaksi')
            $('#form-transaksi').attr('action', `<?= base_url('home/editTransaksi') ?>`)
            $('.btnSubmit').html('Save')
            $('.btnCancel').removeClass('d-none')

            $('#id').val(newdata.id)
            $('#accountId').val(newdata.accountId)
            $('#transactionDate').val(date.toISOString().slice(0, 10))
            $('#description').val(newdata.description)
            $('#debitCreditStatus').val(newdata.debitCreditStatus)
            $('#amount').val(newdata.amount)
        }
      })
    }

    resetForm = () => {
        $('.title-form').html('Add Data Transaksi')
        $('#form-transaksi').attr('action', `<?= base_url('home/tugas2') ?>`)
        $('.btnSubmit').html('Submit')
        $('.btnCancel').addClass('d-none')
    }

    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>