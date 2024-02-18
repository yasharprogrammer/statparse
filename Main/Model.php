<?php

namespace Main;

use ErrorException;
use PDO;
use PDOException;

final class Model
{
    private readonly PDO $connect;

    private string $table;

    public function __construct()
    {
        try {
            $this->connect = new PDO(
                'mysql:host=' . getenv('MYSQL_HOST') . ';dbname=' . getenv('MYSQL_DATABASE') . ';charset=utf8',
                getenv('MYSQL_USER'),
                getenv('MYSQL_PASSWORD')
            );
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            trigger_error('PDO ERROR: ' . $exception->getMessage(), E_USER_ERROR);
        }
    }

    /**
     * @param string[] $data
     * @throws ErrorException
     */
    public function insert(array $data): false|string
    {
        if ([] === $data) {
            throw new ErrorException('Передаваемые данные пустые!');
        }
        if (!isset($this->table)) {
            throw new ErrorException('Таблица не установлена!');
        }
        $sql = /** @lang SQL */
            'INSERT INTO :table (:fields) VALUES (:values)';
        $formattedSql = strtr($sql, [
            ':table' => $this->table,
            ':fields' => implode(',', array_keys($data)),
            ':values' => rtrim(str_repeat('?,', count($data)), ',')
        ]);
        $query = $this->connect->prepare($formattedSql);
        $query->execute(array_values($data));

        return $this->connect->lastInsertId();
    }

    /**
     * @throws ErrorException
     */
    public function all(string $columns = '*'): array
    {
        if (!isset($this->table)) {
            throw new ErrorException('Таблица не установлена!');
        }
        $sql = /** @lang SQL */
            'SELECT :columns FROM :table ORDER BY id DESC';
        $formattedSql = strtr($sql, [
            ':columns' => $columns,
            ':table' => $this->table
        ]);

        return $this->connect->query($formattedSql)->fetchAll();
    }

    public function table(string $table): self
    {
        $this->table = $table;

        return $this;
    }
}
