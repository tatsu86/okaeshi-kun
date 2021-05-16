<?php

use Illuminate\Database\Seeder;
use App\Celebrater;

class CelebraterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Celebrater::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('celebraters')->truncate();

        $celebraters = [];
        for ($i=1; $i <= 10; $i++) {
            $celebrater = [
                'user_id' => '1',
                'name' => 'ユーザー' . $i,
                'gender' => '男性',
                'memo' => 'メモ' . $i,
            ];
            $celebraters[] = $celebrater;
        }

        foreach($celebraters as $celebrater) {
            Celebrater::create($celebrater);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Celebrater::reguard();
    }
}
