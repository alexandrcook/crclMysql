<?php

function insertProduct($pdo, $prod_id, $user_id, $product_price)
{
    $insert = $pdo->prepare("INSERT INTO `orders` (`user_id`,`product_id`,`created_at`,`delivered_at`,`status`,`total_price`) VALUES (?,?,?,?,?,?)");
    $insert->execute(array($user_id, $prod_id, null, null, 'in_cart', $product_price));
}

function getProductsInBasket($pdo, $user_id)
{
    $prodInBasket = $pdo->query("SELECT * FROM `orders` WHERE `user_id` ='{$user_id}' AND `status` ='in_cart'");
    $prodInBasket = $prodInBasket->fetchAll();
    return $prodInBasket;
}

function getProductsInBasketById($pdo, $product_id)
{
    $products = $pdo->query("SELECT * FROM `products` WHERE `id` = {$product_id}");
    $productsArr = $products->fetchAll();
    return $productsArr[0];
}

function buyProductsInBasket($pdo, $user_id)
{
//    $insert = $pdo->prepare("UPDATE `orders` SET status = (?)  WHERE `user_id` = {$user_id}");
//    $insert->execute(array('in progress'));
}

function mailAboutOrderBuy($userInfo, $dataToMsg)
{

    //var_dump($userInfo['fio']);
    //var_dump($userInfo['adress']);
    //var_dump($dataToMsg);

    $dataTextToEmail = '';

    foreach ($dataToMsg as $key => $product) {
        $dataTextToEmail .= '<tr>
                    <td>' . $key . '</td>
                    <td>' . $product['title'] . '</td>
                    <td>' . $product['description'] . '</td>
                    <td>' . $product['price'] . 'грн</td>
                </tr>';
    }

    //var_dump($dataTextToEmail);

    $message = '<h2>Привет ' . $userInfo['fio'] . '</h2><br>
                    Ваш заказ это вот это вот всьо<br>
                    <table>
                    ' . $dataTextToEmail . '
                    </table><br>
                    
               <p>Ваш заказ будет Вам доставлен<br>
               <h2>...НИКОДА...</h2></p>
                    ';

    //var_dump($message);

    //exit();

    $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";


    $subj = 'Internet Shop Message';

    mail($userInfo['email'], $subj, $message, $headers);
}