<?php

namespace Database\Seeders;

use App\Models\Taomlar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaomlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $osh = Taomlar::create([
            'id' => 1,
            'name_uz' => 'Osh',
            'name_ru' => 'Osh_ru',
            'instructions' => 'Osh qiling bir mazza qilib osh yeyishsin.'
        ]);

        $shorva = Taomlar::create([
            'id' => 2,
            'name_uz' => 'Sho\'rva',
            'name_ru' => 'Sho\'rva_ru',
            'instructions' => 'Sho\'rva qiling . Vitaminlarga boy qilib.'

        ]);

        $mastava = Taomlar::create([
            'id' => 3,
            'name_uz' => 'Mastava',
            'name_ru' => 'Mastava_ru',
            'instructions' => 'Mastava qiling. Mastava ichishmaganigaham ancha bo\'lgandur.'

        ]);

        $shavla = Taomlar::create([
            'id' => 4,
            'name_uz' => 'Shavla',
            'name_ru' => 'Mastava_ru',
            'instructions' => 'Shavla qiling . Bu ovqatni unutibham qo\'yishgandur.'

        ]);

        $makaron_suyuq = Taomlar::create([
            'id' => 5,
            'name_uz' => 'Suyuq Makaron',
            'name_ru' => 'Mastava_ru',
            'instructions' => 'Suyuq makaron qiling. har kuni bayram bo\'lsin uyda.'

        ]);

        $makaron_qoyiq = Taomlar::create([
            'id' => 6,
            'name_uz' => 'Makaron palov',
            'name_ru' => 'Mastava_ru',
            'instructions' => 'Makaron palov qiling. Maza qilib yeyishsin qo\'lizdan.'

        ]);

        $mosh_suyuq = Taomlar::create([
            'id' => 7,
            'name_uz' => 'Moshxo\'rda',
            'name_ru' => 'Mastava_ru',
            'instructions' => 'Bu taomni qilgandan keyin uydagilarga bu haqida aytib bering balkiy ular bilmas :) yoki eslarida emasdur'

        ]);

        $mosh_qoyiq = Taomlar::create([
            'id' => 8,
            'name_uz' => 'Moshkichri',
            'name_ru' => 'Mastava_ru',
            'instructions' => 'Moshkichri qiling . qo\'lizdan bir bu taomni yeb sizga muhabbatlari oshib ketsin uydagilarni.'

        ]);

        $osh->sabzavotlar()->sync([20,12,2,3,8]);
        $shorva->sabzavotlar()->sync([20,1,2,3,4,9,8,11]);
        $mastava->sabzavotlar()->sync([20,1,2,3,4,7,20,8,12]);
        $shavla->sabzavotlar()->sync([20,12,2,3]);
        $makaron_suyuq->sabzavotlar()->sync([20,14,1,2,3]);
        $makaron_qoyiq->sabzavotlar()->sync([20,1,2,3,8,12]);
        $mosh_suyuq->sabzavotlar()->sync([20,14,1,2,3,4,7,8]);
        $mosh_qoyiq->sabzavotlar()->sync([20,14,1,2,3,8]);
    }
}
