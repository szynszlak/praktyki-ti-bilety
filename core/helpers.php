<?php

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function render(string $view, array $data = []): void
{
    extract($data);

    if(!empty($admin)) {
        require ROOT . '/app/views/' . $view . '.php'; 
        exit;
    }

    require ROOT . '/app/views/layout/header.php';
    require ROOT . '/app/views/' . $view . '.php';
    require ROOT . '/app/views/layout/footer.php';
}