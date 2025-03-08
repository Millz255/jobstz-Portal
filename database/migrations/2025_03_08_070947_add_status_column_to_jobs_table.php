<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class AddStatusColumnToJobsTable extends Migration
  {
      public function up()
      {
          Schema::table('jobs', function (Blueprint $table) {
              $table->string('status')->nullable()->after('deadline'); // Example: Add status after deadline, can be adjusted
          });
      }

      public function down()
      {
          Schema::table('jobs', function (Blueprint $table) {
              $table->dropColumn('status');
          });
      }
  }