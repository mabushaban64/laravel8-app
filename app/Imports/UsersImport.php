<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel,WithHeadingRow,WithValidation
{

    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /* return new User([
            'fname'     => $row[0],
            'lname'     => $row[1],
            'phone'     => $row[2],
            'email'    => $row[3],
            'password' => Hash::make($row[4]),
            'birthday'    => $row[5],
            'gender'    => $row[6],
            'street_address'    => $row[7],
            'postal_code'    => $row[8],
            'city'    => $row[9],
            'state'    => $row[10],
            'country'    => $row[11],
        ]); */

        return new User([
            'fname'     => $row['first_name'],
            'lname'     => $row['last_name'],
            'phone'     => $row['phone'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
            'birthday'    => $row['date_of_birth'],
            'gender'    => $row['gender'],
            'street_address'    => $row['address'],
            'postal_code'    => $row['postal_code'],
            'city'    => $row['city'],
            'state'    => $row['state'],
            'country'    => $row['country'],
        ]);
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
        ];
    }

    public function customValidationAttributes()
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'phone' => 'phone',
            'email' => 'email',
            'date_of_birth' => 'Date of Birth',
            'gender' => 'Gender',
        ];
    }
}
