<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE TABLE facultet (
                id INT IDENTITY(1,1) PRIMARY KEY,
                name NVARCHAR(64) NOT NULL,
                name_dekan NVARCHAR(128) NOT NULL,
                classroom NVARCHAR(32) NOT NULL,
                frame INT NOT NULL,
                phone NVARCHAR(32) NOT NULL
            )
        ');
        DB::statement('
            CREATE TABLE department (
                id INT IDENTITY(1,1) PRIMARY KEY,
                name NVARCHAR(64) NOT NULL,
                name_manager NVARCHAR(128) NOT NULL,
                classroom NVARCHAR(32) NOT NULL,
                frame INT NOT NULL,
                phone NVARCHAR(32) NOT NULL,
                teachers INT NOT NULL,
                facultet_id INT NOT NULL,
                FOREIGN KEY (facultet_id) REFERENCES facultet(id) ON DELETE CASCADE
            )
        ');
        DB::statement('
            CREATE TABLE discipline (
                id INT IDENTITY(1,1) PRIMARY KEY,
                name NVARCHAR(64) NOT NULL,
                quantity INT NOT NULL,
                cycle INT NOT NULL
            )
        ');
        DB::statement('
            CREATE TABLE teacher (
                id INT IDENTITY(1,1) PRIMARY KEY,
                lastname NVARCHAR(64) NOT NULL,
                name NVARCHAR(64) NOT NULL,
                surname NVARCHAR(64) NOT NULL,
                department_id INT NOT NULL,
                birth INT NOT NULL,
                employment INT NOT NULL,
                experience INT NOT NULL,
                position NVARCHAR(64) NOT NULL,
                gender NVARCHAR(2) NOT NULL,
                city NVARCHAR(64) NOT NULL,
                FOREIGN KEY (department_id) REFERENCES department(id) ON DELETE CASCADE
            )
        ');
        DB::statement('
            CREATE TABLE workload (
                id INT IDENTITY(1,1) PRIMARY KEY,
                teacher_id INT NOT NULL,
                discipline_id INT NOT NULL,
                academic_year INT NOT NULL,
                semester INT NOT NULL,
                groups INT NOT NULL,
                students INT NOT NULL,
                control_type NVARCHAR(64) NOT NULL,
                FOREIGN KEY (teacher_id) REFERENCES teacher(id) ON DELETE CASCADE,
                FOREIGN KEY (discipline_id) REFERENCES discipline(id) ON DELETE CASCADE
            )
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS workload');
        DB::statement('DROP TABLE IF EXISTS teacher');
        DB::statement('DROP TABLE IF EXISTS discipline');
        DB::statement('DROP TABLE IF EXISTS department');
        DB::statement('DROP TABLE IF EXISTS facultet');
    }
};
