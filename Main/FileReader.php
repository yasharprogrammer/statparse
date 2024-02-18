<?php

namespace Main;

use Generator;
use InvalidArgumentException;

final class FileReader
{
    private array|false $currentLineData = [];

    private int $currentLineNumber = 0;

    private const string DELIMITER = ';';

    private const string ENCLOSURE = ',';

    private string $filePath;

    /** @var string[] */
    private array $fileHeader = [];

    public function readFile(): Generator
    {
        $handle = fopen($this->filePath, 'rb');

        if (false === $handle) {
            throw new InvalidArgumentException('Невозможно прочитать файл!');
        }

        while (($this->currentLineData = fgetcsv($handle, 0, self::DELIMITER, self::ENCLOSURE)) !== false) {
            $filteredData = $this->filterData();

            if (0 === $this->currentLineNumber) {
                $this->fileHeader = $filteredData;
            } else {
                yield array_combine($this->fileHeader, $filteredData);
            }

            $this->currentLineNumber++;
        }
        fclose($handle);
    }

    public function setFile(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string[]
     */
    private function filterData(): array
    {
        $filteredData = array_map(static function (string $line) {
            return str_replace([
                ',,',
                '"'
            ], '', trim($line));
        }, $this->currentLineData);

        if (0 !== $this->currentLineNumber) {
            $filteredData[5] = (float) str_replace(',', '.', trim($filteredData[5]));
            $filteredData[6] = (float) str_replace(',', '.', trim($filteredData[6]));
        }

        return $filteredData;
    }
}
