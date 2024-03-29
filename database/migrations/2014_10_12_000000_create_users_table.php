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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default(0)->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('debtors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('total_debts')->default(0)->nullable();
            $table->string('total_payments')->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->string('id_product')->primary();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->decimal('priceP', 10, 2);
            $table->decimal('priceS', 10, 2);
            $table->integer('qty');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('debtors_id')->nullable();
            $table->string('user_auth');
            $table->string('slip_id');
            $table->decimal('total_price', 10, 2);
            $table->string('type_sale');
            $table->string('type');
            $table->string('amount');
            $table->string('change');
            $table->longtext('listall');
            $table->string('listcount');
            $table->string('listprice');
            $table->timestamps();
            $table->foreign('debtors_id')->references('id')->on('debtors')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->string('product_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
        });

   

       Schema::create('debts', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('debtor_id');
           $table->string('description');
           $table->decimal('amount', 10, 2);
           $table->date('due_date');
           $table->timestamps();
           $table->foreign('debtor_id')->references('id')->on('debtors')->onDelete('cascade');
       });

       Schema::create('payments', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('debt_id');
           $table->decimal('amount', 10, 2);
           $table->timestamps();
           $table->foreign('debt_id')->references('id')->on('debtors')->onDelete('cascade');
       });

       Schema::create('refunds', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('key_slug');
        $table->decimal('priceP', 10, 2);
        $table->decimal('priceS', 10, 2);
        $table->integer('qty');
        $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('collections');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('debts');
        Schema::dropIfExists('debtors');
        Schema::dropIfExists('refunds');
    }
};
