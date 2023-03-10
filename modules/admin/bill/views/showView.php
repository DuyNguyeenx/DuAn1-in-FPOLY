<?php get_header('', 'Hóa Đơn chi tiết') ?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Quản lý Hóa Đơn chi tiết</h5>
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
                    <h3 class="card-label">Danh sách Hóa Đơn chi tiết
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
                            <th title="Field #2">Tên sản phẩm</th>
                            <th title="Field #2">Hỉnh ảnh</th>
                            <th title="Field #2">Đơn giá</th>
                            <th title="Field #2">Số lượng</th>
                            <th title="Field #2">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($details as $detail) : ?>
                            <tr>
                                <td><?php echo ($detail['title']) ?></td>
                                <td><img src="public/images/<?php echo ($detail['images']) ?>" alt="" class="w-25"></td>
                                <td><?php echo ($detail['price']) ?></td>
                                <td><?php echo ($detail['quantity']) ?></td>
                                <td><?php echo ($detail['total']) ?></td>
                                <?php $total = $detail['price_total'] ?>
                            </tr>
                        <?php endforeach; ?>
                        <td>Tổng tiền tất cả sản phẩm : <?php echo $total ?></td>
                    </tbody>
                </table>
                <!--end: Datatable-->
                <div class="card-footer">
                    <a href="?role=admin&mod=bill" class="btn btn-secondary ">Quay về</a>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<?php get_footer() ?>