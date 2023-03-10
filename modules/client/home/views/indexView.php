<?php get_header('', 'Trang chủ') ?>
<main class="px-10">
    <?php foreach ($notifications as $notification) : ?>
        <?php foreach ($notification['msgs'] as $msg) : ?>
            <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <section class="mb-[33px] slider">

    </section>
    <section class="bg-[#F9F9F9] text-[15px] flex justify-center space-x-[75px] mb-[21px]">
        <?php foreach ($brands as $br) : ?>
            <a href="?mod=product&brand_id=<?= $br['id'] ?>" class="mt-[10px] mb-[19px] text-center">
                <img src="public/images/<?= $br['image'] ?>" class="w-[100px] h-[100px] object-contain" alt="">
                <p class="text-center mt-[26px]"><?= $br['name'] ?></p>
            </a>
        <?php endforeach; ?>
    </section>
    <section class="pb-[40px]">
        <div  class="border-b-gray-400 border-b-[3px]  border-solid "></div>
        <div class="border-b-gray-400 border-b-[3px]  border-solid  ">
            <ul class="text-[20px] flex justify-center space-x-[50px] pt-[20px] pb-[20px]">
                <?php foreach ($categories as $category) : ?>
                    <li><a href="?mod=product&cate_id=<?= $category['id'] ?>" class="hover:text-red-600"><?= $category['name'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="bg-[#F9F9F9] pb-[31px] mb-[31px]">
        <h3 class="font-['Yeseva One'] text-[30px] py-[27px]">Sản phẩm</h3>
        <div class="grid grid-cols-5 gap-4">
            <?php foreach ($result as $product) : ?>

                <a href="?mod=detail&id=<?= $product['id'] ?>" class="p-2.5  text-xs sm:text-sm bg-white shadow-lg">
                    <img class="w-full transition-transform  hover:-translate-y-2 max-h-36 object-cover min-h-[100px]" src="public/images/<?= $product['images'] ?>" alt="">
                    <h3 class="mt-2.5 text-xl">
                        <?= $product['title'] ?>
                    </h3>
                    <div>
                    </div>
                    <div class="mt-2.5">
                        <div>Giá <?= currency_format($product['price']) ?></div>
                    </div>

                </a>
            <?php endforeach ?>

        </div>
        <div class="pagination pt-[40px] text-green-700 text-[20px] ">
            <?php if ($current_page > 1 && $total_page > 1) : ?>
                <a href="index.php?page=' . (<?= $current_page - 1 ?> ) . '">Prev</a> |
            <?php endif ?>
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '<span>' . $i . '</span> | ';
                } else {
                    echo '<a href="index.php?page=' . $i . '">' . $i . '</a> | ';
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a href="index.php?page=' . ($current_page + 1) . '">Next</a> | ';
            }
            ?>
        </div>


    </section>
</main>
<script type='text/javascript'>
    <?php
    $php_array = $banner_pro;
    ?>
    var js_array = <?php echo json_encode($php_array) ?>;
    var slider = document.querySelector('.slider');
    // console.log(js_array);
    var i = 0,
        max = js_array.length,
        timer = function() {
            if (i < max) {
                i++;
                slider.innerHTML = `<a class="block mx-auto" href="?mod=detail&id=${js_array[i - 1]['id']}">
                <img class="w-full h-[500px] object-contain" src="public/images/${js_array[i - 1]['images']}" alt="">
                </a>`
            }
            if (i >= max) {
                i = 0;
                // console.log(i - 1) //fail ...
            }

            setTimeout(timer, 3000);
        };

    timer();
</script>
<?php get_footer('') ?>