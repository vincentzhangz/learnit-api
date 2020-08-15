<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        for($i =0; $i<50; $i++)
        DB::table('user')->insert([
            'user_id'=>uniqid(),
            'user_name'=>$faker->name,
            'user_email'=>$faker->email,
            'user_gender'=>$faker->randomElement(['male','female']),
            'user_image'=>null,
            'user_role'=>$faker->randomElement(['student','lecturer']),
            'user_password'=>password_hash($faker->password,PASSWORD_BCRYPT),
            'created_at'=>$time->format('Y-m-d H:i:s'),
            'api_token'=>Str::random(60)
        ]);

        DB::table('user')->insert([
            'user_id'=>uniqid(),
            'user_name'=>'Haku',
            'user_email'=>'sandikabala@gmail.com',
            'user_gender'=>$faker->randomElement(['male','female']),
            'user_image'=>null,
            'user_role'=>$faker->randomElement(['student','lecturer']),
            'user_password'=>password_hash('haku123',PASSWORD_BCRYPT),
            'created_at'=>$time->format('Y-m-d H:i:s'),
            'api_token'=>Str::random(60)
        ]);
    }
}
