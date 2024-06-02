<?php

namespace Database\Seeders;
/*
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DorsalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('dorsals')->insert([
            'id_corredor' => 1,
            'id_carrera' => 1,
            'id_seguro' => 1,
            'qr' => 'qr_code_a.png',
            'dorsal' => 'D001',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 2,
            'id_carrera' => 1,
            'id_seguro' => 2,
            'qr' => 'qr_code_b.png',
            'dorsal' => 'D002',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 3,
            'id_carrera' => 2,
            'id_seguro' => 1,
            'qr' => 'qr_code_c.png',
            'dorsal' => 'D003',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 4,
            'id_carrera' => 2,
            'id_seguro' => 3,
            'qr' => 'qr_code_d.png',
            'dorsal' => 'D004',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Corredor con nombre "Sergi Alonso Alomar" y DNI "12345678S"
        DB::table('dorsals')->insert([
            'id_corredor' => 5,
            'id_carrera' => 3,
            'id_seguro' => 2,
            'qr' => 'qr_code_e.png',
            'dorsal' => 'D005',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Corredor con nombre "Toni Rubio" y DNI "12345678T"
        DB::table('dorsals')->insert([
            'id_corredor' => 6,
            'id_carrera' => 3,
            'id_seguro' => 2,
            'qr' => 'qr_code_f.png',
            'dorsal' => 'D006',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 1,
            'id_carrera' => 2,
            'id_seguro' => 3,
            'qr' => 'qr_code_g.png',
            'dorsal' => 'D007',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 2,
            'id_carrera' => 2,
            'id_seguro' => 3,
            'qr' => 'qr_code_h.png',
            'dorsal' => 'D008',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 3,
            'id_carrera' => 3,
            'id_seguro' => 1,
            'qr' => 'qr_code_i.png',
            'dorsal' => 'D009',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dorsals')->insert([
            'id_corredor' => 4,
            'id_carrera' => 4,
            'id_seguro' => 1,
            'qr' => 'qr_code_j.png',
            'dorsal' => 'D010',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
*/

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;


class DorsalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dorsals = [
            ['id_corredor' => 1, 'id_carrera' => 1, 'id_seguro' => 1],
            ['id_corredor' => 2, 'id_carrera' => 1, 'id_seguro' => 2],
            ['id_corredor' => 3, 'id_carrera' => 2, 'id_seguro' => 1],
            ['id_corredor' => 4, 'id_carrera' => 2, 'id_seguro' => 3],
            ['id_corredor' => 5, 'id_carrera' => 3, 'id_seguro' => 2],
            ['id_corredor' => 6, 'id_carrera' => 3, 'id_seguro' => 2],
            ['id_corredor' => 1, 'id_carrera' => 2, 'id_seguro' => 3],
            ['id_corredor' => 2, 'id_carrera' => 2, 'id_seguro' => 3],
            ['id_corredor' => 3, 'id_carrera' => 3, 'id_seguro' => 1],
            ['id_corredor' => 4, 'id_carrera' => 4, 'id_seguro' => 1],
        ];


        foreach ($dorsals as $key => $dorsalData) {
            // Generar el contenido del código QR con una URL
            $qrContent = url('read-qr/' . ($key + 1).'.png');


            // Crear una instancia de QRCode
            $qrCode = QrCode::create($qrContent)
                ->setEncoding(new Encoding('UTF-8'));


            // Generar el nombre del archivo QR
            $qrFileName = ($key + 1) . '.png';
            $qrFilePath = public_path('qr_codes/' . $qrFileName);


            // Crear el directorio si no existe
            if (!file_exists(public_path('qr_codes'))) {
                mkdir(public_path('qr_codes'), 0755, true);
            }


            // Guardar la imagen del código QR
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $result->saveToFile($qrFilePath);


            // Insertar el dorsal en la base de datos
            DB::table('dorsals')->insert([
                'id_corredor' => $dorsalData['id_corredor'],
                'id_carrera' => $dorsalData['id_carrera'],
                'id_seguro' => $dorsalData['id_seguro'],
                'qr' => $qrFileName,
                'dorsal' => 'D' . sprintf('%03d', $key + 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}






