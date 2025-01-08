<?php

namespace App\Imports;

use App\Models\Form;
use App\Models\Period;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserDataImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $active_period = Period::where('status', 'active')->first();
        $admin = User::where('role', 'superadmin')->first();

        if (empty($row[1])) {
            return null;  // Skipping the record, or you can log an error.
        }


        // Buat atau cari user berdasarkan nama
        $user = User::firstOrCreate(
            ['name' => $row[1]],
        );

        // Buat form baru terkait user
        Form::create([
            'user_id' => $user->id,
            'nip' => str_replace(' ', '', $row[2]),
            'new_member_number' => generate_new_member_number(),
            'period_id' => $active_period->id,
            'status' => 'approved',
            'updated_by' => $admin->id,
        ]);

        // Kembalikan model User untuk memenuhi kontrak ToModel
        return $user;
    }
}
