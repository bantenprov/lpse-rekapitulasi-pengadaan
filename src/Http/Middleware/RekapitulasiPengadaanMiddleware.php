<?php namespace Bantenprov\RekapitulasiPengadaan\Http\Middleware;

use Closure;

/**
 * The RekapitulasiPengadaanMiddleware class.
 *
 * @package Bantenprov\RekapitulasiPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekapitulasiPengadaanMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
