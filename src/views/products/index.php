<?php

if (isset($data['category']) and isset($data['products'])) {
    $category = $data['category'][0];
    $products = $data['products'];
}
?>

<h1>Продукты <?= '"' . $category['title'] . '"' ?> </h1>

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
                <th>Купить</th>
            </tr>
            </thead>
            <?php foreach ($products as $key => $product): ?>
                <tbody>
                <tr>
                    <td>#<?= $key + 1 ?></td>
                    <td><?= $product['id'] ?>-<?= $product['category_id'] ?></td>
                    <td><a href="/products/<?= $product['id'] ?>"><?php echo $product['title']; ?></a></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?> грн</td>
                    <td>
                        <form action="/orders/add" method="post">
                            <input type="hidden" name="productTitle" value="<?= $product['title'] ?>">
                            <input type="hidden" name="productId" value="<?= $product['id'] ?>">
                            <input type="hidden" name="productPrice" value="<?= $product['price'] ?>">
                            <div class="btnAtom">
                        <span><input type="submit" value="Добавить в корзину">
                            </span>
                                <div class="dot"></div>
                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<style>
    body{
    }

    :root {
        --bg: #3C465C;
        --primary: red;
        --solid: #000;
        --btn-w: 10em;
        --dot-w: calc(var(--btn-w) * .2);
        --tr-X: calc(var(--btn-w) - var(--btn-w) * .2);
    }

    * {
        box-sizing: border-box;
    }

    *:before, *:after {
        box-sizing: border-box;
    }

    .btnAtom [type='submit']{
        background: transparent;
        border: none;
        font-size: 15px;
        display: block;
        height: 100%;
        width: 100%;
        z-index: 100000000000000;
    }

    .btnAtom span{
        display: block;
        height: 100%;
        width: 100%;
    }

    .btnAtom {
        position: relative;
        /*margin: 0 auto;*/
        width: var(--btn-w);
        color: var(--primary);
        border: .15em solid var(--primary);
        border-radius: 5px;
        text-transform: uppercase;
        text-align: center;
        font-size: 1.3em;
        line-height: 1em;
        cursor: pointer;
    }

    .dot {
        content: '';
        position: absolute;
        top: 0;
        width: var(--dot-w);
        height: 100%;
        border-radius: 100%;
        transition: all 300ms ease;
        display: none;
    }

    .dot:after {
        content: '';
        position: absolute;
        left: calc(50% - .4em);
        top: -.4em;
        height: .8em;
        width: .8em;
        background: var(--primary);
        border-radius: 1em;
        border: .25em solid var(--solid);
        box-shadow: 0 0 .7em var(--solid),
        0 0 2em var(--primary);
    }

    .btnAtom:hover .dot,
    .btnAtom:focus .dot {
        animation: atom 2s infinite linear;
        display: block;
    }

    @keyframes atom {
        0% {
            transform: translateX(0) rotate(0);
        }
        30% {
            transform: translateX(var(--tr-X)) rotate(0);
        }
        50% {
            transform: translateX(var(--tr-X)) rotate(180deg);
        }
        80% {
            transform: translateX(0) rotate(180deg);
        }
        100% {
            transform: translateX(0) rotate(360deg);
        }
    }

</style>