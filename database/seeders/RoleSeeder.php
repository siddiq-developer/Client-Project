    <?php



use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
   
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
    }
}
