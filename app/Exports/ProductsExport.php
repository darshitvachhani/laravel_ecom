<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, WithHeadings , WithMapping , WithColumnWidths , WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $product=Product::all();
        return $product;
    }


    public function map($product): array
    {
        $index=0;
        return [
            $product->id,
            ucfirst($product->name),
            ucfirst($product->user->firstname),
            ucfirst($product->category->name),
            ucfirst($product->description),
            ucfirst($product->status_value()),
            $product->date_formatting(),
        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Seller',
            'Category',
            'Description',
            'Status',
            'Created At',
        ];
    }
}
