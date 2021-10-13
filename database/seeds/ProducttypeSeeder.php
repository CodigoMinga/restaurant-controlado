<?php

use Illuminate\Database\Seeder;
use App\Producttype;
use App\Product;

class ProducttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CATEGORIAS DELIXUS
        $producttype = Producttype::create(['name'=>'Para Comenzar','company_id'=>2]);
            $products = [
                ['Gyosas de pollo (5 unidades)','',3200],
                ['Gyosas de cerdo (5 unidades)','',3200],
                ['Gyosas de camaron (5 unidades)','',3500],
                ['Gyosas de verduras (5 unidades)','',3200],
                ['Camarones apanados (5 unidades)','',4500],
                ['Camarones con queso (5 unidades)','',4800],
                ['Tory balls  (5 unidades)','',4800],
                ['Sashimi sake (4 cortes)','',4800],
                ['Sashimi taki (4 cortes)','',4800],
                ['Yaki torys (2 brochetas)','',3700],
                ['Leche de tigre','',6000]                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Californias Sesamo','company_id'=>2]);
            $products = [
                ['California salumado (Sésamo)','Salmon ahumado, queso crema, palta, envuelto en Sésamo',4500],
                ['Tempura chesse rolls (Sésamo)','Camaron tempura, queso crema, palta, envuelto en Sésamo',4500],
                ['Tory rolls (Sésamo)','Pollo apanados, queso crema, palta, envuelto en Sésamo',4200],
                ['Maki rolls (Sésamo)','Kanikama, queso crema, palta, envuelto en Sésamo',4000],
                ['Tako rolls (Sésamo)','Pulpo, queso crema, palta, envuelto en Sésamo',4500],
                ['Crab cheese rolls (Sésamo)','Jaiba, queso crema, palta, envuelto en Sésamo',5000],
                ['Teri cheese rolls (Sésamo)','Pollo teriyaki, queso crema, palta, envuelto en Sésamo',4000],
                ['Ebi rolls (Sésamo)','Camaron, queso crema, palta, envuelto en Sésamo',4500],
                ['Sake furay rolls (Sésamo)','Salmon apanado, queso crema, palta, envuelto en Sésamo',4500],
                ['Avocado especial (Sésamo)','Salmon, queso crema, palta, envuelto en Sésamo',4500],
                ['Spicy tempura (Sésamo)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Sésamo',4800],
                ['Spicy tako (Sésamo)','Pulpo, salsa spicy, planta, envuelto en Sésamo',5000],
                ['Beef rolls (Sésamo)','Carne, queso crema, cebollin, envuelto en Sésamo',5000 ],
                ['Maguro rolls (Sésamo)','Atun, palta, envuelto en Sésamo',4500]            
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Californias Ciboulette','company_id'=>2]);
            $products = [
                ['California salumado (Ciboulette)','Salmon ahumado, queso crema, palta, envuelto en Ciboulette',4500],
                ['Tempura chesse rolls (Ciboulette)','Camaron tempura, queso crema, palta, envuelto en Ciboulette',4500],
                ['Tory rolls (Ciboulette)','Pollo apanados, queso crema, palta, envuelto en Ciboulette',4200],
                ['Maki rolls (Ciboulette)','Kanikama, queso crema, palta, envuelto en Ciboulette',4000],
                ['Tako rolls (Ciboulette)','Pulpo, queso crema, palta, envuelto en Ciboulette',4500],
                ['Crab cheese rolls (Ciboulette)','Jaiba, queso crema, palta, envuelto en Ciboulette',5000],
                ['Teri cheese rolls (Ciboulette)','Pollo teriyaki, queso crema, palta, envuelto en Ciboulette',4000],
                ['Ebi rolls (Ciboulette)','Camaron, queso crema, palta, envuelto en Ciboulette',4500],
                ['Sake furay rolls (Ciboulette)','Salmon apanado, queso crema, palta, envuelto en Ciboulette',4500],
                ['Avocado especial (Ciboulette)','Salmon, queso crema, palta, envuelto en Ciboulette',4500],
                ['Spicy tempura (Ciboulette)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Ciboulette',4800],
                ['Spicy tako (Ciboulette)','Pulpo, salsa spicy, planta, envuelto en Ciboulette',5000],
                ['Beef rolls (Ciboulette)','Carne, queso crema, cebollin, envuelto en Ciboulette',5000 ],
                ['Maguro rolls (Ciboulette)','Atun, palta, envuelto en Ciboulette',4500]                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
        
        $producttype = Producttype::create(['name'=>'Californias Masago','company_id'=>2]);
            $products = [
                ['California salumado (Masago)','Salmon ahumado, queso crema, palta, envuelto en Masago',4500],
                ['Tempura chesse rolls (Masago)','Camaron tempura, queso crema, palta, envuelto en Masago',4500],
                ['Tory rolls (Masago)','Pollo apanados, queso crema, palta, envuelto en Masago',4200],
                ['Maki rolls (Masago)','Kanikama, queso crema, palta, envuelto en Masago',4000],
                ['Tako rolls (Masago)','Pulpo, queso crema, palta, envuelto en Masago',4500],
                ['Crab cheese rolls (Masago)','Jaiba, queso crema, palta, envuelto en Masago',5000],
                ['Teri cheese rolls (Masago)','Pollo teriyaki, queso crema, palta, envuelto en Masago',4000],
                ['Ebi rolls (Masago)','Camaron, queso crema, palta, envuelto en Masago',4500],
                ['Sake furay rolls (Masago)','Salmon apanado, queso crema, palta, envuelto en Masago',4500],
                ['Avocado especial (Masago)','Salmon, queso crema, palta, envuelto en Masago',4500],
                ['Spicy tempura (Masago)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Masago',4800],
                ['Spicy tako (Masago)','Pulpo, salsa spicy, planta, envuelto en Masago',5000],
                ['Beef rolls (Masago)','Carne, queso crema, cebollin, envuelto en Masago',5000 ],
                ['Maguro rolls (Masago)','Atun, palta, envuelto en Masago',4500]                                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
    
        $producttype = Producttype::create(['name'=>'Californias Avocado','company_id'=>2]);
            $products = [
                ['California salumado (Palta)','Salmon ahumado, queso crema, palta, envuelto en Palta',5200],
                ['Tempura chesse rolls (Palta)','Camaron tempura, queso crema, palta, envuelto en Palta',5200],
                ['Tory rolls (Palta)','Pollo apanados, queso crema, palta, envuelto en Palta',5200],
                ['Maki rolls (Palta)','Kanikama, queso crema, palta, envuelto en Palta',5000],
                ['Tako rolls (Palta)','Pulpo, queso crema, palta, envuelto en Palta',5200],
                ['Crab cheese rolls (Palta)','Jaiba, queso crema, palta, envuelto en Palta',5500],
                ['Teri cheese rolls (Palta)','Pollo teriyaki, queso crema, palta, envuelto en Palta',5500],
                ['Ebi rolls (Palta)','Camaron, queso crema, palta, envuelto en Palta',5000],
                ['Sake furay rolls (Palta)','Salmon apanado, queso crema, palta, envuelto en Palta',5200],
                ['Avocado especial (Palta)','Salmon, queso crema, palta, envuelto en Palta',5500],
                ['Spicy tempura (Palta)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Palta',5500],
                ['Spicy tako (Palta)','Pulpo, salsa spicy, planta, envuelto en Palta',5500],
                ['Beef rolls (Palta)','Carne, queso crema, cebollin, envuelto en Palta',5500],
                ['Maguro rolls (Palta)','Atun, palta, envuelto en Palta',5500]
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
        
        $producttype = Producttype::create(['name'=>'Californias Salmon','company_id'=>2]);
            $products = [
                ['California salumado (Salmon)','Salmon ahumado, queso crema, palta, envuelto en Salmon',5200],
                ['Tempura chesse rolls (Salmon)','Camaron tempura, queso crema, palta, envuelto en Salmon',5200],
                ['Tory rolls (Salmon)','Pollo apanados, queso crema, palta, envuelto en Salmon',5200],
                ['Maki rolls (Salmon)','Kanikama, queso crema, palta, envuelto en Salmon',5000],
                ['Tako rolls (Salmon)','Pulpo, queso crema, palta, envuelto en Salmon',5200],
                ['Crab cheese rolls (Salmon)','Jaiba, queso crema, palta, envuelto en Salmon',5500],
                ['Teri cheese rolls (Salmon)','Pollo teriyaki, queso crema, palta, envuelto en Salmon',5500],
                ['Ebi rolls (Salmon)','Camaron, queso crema, palta, envuelto en Salmon',5000],
                ['Sake furay rolls (Salmon)','Salmon apanado, queso crema, palta, envuelto en Salmon',5200],
                ['Avocado especial (Salmon)','Salmon, queso crema, palta, envuelto en Salmon',5500],
                ['Spicy tempura (Salmon)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Salmon',5500],
                ['Spicy tako (Salmon)','Pulpo, salsa spicy, planta, envuelto en Salmon',5500],
                ['Beef rolls (Salmon)','Carne, queso crema, cebollin, envuelto en Salmon',5500],
                ['Maguro rolls (Salmon)','Atun, palta, envuelto en Salmon',5500]                
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Veggie rolls','company_id'=>2]);
            $products = [
                ['California vegetariano (Sésamo)','Palmito, choclo enano, palta, envuelto en sésamo',4200],
                ['Champi  furay (Palta)','Champiñon furay, queso crema, cebollin, envuelto en palta',4500],
                ['Vege rolls (Panko)','Champiñon, queso crema, ciboulette, frito en panko',4200],
                ['Palmi White (Queso Crema)','Palmito, palta, envuelto en queso crema',4500],
                ['Veggie furay (Panko)','Champiñon, queso, pimenton, almendras, frito en panko',4500]                                
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Panko','company_id'=>2]);
            $products = [
                ['Hot rolls (Panko)','Salmon, queso crema, cebollin, Panko',5500],
                ['Tempura sake (Panko)','Salmon ahumado, queso crema, palta, Panko',5500],
                ['Tempura tako (Panko)','Pulpo, queso crema, ciboulette, masago, Panko',5300],
                ['Tory furay salmon (Panko)','Camaron, queso crema, ciboulette envuelto salmon, Panko',5500],
                ['Tory furay pollo (Panko)','Camaron, queso crema, ciboulette envuelto en pollo, Panko',5500],
                ['Tempura tery roll ciboulette (Panko)','Pollo, queso crema, ciboulette, Panko',5500],
                ['Tempura tery roll palta (Panko)','Pollo, queso crema, palta, Panko',5500],
                ['Tempura especial (Panko)','Salmon, camaron, queso crema, cebollin, Panko',5500],
                ['Crabs rolls (Panko)','Jaiba, queso crema, cebollin, Panko',5000],
                ['Avocado tempura (Panko)','Camaron, queso crema, palta, Panko',5500],
                ['Tory teriyaki furay (Panko)','Pollo teriyaki, cebollin, queso crema, pimenton, Panko',5000],
                ['Beef furay (Panko)','Carne, queso crema, cebollin, Panko',5300],
                ['Maki hot cebollin (Panko)','Kanikama, queso, cebollin, Panko',5000],
                ['Maki hot palta (Panko)','Kanikama, queso, palta, Panko',5000]                                               
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Tempura','company_id'=>2]);
            $products = [
                ['Hot rolls (Tempura)','Salmon, queso crema, cebollin, Tempura',5500],
                ['Tempura sake (Tempura)','Salmon ahumado, queso crema, palta, Tempura',5500],
                ['Tempura tako (Tempura)','Pulpo, queso crema, ciboulette, masago, Tempura',5300],
                ['Tory furay salmon (Tempura)','Camaron, queso crema, ciboulette envuelto salmon, Tempura',5500],
                ['Tory furay pollo (Tempura)','Camaron, queso crema, ciboulette envuelto en pollo, Tempura',5500],
                ['Tempura tery roll ciboulette (Tempura)','Pollo, queso crema, ciboulette, Tempura',5500],
                ['Tempura tery roll palta (Tempura)','Pollo, queso crema, palta, Tempura',5500],
                ['Tempura especial (Tempura)','Salmon, camaron, queso crema, cebollin, Tempura',5500],
                ['Crabs rolls (Tempura)','Jaiba, queso crema, cebollin, Tempura',5000],
                ['Avocado tempura (Tempura)','Camaron, queso crema, palta, Tempura',5500],
                ['Tory teriyaki furay (Tempura)','Pollo teriyaki, cebollin, queso crema, pimenton, Tempura',5000],
                ['Beef furay (Tempura)','Carne, queso crema, cebollin, Tempura',5300],
                ['Maki hot cebollin (Tempura)','Kanikama, queso, cebollin, Tempura',5000],
                ['Maki hot palta (Tempura)','Kanikama, queso, palta, Tempura',5000]                                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Cheese rolls','company_id'=>2]);
            $products = [
                ['Pollo apanado-palta','Pollo apanado, palta, envuelto en queso crema',5000],
                ['Camaron-palta','Camaron, palta, envuelto en queso crema',5000],
                ['Salmon-palta','Salmon, palta, envuelto en queso crema',5200],
                ['Pulpo-palta','Pulpo, palta, envuelto en queso crema',5500],
                ['Camaron tempura-palta','Camaron tempura, palta, envuelto en queso crema',5500],
                ['Camaron-salmon-palta','Camaron, salmon, palta, envuelto en queso crema',5500],
                ['Carne-palta','Carne, palta, envuelto en queso crema',5000],
                ['Kanikama-palta','Kanikama, palta, envuelto en queso crema',4800]                                                          
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Rolls Premium','company_id'=>2]);
            $products = [
                ['Envuelto en pulpo ','Camaron, salmon, queso crema, cebollin, palta, envuelto en pulpo',8500],
                ['Acevichado ebi (Palta)','Camaron apanado, queso crema, palta, Bañado en salsa acevichada, envuelto en palta',7000],
                ['Acevichado ebi (Salmon)','Camaron apanado, queso crema, palta, Bañado en salsa acevichada, envuelto en salmon',7000],
                ['Envuelto en mango ','Camaron, queso crema, palta, Bañado en salsa de maracuyá, envuelto en mango',6500],
                ['Sake tartare ','Palta, fideos de wantan, cebolla morada, frito en panko, Bañado en salsa nikkei con trozos de salmon',6500],
                ['Rolls sin arroz (Palta)','Camaron, salmon, queso crema, cebollin, envuelto en palta',6500],
                ['Rolls sin arroz (Panko) ','Camaron, salmon, queso crema, cebollin, frito en panko',6500],
                ['Rolls sin arroz (Salmon) ','Camaron, salmon, queso crema, cebollin, envuelto en Salmon',6500],
                ['Oriental acevichado sin arroz ','Pescado apanado, queso crema, cebollin',6500],
                ['Rolls sin arroz frito ','Carne, pollo, queso crema, cebollin, frito en panko',6500],
                ['Rolls sin arroz (Queso crema) ','Camaron, salmon, queso crema, cebollin, envuelto en queso crema',6500],
                ['Ceviche rolls ','Camaron apanado, palta, Bañado en ceviche',7500],
                ['Lomo saltado ','Palta, queso crema, cebollin, cubierto por lomo saltado',7500],
                ['Roll pil pil ','Roll apanado, pollo, queso crema, cebollin, palta, Cubierto con camarones al pil pil',7500],
                ['Tuna sin arroz (Palta) ','Camaron apanado,queso crema, atun, bañado en salsa acevichada, envuelto en palta',7500],
                ['Rolls envuelto en atun ','Pollo apanado, palta, bañado en salsa acevichada',8000],
                ['Rolls a la huancaína ','Pollo, queso crema, palta, frito en panko, bañado en salsa huancaína',7500]                                                                         
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
            
        $producttype = Producttype::create(['name'=>'Hosomakis','company_id'=>2]);
            $products = [
                ['Hosomakis sake ','Salmon, queso',3500],
                ['Hosomaki ebi ','Camaron, queso',3500],
                ['Hosomaki tory ','Pollo, queso crema',3500],
                ['Hosomaki maki ','Kanikama, queso crema',3500]                                                                                     
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Gohan','company_id'=>2]);
            $products = [
                ['Pollo ','',6500],
                ['Carne ','',6000],
                ['Camaron ','',6000],
                ['Vegetariano ','',6000],
                ['Salmon ','',7000],
                ['Kanikama ','',6000],
                ['Pollo apanado ','',7000],
                ['Camaron apanado ','',6500],
                ['Gohan mixto ','',6500],
                ['Lomo saltado ','',8000]                                                                                                   
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Handrolls','company_id'=>2]);
            $products = [
                ['Handroll pollo','',3500],
                ['Handroll camaron','',3900],
                ['Handroll carne','',3500],
                ['Handroll kanikama','',3500],
                ['Handroll salmon','',3900],
                ['Handroll vegetariano','',3500]                                                                                                                
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Bebidas y jugos','company_id'=>2]);
            $products = [
                ['Coca coca (350cc)','',1200],
                ['Coca cola light (350cc)','',1200],
                ['Coca cola zero (350cc)','',1200],
                ['Sprite (350cc)','',1200],
                ['Fanta (350cc) ','',1200],
                ['Agua con gas (330cc)','',1200],
                ['Agua sin gas (330cc)','',1200],
                ['Te','',1000],
                ['Jugo natural','',2900],
                ['Limonada','',1500],
                ['Energetica','',2200],
                ['Coca cola (1.5 Litros)','',3500],
                ['Coca cola Light (1.5 Litros)','',3500],
                ['Coca cola Zero (1.5 Litros)','',3500],
                ['Sprite (1.5 Litros)','',3500],
                ['Fanta (1.5 Litros)','',3500]                                                                                                                  
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Bebidas alcohólicas','company_id'=>2]);
            $products = [
                ['Michelada','',3500],
                ['2 Micheladas','',5000],
                ['Cerveza grande','',4000],
                ['Pisco sour','',4500],
                ['2 Pisco sour','',6000],
                ['Piscola','',3000],
                ['Promo piscola','',5000]                                                                                                                              
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Postres','company_id'=>2]);
            $products = [
                ['Oreo','',4200],
                ['Trilogía','',4200],
                ['Brownie','',4200],
                ['Pie de limón','',4200],
                ['Maracuyá','',4200]                                                                                                                 
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
        
        $producttype = Producttype::create(['name'=>'Promociones','company_id'=>2]);
            $products = [
                ['Promo 15 piezas','',7000],
                ['Promo 20 fritas','',8000],
                ['Promo 30 mixtas','',12000],
                ['Promo 30 fritas','',10000],
                ['Promo 40 mixtas','',14600],
                ['Promo 40 fritas','',15000],
                ['Promo 50 vip','',20000],
                ['Promo 60 mixtas','',21000],
                ['Promo 20 y 20 pollo','',13900],
                ['Promo 40 fritas solo pollo','',13000],
                ['Promo 3 hand rolls','',9000],
                ['Promo 2 hand rolls','',6500],
                ['Promo vegetariana 40 piezas','',11500]                                                                                                                                
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Pedidos Ya','company_id'=>2]);
            $products = [
                ['California salumado','',7000],
                ['Hot rolls','',5600],
                ['Tempura tako','',6700],
                ['Tempura tery rolls','',6500],
                ['Tempura cheese','',7000],
                ['Tempura especial','',7400],
                ['Tempura especial','',6900],
                ['Avocado tempura','',7000],
                ['En queso crema','',5000],
                ['Tory rolls','',5800],
                ['Cheese rolls','',5300],
                ['Chesse rolls','',5400],
                ['Vege rolls','',5500],
                ['Maki rolls palta','',5700],
                ['Acevichado palta','',6100],
                ['Sin arroz frito ','',6400],
                ['Sin arroz','',6400],
                ['Ceviche rolls','',7500],
                ['Acevichado EBI','',7100],
                ['California vegetariano','',5500],
                ['Camaron apanados','',6000],
                ['Camarones queso','',6500],
                ['Champy furay','',5600],
                ['Cheesecake mango','',5000],
                ['Env salm(camar o salm)','',7100],
                ['Fanta','',1200],
                ['Gohan camaron','',7400],
                ['Gohan de kanikama','',6200],
                ['Gohan mixto','',7000],
                ['Gohan salmon','',7600],
                ['Gohan vegetariano','',7200],
                ['Gyosas camaron','',5000],
                ['Gyosas cerdo','',4700],
                ['Gyosas pollo','',4700],
                ['Hot rolls','',6600],
                ['Mango','',7200],
                ['Palmito white','',5800],
                ['Sashimi sake','',4000],
                ['Sashimi tako','',5000],
                ['Spicy temp roll','',7000],
                ['Tory balls','',6200],
                ['Tory rolls','',6800],
                ['Veggie furay','',5800]                                                                                                                                               
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Extras','company_id'=>2]);
            $products = [
                ['Acevichada','',1200],
                ['Agridulce extra','',800],
                ['Ceviche','',5000],
                ['Huancaina','',1200],
                ['Maracuya','',1200],
                ['Olivo','',1200],
                ['Palitos extras','',150],
                ['Palos de ayuda','',300],
                ['Salsa spicy','',1000],
                ['Soya extra','',500]                                                                                                                                            
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Agregar ingrediente','company_id'=>2]);
            $products = [
                ['otros','',800],
                ['Almendras','',1000],
                ['Camaron normal','',1000],
                ['Camaron apanados','',1200],
                ['Cambio','',1000],
                ['Carne','',1000],
                ['Cebollin','',700],
                ['Ceviche rolls','',2000],
                ['Champiñon','',700],
                ['Choclo enano','',700],
                ['Ciboulette','',700],
                ['Jaiba','',1200],
                ['Kanikama','',1000],
                ['Palmito','',700],
                ['Palta','',700],
                ['Panko','',1000],
                ['Pimenton','',700],
                ['Pollo','',1000],
                ['Pollo apanado','',1200],
                ['Pulpo','',1200],
                ['Queso crema','',1000],
                ['Salmon','',1200],
                ['Salmon ahumado','',1200]                                                                                                                              
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }


        /*Caregorias TioCheo*/
        $producttype = Producttype::create(['name'=>'Para Picar','company_id'=>3]);
            $products = [
                ['Pollo, palta y Queso Philadelphia','',2000],
                ['Barros Luco (carne con queso derretido)','',2500],
                ['Salmón, choclo y queso Philadelphia','',2500],
                ['Camarón, choclo y queso Philadelphia','',2500],
                ['Empanadas de queso x3','',1000],
                ['Empanadas de queso x12','',4000]                                                                                                                                              
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'HandRoll','company_id'=>3]);
            $products = [
                ['Arrollados Jamón y Queso x4','',2000],
                ['Arrollado Primavera x4','',2000],
                ['Nuggets x5','',1000],
                ['Combo Tío Cheo','',4500]                                                                                                                                                          
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Postres','company_id'=>3]);
            $products = [
                ['1 dona','',750],
                ['3 donas','',2000],
                ['Tiramisú','',1500]                                                                                                                                                                      
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Bebidas','company_id'=>3]);
            $products = [
                ['Jugo natural','',2000],
                ['Café','',1000],
                ['Bebida ','',750],
                ['Bebida ','',1000]                                                                                                                                                              
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
    }
}
