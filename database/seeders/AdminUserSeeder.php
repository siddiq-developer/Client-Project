<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $superAdmin = Role::create([
            'name' => 'Super Admin'
        ]);

         $employee = Role::create([
            'name' => 'Employee'
        ]);
        
        $member = Role::create([
            'name' => 'Member'
        ]);         

        $user->assignRole($superAdmin->id);

       

    }
}