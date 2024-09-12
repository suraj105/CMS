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
        <h1>Admin</h1>
        <?php
        // Check if the 'route' parameter is set in the URL
        if (isset($_GET['route'])) {
            // Get the value of the 'route' parameter
            $route = $_GET['route'];

            // Check if the route is 'admin/login'
            if ($route === 'admin/login') {
                echo '<p>Login to create new pages below</p>';
            }
            // Check if the route is 'admin/page'
            elseif ($route === 'admin/page') {
                echo '<p>Create new pages below</p>';
            }
        } else {
            // Default case if 'route' parameter is not set
            echo '<p>Welcome! Please log in or navigate to create pages.</p>';
        }

        // Output the login button
        echo '<br>';
        echo '<a href="./?page=index">Go to CMS!</a>';
        ?>




    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <p>Projekt: CMS</p>
    </footer>
</body>
</html>