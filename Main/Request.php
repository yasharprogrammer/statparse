<?php

namespace Main;

class Request
{
    public const string POST_REQUEST = 'POST';

    public const string FILE_INPUT_NAME = 'csv_file';

    public static function isPost(): bool
    {
        return self::POST_REQUEST === getenv('REQUEST_METHOD');
    }

    public static function has(string $param): bool
    {
        return array_key_exists($param, $_REQUEST);
    }

    public static function hasUploadedFile(): bool
    {
        return self::isPost()
            && isset($_FILES[self::FILE_INPUT_NAME])
            && UPLOAD_ERR_OK === $_FILES[self::FILE_INPUT_NAME]['error']
            && $_FILES[self::FILE_INPUT_NAME]['size'] > 0
            && is_uploaded_file($_FILES[self::FILE_INPUT_NAME]['tmp_name']);
    }

    public static function getUploadedFile(): string
    {
        return $_FILES[self::FILE_INPUT_NAME]['tmp_name'];
    }

    public static function redirect(string $to): never
    {
        header('Location: http://' . getenv('HTTP_HOST') . '/' . $to);
        exit(0);
    }
}
