<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require 'Order.php';
    require 'Product.php';
    require 'Basket.php';
    require 'BasketPosition.php';

    $b = new Basket();
    $b->addProduct(new Product("аккамулятор", 250), 3);
    $b->addProduct(new Product("отвертка", 500), 1);
    $b->addProduct(new Product("кусачки", 700), 2);

    $o = new Order($b, 250);

    echo "Заказ, на сумму: ".$o->getPrice()."<br>";
    echo "Состав: <br>";
    foreach ($b->describe() as $s) {
        echo $s."<br>";
    }
    ?>
    <br>
    <a href="/">Назад</a>

</body>
</html>
