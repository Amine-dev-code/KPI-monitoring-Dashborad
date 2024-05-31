<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $fillable=[
        'host',
        'port',
        'databasename',
        'username',
        'password',
        'unitename',
        'currency'
        
    ];
    public function kpi_glob(){
        return $this->hasOne(Kpiglob::class,'unite_id');
    }
    public function kpi_fin(){
        return $this->hasOne(Kpifin::class,'unite_id');
    }
    
    
    public static function checkExist( $databasename,$unitename)
    {
        return self::where('databasename', $databasename)
                    ->Orwhere('unitename',$unitename)
                    ->exists();
    }
    public static function searchupdate($databasename, $unitename, $id)
{
    return self::where('id', '!=', $id)
                ->where(function ($query) use ($databasename, $unitename) {
                    $query->where('databasename', $databasename)
                          ->orWhere('unitename', $unitename);
                })
                ->exists();
}
}
