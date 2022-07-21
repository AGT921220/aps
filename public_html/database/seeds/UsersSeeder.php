<?php
use App\User;
use App\Domicilio;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i <= 100 ; $i++) { 
            $user = new User();
            $user->name ='Name'.$i;
            $user->email='email'.$i.'@test.com';
            $user->password =Hash::make('Password_capi_'.$i);
            $user->fecha_nacimiento=Carbon::today()->subDays(rand(0, 10000));
            $user->save();


            $domicilio = new Domicilio();
            $domicilio->user_id =$i;
            $domicilio->domicilio='Calle '.$i;
            $domicilio->numero_exterior =$i;
            $domicilio->cp ='310'.$i;
            $domicilio->ciudad='Chihuahua';
            $domicilio->save();


        }


    }
}
