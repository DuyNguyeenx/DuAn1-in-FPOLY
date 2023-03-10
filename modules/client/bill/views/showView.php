<?php get_header('', 'Hoá đơn của bạn') ?>
<main class="flex justify-center py-[50px] px-10">
  <div class="bg-white mb-[30px] p-5">
    <h2 class="my-[30px] text-[40px] font-bold text-center">Chi Tiết Hóa Đơn</h2>
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class=" inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full border text-center">
              <thead class="border-b">
                <tr>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Hình ảnh
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Tên sản phẩm
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Hãng
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Loại
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Giá
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Số lượng
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                    Tổng thành tiền
                  </th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($bills as $b) : ?>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">
                      <img src="public/images/<?= $b['images'] ?>" alt="" class="w-20 object-cover">
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                      <?= $b['title'] ?>
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                      <?= $b['b_name'] ?>
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                      <?= $b['type_name'] ?>
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                      <?= currency_format($b['price'])   ?>
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                      <?= $b['quantity'] ?>
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                      <?= currency_format($b['price_total']) ?>
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