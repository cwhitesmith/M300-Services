<html>
    <head>
        <title>Webserver</title>
    </head>

    <body>
        <h1>Webserver</h1>
        <ul>
            <?php

            $json = file_get_contents('http://products-service/');
            $obj = json_decode($json);

            $products = $obj->products;

            foreach ($products as $product) {
                echo "<li>$product</li>";
            }

            ?>
        </ul>
    </body>
</html>
