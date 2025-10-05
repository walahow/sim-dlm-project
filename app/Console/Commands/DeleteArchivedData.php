<?php

namespace App\Console\Commands;

use App\Models\ArchivedPesan;
use App\Models\ArchivedMatkulGanti;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteArchivedData extends Command
{
    protected $signature = 'dlm:delete-archived';
    protected $description = 'Deletes records from archive tables older than 1 Semester + 30 days.';

    public function handle()
    {
        // 1 Semester (180 hari) + Grace Period (30 hari) = 210 hari
        $days = 210; 
        $cutoffDate = Carbon::now()->subDays($days);
        $this->info("Deleting records older than: {$cutoffDate} ({$days} days old).");

        $this->deleteRecords(ArchivedPesan::class, 'Pesan', $cutoffDate);
        $this->deleteRecords(ArchivedMatkulGanti::class, 'MatkulGanti', $cutoffDate);

        return 0;
    }

    protected function deleteRecords($archiveModelClass, $name, $cutoffDate)
    {
        // Hapus data yang archived_at-nya lebih lama dari cutoffDate
        $deletedCount = $archiveModelClass::where('archived_at', '<', $cutoffDate)->delete();

        if ($deletedCount > 0) {
            $this->info("Successfully deleted {$deletedCount} records from archived {$name}.");
        } else {
            $this->warn("No records to delete from archived {$name}.");
        }
    }
}