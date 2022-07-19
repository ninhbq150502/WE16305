<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            //tạo các cột trong db
            $table->string('name');
            $table->string('address')->nullable(); //có thể ko điền địa chỉ
            $table->date('time_start'); 
            $table->string('email');
            $table->string('password');
            // Thêm 1 dòng mới vào db 
            // -> sử dụng lệnh php artisan migrate:rollback để xóa trắng dữ liệu
            // Sử dụng lại lệnh php artisan migrate để lưu dữ liệu mới
            $table->integer('status')->default(1); //đặt giá trị mặc định cho status là 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
