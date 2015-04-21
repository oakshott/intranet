<?php



use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder{

    public function run()
    {

        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Mike.');
        }

        DB::table('users')->delete();

        User::create([
                'id' => 1,
                'firstName' => 'Michael',
                'lastName' => 'Oakshott',
                'department' => 'Network',
                'isLineManager' => '1',
                'isAdmin' => '1',
                'isCourseAdmin' =>'1',
                'email' => 'moakshott@beauchamps.essex.sch.uk',
                'password' => bcrypt('bernard')
        ]);

        User::create([
                'id' => 2,
                'firstName' => 'Course',
                'lastName' => 'Admin',
                'department' => 'Admin',
                'isLineManager' => '1',
                'isAdmin' => '1',
                'isCourseAdmin' =>'1',
                'email' => 'administrator@beauchamps.essex.sch.uk',
                'password' => bcrypt('brother')
        ]);

    }

}