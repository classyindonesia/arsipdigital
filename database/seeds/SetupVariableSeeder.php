<?php  
use Illuminate\Database\Seeder;

use App\Models\SetupVariable;

class SetupVariableSeeder  extends Seeder { 

	public function run(){

		$v = SetupVariable::whereVariable('config_pencarian_frontend')->first();
		if(count($v)<=0) SetupVariable::create(['variable' => 'config_pencarian_frontend', 'value' => 1]);
		$this->command->info('config pencarian halaman depan telah ditambahkan!');


		$v = SetupVariable::whereVariable('config_password_frontend')->first();
		if(count($v)<=0) SetupVariable::create(['variable' => 'config_password_frontend', 'value' => 1]);
 		$this->command->info('config lupa password halaman depan telah ditambahkan!');


		$v = SetupVariable::whereVariable('config_login_frontend')->first();
		if(count($v)<=0) SetupVariable::create(['variable' => 'config_login_frontend', 'value' => 1]); //1=show,0=hide
 		$this->command->info('config login halaman depan telah ditambahkan!');

		$v = SetupVariable::whereVariable('config_nama_pencarian')->first();
		if(count($v)<=0) SetupVariable::create(['variable' => 'config_nama_pencarian', 'value' => 'pengguna']);  
 		$this->command->info('config nama pencarian telah ditambahkan!');


	}


}