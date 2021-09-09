<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komputer extends Model
{
    use HasFactory;
    protected $fillable =['user_id','ip_komp','host_name','mac_address','os_version','model_build','processor_type','dept_name'
    ];
}
