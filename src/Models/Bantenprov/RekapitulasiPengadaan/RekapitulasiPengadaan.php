<?php

namespace Bantenprov\RekapitulasiPengadaan\Models\Bantenprov\RekapitulasiPengadaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekapitulasiPengadaan extends Model
{

    protected $table = 'lpse_rekapitulasi_pengadaans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\RekapitulasiPengadaan\Models\Bantenprov\RekapitulasiPengadaan\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\RekapitulasiPengadaan\Models\Bantenprov\RekapitulasiPengadaan\Regency','id','regency_id');
    }

}

