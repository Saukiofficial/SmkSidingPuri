    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('osis_members', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('position'); // e.g., Ketua OSIS, Sekretaris, Bendahara
                $table->string('photo_path');
                $table->integer('display_order')->default(0);
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('osis_members');
        }
    };
