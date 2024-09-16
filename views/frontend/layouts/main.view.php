<?php
global $pdo;

use App\Support\AuthService;
$authService = new AuthService($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/simple.css" />
    <link rel="stylesheet" href="./styles/custom.css" />
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Context Management System</h1>
        <p> A sample website for a demo context Management System </p>
        <?php
        if ($authService->isLoggedIn()) {
            echo '<h4> Hello Admin</h4>'. '<input type="button" value="Admin Area" onclick="window.location.href=\'./?route=admin/page\';">' ;
        } else {
            echo '<input type="button" value="Log in!" onclick="window.location.href=\'./?route=admin/login\';">';
        }
        ?>

        <nav>
            <?php foreach($navigation AS $navigationElement): ?>
                <a href="./?<?php echo http_build_query(['page' => $navigationElement->slug]); ?>">
                    <?php echo e($navigationElement->title); ?>
                </a>
            <?php endforeach;?>
        </nav>
    </header>
    <main>
        <?php echo $content; ?>
    </main>

    <?php
    if (isset($_SESSION['adminLogin'])) {
        echo '<br /><hr/><br />';
        echo '<input type="button" value="Log out!" onclick="window.location.href=\'./?route=admin/logout\';">';
    }
    ?>
    <footer>
        <p>Projekt:CMS</p>
    </footer>
</body>
</html>