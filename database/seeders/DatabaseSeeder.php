<?php

namespace Database\Seeders;

use App\Models\Search;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            [
                'date' => '2024-09-01',
                'money' => 50000,
                'note' => '292976.010924.013647.xin cam on',
            ],
            [
                'date' => '2024-09-01',
                'money' => 20000,
                'note' => 'VCB.CTDK.31/03/2024.ADIDA PHAT. CT tu 0481000755821 toi 0011001932418 MAT TRAN TO QUOC VN - BAN CUU TRO TW',
            ],
            [
                'date' => '2024-09-01',
                'money' => 29000,
                'note' => 'MBVCB.6916176124.CAO VIET TUAN chuyen tien.CT tu 0101001222009 CAO VIET TUAN toi 0011001932418 MAT TRAN TO QUOC VN - BAN CUU TRO TW',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '272986.010924.101858.DO DUC LOI chuyen tien',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '020097040509011046122024JDC5013867.96713 .104607.Vietcombank:0011001932418:DANG THI THANH MHS533583',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '529474.010924.112032.BUI VAN DAI chuyen tien',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '577301.010924.113215.DO DUC LOI MHS 4242',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '020097040509011137472024Y7ZE058213.33462 .113747.Vietcombank:0011001932418:NGUYEN THI VAN chuyen tien',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '761664.010924.121847.NGUYEN VAN TUAN chuyen tien',
            ],
            [
                'date' => '2024-09-01',
                'money' => 3000,
                'note' => '0200970405090112202020246WVI059470.3714 2.122015.Vietcombank:0011001932418:NGUYEN QUANG THO 010166',
            ],
            [
                'date' => '2024-09-01',
                'money' => 10000,
                'note' => 'PARTNER.DIRECT_DEBITS_VCB.ZLP.ZP6R 34H953F5.20240901.Nguyet chuyen tien quaZalopay',
            ],
            [
                'date' => '2024-09-01',
                'money' => 6000,
                'note' => '266303.010924.122804.NGUYEN THI MAO Chuyen tien',
            ],
        ];

        foreach ($data as $item) {
            Search::create($item);
        }
    }
}
