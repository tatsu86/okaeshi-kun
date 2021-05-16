<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Celebrater;
use App\EventCelebrater;

class EventCelebraterSeeder extends Seeder
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

        foreach ($events as $event) {
            foreach ($celebraters as $celebrater) {
                $row = [
                    'event_id' => $event->id,
                    'celebrater_id' => $celebrater->id,
                ];

                EventCelebrater::create($row);
            }
        }

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Model::reguard();
    }
}
