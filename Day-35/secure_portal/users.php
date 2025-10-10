<?php
return[
    'aesha@example.com' => [
         'password' => password_hash('user123', PASSWORD_DEFAULT),
         'role' => 'user'
    ],
    'admin@example.com' => [
        'password' => password_hash('admin123',PASSWORD_DEFAULT),
        'role' => 'admin'
    ]
];
?>