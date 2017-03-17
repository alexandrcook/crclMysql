<h1>Ваши покупки</h1>

<div class="row">
    <div class="col-xs-12">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Serial</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $allPrice = 0;
            foreach ($data as $key => $product): ?>
                <?php $allPrice = $allPrice + $product['price'] ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $product['id'] ?>-<?= $product['category_id'] ?></td>
                    <td><a href="/products/<?= $product['id'] ?>"><?php echo $product['title']; ?></a></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?> грн</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Всего:</td>
                <td></td>
                <td></td>
                <td></td>
                <td><b><?= $allPrice ?> грн</b></td>
            </tr>
            </tbody>
        </table>
        <h2 style="text-align: center">Оформить заказ</h2>
        <form action="/orders/buy" method="post" class="form-signin">
            <input type="text" class="form-control" name="fio" placeholder="Контактные данные (ФИО)" required>
            <input type="text" class="form-control" name="adress" placeholder="Адрес (куда доставлять)" required>
            <input type="email" class="form-control" name="email" placeholder="E-mail (отcлеживания статуса посылки)" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Оформляем!!!
            </button>
        </form>
    </div>
</div>

