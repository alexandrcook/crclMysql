<h1>Категории</h1>

<div class="row">
    <div class="col-xs-12">
        <?php foreach ($data as $category): ?>
            <span class="glyphicon glyphicon-hand-right" style="display: block;
                                                                font-size: 20px;
                                                                padding-bottom: 10px">
            <a href="/categories/<?= $category['id'] ?>"><?php echo $category['title']; ?></a>
            </span>
        <?php endforeach; ?>
    </div>
</div>




