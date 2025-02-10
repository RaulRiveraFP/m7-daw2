<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patró Adapter</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php include '../header.php'; ?>
    <?php include '../nav.php'; ?>
    <h2>Patró Adapter</h2>
    <p>El patró Adapter permet que interfícies incompatibles treballin juntes mitjançant una classe intermediària.</p>
    <pre>
        <code>
            class Adaptee {
                public function specificRequest() {
                    return "Resposta específica de l'Adaptee";
                }
            }

            class Adapter {
                private $adaptee;
                public function __construct(Adaptee $adaptee) {
                    $this->adaptee = $adaptee;
                }
                public function request() {
                    return $this->adaptee->specificRequest();
                }
            }

            $adapter = new Adapter(new Adaptee());
            echo $adapter->request();
        </code>
    </pre>
</body>
</html>
