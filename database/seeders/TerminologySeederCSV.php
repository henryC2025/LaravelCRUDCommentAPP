<?php

namespace Database\Seeders;

use App\Models\Terminology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminologySeederCSV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Terminology::truncate();

        $info = fopen(base_path("database/data/terminology.csv"), "r");
        
        $dataRow = true;

        while(($data = fgetcsv($info, 4000, ",")) !== FALSE){
            if(!$dataRow){
                Terminology::create([
                    'comment_id' => $data[0],
                    'comment_name' => $data[1],
                    'forename' => $data[2],
                    'surname' => $data[3],
                    'email' => $data[4],
                    'validated' => $data[5],
                    'style' => $data[6]
                ]);
            }
            $dataRow = false;
        }
        fclose($info);
    }
}
