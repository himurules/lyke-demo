<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('email', '=', $row['useremail'])->first();
        if($user)
            return null;
        return new User([
            'firstName'     => $row['userfirstname'],
            'lastName'  => $row['usersurname'],
            'email'    => $row['useremail'],
        ]);
    }
}
