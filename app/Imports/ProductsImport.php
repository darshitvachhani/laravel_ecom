<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'user_id' => $row[1],
            'category_id' => $row[2],
            'description' => $row[3],
            'image' => 'image_name',
            'status' => $row[5],
        ]);

    }
}
