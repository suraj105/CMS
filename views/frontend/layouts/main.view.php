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
        <p> A sample website for context Management </p>
        <input type="button" value="Log in !" onclick="window.location.href='./?route=admin/login';">
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
    <footer>
        <p>Projekt: CMS vom PHP-Kurs</p>
    </footer>
</body>
</html>