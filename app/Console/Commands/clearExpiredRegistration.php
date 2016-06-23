<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Repo\Contracts\Mst\UserRegistrationRepoInterface;

class clearExpiredRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registration:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'menghapus semua registrasi yg tidak terpakai';


    protected $user_registration;

    public function __construct(UserRegistrationRepoInterface $user_registration)
    {
        $this->user_registration = $user_registration;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filter = ['expired' => date('Y-m-d')];
        $q = $this->user_registration->all($perPage = null, $filter);
        foreach($q as $list){
            $list->delete();
        }
    }
}
