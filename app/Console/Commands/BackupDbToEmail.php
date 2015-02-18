<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Ifsnop\Mysqldump as IMysqldump;
use Mail, Fungsi;
class BackupDbToEmail extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'backup_db_to_email';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'dump database dan mengirimnya ke email.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		try {
			$dbuser = env('DB_USERNAME');
			$dbpassword = env('DB_PASSWORD');
			$dbname = env('DB_DATABASE');
			$dbhost = env('DB_HOST');			
		    $dump = new IMysqldump\Mysqldump($dbname, $dbuser, $dbpassword, $dbhost, 'mysql', ['compress' => 'Gzip']);
		    $path = storage_path('framework/cache/backup_db_'.date('Y-m-d').'.sql.gz');
		    $dump->start($path);
		    $this->info('Sukses Backup DB!');
		} catch (\Exception $e) {
		    $this->error('Import failed with message : ' . $e->getMessage());
		}



 		$this->info('sending files to your email backup...');

			Mail::send('emails.backup_database', array('key' => 'value'), function($message){
 			    $message->to(env('EMAIL_BACKUP_DB'))
			    ->subject('Backup Database '.env('NAMA_APP').', '.Fungsi::date_to_tgl(date('Y-m-d')) );
			    $message->attach(storage_path('framework/cache/backup_db_'.date('Y-m-d').'.sql.gz'));
			});

			$file_db1 = storage_path('framework/cache/backup_db_'.date('Y-m-d').'.sql.gz');
			if(file_exists($file_db1)){
				unlink($file_db1);
			}
 
			$this->info('done!');




	}

 
}
