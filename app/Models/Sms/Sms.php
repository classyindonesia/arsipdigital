<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{

    protected $fillable = ['kode_pendaftaran', 'no_hp', 'pesan', 'statusKirim'];
    protected $connection = 'sms';
    public $timestamps = false;
 	public $table = 'pmb_sms_aktivasi';

}
