<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintSeeder extends Seeder
{
    public function run(): void
    {
        Complaint::create([
            'user_id'    => 1,
            'company_id' => 1,
            'title'      => 'Maaşım eksik yatırıldı',
            'description'=> 'Ağustos ayında tam mesai yaptım ancak maaşım eksik yatırıldı.',
            'status'     => 'pending', // Enum ise uygun değeri gir
        ]);
    }
}
