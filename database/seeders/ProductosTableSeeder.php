<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        $productos = array(
            array(
            'titulo'=> "Dolex gripa",
                 "precio" => "4500"),
                
                array('titulo'=> "Amoxicilina",
                  'precio'=> 3500),
                
                array(
               
                'titulo'=> "Trimebutina",
                 "precio" => 5000
            
                ),
                        
                array(
                
                'titulo'=> "Dolex",
                
                "precio"=> 2000
               
                ),
                
                array(
                
                'titulo'=> "Ibuprofeno",
                 
                "precio" =>3000
                
                ),
                
                array(
               
                'titulo'=> "Naproxeno",
                
                "precio"=> 6000
                
                ),
                
                array(
                
                'titulo'=> "Hidrocodona",
                 
                "precio"=> 4000
               
                ),
                
                array(
                
                'titulo'=> "Diclofenaco",
                 
                "precio"=> 8500
               
                ),
               
                
                
                array(
               
                'titulo'=> "Meloxican",
                 
                "precio"=> 5000
                
                ),
               
                
                array(
                
                'titulo'=> "Dolex gripa",
                
                "precio"=>2500
               
                ),
                
                
                array(
                
                'titulo'=> "Noraver",
                 
                "precio"=> 4000
                
                ),
                
                array(
               
                'titulo'=> "Agrifen",
                "precio"=> 3000
               
                ),
                
                array(
                
                'titulo'=> "Sudagrip",
                 
                "precio"=> 2500
                
                ),
                
                array(
                
                'titulo'=> "Mieltertos",
                
                "precio"=> 7000
               
                ),
                
                array(
                
                'titulo'=> "Noraver-gripa",
                 
                "precio"=> 4000
                
                ),
                
                
                array(
                
                'titulo'=> "Noraver-jarabe",
                 
                "precio" => 9000
               
                ),
                
                array(
                
                'titulo'=> "Condones Duo",
                 
                "precio"=> 8000
                
                ),
                
                array(
                
                'titulo'=> "Condones Durex",
                
                "precio"=> 10000
                
                ),
                
                array(
               
                'titulo'=> "Condones Durex",
                 
                "precio"=> 7000
                
                ),
                
                array(
                
                'titulo'=> "Test embarazo",
                
                "precio" => 15000
                
                ),
                
                array(
                
                'titulo'=> "test embarazo",
                 
                "precio"=> 12000
                
                ),
                
                
                array(
                
                'titulo'=> "Lubricante D",
                
                "precio"=> 15000
                
                ),
                
                array(
                
                'titulo'=> "Lubriderm R",
                
                "precio"=> 13000
                
                ),
                
                array(
                
                'titulo'=> "Lubriderm Mom",
                 
                "precio" => 10000
                
                ),
                
                
                array(
                
                'titulo'=> "Lubriderm S",
                 
                "precio"=> 9000
                
                ),
                
                array(
                
                'titulo'=> "Cerave",
                 
                "precio"=> 12000
                
                ),
                
                array(
                
                'titulo'=> "Facial 5",
                 
                "precio"=> 18000
                
                ),
                
                array(
               
                'titulo'=> "Colgate ",
                
                "precio"=> 8000
                
                ),
                
                array(
               
                'titulo'=> "Fortident",
                
                "precio"=> 7000
                
                ),
                
                array(
                
                'titulo'=> "Seda dental ",
                 
                "precio"=> 4000
                
                ),
                
                array(
              
                'titulo'=> "Shampoo 750ml ",
               
                "precio"=> 15000
                
                ),
                
                
                array(
               
                'titulo'=> "Shampoo 400ml",
                
                "precio"=> 10000
                
                ),
                
                array(
                
                'titulo'=> "Gillette x3",
                 
                "precio"=> 8000
                
                ),
                
                array(
               
                'titulo'=> "Copitos MK",
                
                "precio" => 4000
               
                ),
                
                array(
                
                'titulo'=> "Cepillo colgate ",
               
                "precio" => 5000
                
                ),
            ); 
        
        
            foreach ($productos as $producto) {
                DB::table('productos')->insert([
                    'titulo' => $producto['titulo'],
                    'precio' => $producto['precio'],
                ]);
            }
            
            } }
    
            ?>
