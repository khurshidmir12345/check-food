<?php

namespace Database\Seeders;

use App\Models\Sabzavotlar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SabzavotlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sabzavotlar::query()->insert([
            [
                'id' => 1,
                'name_uz' => 'Kartoshka',
                'name_ru' => 'Картошка'
            ],
            [
                'id' => 2,
                'name_uz' => 'Sabzi',
                'name_ru' => 'Морковь'
            ],
            [
                'id' => 3,
                'name_uz' => 'Piyoz',
                'name_ru' => 'Лук'
            ],
            [
                'id' => 4,
                'name_uz' => 'Pomidor',
                'name_ru' => 'Помидор'
            ],
            [
                'id' => 5,
                'name_uz' => 'Bodring',
                'name_ru' => 'Огурец'
            ],
            [
                'id' => 6,
                'name_uz' => 'Baqlajon',
                'name_ru' => 'Баклажан'
            ],
            [
                'id' => 7,
                'name_uz' => 'Bulg\'or qalampiri',
                'name_ru' => 'Болгарский'
            ],
            [
                'id' => 8,
                'name_uz' => 'Chesnok',
                'name_ru' => 'Чеснок'
            ],
            [
                'id' => 9,
                'name_uz' => 'Karam',
                'name_ru' => 'Капуста'
            ],
            [
                'id' => 10,
                'name_uz' => 'Qizilcha',
                'name_ru' => 'Свёкла'
            ],
            [
                'id' => 11,
                'name_uz' => 'Sholg\'om',
                'name_ru' => 'Репка'
            ],
            [
                'id' => 12,
                'name_uz' => 'Guruch',
                'name_ru' => 'Рис'
            ],
            [
                'id' => 13,
                'name_uz' => 'Makaron',
                'name_ru' => 'Макароны'
            ],
            [
                'id' => 14,
                'name_uz' => 'Mosh',
                'name_ru' => 'Мош'
            ],
            [
                'id' => 15,
                'name_uz' => 'Loviya',
                'name_ru' => 'Бобы'
            ],
            [
                'id' => 16,
                'name_uz' => 'Grechka',
                'name_ru' => 'Гречка'
            ],
            [
                'id' => 17,
                'name_uz' => 'Noxat',
                'name_ru' => 'Горох'
            ],
            [
                'id' => 18,
                'name_uz' => 'Makka jo\'xori',
                'name_ru' => 'кукуруза'
            ],
            [
                'id' => 19,
                'name_uz' => 'Afsyanka',
                'name_ru' => 'Овсянка'
            ],
            [
                'id' => 20,
                'name_uz' => 'Go\'sht',
                'name_ru' => 'Мясо'
            ],
            [
                'id' => 21,
                'name_uz' => 'Tuxum',
                'name_ru' => 'Яйцо'
            ],
        ]);
    }
}
