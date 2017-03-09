<?php
include __DIR__.'/../header.php';
include __DIR__ .'/../menu.php';
?>

<div class="col-xs-12">
    <h3>views/Default/index </h3>
    <hr>
</div>

<div class="col-xs-12">
    <div id="toLoadTable">
        <h2>Добавить новый отзыв</h2>
        <hr>
        <form method="post" id="searchForm" class="clearfix" enctype="multipart/form-data" action="/guestbook">
            <div class="form-group col-xs-6">
                <label>Name</label>
                <input style="width: 100%" type="text" name="name" value="<?php if(isset($_COOKIE['name'])){
                    echo $_COOKIE['name'];
                } ?>">
            </div>
            <div class="form-group col-xs-6">
                <label>Email</label>
                <input style="width: 100%" type="email" name="email"  value="<?php if(isset($_COOKIE['email'])){
                    echo $_COOKIE['email'];
                } ?>">
            </div>
            <div class="form-group col-xs-6">
                <label>Message</label>
                <textarea style="width: 100%" name="message"></textarea>
            </div>
            <div class="form-group col-xs-6">
                <label>Select Files</label>
                <input name="files_array[]" type="file" multiple/><br/>
            </div>
            <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-danger" id="goSearch">Оставить отзыв</button>
            </div>
        </form>
    </div>
</div>

<?php
include __DIR__.'/../footer.php';
?>
