<?php

namespace Main;

use ErrorException;
use InvalidArgumentException;

final class StatRepository
{
    private const string TABLE = 'static_data';

    private Model $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    /**
     * @throws ErrorException
     */
    public function addRecord(array $dataRow): void
    {
        if ([] === $dataRow) {
            throw new InvalidArgumentException('Данные записа пустые!');
        }
        $record = [
            'code' => $dataRow['Код'] ?? '',
            'name' => $dataRow['Наименование'] ?? '',
            'level1' => $dataRow['Уровень1'] ?? '',
            'level2' => $dataRow['Уровень2'] ?? '',
            'level3' => $dataRow['Уровень3'] ?? '',
            'price' => $dataRow['Цена'] ?? '',
            'priceSp' => $dataRow['ЦенаСП'] ?? '',
            'quantity' => $dataRow['Количество'] ?? '',
            'fields' => $dataRow['Поля свойств'] ?? '',
            'purchases' => $dataRow['Совместные покупки'] ?? '',
            'unit' => $dataRow['Единица измерения'] ?? '',
            'image' => $dataRow['Картинка'] ?? '',
            'display' => $dataRow['Выводить на главной'] ?? '',
            'description' => $dataRow['Описание'] ?? '',
        ];
        $lastInsertId = $this->model->table(self::TABLE)->insert($record);
        if (false === $lastInsertId) {
            throw new ErrorException('Невозможно добавить запись в таблицу');
        }
    }

    /**
     * @throws ErrorException
     */
    public function getAll(): array
    {
        return $this->model->table(self::TABLE)->all('id, code, name, price');
    }
}
