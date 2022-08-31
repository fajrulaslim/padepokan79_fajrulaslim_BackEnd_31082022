<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tugas 03</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="m-b-30 m-t-0">Data Point Nasabah</h4>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="25%">Account Id</th>
                                            <th>Name</th>
                                            <th width="20%">Total Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($nasabah as $item): ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $item['accountId']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['totalPoint']; ?></td>
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