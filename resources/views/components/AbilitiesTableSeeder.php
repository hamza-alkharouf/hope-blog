<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbilitiesTableSeeder extends Seeder
{
    protected $abilities =[
        'customers.view-any' => 'can view any customers',
        'customers.view' => 'can view customers',
        'customers.create' => 'can create customers',
        'customers.update' => 'can update customers',
        'customers.delete' => 'can destroy customers',
        'customers.restore' => 'can restore customers',
        'customers.force-delete' => 'can force-delete customers',
        'customers.trash' => 'can view trash customers',
        'advertisements.create' =>'can create advertisements',
        'advertisements.update' => 'can update advertisements',
        'advertisements.delete' =>'can destroy advertisements',
        'advertisements.restore' => 'can restore advertisements',
        'advertisements.force-delete' => 'can force-delete advertisements',
        'advertisements.view-any' => 'can view any advertisements',
        'advertisements.view' => 'can view advertisements',
        'advertisements.trash' => 'can view trash advertisements',
        'cities.create' => 'can create cities',
        'cities.update' => 'can update cities',
        'cities.delete' => 'can destroy cities',
        'cities.restore' => 'can restore cities',
        'cities.force-delete' => 'can force-delete cities',
        'cities.view-any' => 'can view any cities',
        'cities.view' => 'can view cities',
        'cities.trash' => 'can view trash cities',
        'universities.create' => 'can create universities',
        'universities.update' => 'can update universities',
        'universities.delete' => 'can destroy universities',
        'universities.restore' => 'can restore universities',
        'universities.force-delete' => 'can force-delete universities',
        'universities.view-any' => 'can view any universities',
        'universities.view' => 'can view universities',
        'universities.trash' => 'can view trash universities',
        'regions.create' => 'can create regions',
        'regions.update' => 'can update regions',
        'regions.delete' =>'can destroy regions',
        'regions.restore' =>'can restore regions',
        'regions.force-delete' => 'can force-delete regions',
        'regions.trash' => 'can trash regions',
        'regions.view-any' => 'can view any regions',
        'regions.view' => 'can view regions',
        'regions.trash' => 'can view trash regions',
        'panoramas.create' => 'can create panoramas',
        'panoramas.update' => 'can update panoramas',
        'panoramas.delete' => 'can destroy panoramas',
        'panoramas.restore' => 'can restore panoramas',
        'panoramas.force-delete' => 'can force-delete panoramas',
        'panoramas.view-any' => 'can view any panoramas',
        'panoramas.view' => 'can view panoramas',
        'panoramas.trash' => 'can view trash panoramas',
        'rooms.create' => 'can create rooms',
        'rooms.update' => 'can update rooms',
        'rooms.delete' =>'can destroy rooms',
        'rooms.restore' => 'can restore rooms',
        'rooms.force-delete' =>'can force-delete rooms',
        'rooms.view-any' => 'can view any rooms',
        'rooms.view' => 'can view rooms',
        'rooms.trash' => 'can view trash rooms',
        'plans.create' => 'can create plans',
        'plans.update' => 'can update plans',
        'plans.delete' => 'can destroy plans',
        'plans.restore' => 'can restore plans',
        'plans.force-delete' => 'can force-delete plans',
        'plans.view-any' => 'can view any plans',
        'plans.view' => 'can view plans',
        'plans.trash' => 'can view trash plans',
        'advertisements.show-maps' => 'can view show maps',
        'advertisements.show-earth' => 'can view show earth',
        'advertisements.ex-date' => 'can view ex date',
        'advertisements.all-advertisements' => 'can view all advertisements',
        'plans.show-plan' => 'can view show plan',
        'rooms.show-Room' => 'can view show Room',
        'advertisements.enrollment' => 'can view enrollments',
        'advertisements.is-enrollment' => 'can draft and Publish',

        'advertisements.is-enrollment' => 'can draft and Publish',
        'advertisements.is-enrollment' => 'can draft and Publish',

        
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->abilities as $code => $explain){
            DB::table('abilities')->insert([
                'code' => $code,
                'explain' => $explain
            ]);
        };

    }
}
