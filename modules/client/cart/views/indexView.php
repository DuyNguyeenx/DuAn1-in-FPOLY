<?php get_header('', 'Giỏ hàng') ?>
<main>
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Giỏ hàng của tôi</h1>
                <h2 class="font-semibold text-2xl"><?= count($products) ?> Sản phẩm</h2>
            </div>
            <?php foreach ($notifications as $notification) : ?>
                <?php foreach ($notification['msgs'] as $msg) : ?>
                    <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Chi tiết sản phẩm</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">loại</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng thanh toán</h3>
            </div>
            <form action="" method="post">
                <?php $price_total = 0 ?>
                <?php foreach ($products as $key => $product) : ?>
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5">
                            <!-- product -->
                            <div class="w-20">
                                <img class="w-full object-cover" src="public/images/<?= $product['image'] ?>" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm"><?= $product['title'] ?></span>
                                <span class="text-red-500 text-xs"><?= $product['brand_name'] ?></span>
                                <a href="?mod=cart&action=delete&id=<?= $key ?>" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Xóa</a>
                            </div>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm"><?= $product['type_name'] ?></span>
                        <div class="flex justify-center w-1/5">
                            <input class="mx-2 border text-center w-10" name="quantity[<?= $key ?>]" type="number" min=1 value="<?= $product['quantity'] ?>">
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product['price']) ?></span>
                        <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product['total_price'])  ?></span>
                        <?php $price_total += $product['total_price'] ?>
                    </div>
                <?php endforeach ?>
                <div>
                    <button type="submit" class="mt-4 inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Cập nhật</button>
                    <a href="?mod=cart&action=delete" class="mt-4 inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Xóa hết tất cả</a>
                </div>
            </form>

            <a href="?" class="flex font-semibold text-indigo-600 text-sm mt-10">

                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Tiếp tục mua sắm
            </a>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Tổng</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase"><?= count($products) ?> sản phẩm</span>
            </div>

            <div class="border-t mt-8 ">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Tổng thanh toán</span>
                    <span><?= currency_format($price_total) ?></span>
                </div>
                <a href="?mod=pay" class="bg-green-500 font-semibold hover:bg-indigo-600  p-3 text-sm text-white uppercase w-full">Chuyển sang thanh toán</a>
            </div>
        </div>

    </div>
</main>
<?php get_footer('') ?>