<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('fname','lname','phone','email','birthday','gender','postal_code','street_address','city','state','country')->where('is_admin',0)->get();
    }

    public function headings(): array
    {

        $array = [
            'First name',
            'Last name',
            'Phone',
            'Email',
            'Date of Birth',
            'Gender',
            'Postal code',
            'Address',
            'City',
            'State',
            'Country',
        ];
        return $array;
    }
}
