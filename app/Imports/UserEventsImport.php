<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserEvents;
use DateTime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserEventsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('email', '=', $row['useremail'])->first();
        if(!$user)
            return null;
        return new UserEvents([
            'user_id'     => $user->id,
            'event_date'  => DateTime::createFromFormat('d/n/y G:i', trim($row['eventdate']))->format('Y-m-d H:i:s'),
            'event_type'    => $row['eventtype'],
            'event_message'    => $row['eventmessage'],
        ]);
    }
}
