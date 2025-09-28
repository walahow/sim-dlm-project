<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    public function up()
    {
        Schema::create('gedung', function (Blueprint $table) {
            $table->id();
            $table->string('nomorgedung');
            $table->integer('jumlahkelas');
            $table->string('lokasi');
            $table->string('Pengurusgedung');
            $table->char('lantai', 2);
            $table->timestamps();
        });

        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gedung_id')->constrained('gedung')->onDelete('cascade');
            $table->string('nomorkelas');
            $table->integer('kapasitas');
            $table->enum('status', ['tersedia', 'dibooking', 'dipakai'])->default('tersedia');
            $table->string('ac');
            $table->string('kipas');
            $table->string('lampu');
            $table->text('keterangan')->nullable();
            $table->string('foto')->default('path/to/default/siluet.jpg'); 
            $table->timestamps();
        });

        Schema::create('matkul', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->string('matakuliah');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']);
            $table->time('jammulai');
            $table->time('jamakhir');
            $table->string('dosen');
            $table->enum('status', ['sesuai', 'dilaksanakan', 'dibatalkan'])->default('sesuai');
            $table->timestamps();
        });

        Schema::create('matkulganti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matkul_id')->constrained('matkul')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->date('tanggalganti');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']);
            $table->time('jammulai');
            $table->time('jamakhir');
            $table->enum('status', ['dibooking', 'dilaksanakan', 'selesai'])->default('dibooking');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->bigInteger('no_telp');
            $table->string('password');
            $table->string('user_class');
            $table->string('foto')->default('default_siluet.png');  
            $table->enum('role',['0','1'])->default('0');
            $table->timestamps();
        });

        Schema::create('pesan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggalpesan');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']);
            $table->time('jammulai');
            $table->time('jamakhir');
            $table->string('kegiatan');
            $table->enum('status', ['dibooking', 'dilaksanakan', 'selesai'])->default('dibooking');
            $table->timestamps();
        });

        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesan_id')->constrained('pesan')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->date('tanggalpg');
            $table->time('jammulai');
            $table->time('jamakhir');
            $table->enum('status', ['tersedia', 'dibooking', 'dipakai']);
            $table->string('matakuliah');
            $table->timestamps();
        });

        Schema::create('warnastatus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->enum('status', ['hijau', 'kuning', 'merah']);
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warnastatus');
        Schema::dropIfExists('users');
        Schema::dropIfExists('history');
        Schema::dropIfExists('pesan');
        Schema::dropIfExists('matkulganti');
        Schema::dropIfExists('matkul');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('gedung');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}
