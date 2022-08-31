<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tugas 04</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0 title-form">Filter Report</h4>
                        <div id="data-form-transaksi">
                            <?= form_open('home/tugas4', "id='form-transaksi'") ?>
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
                                    <label for="startDate">Start Date</label>
                                    <input type="date" class="form-control" name="startDate" id="startDate" placeholder="Enter start date">
                                </div>
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <input type="date" class="form-control" name="endDate" id="endDate" placeholder="Enter end date">
                                </div>
                               <div class="d-flex">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btnSubmit">Submit</button>
                               </div>
                            <?= form_close() ?>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0">Data Report Buku Tabungan</h4>
                        <div class="form-group row mb-0">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nasabah</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="staticEmail" value="<?= $name; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="staticEmail" value="<?= $startDate; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">End Date</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="staticEmail" value="<?= $endDate; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Transaction Date</th>
                                            <th>Description</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($transaksi as $item): ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= date('Y-m-d', strtotime($item['transactionDate'])); ?>  </td>
                                            <td><?= $item['description']; ?></td>
                                            <td>
                                                <?php if($item['debitCreditStatus'] == 'C'): ?>
                                                    <?= number_format($item['amount']); ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item['debitCreditStatus'] == 'D'): ?>
                                                    <?= number_format($item['amount']); ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td><?= number_format($item['amount']); ?></td>
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