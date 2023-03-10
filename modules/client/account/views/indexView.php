<?php get_header('', 'Đăng ký') ?>
<main class="py-10 px-10">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="w-full h-[400px] flex justify-center ">
            <div class="m-auto grid grid-2 w-[90px]">
                <div>
                    <h1 class="text-[20px] font-bold">Hồ sơ của tôi</h1>
                    <span class="text-[#989494] text-[15px]">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
                </div>
                <?php foreach ($notifications as $notification) : ?>
                    <?php foreach ($notification['msgs'] as $msg) : ?>
                        <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <div class="name py-[10px]">
                    <div>
                        <label class="text-[15px] text-[#414141]">Họ và tên</label>
                    </div>
                    <input class="w-[300px] h-[44px] border pl-[10px] rounded-[5px]" type="text" name="full_name" value="<?= $user['full_name'] ?>" id="" placeholder="">
                </div>
                <div class="Email py-[10px]">
                    <div>
                        <label class="text-[15px] text-[#414141]">Email</label>
                    </div>
                    <input disabled class="w-[300px] h-[44px] border pl-[10px] rounded-[5px]" type="text" name="email" id="" value="<?= $user['email'] ?>" placeholder="Email">
                </div>
                <div class="Phone py-[10px]">
                    <div>
                        <label class="text-[15px] text-[#414141]">Số điện thoại</label>
                    </div>
                    <input class="w-[300px] h-[44px] border pl-[10px] rounded-[5px]" type="number" name="phone" value="<?= $user['phone'] ?>" id="" placeholder="Số điện thoại">
                </div>
            </div>
            <div class="image m-auto">
                <div class="m-auto flex flex-col items-center ">
                    <img src="public/images/<?= $user['image'] ?>" alt="" width="" class="w-[80px] rounded-full">
                    <div class="pt-[10px]">
                        <label for="image" class=" cursor-pointer p-[5px] bg-green-500 border hover:bg-green-700 text-white">Thay ảnh đại diện</label>
                        <input type="file" name="image" id="image" hidden>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="save bg-[#198754] w-[240px] h-[46px] rounded-[3px] flex items-center justify-center">
                <button class="text-[#ffffff] text-[22px] font-bold cursor-pointer">Lưu</button>
            </div>
        </div>
    </form>
</main>
<?php get_footer('') ?>