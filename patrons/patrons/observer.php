<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patró Observer</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php include '../header.php'; ?>
    <?php include '../nav.php'; ?>
    <h2>Patró Observer</h2>
    <p>El patró Observer defineix una dependència un-a-molts entre objectes de manera que quan un objecte canvia d'estat, tots els seus dependents són notificats.</p>
    <pre>
        <code>
            class Subject {
                private $observers = [];
                public function attach($observer) {
                    $this->observers[] = $observer;
                }
                public function notify() {
                    foreach ($this->observers as $observer) {
                        $observer->update();
                    }
                }
            }

            class ConcreteObserver {
                public function update() {
                    echo "Observer notificat";
                }
            }

            $subject = new Subject();
            $observer = new ConcreteObserver();
            $subject->attach($observer);
            $subject->notify();
        </code>
    </pre>
</body>
</html>
