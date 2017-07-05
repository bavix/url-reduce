<?php

namespace App\Accessor;

class CsvExporter extends \Encore\Admin\Grid\Exporters\CsvExporter
{

    /**
     * {@inheritdoc}
     */
    public function export()
    {
        $titles = [];

        $filename = $this->getTable() . '.csv';

        $data = $this->getData();

        if (!empty($data))
        {
            $columns = array_dot($this->sanitize($data[0]));

            $titles = array_keys($columns);
        }

        $output = implode(',', $titles) . "\n";

        foreach ($data as $_row)
        {
            $row = [];
            foreach ($titles as $title)
            {
                $row[$title] = array_get($_row, $title);
            }

            $output .= implode(',', array_dot($row)) . "\n";
        }

        $headers = [
            'Content-Encoding'    => 'UTF-8',
            'Content-Type'        => 'text/csv;charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        response(rtrim($output, "\n"), 200, $headers)->send();

        exit;
    }

}
