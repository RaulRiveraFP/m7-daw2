<?php
// Iniciar la sesión
session_start();

// Si la lista de libros no está definida en la sesión, inicializamos con algunos libros de ejemplo
if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [
        [
            'id' => 0, // Añadir un campo id
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'imagen' => 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD...',
            'descripcion' => 'Un clásico de la literatura latinoamericana.'
        ],
        [
            'id' => 1, // Añadir un campo id
            'titulo' => 'Don Quijote de la Mancha',
            'autor' => 'Miguel de Cervantes',
            'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Title_page_first_edition_Don_Quijote.jpg/500px-Title_page_first_edition_Don_Quijote.jpg',
            'descripcion' => 'La obra más importante de la literatura española.'
        ],
        [
            'id' => 2, // Añadir un campo id
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Nineteen_Eighty-Four_cover_Soviet_1984.jpg/440px-Nineteen_Eighty-Four_cover_Soviet_1984.jpg',
            'descripcion' => 'Una novela distópica que reflexiona sobre el totalitarismo.'
        ]
    ];
}


// Función para agregar un libro
function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    // Crear un nuevo libro como un array asociativo
    $nuevoLibro = [
        'titulo' => $titulo,
        'autor' => $autor,
        'imagen' => $imagen,
        'descripcion' => $descripcion
    ];

    // Añadir el libro a la lista de libros en la sesión
    $_SESSION['libros'][] = $nuevoLibro;
}

// Función para editar un libro
function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    // Verificar si el índice existe en la lista de libros
    if (isset($_SESSION['libros'][$id])) {
        // Modificar los datos del libro en el índice especificado
        $_SESSION['libros'][$id] = [
            'titulo' => $titulo,
            'autor' => $autor,
            'imagen' => $imagen,
            'descripcion' => $descripcion
        ];
    }
}

// Función para eliminar un libro
function eliminarLibro($id) {
    // Buscar el índice del libro por el ID
    foreach ($_SESSION['libros'] as $index => $libro) {
        if ($libro['id'] == $id) {
            // Eliminar el libro usando unset
            unset($_SESSION['libros'][$index]);
            // Reindexar el array para mantener el índice ordenado
            $_SESSION['libros'] = array_values($_SESSION['libros']);
            break;  // Salir del bucle una vez que el libro es encontrado y eliminado
        }
    }
}

?>
