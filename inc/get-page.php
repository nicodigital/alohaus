<?php

// Mapeo de páginas a sus configuraciones
$page_config = [
    'home' => [
        'theme'     => 'dark',
        'page_type' => 'home', // Page Type sobrescribe el page_type obtenido por la API, solo en caso del Home y Proyectos
    ],
    'proyectos' => [
        'theme'     => 'dark',
        'page_type' => 'proyectos',
    ],
];

// Configuración por defecto
$default_config = [
    'theme' => 'dark',
    'page_type' => $page_type, // Aqui asignamos por defecto el page_type obtenido por la api
];

// Asignar valores según la página
$config = $page_config[$page] ?? $default_config;

$theme = $config['theme'];
$page_type = $config['page_type'];

