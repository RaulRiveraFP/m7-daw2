<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patró Singleton</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php include '../header.php'; ?>
    <?php include '../nav.php'; ?>
    <h2>Patró Singleton</h2>
    <p>El patró Singleton assegura que una classe només tingui una única instància i proporciona un punt d’accés global a aquesta instància.</p>
    <pre>
        <code>
            class Singleton {
                private static $instance;
                private function __construct() {}
                public static function getInstance() {
                    if (!isset(self::$instance)) {
                        self::$instance = new Singleton();
                    }
                    return self::$instance;
                }
            }
            $singleton = Singleton::getInstance();
        </code>
    </pre>
</body>
</html>