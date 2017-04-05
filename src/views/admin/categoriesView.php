<h1>Категории</h1>

<?php

global $_page, $_config;

$categories = $data['categories'];
$pagination = $data['pagination'];

?>

<a href="/admin/categories/?method=create">Создать новоую категорию</a>
<br>
<br>

<table style="border-collapse: collapse;">
    <?php $k = $_page * $_config['items_on_page']; ?>
    <?php foreach ($categories as $category) { ?>
        <?php $k++; ?>

        <tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <?= $k ?>
            </td>
            <td style="border: solid 1px black;  padding: 10px">
                <?= $category['title'] ?>
            </td>

            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/categories?method=edit&id=<?= $category['id'] ?>">Редагувати</a>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/categories?method=delete&id=<?= $category['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php } ?>
</table>

<div class="pagination">
    <?php pagination($data['pagination']['pages_count'],'/admin/categories'); ?>
</div>