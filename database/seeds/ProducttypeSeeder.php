<?php

use Illuminate\Database\Seeder;
use App\Producttype;
use App\Product;
use App\Prescription;
use App\Prescriptiondetail;
use App\Item;

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
                ['1.-California salumado (Sésamo)','Salmon ahumado, queso crema, palta, envuelto en Sésamo',4500],
                ['2.-Tempura chesse rolls (Sésamo)','Camaron tempura, queso crema, palta, envuelto en Sésamo',4500],
                ['3.-Tory rolls (Sésamo)','Pollo apanados, queso crema, palta, envuelto en Sésamo',4200],
                ['4.-Maki rolls (Sésamo)','Kanikama, queso crema, palta, envuelto en Sésamo',4000],
                ['5.-Tako rolls (Sésamo)','Pulpo, queso crema, palta, envuelto en Sésamo',4500],
                ['6.-Crab cheese rolls (Sésamo)','Jaiba, queso crema, palta, envuelto en Sésamo',5000],
                ['7.-Teri cheese rolls (Sésamo)','Pollo teriyaki, queso crema, palta, envuelto en Sésamo',4000],
                ['8.-Ebi rolls (Sésamo)','Camaron, queso crema, palta, envuelto en Sésamo',4500],
                ['9.-Sake furay rolls (Sésamo)','Salmon apanado, queso crema, palta, envuelto en Sésamo',4500],
                ['10.-Avocado especial (Sésamo)','Salmon, queso crema, palta, envuelto en Sésamo',4500],
                ['11.-Spicy tempura (Sésamo)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Sésamo',4800],
                ['12.-Spicy tako (Sésamo)','Pulpo, salsa spicy, planta, envuelto en Sésamo',5000],
                ['13.-Beef rolls (Sésamo)','Carne, queso crema, cebollin, envuelto en Sésamo',5000 ],
                ['14.-Maguro rolls (Sésamo)','Atun, palta, envuelto en Sésamo',4500]            
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Californias Ciboulette','company_id'=>2]);
            $products = [
                ['1.-California salumado (Ciboulette)','Salmon ahumado, queso crema, palta, envuelto en Ciboulette',4500],
                ['2.-Tempura chesse rolls (Ciboulette)','Camaron tempura, queso crema, palta, envuelto en Ciboulette',4500],
                ['3.-Tory rolls (Ciboulette)','Pollo apanados, queso crema, palta, envuelto en Ciboulette',4200],
                ['4.-Maki rolls (Ciboulette)','Kanikama, queso crema, palta, envuelto en Ciboulette',4000],
                ['5.-Tako rolls (Ciboulette)','Pulpo, queso crema, palta, envuelto en Ciboulette',4500],
                ['6.-Crab cheese rolls (Ciboulette)','Jaiba, queso crema, palta, envuelto en Ciboulette',5000],
                ['7.-Teri cheese rolls (Ciboulette)','Pollo teriyaki, queso crema, palta, envuelto en Ciboulette',4000],
                ['8.-Ebi rolls (Ciboulette)','Camaron, queso crema, palta, envuelto en Ciboulette',4500],
                ['9.-Sake furay rolls (Ciboulette)','Salmon apanado, queso crema, palta, envuelto en Ciboulette',4500],
                ['10.-Avocado especial (Ciboulette)','Salmon, queso crema, palta, envuelto en Ciboulette',4500],
                ['11.-Spicy tempura (Ciboulette)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Ciboulette',4800],
                ['12.-Spicy tako (Ciboulette)','Pulpo, salsa spicy, planta, envuelto en Ciboulette',5000],
                ['13.-Beef rolls (Ciboulette)','Carne, queso crema, cebollin, envuelto en Ciboulette',5000 ],
                ['14.-Maguro rolls (Ciboulette)','Atun, palta, envuelto en Ciboulette',4500]                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
        
        $producttype = Producttype::create(['name'=>'Californias Masago','company_id'=>2]);
            $products = [
                ['1.-California salumado (Masago)','Salmon ahumado, queso crema, palta, envuelto en Masago',4500],
                ['2.-Tempura chesse rolls (Masago)','Camaron tempura, queso crema, palta, envuelto en Masago',4500],
                ['3.-Tory rolls (Masago)','Pollo apanados, queso crema, palta, envuelto en Masago',4200],
                ['4.-Maki rolls (Masago)','Kanikama, queso crema, palta, envuelto en Masago',4000],
                ['5.-Tako rolls (Masago)','Pulpo, queso crema, palta, envuelto en Masago',4500],
                ['6.-Crab cheese rolls (Masago)','Jaiba, queso crema, palta, envuelto en Masago',5000],
                ['7.-Teri cheese rolls (Masago)','Pollo teriyaki, queso crema, palta, envuelto en Masago',4000],
                ['8.-Ebi rolls (Masago)','Camaron, queso crema, palta, envuelto en Masago',4500],
                ['9.-Sake furay rolls (Masago)','Salmon apanado, queso crema, palta, envuelto en Masago',4500],
                ['10.-Avocado especial (Masago)','Salmon, queso crema, palta, envuelto en Masago',4500],
                ['11.-Spicy tempura (Masago)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Masago',4800],
                ['12.-Spicy tako (Masago)','Pulpo, salsa spicy, planta, envuelto en Masago',5000],
                ['13.-Beef rolls (Masago)','Carne, queso crema, cebollin, envuelto en Masago',5000 ],
                ['14.-Maguro rolls (Masago)','Atun, palta, envuelto en Masago',4500]                                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
    
        $producttype = Producttype::create(['name'=>'Californias Avocado','company_id'=>2]);
            $products = [
                ['1.-California salumado (Palta)','Salmon ahumado, queso crema, palta, envuelto en Palta',5200],
                ['2.-Tempura chesse rolls (Palta)','Camaron tempura, queso crema, palta, envuelto en Palta',5200],
                ['3.-Tory rolls (Palta)','Pollo apanados, queso crema, palta, envuelto en Palta',5200],
                ['4.-Maki rolls (Palta)','Kanikama, queso crema, palta, envuelto en Palta',5000],
                ['5.-Tako rolls (Palta)','Pulpo, queso crema, palta, envuelto en Palta',5200],
                ['6.-Crab cheese rolls (Palta)','Jaiba, queso crema, palta, envuelto en Palta',5500],
                ['7.-Teri cheese rolls (Palta)','Pollo teriyaki, queso crema, palta, envuelto en Palta',5500],
                ['8.-Ebi rolls (Palta)','Camaron, queso crema, palta, envuelto en Palta',5000],
                ['9.-Sake furay rolls (Palta)','Salmon apanado, queso crema, palta, envuelto en Palta',5200],
                ['10.-Avocado especial (Palta)','Salmon, queso crema, palta, envuelto en Palta',5500],
                ['11.-Spicy tempura (Palta)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Palta',5500],
                ['12.-Spicy tako (Palta)','Pulpo, salsa spicy, planta, envuelto en Palta',5500],
                ['13.-Beef rolls (Palta)','Carne, queso crema, cebollin, envuelto en Palta',5500],
                ['14.-Maguro rolls (Palta)','Atun, palta, envuelto en Palta',5500]
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
        
        $producttype = Producttype::create(['name'=>'Californias Salmon','company_id'=>2]);
            $products = [
                ['1.-California salumado (Salmon)','Salmon ahumado, queso crema, palta, envuelto en Salmon',5200],
                ['2.-Tempura chesse rolls (Salmon)','Camaron tempura, queso crema, palta, envuelto en Salmon',5200],
                ['3.-Tory rolls (Salmon)','Pollo apanados, queso crema, palta, envuelto en Salmon',5200],
                ['4.-Maki rolls (Salmon)','Kanikama, queso crema, palta, envuelto en Salmon',5000],
                ['5.-Tako rolls (Salmon)','Pulpo, queso crema, palta, envuelto en Salmon',5200],
                ['6.-Crab cheese rolls (Salmon)','Jaiba, queso crema, palta, envuelto en Salmon',5500],
                ['7.-Teri cheese rolls (Salmon)','Pollo teriyaki, queso crema, palta, envuelto en Salmon',5500],
                ['8.-Ebi rolls (Salmon)','Camaron, queso crema, palta, envuelto en Salmon',5000],
                ['9.-Sake furay rolls (Salmon)','Salmon apanado, queso crema, palta, envuelto en Salmon',5200],
                ['10.-Avocado especial (Salmon)','Salmon, queso crema, palta, envuelto en Salmon',5500],
                ['11.-Spicy tempura (Salmon)','Camaron apanado, salsa spicy, queso, cebollin, envuelto en Salmon',5500],
                ['12.-Spicy tako (Salmon)','Pulpo, salsa spicy, planta, envuelto en Salmon',5500],
                ['13.-Beef rolls (Salmon)','Carne, queso crema, cebollin, envuelto en Salmon',5500],
                ['14.-Maguro rolls (Salmon)','Atun, palta, envuelto en Salmon',5500]                
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Veggie rolls','company_id'=>2]);
            $products = [
                ['34.-California vegetariano (Sésamo)','Palmito, choclo enano, palta, envuelto en sésamo',4200],
                ['35.-Champi furay (Palta)','Champiñon furay, queso crema, cebollin, envuelto en palta',4500],
                ['36.-Vege rolls (Panko)','Champiñon, queso crema, ciboulette, frito en panko',4200],
                ['37.-Palmi White (Queso Crema)','Palmito, palta, envuelto en queso crema',4500],
                ['38.-Veggie furay (Panko)','Champiñon, queso, pimenton, almendras, frito en panko',4500]                                
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Panko','company_id'=>2]);
            $products = [
                ['15.-Hot rolls (Panko)','Salmon, queso crema, cebollin, Panko',5500],
                ['16.-Tempura sake (Panko)','Salmon ahumado, queso crema, palta, Panko',5500],
                ['17.-Tempura tako (Panko)','Pulpo, queso crema, ciboulette, masago, Panko',5300],
                ['18.-Tory furay salmon (Panko)','Camaron, queso crema, ciboulette envuelto salmon, Panko',5500],
                ['18.-Tory furay pollo (Panko)','Camaron, queso crema, ciboulette envuelto en pollo, Panko',5500],
                ['19.-Tempura tery roll ciboulette (Panko)','Pollo, queso crema, ciboulette, Panko',5500],
                ['19.-Tempura tery roll palta (Panko)','Pollo, queso crema, palta, Panko',5500],
                ['20.-Tempura especial (Panko)','Salmon, camaron, queso crema, cebollin, Panko',5500],
                ['21.-Crabs rolls (Panko)','Jaiba, queso crema, cebollin, Panko',5000],
                ['22.-Avocado tempura (Panko)','Camaron, queso crema, palta, Panko',5500],
                ['23.-Tory teriyaki furay (Panko)','Pollo teriyaki, cebollin, queso crema, pimenton, Panko',5000],
                ['24.-Beef furay (Panko)','Carne, queso crema, cebollin, Panko',5300],
                ['25.-Maki hot cebollin (Panko)','Kanikama, queso, cebollin, Panko',5000],
                ['25.-Maki hot palta (Panko)','Kanikama, queso, palta, Panko',5000]                                               
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Tempura','company_id'=>2]);
            $products = [
                ['15.-Hot rolls (Tempura)','Salmon, queso crema, cebollin, Tempura',5500],
                ['16.-Tempura sake (Tempura)','Salmon ahumado, queso crema, palta, Tempura',5500],
                ['17.-Tempura tako (Tempura)','Pulpo, queso crema, ciboulette, masago, Tempura',5300],
                ['18.-Tory furay salmon (Tempura)','Camaron, queso crema, ciboulette envuelto salmon, Tempura',5500],
                ['18.-Tory furay pollo (Tempura)','Camaron, queso crema, ciboulette envuelto en pollo, Tempura',5500],
                ['19.-Tempura tery roll ciboulette (Tempura)','Pollo, queso crema, ciboulette, Tempura',5500],
                ['19.-Tempura tery roll palta (Tempura)','Pollo, queso crema, palta, Tempura',5500],
                ['20.-Tempura especial (Tempura)','Salmon, camaron, queso crema, cebollin, Tempura',5500],
                ['21.-Crabs rolls (Tempura)','Jaiba, queso crema, cebollin, Tempura',5000],
                ['22.-Avocado tempura (Tempura)','Camaron, queso crema, palta, Tempura',5500],
                ['23.-Tory teriyaki furay (Tempura)','Pollo teriyaki, cebollin, queso crema, pimenton, Tempura',5000],
                ['24.-Beef furay (Tempura)','Carne, queso crema, cebollin, Tempura',5300],
                ['25.-Maki hot cebollin (Tempura)','Kanikama, queso, cebollin, Tempura',5000],
                ['25.-Maki hot palta (Tempura)','Kanikama, queso, palta, Tempura',5000]                                           
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Cheese rolls','company_id'=>2]);
            $products = [
                ['26.-Pollo apanado-palta','Pollo apanado, palta, envuelto en queso crema',5000],
                ['27.-Camaron-palta','Camaron, palta, envuelto en queso crema',5000],
                ['28.-Salmon-palta','Salmon, palta, envuelto en queso crema',5200],
                ['29.-Pulpo-palta','Pulpo, palta, envuelto en queso crema',5500],
                ['30.-Camaron tempura-palta','Camaron tempura, palta, envuelto en queso crema',5500],
                ['31.-Camaron-salmon-palta','Camaron, salmon, palta, envuelto en queso crema',5500],
                ['32.-Carne-palta','Carne, palta, envuelto en queso crema',5000],
                ['33.-Kanikama-palta','Kanikama, palta, envuelto en queso crema',4800]                                                          
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Rolls Premium','company_id'=>2]);
            $products = [
                ['43.-Envuelto en pulpo ','Camaron, salmon, queso crema, cebollin, palta, envuelto en pulpo',8500],
                ['44.-Acevichado ebi (Palta)','Camaron apanado, queso crema, palta, Bañado en salsa acevichada, envuelto en palta',7000],
                ['44.-Acevichado ebi (Salmon)','Camaron apanado, queso crema, palta, Bañado en salsa acevichada, envuelto en salmon',7000],
                ['45.-Envuelto en mango ','Camaron, queso crema, palta, Bañado en salsa de maracuyá, envuelto en mango',6500],
                ['46.-Sake tartare ','Palta, fideos de wantan, cebolla morada, frito en panko, Bañado en salsa nikkei con trozos de salmon',6500],
                ['47.-Rolls sin arroz (Palta)','Camaron, salmon, queso crema, cebollin, envuelto en palta',6500],
                ['47.-Rolls sin arroz (Panko) ','Camaron, salmon, queso crema, cebollin, frito en panko',6500],
                ['48.-Rolls sin arroz (Salmon) ','Camaron, salmon, queso crema, cebollin, envuelto en Salmon',6500],
                ['49.-Oriental acevichado sin arroz ','Pescado apanado, queso crema, cebollin',6500],
                ['50.-Rolls sin arroz frito ','Carne, pollo, queso crema, cebollin, frito en panko',6500],
                ['51.-Rolls sin arroz (Queso crema) ','Camaron, salmon, queso crema, cebollin, envuelto en queso crema',6500],
                ['52.-Ceviche rolls ','Camaron apanado, palta, Bañado en ceviche',7500],
                ['53.-Lomo saltado ','Palta, queso crema, cebollin, cubierto por lomo saltado',7500],
                ['54.-Roll pil pil ','Roll apanado, pollo, queso crema, cebollin, palta, Cubierto con camarones al pil pil',7500],
                ['55.-Tuna sin arroz (Palta) ','Camaron apanado,queso crema, atun, bañado en salsa acevichada, envuelto en palta',7500],
                ['56.-Rolls envuelto en atun ','Pollo apanado, palta, bañado en salsa acevichada',8000],
                ['57.-Rolls a la huancaína ','Pollo, queso crema, palta, frito en panko, bañado en salsa huancaína',7500]                                                                         
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }
            
        $producttype = Producttype::create(['name'=>'Hosomakis','company_id'=>2]);
            $products = [
                ['39.-Hosomakis sake','Salmon, queso',3500],
                ['40.-Hosomaki ebi','Camaron, queso',3500],
                ['41.-Hosomaki tory','Pollo, queso crema',3500],
                ['42.-Hosomaki maki','Kanikama, queso crema',3500]                                                                                     
            ];
            foreach ($products as $key => $product) {
                Product::create(['name'=>$product[0],'description'=>$product[1],'price'=>$product[2],'producttype_id'=>$producttype->id]);
            }

        $producttype = Producttype::create(['name'=>'Gohan','company_id'=>2]);
            $products = [
                ['Gohan Pollo','',6500],
                ['Gohan Carne','',6000],
                ['Gohan Camaron','',6000],
                ['Gohan Vegetariano','',6000],
                ['Gohan Salmon','',7000],
                ['Gohan Kanikama','',6000],
                ['Gohan Pollo apanado','',7000],
                ['Gohan Camaron apanado','',6500],
                ['Gohan mixto','',6500],
                ['Gohan Lomo saltado','',8000]                                                                                                   
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

        $recetas=[
            ['california salumado','Arroz',145],
            ['california salumado','Salmon ahumado',35],
            ['california salumado','Queso crema',29],
            ['california salumado','Palta',3],
            ['Tempura cheese rolls','Arroz',145],
            ['Tempura cheese rolls','camaron',2],
            ['Tempura cheese rolls','Queso crema',29],
            ['Tempura cheese rolls','Palta',3],
            ['Tory rolls','Arroz',145],
            ['Tory rolls','Kanikama',1],
            ['Tory rolls','Queso crema',29],
            ['Tory rolls','Palta',3],
            ['Tako rolls','Arroz',145],
            ['Tako rolls','Pulpo',0],
            ['Tako rolls','Queso crema',29],
            ['Tako rolls','Palta',3],
            ['Crab cheese rolls','Arroz',145],
            ['Crab cheese rolls','Jaiba',0],
            ['Crab cheese rolls','Queso crema',29],
            ['Crab cheese rolls','Palta',3],
            ['Teri cheese rolls','Arroz',145],
            ['Teri cheese rolls','Pollo',45],
            ['Teri cheese rolls','Queso crema',29],
            ['Teri cheese rolls','Cebollin',0],
            ['Ebi rolls','Arroz',145],
            ['Ebi rolls','Camaron',2],
            ['Ebi rolls','Palta',3],
            ['Sake furay rolls','Arroz',145],
            ['Sake furay rolls','Salmon',35],
            ['Sake furay rolls','Queso crema',29],
            ['Sake furay rolls','Cebollin',0],
            ['Avocado especial','Arroz',145],
            ['Avocado especial','Salmon',35],
            ['Avocado especial','Queso crema',29],
            ['Avocado especial','Palta',3],
            ['Spicy tempura','Arroz',145],
            ['Spicy tempura','camaron',2],
            ['Spicy tempura','Queso crema',29],
            ['Spicy tempura','Cebollin',3],
            ['Spicy tempura','Salsa spicy',0],
            ['Spicy tako','Arroz',145],
            ['Spicy tako','Pulpo',0],
            ['Spicy tako','Palta',3],
            ['Spicy tako','Salsa spicy',0],
            ['Beef rolls','Arroz',145],
            ['Beef rolls','Carne',35],
            ['Beef rolls','Queso crema',29],
            ['Beef rolls','Cebollin',0],
            ['Maguro rolls','Arroz',145],
            ['Maguro rolls','Atun',32],
            ['Maguro rolls','Palta',3],
            ['Hot rolls','Arroz',145],
            ['Hot rolls','Salmon',35],
            ['Hot rolls','Queso crema',29],
            ['Hot rolls','Cebollin',0],
            ['Tempura sake','Arroz',145],
            ['Tempura sake','Salmon',35],
            ['Tempura sake','Queso crema',29],
            ['Tempura sake','Palta',3],
            ['Tempura tako','Arroz',145],
            ['Tempura tako','Pulpo',0],
            ['Tempura tako','Queso crema',29],
            ['Tempura tako','ciboulette',0],
            ['Tempura tako','masago',0],
            ['Tory furay salmon','Arroz',145],
            ['Tory furay salmon','camaron',2],
            ['Tory furay salmon','Queso crema',29],
            ['Tory furay salmon','Salmon ',35],
            ['Tory furay salmon','ciboulette',0],
            ['Tory furay pollo','Arroz',145],
            ['Tory furay pollo','camaron',2],
            ['Tory furay pollo','Queso crema',29],
            ['Tory furay pollo','Pollo ',45],
            ['Tory furay pollo','ciboulette',0],
            ['Tempura tery roll ciboulette','Arroz',145],
            ['Tempura tery roll ciboulette','Pollo ',45],
            ['Tempura tery roll ciboulette','Queso crema',29],
            ['Tempura tery roll ciboulette','ciboulette',0],
            ['Tempura tery roll palta','Arroz',145],
            ['Tempura tery roll palta','Pollo ',45],
            ['Tempura tery roll palta','Queso crema',29],
            ['Tempura tery roll palta','Palta',3],
            ['Tempura especial','Arroz',145],
            ['Tempura especial','Salmon',35],
            ['Tempura especial','camaron',2],
            ['Tempura especial','Queso crema',29],
            ['Tempura especial','Cebollin',0],
            ['Crabs rolls','Arroz',145],
            ['Crabs rolls','Jaiba',0],
            ['Crabs rolls','Queso crema',29],
            ['Crabs rolls','Cebollin',0],
            ['Avocado tempura','Arroz',145],
            ['Avocado tempura','camaron',2],
            ['Avocado tempura','Queso crema',29],
            ['Avocado tempura','Palta',3],
            ['Tory teriyaki furay','Arroz',145],
            ['Tory teriyaki furay','Pollo ',45],
            ['Tory teriyaki furay','Queso crema',29],
            ['Tory teriyaki furay','Cebollin',0],
            ['Tory teriyaki furay','Pimenton',0],
            ['Beef furay','Arroz',145],
            ['Beef furay','Carne',35],
            ['Beef furay','Queso crema',29],
            ['Beef furay','Cebollin',0],
            ['Maki hot cebollin','Arroz',145],
            ['Maki hot cebollin','Kanikama',1],
            ['Maki hot cebollin','Queso crema',29],
            ['Maki hot cebollin','Cebollin',0],
            ['Maki hot cebollin','Arroz',145],
            ['Maki hot cebollin','Kanikama',1],
            ['Maki hot cebollin','Queso crema',29],
            ['Maki hot cebollin','Palta',3],
            ['Pollo apanado-palta','Arroz',145],
            ['Pollo apanado-palta','Pollo ',45],
            ['Pollo apanado-palta','Palta',3],
            ['Camaron-palta','Arroz',145],
            ['Camaron-palta','camaron',2],
            ['Camaron-palta','Palta',3],
            ['Salmon-palta','Arroz',145],
            ['Salmon-palta','Salmon',35],
            ['Salmon-palta','Palta',3],
            ['Pulpo-palta','Arroz',145],
            ['Pulpo-palta','Pulpo',0],
            ['Pulpo-palta','Palta',3],
            ['Camaron tempura-palta','Arroz',145],
            ['Camaron tempura-palta','camaron',2],
            ['Camaron tempura-palta','Palta',3],
            ['Camaron-salmon-palta','Arroz',145],
            ['Camaron-salmon-palta','camaron',2],
            ['Camaron-salmon-palta','Salmon',35],
            ['Camaron-salmon-palta','Palta',3],
            ['Carne-palta','Arroz',145],
            ['Carne-palta','Carne',35],
            ['Carne-palta','Palta',3],
            ['Kanikama-palta','Arroz',145],
            ['Kanikama-palta','Kanikama',1],
            ['Kanikama-palta','Palta',3],
            ['California vegetariano','Arroz',145],
            ['California vegetariano','Carne',35],
            ['California vegetariano','Choclo enano',27],
            ['California vegetariano','Palta',3],
            ['Champi furay','Arroz',145],
            ['Champi furay','Champiñon',32],
            ['Champi furay','Queso crema',29],
            ['Champi furay','Palta',3],
            ['Champi furay','Cebollin',0],
            ['Vege rolls','Arroz',145],
            ['Vege rolls','Champiñon',32],
            ['Vege rolls','Queso crema',29],
            ['Vege rolls','ciboulette',0],
            ['Vege rolls','Panko',0],
            ['Palmi White','Arroz',145],
            ['Palmi White','Palmito',35],
            ['Palmi White','Palta',3],
            ['Palmi White','Queso crema',29],
            ['Veggie furay','Arroz',145],
            ['Veggie furay','Champiñon',32],
            ['Veggie furay','Queso crema',29],
            ['Veggie furay','Pimenton',0],
            ['Veggie furay','Almnedras',0],
            ['Veggie furay','Panko',0],
            ['Hosomakis sake','Arroz',145],
            ['Hosomakis sake','Salmon',35],
            ['Hosomakis sake','Queso crema',29],
            ['Hosomaki ebi','Arroz',145],
            ['Hosomaki ebi','Camaron',2],
            ['Hosomaki ebi','Queso crema',29],
            ['Hosomaki tory','Arroz',145],
            ['Hosomaki tory','Pollo',45],
            ['Hosomaki tory','Queso crema',29],
            ['Hosomaki maki','Arroz',145],
            ['Hosomaki maki','Kanikama',1],
            ['Hosomaki maki','Queso crema',29],
            ['Envuelto en pulpo','Arroz',145],
            ['Envuelto en pulpo','Camaron',2],
            ['Envuelto en pulpo','Salmon',35],
            ['Envuelto en pulpo','Queso crema',29],
            ['Envuelto en pulpo','Palta',3],
            ['Envuelto en pulpo','Cebollin',0],
            ['Acevichado ebi (Palta)','Arroz',145],
            ['Acevichado ebi (Palta)','Camaron',2],
            ['Acevichado ebi (Palta)','Queso crema',29],
            ['Acevichado ebi (Palta)','Palta',3],
            ['Acevichado ebi (Salmon)','Arroz',145],
            ['Acevichado ebi (Salmon)','Camaron',2],
            ['Acevichado ebi (Salmon)','Queso crema',29],
            ['Acevichado ebi (Salmon)','Salmon',35],
            ['Envuelto en mango','Arroz',145],
            ['Envuelto en mango','Camaron',2],
            ['Envuelto en mango','Queso crema',29],
            ['Envuelto en mango','Palta',3],
            ['Envuelto en mango','Mango',0],
            ['Sake tartare','Arroz',145],
            ['Sake tartare','Palta',3],
            ['Sake tartare','Fideos de wantan',0],
            ['Sake tartare','Cebolla morada',0],
            ['Sake tartare','Salmon',0],
            ['Sake tartare','Salsa nikkei',0],
            ['Sake tartare','Panko',0],
            ['Rolls sin arroz (Palta)','Camaron',4],
            ['Rolls sin arroz (Palta)','Salmon',6],
            ['Rolls sin arroz (Palta)','Queso crema',29],
            ['Rolls sin arroz (Palta)','Cebollin',0],
            ['Rolls sin arroz (Palta)','Palta',3],
            ['Rolls sin arroz (Panko)','Camaron',4],
            ['Rolls sin arroz (Panko)','Salmon',6],
            ['Rolls sin arroz (Panko)','Queso crema',29],
            ['Rolls sin arroz (Panko)','Cebollin',0],
            ['Rolls sin arroz (Panko)','Panko',0],
            ['Rolls sin arroz (Salmon)','Camaron',3],
            ['Rolls sin arroz (Salmon)','Salmon',6],
            ['Rolls sin arroz (Salmon)','Queso crema',29],
            ['Rolls sin arroz (Salmon)','Cebollin',0],
            ['Oriental acevichado sin arroz','Salmon',0],
            ['Oriental acevichado sin arroz','Queso crema',29],
            ['Oriental acevichado sin arroz','Cebollin',0],
            ['Rolls sin arroz frito','Carne',48],
            ['Rolls sin arroz frito','Pollo',5.7],
            ['Rolls sin arroz frito','Queso crema',29],
            ['Rolls sin arroz frito','Cebollin',0],
            ['Rolls sin arroz frito','Panko',0],
            ['Rolls sin arroz (Queso crema)','Camaron',4],
            ['Rolls sin arroz (Queso crema)','Salmon',6],
            ['Rolls sin arroz (Queso crema)','Queso crema',29],
            ['Rolls sin arroz (Queso crema)','Cebollin',0],
            ['Ceviche rolls','Arroz',145],
            ['Ceviche rolls','Camaron',2],
            ['Ceviche rolls','Palta',3],
            ['Lomo saltado','Arroz',145],
            ['Lomo saltado','Queso crema',29],
            ['Lomo saltado','Palta',3],
            ['Lomo saltado','Cebollin',0],
            ['Lomo saltado','Lomo',0],
            ['Roll pil pil','Arroz',145],
            ['Roll pil pil','Queso crema',29],
            ['Roll pil pil','Pollo',45],
            ['Roll pil pil','Palta',3],
            ['Roll pil pil','Cebollin',0],
            ['Roll pil pil','Camaron',0],
            ['Tuna sin arroz (Palta)','Camaron',4],
            ['Tuna sin arroz (Palta)','Queso crema',29],
            ['Tuna sin arroz (Palta)','Atun',0],
            ['Rolls envuelto en atun','Arroz',145],
            ['Rolls envuelto en atun','Pollo',45],
            ['Rolls envuelto en atun','Palta',3],
            ['Rolls a la huancaína','Arroz',145],
            ['Rolls a la huancaína','Pollo',45],
            ['Rolls a la huancaína','Queso crema',29],
            ['Rolls a la huancaína','Palta',3],
            ['Rolls a la huancaína','Panko',0],
            ['Gohan Pollo','Pollo',68],
            ['Gohan Pollo','Arroz',200],
            ['Gohan Pollo','Palta',1],
            ['Gohan Pollo','Queso crema',29],
            ['Gohan Pollo','Cebollin',0],
            ['Gohan Carne','Carne',48],
            ['Gohan Carne','Arroz',200],
            ['Gohan Carne','Palta',1],
            ['Gohan Carne','Queso crema',29],
            ['Gohan Carne','Cebollin',0],
            ['Gohan Camaron','Camaron',4],
            ['Gohan Camaron','Arroz',200],
            ['Gohan Camaron','Palta',1],
            ['Gohan Camaron','Queso crema',29],
            ['Gohan Camaron','Cebollin',0],
            ['Gohan Vegetariano','Arroz',200],
            ['Gohan Vegetariano','Palta',1],
            ['Gohan Vegetariano','Queso crema',29],
            ['Gohan Vegetariano','Cebollin',0],
            ['Gohan Vegetariano','Palminto',35],
            ['Gohan Vegetariano','Champiñon',32],
            ['Gohan Salmon','Salmon',65],
            ['Gohan Salmon','Arroz',200],
            ['Gohan Salmon','Palta',1],
            ['Gohan Salmon','Queso crema',29],
            ['Gohan Salmon','Cebollin',0],
            ['Gohan Kanikama','Kanikama',1],
            ['Gohan Kanikama','Arroz',200],
            ['Gohan Kanikama','Palta',1],
            ['Gohan Kanikama','Queso crema',29],
            ['Gohan Kanikama','Cebollin',0],
            ['Gohan Pollo apanado','Pollo',60],
            ['Gohan Pollo apanado','Arroz',200],
            ['Gohan Pollo apanado','Palta',1],
            ['Gohan Pollo apanado','Queso crema',29],
            ['Gohan Pollo apanado','Cebollin',0],
            ['Gohan Camaron apanado','Camaron',3],
            ['Gohan Camaron apanado','Arroz',200],
            ['Gohan Camaron apanado','Palta',1],
            ['Gohan Camaron apanado','Queso crema',29],
            ['Gohan Camaron apanado','Cebollin',0],
            ['Gohan mixto','Arroz',200],
            ['Gohan mixto','Palta',1],
            ['Gohan mixto','Queso crema',29],
            ['Gohan mixto','Camaron',4],
            ['Gohan mixto','Kanikama',1],
            ['Gohan mixto','Salmon',65],
            ['Gohan mixto','Cebollin',0],
            ['Gohan Lomo saltado','Arroz',200],
            ['Gohan Lomo saltado','Palta',1],
            ['Gohan Lomo saltado','Queso crema',29],
            ['Gohan Lomo saltado','Carne',80],
            ['Gohan Lomo saltado','Cebollin',0],
            ['Gohan Lomo saltado','Cebolla morada',0],
            ['Gohan Lomo saltado','Papas al hilo',0],
            ['Gyosas de pollo (5 unidades)','Gyosas de pollo ',5],
            ['Gyosas de cerdo (5 unidades)','Gyosas de cerdo ',5],
            ['Gyosas de camaron (5 unidades)','Gyosas de camaron ',5],
            ['Gyosas de verduras (5 unidades)','Gyosas de verduras ',5],
            ['Camarones apanados (5 unidades)','Camaron',5],
            ['Camarones con queso (5 unidades)','Camaron',5]
        ];

        $producto="";
        $prescriptions=[];
        foreach ($recetas as $key => $receta) {
            if($producto!=$receta[0]){
                $producto=$receta[0];
                $products= Product::where('name','like', $producto.'%')->get();
                $prescriptions=[];
                foreach ($products as $key => $product) {
                    $prescriptions[]=Prescription::create(['description'=>$product->name,'product_id'=>$product->id]);
                }
            }
            $item= Item::where('name','like', $receta[1])->first();
            if($item){
                foreach ($prescriptions as $key => $prescription) {
                    Prescriptiondetail::create(['item_id'=>$item->id,'prescription_id'=>$prescription->id,'quantity'=>$receta[2]]);
                }
            }
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
