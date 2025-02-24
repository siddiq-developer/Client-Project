<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0;$i<10;$i++){

            $faker = Faker::create();
            $user = new User();
            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->status = '1';
            $user->password = bcrypt('123456789');
            $user->save();
            $user->assignRole(3);
            
       } 

    }
}
