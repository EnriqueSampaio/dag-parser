<?php

namespace App\Library;

use PHPExcel_IOFactory;
use PHPExcel_Cell;
use App\Helpers\Helper;
use App\Investiment;

/**
 * Handle with the investiments sheet.
 */
class SheetHandler
{
    private $dataIdx = array();
    private $firstRow;
    private $maxRow;
    private $sheet;

    /**
     * Create a new objetc of SheetHandler class and call to domainColumn() method.
     */
    function __construct($file)
    {
        $this->sheet = PHPExcel_IOFactory::load($file);
        $this->domainColumn();
    }

    /**
     * Determine the investiments domain column based on the number of alphabetical characters.
     *
     * @return Integer
     */
    public function domainColumn()
    {
        $columns = array_fill(1, PHPExcel_Cell::columnIndexFromString($this->sheet->getActiveSheet()->getHighestColumn()), 0);

        foreach ($this->sheet->getActiveSheet()->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                if (preg_match("/[a-z]/i", $cell->getValue())) {
                    $string = Helper::mb_str_split($cell->getValue());
                    foreach ($string as $char) {
                        if(ctype_alpha($char)) {
                            $columns[PHPExcel_Cell::columnIndexFromString($cell->getColumn())]++;
                        }
                    }
                }
            }
        }

        $this->dataIdx[0] = array_keys($columns, max($columns))[0];
    }

    /**
     * Detect each month column and the first row that conatins investiments.
     */
    public function monthsIdx()
    {
        foreach ($this->sheet->getActiveSheet()->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                if (strcasecmp($cell->getValue(), 'total') === 0) {
                    $this->sheet->getActiveSheet()->removeRow($cell->getRow());
               } else if (strcasecmp($cell->getValue(), 'janeiro') === 0) {
                    $this->dataIdx[1] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                    $this->firstRow = $cell->getRow();
                } else if (strcasecmp($cell->getValue(), 'fevereiro') === 0) {
                    $this->dataIdx[2] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'março') === 0) {
                    $this->dataIdx[3] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'abril') === 0) {
                    $this->dataIdx[4] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'maio') === 0) {
                    $this->dataIdx[5] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'junho') === 0) {
                    $this->dataIdx[6] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'julho') === 0) {
                    $this->dataIdx[7] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'agosto') === 0) {
                    $this->dataIdx[8] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'setembro') === 0) {
                    $this->dataIdx[9] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'outubro') === 0) {
                    $this->dataIdx[10] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'novembro') === 0) {
                    $this->dataIdx[11] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                } else if (strcasecmp($cell->getValue(), 'dezembro') === 0) {
                    $this->dataIdx[12] = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                }
            }
        }
    }

    public function extractInvestimentsEachonth()
    {
        $this->monthsIdx();
        $investiments = array();
        foreach ($this->sheet->getActiveSheet()->getRowIterator($this->firstRow) as $rowIdx => $row) {
            $investiments[$rowIdx] = array();
            foreach ($row->getCellIterator() as $cell) {
                if (PHPExcel_Cell::columnIndexFromString($cell->getColumn()) == $this->dataIdx[0]) {
                    for ($i = 1; $i <= 12; $i++) {
                        $investiments[$rowIdx][$i] = new Investiment;
                        $investiments[$rowIdx][$i]->name = $cell->getValue();
                    }
                } else {
                    for ($i = 1; $i <= 12; $i++) {
                        if (PHPExcel_Cell::columnIndexFromString($cell->getColumn()) == $this->dataIdx[$i]) {
                            $investiments[$rowIdx][$i]->value = $cell->getValue();
                            break;
                        }
                    }
                }
            }
        }

        return $investiments;
    }
}
