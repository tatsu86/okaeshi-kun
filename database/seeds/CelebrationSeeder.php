<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Celebrater;
use App\Celebration;

class CelebrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Event::unguard();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $events = Event::withoutGlobalScopes()->get();
        $celebraters = Celebrater::withoutGlobalScopes()->get();

        $i = 1;
        foreach ($events as $event) {
            foreach ($celebraters as $celebrater) {
                $row = [
                    'event_id' => $event->id,
                    'celebrater_id' => $celebrater->id,
                    'memo' => 'メモ' . $i,
                ];

                Celebration::create($row);

                $i += 1;
            }
        }

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Model::reguard();
    }
}
