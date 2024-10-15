    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('accounts', function (Blueprint $table) {
                $table->id();
                $table->string('email')->nullable();
                $table->string('phone_number')->unique();
                $table->string('full_name');
                $table->string('password');
                $table->string('address')->nullable();
                $table->date('dob')->nullable();
                $table->text('avatar')->default('https://scontent.fhan2-4.fna.fbcdn.net/v/t1.30497-1/453178253_471506465671661_2781666950760530985_n.png?stp=dst-png_s200x200&_nc_cat=1&ccb=1-7&_nc_sid=136b72&_nc_ohc=jZ-PuitTc3oQ7kNvgFPXrh8&_nc_ht=scontent.fhan2-4.fna&_nc_gid=A93kOtNb8x-2_b_4Y6Z_VDF&oh=00_AYCYBL1sdj57w_eiR8h2stcBub-AlQi8eaeRU3fQrifK0Q&oe=6724973A');
                $table->foreignId('role_id')->constrained('roles');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('accounts');
        }
    };
