<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str; // Import the Str class

class AddSlugToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title'); // Add slug column after title, nullable initially, and unique
        });

        // Generate slugs for existing jobs (Optional - Run only once)
        $jobs = \App\Models\Job::all();
        foreach ($jobs as $job) {
            $job->slug = Str::slug($job->title) . '-' . $job->id;
            $job->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}