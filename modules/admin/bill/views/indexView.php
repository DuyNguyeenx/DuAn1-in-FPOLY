<?php get_header('', 'Hóa Đơn sản phẩm') ?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Quản lý Hóa Đơn sản phẩm</h5>
            <!--end::Page Title-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Danh sách Hóa Đơn sản phẩm
                        <span class="d-block text-muted pt-2 font-size-sm">Danh sách các Hóa Đơn có trên hệ thống</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                    <thead>
                        <tr>
                            <th title="Field #1">ID Hóa Đơn</th>
                            <th title="Field #2">Tổng Tiền</th>
                            <th title="Field #2">Tên người nhận</th>
                            <th title="Field #2">Điện thoại</th>
                            <th title="Field #2">Địa chỉ</th>
                            <th title="Field #2">Tên người đặt</th>
                            <th title="Field #2">trạng thái</th>
                            <th title="Field #5">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bills as $bill) : ?>
                            <tr>
                                <td><?php echo ($bill['id']) ?></td>
                                <td><?php echo ($bill['price_total']) ?></td>
                                <td><?php echo ($bill['name_user']) ?></td>
                                <td><?php echo ($bill['phone']) ?></td>
                                <td><?php echo ($bill['address']) ?></td>
                                <td><?php echo ($bill['full_name']) ?></td>
                                <td>
                                    <form action="?role=admin&mod=bill&id=<?= $bill['id'] ?>" method="post">
                                        <div class="input-group">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            <select name="status" class="form-select" id="inputGroupSelect01">
                                                <option <?= $bill['status'] == 1 ? "selected" : "" ?> value="1">đang giao hàng</option>
                                                <option <?= $bill['status'] == 2 ? "selected" : "" ?> value="2">giao hàng thất bại</option>
                                                <option <?= $bill['status'] == 3 ? "selected" : "" ?> value="3">giao hàng thành công</option>
                                            </select>
                                        </div>
                                        <button class="mt-3 btn btn-success">Lưu trạng thái</button>
                                    </form>
                                </td>
                                <td><a href="?role=admin&mod=bill&action=show&id_bill=<?php echo $bill['id'] ?>">Xem chi tiết</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<?php get_footer() ?>