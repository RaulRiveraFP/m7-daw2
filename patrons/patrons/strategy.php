<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patró Strategy</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php include '../header.php'; ?>
    <?php include '../nav.php'; ?>
    <h2>Patró Strategy</h2>
    <p>El patró Strategy permet definir una família d'algoritmes, encapsular-los i fer-los intercanviables.</p>
    <pre>
        <code>
            interface Strategy {
                public function execute();
            }

            class ConcreteStrategyA implements Strategy {
                public function execute() {
                    return "Estratègia A executada";
                }
            }

            class ConcreteStrategyB implements Strategy {
                public function execute() {
                    return "Estratègia B executada";
                }
            }

            class Context {
                private $strategy;
                public function __construct(Strategy $strategy) {
                    $this->strategy = $strategy;
                }
                public function executeStrategy() {
                    return $this->strategy->execute();
                }
            }

            $context = new Context(new ConcreteStrategyA());
            echo $context->executeStrategy();
        </code>
    </pre>
</body>
</html>
