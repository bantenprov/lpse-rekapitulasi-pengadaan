<?php namespace Bantenprov\RekapitulasiPengadaan\Console\Commands;

use Illuminate\Console\Command;

/**
 * The RekapitulasiPengadaanCommand class.
 *
 * @package Bantenprov\RekapitulasiPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekapitulasiPengadaanCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:rekapitulasi-pengadaan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\RekapitulasiPengadaan package';

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
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\RekapitulasiPengadaan package');
    }
}
