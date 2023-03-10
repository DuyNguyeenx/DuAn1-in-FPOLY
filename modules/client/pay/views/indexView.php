<?php get_header('', 'Thanh Toán') ?>
<main>
    <div class="flex shadow-md my-10">
        <div class="w-full bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Thanh toán</h1>
                <h2 class="font-semibold text-2xl"><?= count($products) ?> Sản phẩm</h2>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Chi tiết sản phẩm</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng giá một sản phẩm</h3>
            </div>
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
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <div class="mx-2 text-center w-8"><?= $product['quantity'] ?></div>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product['price']) ?></span>
                    <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product['total_price']) ?></span>
                    <?php $price_total += $product['total_price'] ?>
                </div>
            <?php endforeach ?>
            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-3/5">
                    <div class="flex flex-col justify-between ml-4 flex-grow">
                        <span class="font-bold text-sm">Cái giá phải trả</span>
                    </div>
                </div>
                <div class="flex justify-center w-2/5">
                    <div class="mx-2 text-center w-8"><?= currency_format($price_total) ?></div>
                </div>
            </div>

        </div>



    </div>

    <div class="w-full h-auto block h-screen shadow p-4 flex items-center justify-center">
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
                Thông tin người nhân
            </div>
            <?php foreach ($notifications as $notification) : ?>
                <?php foreach ($notification['msgs'] as $msg) : ?>
                    <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <form action="" method="post" class="">
                <div>
                    <input type="text" name="name" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500" placeholder="Tên " />
                </div>
                <div>
                    <input type="number" name="phone" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8" placeholder="Điện thoại" />
                </div>

                <div>
                    <label class="">Địa chỉ</label>
                    <textarea name="address" class="focus:outline-none border w-full pb-2 border-sky-400 placeholder-gray-500 mb-8"></textarea>
                </div>
                <input type="hidden" name="price_total" value="<?= $price_total ?>">
                <div>
                    Tổng tiền cần trả: <?= currency_format($price_total)  ?>
                </div>
                <div class="flex justify-center my-6">
                    <button class=" rounded-full  p-3 w-full sm:w-56   bg-green-400 from-sky-600  to-teal-300 text-white text-lg font-semibold ">
                        Thanh toán
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php get_footer('') ?>