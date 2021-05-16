<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('events')->truncate();

        $events = [];
        for ($i=1; $i <= 10; $i++) {
            $event = [
                'user_id' => '1',
                'name' => 'イベント' . $i,
                'detail' => '詳細' . $i,
            ];
            $events[] = $event;
        }

        foreach($events as $event) {
            Event::create($event);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Event::reguard();
    }
}
