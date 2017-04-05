<h1>Заказы</h1>

<?php

global $_page, $_config;

$orders = $data['orders'];
$pagination = $data['pagination'];

?>

<table style="border-collapse: collapse;">
    <?php $k = $_page * $_config['items_on_page']; ?>
    <?php foreach ($orders as $order) { ?>
        <?php $k++; ?>
        <tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <?= $k ?>
            </td>
            <td style="border: solid 1px black;  padding: 10px">
               Товар №<?= $order['product_id'] ?>
            </td>
            <td style="border: solid 1px black;  padding: 10px">
                Для пользователя <?= $order['user_id'] ?>
            </td>
            <td style="border: solid 1px black;  padding: 10px">
                <?= $order['status'] ?>
            </td>
            <td style="border: solid 1px black;  padding: 10px">
                Цена <?= $order['total_price'] ?>
            </td>

            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/orders?method=edit&id=<?= $order['id'] ?>">Редагувати</a>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/orders?method=delete&id=<?= $order['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php } ?>
</table>

<div class="pagination">
    <?php pagination($data['pagination']['pages_count'],'/admin/orders'); ?>
</div>