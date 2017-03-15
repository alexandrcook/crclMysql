<?php

if(isset($data['category']) and isset($data['products'])){
    $category = $data['category'][0];
    $products = $data['products'];
}

?>

<h1>Продукты <?= '"' . $category['title'] .'"'?> </h1>


<div class="row">
    <div class="col-xs-12">
        <?php foreach ($products as $key => $product): ?>
            <span>#<?= $key + 1 ?></span>
            <span class="glyphicon glyphicon-hand-right" style="display: block;
                                                                font-size: 20px;
                                                                padding-bottom: 10px">
            <a href="/products/<?= $product['id'] ?>"><?php echo $product['title']; ?></a>
            </span>
            <p><?= $product['description'] ?></p>
            <hr>
        <?php endforeach; ?>
    </div>
</div>