<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name'=>'California Salumado (california)','description'=>'Salmon Ahumado - Queso Crema - Palta','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'California Salumado (Avocado)','description'=>'Salmon Ahumado - Queso Crema - Palta','price'=>5200,'producttype_id'=>1]);
        Product::create(['name'=>'Tempura Cheese Rolls (california)','description'=>'Camarón Tempura - Queso Crema - Palta','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'Tempura Cheese Rolls (Avocado)','description'=>'Camarón Tempura - Queso Crema - Palta','price'=>5200,'producttype_id'=>1]);
        Product::create(['name'=>'Tory Roll (california)','description'=>' Pollo Apanado - Queso Crema - Palta','price'=>4200,'producttype_id'=>1]);
        Product::create(['name'=>'Tory Roll (Avocado)','description'=>' Pollo Apanado - Queso Crema - Palta','price'=>5200,'producttype_id'=>1]);
        Product::create(['name'=>'Maki Roll (california)','description'=>'Rol','price'=>4000,'producttype_id'=>1]);
        Product::create(['name'=>'Maki Roll (Avocado)','description'=>'Kanikama - Queso Crema - Palta','price'=>5000,'producttype_id'=>1]);
        Product::create(['name'=>'Tako Roll (california)','description'=>'Pulpo - Queso Crema - Palta','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'Tako Roll (Avocado)','description'=>'Pulpo - Queso Crema - Palta','price'=>5200,'producttype_id'=>1]);
        Product::create(['name'=>'Crab Cheese Rolls (california)','description'=>'Jaiba - Queso Crema - Palta','price'=>5000,'producttype_id'=>1]);
        Product::create(['name'=>'Crab Cheese Rolls (avocado)','description'=>'Jaiba - Queso Crema - Palta','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Teri Cheese Rolls (california)','description'=>'Pollo Teriyaki - Queso Crema - Cebollín','price'=>4000,'producttype_id'=>1]);
        Product::create(['name'=>'Teri Cheese Rolls (avocado)','description'=>'Pollo Teriyaki - Queso Crema - Cebollín','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Ebi Rolls (california)','description'=>'Camarón - Palta','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'Ebi Rolls (avocado)','description'=>'Camarón - Palta','price'=>5000,'producttype_id'=>1]);
        Product::create(['name'=>'Sake Furay Rolls (california)','description'=>'Salmón Apanado - Queso Crema - Cebollín','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'Sake Furay Rolls (avocado)','description'=>'Salmón Apanado - Queso Crema - Cebollín','price'=>5200,'producttype_id'=>1]);
        Product::create(['name'=>'Avocado Especial (california)','description'=>'Salmón - Queso Crema - Cebollín','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'Avocado Especial (avocado)','description'=>'Salmón - Queso Crema - Cebollín','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Spicy Tempura (california)','description'=>'Camarón Apanado - Salsa Spicy - Queso - Cebollín','price'=>4800,'producttype_id'=>1]);
        Product::create(['name'=>'Spicy Tempura (avocado)','description'=>'Camarón Apanado - Salsa Spicy - Queso - Cebollín','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Spicy Tako (california)','description'=>'Pulpo - Palta - Salsa Spicy','price'=>5000,'producttype_id'=>1]);
        Product::create(['name'=>'Spicy Tako (avocado)','description'=>'Pulpo - Palta - Salsa Spicy','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Beff Rolls (california)','description'=>'Carne - Queso Crema - Cebollín','price'=>5000,'producttype_id'=>1]);
        Product::create(['name'=>'Beff Rolls (avocado)','description'=>'Carne - Queso Crema - Cebollín','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Maguro Roll (california)','description'=>'Atún - Palta','price'=>4500,'producttype_id'=>1]);
        Product::create(['name'=>'Maguro Roll (avocado)','description'=>'Atún - Palta','price'=>5500,'producttype_id'=>1]);
        Product::create(['name'=>'Hot Rolls','description'=>'Salmón - Queso Crema - Cebollín','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Tempura Sake','description'=>'Salmón Ahumado - Queso Crema - Palta','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Tempura Tako','description'=>'Pulpo - Queso Crema - Ciboulette - Masago','price'=>5300,'producttype_id'=>2]);
        Product::create(['name'=>'Tory Furay','description'=>'Camarón - Queso Crema - Ciboulette Envuelto Pollo o Salmón','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Tempura Tery Roll','description'=>'Pollo - Queso Crema - Ciboulette o Palta','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Tempura Especial','description'=>'Salmón - Camarón - Queso Crema - Cebollín','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Crabs Rolls','description'=>'Jaiba - Queso Crema - Cebollín','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Avocado Tempura','description'=>'Camarón - Queso Crema - Palta','price'=>5500,'producttype_id'=>2]);
        Product::create(['name'=>'Tory Teriyaki Furay','description'=>'Pollo - Cebollín - Queso Crema - Pimentón','price'=>5000,'producttype_id'=>2]);
        Product::create(['name'=>'Beef Furay','description'=>'Carne - Queso Crema - Cebollín','price'=>5300,'producttype_id'=>2]);
        Product::create(['name'=>'Maki Hot','description'=>'Kanikama - Queso - Cebollín o Palta','price'=>5000,'producttype_id'=>2]);
        Product::create(['name'=>'Pollo Apanado - Palta','description'=>'','price'=>5000,'producttype_id'=>3]);
        Product::create(['name'=>'Camarón - Palta','description'=>'','price'=>5000,'producttype_id'=>3]);
        Product::create(['name'=>'Salmón - Palta','description'=>'','price'=>5200,'producttype_id'=>3]);
        Product::create(['name'=>'Pulpo - Palta','description'=>'','price'=>5500,'producttype_id'=>3]);
        Product::create(['name'=>'Camarón Tempura -Palta','description'=>'','price'=>5500,'producttype_id'=>3]);
        Product::create(['name'=>'Camarón - Salmón - Palta','description'=>'','price'=>5500,'producttype_id'=>3]);
        Product::create(['name'=>'Carne - Palta','description'=>'','price'=>5000,'producttype_id'=>3]);
        Product::create(['name'=>'Kanikama - Palta','description'=>'','price'=>4800,'producttype_id'=>3]);
        Product::create(['name'=>'California Vegetariano','description'=>'Palmito - Choclo Enano - Palta - Envuelto en Sésamo','price'=>4200,'producttype_id'=>4]);
        Product::create(['name'=>'Champi Furay','description'=>'Champiñón Furay - Queso Crema - Cebollín - Envuelto en Palta','price'=>4500,'producttype_id'=>4]);
        Product::create(['name'=>'Vege Rolls','description'=>'Champiñón Furay - Queso Crema - Ciboulette - Frito en Panko','price'=>4200,'producttype_id'=>4]);
        Product::create(['name'=>'Palmi White','description'=>'Palmito - Palta - Envuelto en Queso Crema','price'=>4500,'producttype_id'=>4]);
        Product::create(['name'=>'Veggie Furay','description'=>'Champiñón - Queso - Pimentón - Almendras - Frito en Panko','price'=>4500,'producttype_id'=>4]);
        Product::create(['name'=>'Hosomakis Sake','description'=>'Salmón - Queso','price'=>3500,'producttype_id'=>5]);
        Product::create(['name'=>'Hosomaki Ebi','description'=>'Camarón - Queso','price'=>3500,'producttype_id'=>5]);
        Product::create(['name'=>'Hosomaki Tory','description'=>'Pollo - Queso Crema','price'=>3500,'producttype_id'=>5]);
        Product::create(['name'=>'Hosomaki Maki','description'=>'Kanikama - Queso Crema','price'=>3500,'producttype_id'=>5]);
        Product::create(['name'=>'Envuelto en Pulpo','description'=>'Camarón o Salmó - Queso Crema - Cebollín y Palta','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Acevichado Ebi','description'=>'(Envuelto en Palta o en Salmón)(Camarón Apanado - Queso Crema y Palta) Bañado en Salsa Acevichada','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Envuelto en Mango','description'=>'(Camarón - Queso Crema y Palta) Bañado en Salsa Maracuyá','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Sake Tartare','description'=>'(Palta - Fideos de Wantán y Cebolla Morada) Frito en Panko Bañado en Salsa Nikkei Con Trozos de Salmón','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Rolls Sin Arroz Envuelto en Palta o Frito en Panko','description'=>'(Camarón - Salmón - Queso Crema y Cebollín)','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Rolls Sin Arroz Envuelto en Salmón','description'=>'(Camarón Apanado - Queso Crema y Cebollín)','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Oriental Acevichado(Sin Arroz)','description'=>'(Pescado Apanado - Queso Crema y Cebollín)','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Rolls Sin Arroz Frito','description'=>'(Carne - Pollo - Queso Crema y Cebollín) Frito en Panko','price'=>6300,'producttype_id'=>6]);
        Product::create(['name'=>'Rolls Sin Arroz Envuelto en Queso Crema','description'=>'(Salmón - Camarón - Queso Crema y Cebollín)','price'=>6500,'producttype_id'=>6]);
        Product::create(['name'=>'Ceviche Rolls','description'=>'(Camarón Apanado - Palta) Bañado en Ceviche','price'=>7000,'producttype_id'=>6]);
        Product::create(['name'=>'Lomo Saltado','description'=>'(Palta - Queso Crema ) Cubierto Por Lomo Saltado','price'=>7000,'producttype_id'=>6]);
        Product::create(['name'=>'Roll Pil Pil','description'=>'(Roll Apanado - Pollo - Queso Crema - Cebollín) Cubierto con Camarones al Pil Pil','price'=>7000,'producttype_id'=>6]);
        Product::create(['name'=>'Pollo','description'=>'','price'=>5800,'producttype_id'=>7]);
        Product::create(['name'=>'Carne','description'=>'','price'=>6000,'producttype_id'=>7]);
        Product::create(['name'=>'Camarón','description'=>'','price'=>6000,'producttype_id'=>7]);
        Product::create(['name'=>'Vegetariano','description'=>'','price'=>5500,'producttype_id'=>7]);
        Product::create(['name'=>'Salmón','description'=>'','price'=>7000,'producttype_id'=>7]);
        Product::create(['name'=>'Kanikama','description'=>'','price'=>5500,'producttype_id'=>7]);
        Product::create(['name'=>'Pollo Apanado','description'=>'','price'=>6500,'producttype_id'=>7]);
        Product::create(['name'=>'Camarón Apanado','description'=>'','price'=>6500,'producttype_id'=>7]);
        Product::create(['name'=>'Gohan Mixto','description'=>'','price'=>6500,'producttype_id'=>7]);
        Product::create(['name'=>'Lomo Saltado','description'=>'','price'=>7200,'producttype_id'=>7]);
        Product::create(['name'=>'Gyosas de Pollo (5 Unidades)','description'=>'','price'=>3200,'producttype_id'=>8]);
        Product::create(['name'=>'Gyosas de Cerdo (5 Unidades)','description'=>'','price'=>3200,'producttype_id'=>8]);
        Product::create(['name'=>'Gyosas de Camarón (5 Unidades)','description'=>'','price'=>3500,'producttype_id'=>8]);
        Product::create(['name'=>'Gyosas Champiñon - Queso (5 Unidades)','description'=>'','price'=>3200,'producttype_id'=>8]);
        Product::create(['name'=>'Camarones Apanados (5 Unidades)','description'=>'','price'=>4500,'producttype_id'=>8]);
        Product::create(['name'=>'Camarones Con Queso(5 Unidades)','description'=>'','price'=>4800,'producttype_id'=>8]);
        Product::create(['name'=>'Tory Balls (5 Unidades)','description'=>'','price'=>4800,'producttype_id'=>8]);
        Product::create(['name'=>'Sashimi Sake (4 Cortes)','description'=>'','price'=>4800,'producttype_id'=>8]);
        Product::create(['name'=>'Sashimi Taki (4 Cortes)','description'=>'','price'=>4500,'producttype_id'=>8]);
        Product::create(['name'=>'Oreo','description'=>'','price'=>4200,'producttype_id'=>9]);
        Product::create(['name'=>'Trilogía','description'=>'','price'=>4200,'producttype_id'=>9]);
        Product::create(['name'=>'Brownie','description'=>'','price'=>4200,'producttype_id'=>9]);
        Product::create(['name'=>'Pie de Limón','description'=>'','price'=>4200,'producttype_id'=>9]);
        Product::create(['name'=>'Maracuyá','description'=>'','price'=>4200,'producttype_id'=>9]);
        Product::create(['name'=>'Bebida en Lata 350 CC','description'=>'(Coca cola - Coca Cola Zero - Fanta - Sprite)','price'=>1000,'producttype_id'=>10]);
        Product::create(['name'=>'Jugos Naturales 350 CC','description'=>'(Frutilla - Mango - Maracuya - Chirimoya - Piña)','price'=>3300,'producttype_id'=>10]);
        Product::create(['name'=>'Bebidas 1 1/2','description'=>'(Coca cola - Coca Cola Zero - Fanta - Sprite)','price'=>2500,'producttype_id'=>10]);
        Product::create(['name'=>'Té','description'=>'','price'=>1000,'producttype_id'=>10]);
        Product::create(['name'=>'Café','description'=>'','price'=>1500,'producttype_id'=>10]);
        Product::create(['name'=>'15 Piezas Normal','description'=>'Rolls Envuelto Sésamo (Kanikama - Queso Crema - Cebollín) (10 Cortes) 5 Gyosas + 2 Palitos + 2 Soyas','price'=>7000,'producttype_id'=>11]);
        Product::create(['name'=>'20 Piezas Fritas','description'=>'Rolls Panko (Kanikama - Queso Crema - Cebollín) Rolls Panko (Pollo - Queso Crema -Cebollín) + 2 Palitos + 2 Soyas + 1 Agridulce','price'=>8000,'producttype_id'=>11]);
        Product::create(['name'=>'30 Piezas Normal Mixta','description'=>'Rolls Envuelto en Palta (Camarón - Queso Crema - Cebollín) Rolls Envuelto en Sésamo (Kanikama - Queso Crema - Cebollín)','price'=>12000,'producttype_id'=>11]);
        Product::create(['name'=>'40 Piezas Normal Mixta','description'=>'Rolls Envuelto en Palta (Camarón - Queso Crema - Cebollín) Rolls Envuelto en Sésamo o Frito (Kanikama - Queso Crema - Cebollín) Rolls Envuelto en Ciboulette (Palmito - Palta - Cebollín) Roll´s Envuelto en Panko (Pollo - Queso Crema - Cebollín) + 4 Palitos + 3 Soyas + 1 Agridulce','price'=>14600,'producttype_id'=>11]);
        Product::create(['name'=>'40 Piezas Fritas','description'=>'Rolls Panko (Kanikama - Queso Crema - Cebollín) Roll´s Panko (Pollo - Queso Crema - Cebollín) Roll´s Panko (Camarón - queso crema - Cebollín) Roll´s Panko (Champiñon - Queso Crema - Cebollín) + 4 Palitos + 2 Soyas + 1 Agridulce','price'=>15000,'producttype_id'=>11]);
        Product::create(['name'=>'50 PieZas Vip','description'=>'Rolls envuelto en palta (Carne - Queso crema - Cebollín), Rolls envuelto en salmón (Camarón - Queso crema - Cebollín), Rollsenvuelto en Queso Crema (Pollo apanado - Palta), Rollsenvuelto Panko (Pollo - queso crema - Cebollín), Camarones apanados (5 UNIDADES), Gyosas del chef (5 UNIDADES) + 4 palitos + 4 soyas + 2 agridulce','price'=>18500,'producttype_id'=>11]);
        Product::create(['name'=>'60 Piezas Normal Mixtas','description'=>'Rollsenvuelto en palta (Carne - Queso crema - Cebollín), Rolls envuelto en sésamo (Kanikama - Queso crema - Cebollín), Rollsenvuelto en cibOulette (Palmito - Palta - Cebollín), Rollsenvuelto en Panko (Pollo - Queso crema - Cebollín), Rollsenvuelto en Queso Crema (Pollo apanado - Palta), Rollsenvuelto en Panko (Camarón - queso crema - Cebollín)  6 palitos + 5 soyas + 2 agridulce','price'=>19000,'producttype_id'=>11]);
        Product::create(['name'=>'40 Piezas Fritas sólo Pollo','description'=>'RollsPanko (Pollo - Queso crema - Cebollín), Rolls Panko (Pollo - Queso crema - Cebollín), RollsPanko (Pollo - Queso crema - Cebollín), RollsPanko (Pollo - Queso crema - Cebollín) + 4 palitos + 3 soyas + 1 Agridulce','price'=>13000,'producttype_id'=>11]);
        Product::create(['name'=>'3 Hand Rolls','description'=>'RollsPanko (Pollo - Queso crema - Cebollín), RollsPanko (Kanikama - Queso crema - Cebollín), RollsPanko (Carne - Queso crema - Cebollín) +2 soyas + 1 Agridulce','price'=>9000,'producttype_id'=>11]);
        Product::create(['name'=>'2 Hand Rolls','description'=>'RollsPanko (Pollo - Queso crema - Cebollín), RollsPanko (Kanikama - Queso crema - Cebollín) 1 soya + 1 Agridulce','price'=>6500,'producttype_id'=>11]);
        Product::create(['name'=>'20 y 20 palta y panko','description'=>'todos rellenos de pollo - queso crema - Cebollín','price'=>13900,'producttype_id'=>11]);
    }
}
