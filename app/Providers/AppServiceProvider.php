<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Console\Commands\ArchiveOldBookings; // <-- HARUS PAKAI NAMESPACE INI
use App\Console\Commands\DeleteArchivedData; // <-- DAN NAMESPACE INI

class AppServiceProvider extends ServiceProvider
{
    protected $commands = [
        ArchiveOldBookings::class,
        DeleteArchivedData::class,
        // Tambahkan command users (dlm:archive-users) di sini jika sudah dibuat
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // 2. Jika aplikasi berjalan di konsol (CLI/Artisan), daftarkan commands
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
            Carbon::setLocale('id');
        
        
    }
}
