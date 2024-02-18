<?php

namespace Main;

use ErrorException;
use Symfony\Component\Dotenv\Dotenv;

final class StatParse
{
    /**
     * @throws ErrorException
     */
    public function __construct()
    {
        $dotEnv = new Dotenv();
        $dotEnv->usePutenv();
        $dotEnv->load(ROOT_DIR . '.env');
        (new ActionService())->handle();
    }
}
