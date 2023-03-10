<?php get_header('', 'Hoá đơn của bạn') ?>
<main class="flex justify-center py-[50px] px-10">
    <div class="bg-white mb-[30px] p-5">
        <h2 class="my-[30px] text-[40px] font-bold text-center">Hóa Đơn</h2>
        <?php foreach ($notifications as $notification) : ?>
                <?php foreach ($notification['msgs'] as $msg) : ?>
                    <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class=" inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full border text-center">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Thời gian đặt hàng
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Tên người mua
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Số điện thoại
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Địa chỉ
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Tổng thành tiền
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Trạng thái
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bills as $b) : ?>
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">
                                            <?= $b['created_at'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">
                                            <?= $b['name_user'] ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                            <?= $b['phone'] ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                            <?= $b['address'] ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                            <?= currency_format($b['price_total'])   ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                            <?php if ($b['status'] == 3) : ?>
                                                <div class="bg-green-500 px-5 py-2 capitalize text-white">Giao hàng thành công</div>
                                            <?php elseif ($b['status'] == 2) : ?>
                                                <div class="bg-red-500 px-5 py-2 capitalize text-white">Giao hàng thất bại</div>
                                            <?php else : ?>
                                                <div class="bg-yellow-500 px-5 py-2 capitalize text-white">Hàng đang được giao</div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="?mod=bill&action=show&bill_id=<?= $b['id'] ?>">Xem chi tiết</a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer('') ?>