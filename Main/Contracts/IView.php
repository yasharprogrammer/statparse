<?php

namespace Main\Contracts;

interface IView
{
    public const string TEMPLATE_DIR = ROOT_DIR . 'templates/';

    public function render(string $page, array $data = []): void;
}
