<?php

namespace Main;

use Main\Contracts\IView;
use RuntimeException;

final class View implements IView
{
    public function render(string $page, array $data = []): void
    {
        $layout = self::TEMPLATE_DIR . $page . '.php';
        if (!file_exists($layout)) {
            throw new RuntimeException('Template file not find!');
        }
        extract($data);
        include_once $layout;
    }
}