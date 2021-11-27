<?php

use App\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $arr=array("TRY","USD","EUR");
        for($i=0;$i<count($arr);$i++){
            Currency::create([
                "name"=>$arr[$i]
            ]);   
        }
         
    }
}
