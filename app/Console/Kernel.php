<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
		'App\Console\Commands\BackupDbToEmail',
		Commands\clearExpiredRegistration::class,		
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		// backup db ke email
		$schedule->command('backup_db_to_email')
				 ->dailyAt(env('JAM_BACKUP_DB'), '23:00');	

		$schedule->command('registration:clear')
				 ->dailyAt('23:00');		
		
		// $schedule->command('inspire')
		// 		 ->hourly();
	}

}
