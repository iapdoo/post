<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('author');
            $table->text('content');
            $table->string('image');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};


//
//
//create Laravel blog project  with auth, module Posts  with comments
//
//custom route: dashboard
//
//Posts [ id, title, author, content,image, date , soft delete ]
//comments [id, post_id, user_id, comment, date, soft delete]
//
//laravel bootstrap auth ui
//Post validation => title unique and only letters , image with image type [ png, jpg, webp ]
// and max size for upload 2M, content Minimum number of letters 20
//Comment Validation => user_id,post_id, comment Minimum
//
//
//image =>  return path with name (image_for_web)
//date  => custom format return
//* helper function for upload image  *
//
//Post insert and update with validation
//Post with soft delete
//delete comment with post
//404 custom page
