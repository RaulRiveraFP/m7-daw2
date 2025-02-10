<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patró Factory</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php include '../header.php'; ?>
    <?php include '../nav.php'; ?>
    <h2>Patró Factory</h2>
    <p>El patró Factory proporciona una interfície per crear objectes en una superclasse, permetent que les subclasses alterin el tipus d'objectes que es creen.</p>
    <pre>
        <code>
            class Product {
                public function operation() {
                    return "Producte genèric";
                }
            }

            class ConcreteProduct extends Product {
                public function operation() {
                    return "Producte concret creat";
                }
            }

            class Factory {
                public static function createProduct() {
                    return new ConcreteProduct();
                }
            }

            $product = Factory::createProduct();
            echo $product->operation();
        </code>
    </pre>
</body>
</html>