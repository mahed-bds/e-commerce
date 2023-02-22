<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $categories = Category::latest()->get();
        return $categories;
    }
}
