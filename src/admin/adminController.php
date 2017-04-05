<?php

require_once PATHROOT . '/admin/adminModel.php';

function adminIndex($pdo)
{
    if (!isset($_SESSION['flash_msg'])) {
        $_SESSION['flash_msg'] = 'Привет "' . $_SESSION['user_name'] . '". <br> Ты находишся в админ панели - здесь можно ВСЕ !!! РАЗВЛЕКАЙСЯ !!!';
    }
    view('admin');
}


// USERS

function showUsers($pdo)
{
    global $_config;
    $users = getUsers($pdo);
    $allUsersCount = getUsersCount($pdo);
    $pagination = [
        'pages_count' => ceil($allUsersCount / $_config['items_on_page'])
    ];
    view('admin', ['users' => $users, 'pagination' => $pagination], 'users');
}

function editUser($pdo, $user_info)
{
    $userToEditInfo = getUser($pdo, $user_info['id']);
    $userToEditInfo = $userToEditInfo[0];

    view('admin', $userToEditInfo, 'userEdit');
}

function changeUserData($pdo, $newUserData)
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $login = $_POST['login'];

    updUserData($pdo, $id, $name, $email, $password, $login, $role);
    $_SESSION['flash_msg'] = "Данние пользователя c id" . $id . " изменены";
    var_dump($_SESSION['flash_msg']);
    header('location: /');
}

// CATEGORIES

function showCategories($pdo)
{
    global $_config;
    $categories = getCategoriesAdm($pdo);
    $categoriesCount = getCategoriesCountAdm($pdo);

    $pagination = [
        'pages_count' => ceil($categoriesCount / $_config['items_on_page'])
    ];
    view('admin', ['categories' => $categories, 'pagination' => $pagination], 'categories');
}

// PRODUCTS

function showProducts($pdo)
{
    global $_config;
    $products = getProductsAdm($pdo);
    $productsCount = getProductsCountAdm($pdo);
    $pagination = [
        'pages_count' => ceil($productsCount / $_config['items_on_page'])
    ];
    view('admin', ['products' => $products, 'pagination' => $pagination], 'products');
}

//ORDERS

function showOrders($pdo)
{
    global $_config;
    $orders = getOrdersAdm($pdo);
    $ordersCount = getOrdersCountAdm($pdo);
    $pagination = [
        'pages_count' => ceil($ordersCount / $_config['items_on_page'])
    ];
    view('admin', ['orders' => $orders, 'pagination' => $pagination], 'orders');
}

//if( $_subAction == 'user' && $_method == 'edit' ) {
//    $id = $_GET['id'];
//    $user = getUser( $pdo, $id );
//    view('admin/userEdit', ['user' => $user[0]]);
//}
//else if( $_subAction == 'user' && $_method == 'update' ) {
//    $id = $_POST['form']['id'];
//    $res = saveUser( $pdo, $_POST['form'] );
//    if( $res && $_FILES['avatar'] ) {
//        $fileName = 'avatar_'.$id.'.jpg';
//        move_uploaded_file($_FILES['avatar']['tmp_name'], 'files/avatars/'.$fileName);
//    }
//    header('location: /admin/user/?method=edit&id='.$_POST['form']['id']);
//    exit();
//}

