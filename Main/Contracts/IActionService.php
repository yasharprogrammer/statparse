<?php

namespace Main\Contracts;

use Closure;

interface IActionService
{
    public function handle(): void;
}