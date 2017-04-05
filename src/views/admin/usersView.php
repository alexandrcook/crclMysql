<h1>Пользователи</h1>

<?php

global $_page, $_config;

$users = $data['users'];
$pagination = $data['pagination'];

?>

<a href="/admin/users/?method=create">Создать нового пользователя</a>
<br>
<br>

<table style="border-collapse: collapse;">
    <?php $k = $_page * $_config['items_on_page']; ?>
    <?php foreach ($users as $user) { ?>
        <?php $k++; ?>

        <tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <?= $k ?>
            </td>
            <td style="border: solid 1px black;  padding: 10px">
                <?= $user['name'] ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user['email'] ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user['role'] ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/users?method=edit&id=<?= $user['id'] ?>">Редагувати</a>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/users?method=delete&id=<?= $user['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php } ?>
</table>

<div class="pagination">
    <?php pagination($data['pagination']['pages_count'],'/admin/users'); ?>
</div>