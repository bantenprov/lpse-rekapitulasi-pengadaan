<?php namespace Bantenprov\RekapitulasiPengadaan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The RekapitulasiPengadaan facade.
 *
 * @package Bantenprov\RekapitulasiPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekapitulasiPengadaan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rekapitulasi-pengadaan';
    }
}
