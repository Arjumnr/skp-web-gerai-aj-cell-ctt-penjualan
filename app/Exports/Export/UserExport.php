<?php

namespace App\Exports\Export;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch and return the user data
        return User::all();
    }

    public function headings(): array
    {
        // Define the column headings
        return [
            'ID',
            'Name',
            'Email',
            // Add more columns as needed
        ];
    }

    public function map($user): array
    {
        // Map the user data to the corresponding columns
        return [
            $user->id,
            $user->username,
            $user->password,
            // Map other columns as needed
        ];
    }
}
