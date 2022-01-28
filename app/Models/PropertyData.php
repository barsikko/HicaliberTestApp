<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertyData extends Model implements ToModel, WithHeadingRow
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];

    public function model(array $row)
    {
        return new self([
           'name'     => $row['name'],
           'price'    => $row['price'],
           'bedrooms' => $row['bedrooms'],
           'bathrooms' => $row['bathrooms'],
           'storeys' => $row['storeys'],
           'garages' => $row['garages']
        ]);
    }
}
