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
        <h1>Ein eigenes CMS</h1>
        <p>Hier finden Sie eine schöne CMS-App</p>
        <nav>
            <?php foreach($navigation AS $navigationElement): ?>
                <?php /* <a href="index.php?page=<?php echo e($navigationElement->slug); ?>"><?php echo e($navigationElement->title); ?></a> */ ?>
                <a href="./?<?php echo http_build_query(['page' => $navigationElement->slug]); ?>">
                    <?php echo e($navigationElement->title); ?>
                </a>
            <?php endforeach;?>
            <?php /* var_dump($navigation); */ ?>
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