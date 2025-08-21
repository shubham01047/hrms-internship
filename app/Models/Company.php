<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company_profile";
    protected $fillable = ['company_name', 'company_description', 'company_logo','navbar_color','sidebar_color','primary_color','test_color','footer_color', 'system_title','timings'];
}
