<?php

namespace App\Console\Commands;

use App\Models\Pesan;
use App\Models\Matkulganti;
use App\Models\ArchivedPesan;
use App\Models\ArchivedMatkulganti;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ArchiveOldBookings extends Command
{
    protected $signature = 'dlm:archive-bookings';
    protected $description = 'Archives all transactions (pesan & matkulganti) that occurred before the current week.';

    public function handle()
    {
        // 1. Definisikan Cutoff Date: Hari Minggu ini (00:00:00)
        // Kita targetkan SEMUA data yang ada, karena hari Minggu tidak ada perkuliahan.
        // Cukup ambil semua yang ada di tabel aktif.
        $archivedAt = Carbon::now();
        $this->info("Starting DLM Archiving process at: {$archivedAt->toDateTimeString()}");

        // Proses Tabel Pesan
        $this->archiveAndDelete(Pesan::all(), ArchivedPesan::class, 'Pesan', $archivedAt);

        // Proses Tabel Matkulganti
        $this->archiveAndDelete(Matkulganti::all(), ArchivedMatkulganti::class, 'Matkulganti', $archivedAt);

        $this->info("DLM Archiving completed successfully.");
        return 0;
    }

    protected function archiveAndDelete($activeRecords, $archiveModelClass, $name, $archivedAt)
    {
        $count = $activeRecords->count();
        if ($count === 0) {
            $this->warn("No {$name} records found to archive.");
            return;
        }
        
        $this->info("Found {$count} {$name} records for archiving.");
        $successCount = 0;

        // Menggunakan transaksi database untuk memastikan operasi Copy dan Delete atomic
        DB::transaction(function () use ($activeRecords, $archiveModelClass,$name, &$successCount, $archivedAt) {
            foreach ($activeRecords as $record) {
                try {
                    // Salin semua atribut, termasuk created_at & updated_at
                    $archivedData = $record->toArray();
                    
                    // Tambahkan kolom penanda waktu DLM
                    $archivedData['archived_at'] = $archivedAt;

                    // Buat record baru di tabel arsip
                    $archiveModelClass::create($archivedData);

                    // Hapus dari tabel aktif
                    $record->delete();

                    $successCount++;
                } catch (\Exception $e) {
                    $this->error("Failed to archive {$name} ID: {$record->id}. Error: {$e->getMessage()}");
                    // Log the error and potentially re-throw if critical
                }
            }
        });

        $this->info("Successfully archived and deleted {$successCount} records from {$name}.");
    }
}