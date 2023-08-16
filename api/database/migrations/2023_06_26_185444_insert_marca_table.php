<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        DB::table('marca_automovels')->insert([
            ['nome_modelo' => 'Toyota'],
            ['nome_modelo' => 'Volkswagen'],
            ['nome_modelo' => 'Ford'],
            ['nome_modelo' => 'Honda'],
            ['nome_modelo' => 'Chevrolet'],
            ['nome_modelo' => 'BMW'],
            ['nome_modelo' => 'Mercedes-Benz'],
            ['nome_modelo' => 'Audi'],
            ['nome_modelo' => 'Nissan'],
            ['nome_modelo' => 'Hyundai'],
            ['nome_modelo' => 'Kia'],
            ['nome_modelo' => 'Subaru'],
            ['nome_modelo' => 'Volvo'],
            ['nome_modelo' => 'Land Rover'],
            ['nome_modelo' => 'Jeep'],
            ['nome_modelo' => 'Mitsubishi'],
            ['nome_modelo' => 'Jaguar'],
            ['nome_modelo' => 'Cadillac'],
            ['nome_modelo' => 'Jaguar'],
            ['nome_modelo' => 'Fiat'],
            ['nome_modelo' => 'Renault'],
            ['nome_modelo' => 'Peugeot'],
            ['nome_modelo' => 'Yamaha'],
            ['nome_modelo' => 'Kawasaki'],
            ['nome_modelo' => 'Ducati'],
            ['nome_modelo' => 'Suzuki'],
            ['nome_modelo' => 'Harley-Davidson'],
            ['nome_modelo' => 'BMW Motorrad'],
            ['nome_modelo' => 'Triumph'],
            ['nome_modelo' => 'KTM'],
            ['nome_modelo' => 'Aprilia'],
            ['nome_modelo' => 'Moto Guzzi'],
            ['nome_modelo' => 'Victory'],
            ['nome_modelo' => 'Indian Motorcycle'],
            ['nome_modelo' => 'Moto Morini'],
            ['nome_modelo' => 'Benelli'],
            ['nome_modelo' => 'MV Agusta'],
            ['nome_modelo' => 'Royal Enfield'],
            ['nome_modelo' => 'Buell'],
            ['nome_modelo' => 'Zero Motorcycles'],
            ['nome_modelo' => 'Husqvarna'],
            ['nome_modelo' => 'Scania'],
            ['nome_modelo' => 'MAN'],
            ['nome_modelo' => 'Iveco'],
            ['nome_modelo' => 'DAF'],
            ['nome_modelo' => 'Kenworth'],
            ['nome_modelo' => 'Peterbilt'],
            ['nome_modelo' => 'Freightliner'],
            ['nome_modelo' => 'Mack Trucks'],
            ['nome_modelo' => 'International'],
            ['nome_modelo' => 'Western Star'],
            ['nome_modelo' => 'Isuzu'],
            ['nome_modelo' => 'Hino'],
        ]);

        // Preenchendo a tabela 'modelo_automovels'
        DB::table('modelo_automovels')->insert([
            // Toyota
            ['nome_modelo' => 'Corolla', 'marca_id' => 1],
            ['nome_modelo' => 'Camry', 'marca_id' => 1],
            ['nome_modelo' => 'RAV4', 'marca_id' => 1],
            ['nome_modelo' => 'Hilux', 'marca_id' => 1],
            ['nome_modelo' => 'Yaris', 'marca_id' => 1],
            ['nome_modelo' => 'Prius', 'marca_id' => 1],
            ['nome_modelo' => 'Land Cruiser', 'marca_id' => 1],
            ['nome_modelo' => 'Corolla Cross', 'marca_id' => 1],
            ['nome_modelo' => 'Fortuner', 'marca_id' => 1],
            ['nome_modelo' => 'Tacoma', 'marca_id' => 1],
            ['nome_modelo' => 'Sienna', 'marca_id' => 1],
            ['nome_modelo' => 'C-HR', 'marca_id' => 1],
            ['nome_modelo' => 'Highlander', 'marca_id' => 1],
            ['nome_modelo' => 'Avalon', 'marca_id' => 1],
            ['nome_modelo' => '86', 'marca_id' => 1],
            ['nome_modelo' => 'Tundra', 'marca_id' => 1],
            ['nome_modelo' => 'Supra', 'marca_id' => 1],
            ['nome_modelo' => 'Sequoia', 'marca_id' => 1],
            ['nome_modelo' => '4Runner', 'marca_id' => 1],
            ['nome_modelo' => 'Mirai', 'marca_id' => 1],

            // Volkswagen
            ['nome_modelo' => 'Golf', 'marca_id' => 2],
            ['nome_modelo' => 'Jetta', 'marca_id' => 2],
            ['nome_modelo' => 'Polo', 'marca_id' => 2],
            ['nome_modelo' => 'Tiguan', 'marca_id' => 2],
            ['nome_modelo' => 'Passat', 'marca_id' => 2],
            ['nome_modelo' => 'Saveiro', 'marca_id' => 2],
            ['nome_modelo' => 'Fox', 'marca_id' => 2],
            ['nome_modelo' => 'Amarok', 'marca_id' => 2],
            ['nome_modelo' => 'Voyage', 'marca_id' => 2],
            ['nome_modelo' => 'Up!', 'marca_id' => 2],
            ['nome_modelo' => 'Gol', 'marca_id' => 2],
            ['nome_modelo' => 'Kombi', 'marca_id' => 2],
            ['nome_modelo' => 'T-Cross', 'marca_id' => 2],
            ['nome_modelo' => 'Arteon', 'marca_id' => 2],
            ['nome_modelo' => 'Bora', 'marca_id' => 2],
            ['nome_modelo' => 'Phaeton', 'marca_id' => 2],
            ['nome_modelo' => 'Santana', 'marca_id' => 2],
            ['nome_modelo' => 'Scirocco', 'marca_id' => 2],
            ['nome_modelo' => 'Touran', 'marca_id' => 2],
            ['nome_modelo' => 'Beetle', 'marca_id' => 2],

            // Ford
            ['nome_modelo' => 'Mustang', 'marca_id' => 3],
            ['nome_modelo' => 'F-150', 'marca_id' => 3],
            ['nome_modelo' => 'Focus', 'marca_id' => 3],
            ['nome_modelo' => 'Escape', 'marca_id' => 3],
            ['nome_modelo' => 'Explorer', 'marca_id' => 3],
            ['nome_modelo' => 'Ranger', 'marca_id' => 3],
            ['nome_modelo' => 'Fusion', 'marca_id' => 3],
            ['nome_modelo' => 'Bronco', 'marca_id' => 3],
            ['nome_modelo' => 'Edge', 'marca_id' => 3],
            ['nome_modelo' => 'Expedition', 'marca_id' => 3],
            ['nome_modelo' => 'EcoSport', 'marca_id' => 3],
            ['nome_modelo' => 'Escape', 'marca_id' => 3],
            ['nome_modelo' => 'Transit', 'marca_id' => 3],
            ['nome_modelo' => 'Flex', 'marca_id' => 3],
            ['nome_modelo' => 'Fiesta', 'marca_id' => 3],
            ['nome_modelo' => 'Taurus', 'marca_id' => 3],
            ['nome_modelo' => 'C-Max', 'marca_id' => 3],
            ['nome_modelo' => 'Edge', 'marca_id' => 3],
            ['nome_modelo' => 'Super Duty', 'marca_id' => 3],
            ['nome_modelo' => 'GT', 'marca_id' => 3],

            // Honda
            ['nome_modelo' => 'Civic', 'marca_id' => 4],
            ['nome_modelo' => 'Accord', 'marca_id' => 4],
            ['nome_modelo' => 'CR-V', 'marca_id' => 4],
            ['nome_modelo' => 'HR-V', 'marca_id' => 4],
            ['nome_modelo' => 'Pilot', 'marca_id' => 4],
            ['nome_modelo' => 'Fit', 'marca_id' => 4],
            ['nome_modelo' => 'City', 'marca_id' => 4],
            ['nome_modelo' => 'WR-V', 'marca_id' => 4],
            ['nome_modelo' => 'BR-V', 'marca_id' => 4],
            ['nome_modelo' => 'CR-Z', 'marca_id' => 4],

            // Chevrolet
            ['nome_modelo' => 'Onix', 'marca_id' => 5],
            ['nome_modelo' => 'Prisma', 'marca_id' => 5],
            ['nome_modelo' => 'S10', 'marca_id' => 5],
            ['nome_modelo' => 'Cruze', 'marca_id' => 5],
            ['nome_modelo' => 'Spin', 'marca_id' => 5],
            ['nome_modelo' => 'Tracker', 'marca_id' => 5],
            ['nome_modelo' => 'Celta', 'marca_id' => 5],
            ['nome_modelo' => 'Corsa', 'marca_id' => 5],
            ['nome_modelo' => 'Astra', 'marca_id' => 5],
            ['nome_modelo' => 'Montana', 'marca_id' => 5],
            ['nome_modelo' => 'Cobalt', 'marca_id' => 5],
            ['nome_modelo' => 'Trailblazer', 'marca_id' => 5],
            ['nome_modelo' => 'Equinox', 'marca_id' => 5],
            ['nome_modelo' => 'Blazer', 'marca_id' => 5],
            ['nome_modelo' => 'Meriva', 'marca_id' => 5],
            ['nome_modelo' => 'Chevette', 'marca_id' => 5],
            ['nome_modelo' => 'Zafira', 'marca_id' => 5],
            ['nome_modelo' => 'Opala', 'marca_id' => 5],
            ['nome_modelo' => 'Malibu', 'marca_id' => 5],
            ['nome_modelo' => 'Impala', 'marca_id' => 5],

            // BMW
            ['nome_modelo' => '3 Series', 'marca_id' => 6],
            ['nome_modelo' => '5 Series', 'marca_id' => 6],
            ['nome_modelo' => 'X3', 'marca_id' => 6],
            ['nome_modelo' => 'X5', 'marca_id' => 6],
            ['nome_modelo' => '7 Series', 'marca_id' => 6],
            ['nome_modelo' => '1 Series', 'marca_id' => 6],
            ['nome_modelo' => '2 Series', 'marca_id' => 6],
            ['nome_modelo' => 'X1', 'marca_id' => 6],
            ['nome_modelo' => 'X2', 'marca_id' => 6],
            ['nome_modelo' => 'Z4', 'marca_id' => 6],

            // Mercedes-Benz
            ['nome_modelo' => 'C-Class', 'marca_id' => 7],
            ['nome_modelo' => 'E-Class', 'marca_id' => 7],
            ['nome_modelo' => 'GLC', 'marca_id' => 7],
            ['nome_modelo' => 'GLE', 'marca_id' => 7],
            ['nome_modelo' => 'S-Class', 'marca_id' => 7],
            ['nome_modelo' => 'A-Class', 'marca_id' => 7],
            ['nome_modelo' => 'B-Class', 'marca_id' => 7],
            ['nome_modelo' => 'GLA', 'marca_id' => 7],
            ['nome_modelo' => 'GLB', 'marca_id' => 7],
            ['nome_modelo' => 'CLS', 'marca_id' => 7],

            // Audi
            ['nome_modelo' => 'A4', 'marca_id' => 8],
            ['nome_modelo' => 'A6', 'marca_id' => 8],
            ['nome_modelo' => 'Q5', 'marca_id' => 8],
            ['nome_modelo' => 'Q7', 'marca_id' => 8],
            ['nome_modelo' => 'R8', 'marca_id' => 8],

            // Nissan
            ['nome_modelo' => 'Altima', 'marca_id' => 9],
            ['nome_modelo' => 'Maxima', 'marca_id' => 9],
            ['nome_modelo' => 'Rogue', 'marca_id' => 9],
            ['nome_modelo' => 'Pathfinder', 'marca_id' => 9],
            ['nome_modelo' => 'GT-R', 'marca_id' => 9],
            ['nome_modelo' => 'Versa', 'marca_id' => 9],
            ['nome_modelo' => 'Sentra', 'marca_id' => 9],
            ['nome_modelo' => 'Micra', 'marca_id' => 9],

            // Hyundai
            ['nome_modelo' => 'Elantra', 'marca_id' => 10],
            ['nome_modelo' => 'Sonata', 'marca_id' => 10],
            ['nome_modelo' => 'Tucson', 'marca_id' => 10],
            ['nome_modelo' => 'Santa Fe', 'marca_id' => 10],
            ['nome_modelo' => 'Kona', 'marca_id' => 10],
            ['nome_modelo' => 'i10', 'marca_id' => 10],
            ['nome_modelo' => 'i20', 'marca_id' => 10],
            ['nome_modelo' => 'Accent', 'marca_id' => 10],

            // Kia
            ['nome_modelo' => 'Optima', 'marca_id' => 11],
            ['nome_modelo' => 'Sorento', 'marca_id' => 11],
            ['nome_modelo' => 'Sportage', 'marca_id' => 11],
            ['nome_modelo' => 'Rio', 'marca_id' => 11],
            ['nome_modelo' => 'Telluride', 'marca_id' => 11],
            ['nome_modelo' => 'Picanto', 'marca_id' => 11],
            ['nome_modelo' => 'Rio', 'marca_id' => 11],
            ['nome_modelo' => 'Forte', 'marca_id' => 11],

            // Subaru
            ['nome_modelo' => 'Impreza', 'marca_id' => 12],
            ['nome_modelo' => 'Forester', 'marca_id' => 12],
            ['nome_modelo' => 'Outback', 'marca_id' => 12],
            ['nome_modelo' => 'Legacy', 'marca_id' => 12],
            ['nome_modelo' => 'Crosstrek', 'marca_id' => 12],
            ['nome_modelo' => 'Impreza', 'marca_id' => 12],
            ['nome_modelo' => 'Legacy', 'marca_id' => 12],
            ['nome_modelo' => 'Crosstrek', 'marca_id' => 12],

            // Volvo
            ['nome_modelo' => 'S60', 'marca_id' => 13],
            ['nome_modelo' => 'S90', 'marca_id' => 13],
            ['nome_modelo' => 'XC40', 'marca_id' => 13],
            ['nome_modelo' => 'XC60', 'marca_id' => 13],
            ['nome_modelo' => 'XC90', 'marca_id' => 13],

            // Land Rover
            ['nome_modelo' => 'Range Rover', 'marca_id' => 14],
            ['nome_modelo' => 'Range Rover Sport', 'marca_id' => 14],
            ['nome_modelo' => 'Discovery', 'marca_id' => 14],
            ['nome_modelo' => 'Defender', 'marca_id' => 14],
            ['nome_modelo' => 'Velar', 'marca_id' => 14],

            // Jeep
            ['nome_modelo' => 'Wrangler', 'marca_id' => 15],
            ['nome_modelo' => 'Grand Cherokee', 'marca_id' => 15],
            ['nome_modelo' => 'Cherokee', 'marca_id' => 15],
            ['nome_modelo' => 'Compass', 'marca_id' => 15],
            ['nome_modelo' => 'Renegade', 'marca_id' => 15],

            // Mitsubishi
            ['nome_modelo' => 'Outlander', 'marca_id' => 16],
            ['nome_modelo' => 'Eclipse Cross', 'marca_id' => 16],
            ['nome_modelo' => 'Pajero', 'marca_id' => 16],
            ['nome_modelo' => 'Lancer', 'marca_id' => 16],
            ['nome_modelo' => 'Mirage', 'marca_id' => 16],
            
            // Jaguar
            ['nome_modelo' => 'F-PACE', 'marca_id' => 17],
            ['nome_modelo' => 'XE', 'marca_id' => 17],
            ['nome_modelo' => 'XF', 'marca_id' => 17],
            ['nome_modelo' => 'F-TYPE', 'marca_id' => 17],
            ['nome_modelo' => 'I-PACE', 'marca_id' => 17],

            // Cadillac
            ['nome_modelo' => 'Escalade', 'marca_id' => 18],
            ['nome_modelo' => 'XT5', 'marca_id' => 18],
            ['nome_modelo' => 'CT6', 'marca_id' => 18],
            ['nome_modelo' => 'CTS', 'marca_id' => 18],
            ['nome_modelo' => 'XT4', 'marca_id' => 18],

            // Ram
            ['nome_modelo' => '1500', 'marca_id' => 19],
            ['nome_modelo' => '2500', 'marca_id' => 19],
            ['nome_modelo' => '3500', 'marca_id' => 19],
            ['nome_modelo' => 'ProMaster', 'marca_id' => 19],
            ['nome_modelo' => 'ProMaster City', 'marca_id' => 19],
            
            //fiat
            ['nome_modelo' => 'Uno', 'marca_id' => 20],
            ['nome_modelo' => 'Palio', 'marca_id' => 20],
            ['nome_modelo' => 'Strada', 'marca_id' => 20],
            ['nome_modelo' => 'Toro', 'marca_id' => 20],
            ['nome_modelo' => 'Mobi', 'marca_id' => 20],
            ['nome_modelo' => 'Siena', 'marca_id' => 20],
            ['nome_modelo' => 'Fiorino', 'marca_id' => 20],
            ['nome_modelo' => 'Punto', 'marca_id' => 20],
            ['nome_modelo' => 'Cronos', 'marca_id' => 20],
            ['nome_modelo' => 'Grand Siena', 'marca_id' => 20],
            ['nome_modelo' => '500', 'marca_id' => 20],
            ['nome_modelo' => 'Doblò', 'marca_id' => 20],
            ['nome_modelo' => 'Linea', 'marca_id' => 20],
            ['nome_modelo' => 'Bravo', 'marca_id' => 20],
            ['nome_modelo' => 'Weekend', 'marca_id' => 20],

            // renault
            ['nome_modelo' => 'Sandero', 'marca_id' => 21],
            ['nome_modelo' => 'Logan', 'marca_id' => 21],
            ['nome_modelo' => 'Duster', 'marca_id' => 21],
            ['nome_modelo' => 'Kwid', 'marca_id' => 21],
            ['nome_modelo' => 'Captur', 'marca_id' => 21],

            // Peugeot
            ['nome_modelo' => '208', 'marca_id' => 22],
            ['nome_modelo' => '308', 'marca_id' => 22],
            ['nome_modelo' => '2008', 'marca_id' => 22],
            ['nome_modelo' => '3008', 'marca_id' => 22],
            ['nome_modelo' => '5008', 'marca_id' => 22],
            ['nome_modelo' => '408', 'marca_id' => 22],
            ['nome_modelo' => 'Partner', 'marca_id' => 22],
            ['nome_modelo' => 'Expert', 'marca_id' => 22],
            ['nome_modelo' => 'Boxer', 'marca_id' => 22],
            ['nome_modelo' => 'Traveller', 'marca_id' => 22],
            ['nome_modelo' => 'Bipper', 'marca_id' => 22],
            ['nome_modelo' => 'iOn', 'marca_id' => 22],
            ['nome_modelo' => 'RCZ', 'marca_id' => 22],
            ['nome_modelo' => '508', 'marca_id' => 22],
            ['nome_modelo' => '5008', 'marca_id' => 22],
            ['nome_modelo' => '208 GTi', 'marca_id' => 22],
            ['nome_modelo' => '2008 GT Line', 'marca_id' => 22],
            ['nome_modelo' => '3008 GT', 'marca_id' => 22],
            ['nome_modelo' => '508 SW', 'marca_id' => 22],
            ['nome_modelo' => '508 PSE', 'marca_id' => 22],

            // Honda
            ['nome_modelo' => 'CBR 1000RR', 'marca_id' => 4],
            ['nome_modelo' => 'CRF 450R', 'marca_id' => 4],
            ['nome_modelo' => 'Gold Wing', 'marca_id' => 4],

            // Yamaha
            ['nome_modelo' => 'YZF-R6', 'marca_id' => 23],
            ['nome_modelo' => 'MT-07', 'marca_id' => 23],
            ['nome_modelo' => 'FZ-09', 'marca_id' => 23],

            // Kawasaki
            ['nome_modelo' => 'Ninja ZX-10R', 'marca_id' => 24],
            ['nome_modelo' => 'Z900', 'marca_id' => 24],
            ['nome_modelo' => 'Versys 650', 'marca_id' => 24],

            // Ducati
            ['nome_modelo' => 'Panigale V4', 'marca_id' => 25],
            ['nome_modelo' => 'Monster 821', 'marca_id' => 25],
            ['nome_modelo' => 'Multistrada 950', 'marca_id' => 25],

            // Suzuki
            ['nome_modelo' => 'GSX-R750', 'marca_id' => 26],
            ['nome_modelo' => 'V-Strom 650', 'marca_id' => 26],
            ['nome_modelo' => 'Hayabusa', 'marca_id' => 26],

            // Harley-Davidson
            ['nome_modelo' => 'Street Glide', 'marca_id' => 27],
            ['nome_modelo' => 'Iron 883', 'marca_id' => 27],
            ['nome_modelo' => 'Fat Boy', 'marca_id' => 27],

            // BMW Motorrad
            ['nome_modelo' => 'S1000RR', 'marca_id' => 28],
            ['nome_modelo' => 'R 1250 GS', 'marca_id' => 28],
            ['nome_modelo' => 'F 850 GS', 'marca_id' => 28],

            // Triumph
            ['nome_modelo' => 'Bonneville T120', 'marca_id' => 29],
            ['nome_modelo' => 'Street Triple', 'marca_id' => 29],
            ['nome_modelo' => 'Tiger 800', 'marca_id' => 29],

            // KTM
            ['nome_modelo' => '1290 Super Duke R', 'marca_id' => 30],
            ['nome_modelo' => '790 Duke', 'marca_id' => 30],
            ['nome_modelo' => '390 Duke', 'marca_id' => 30],

            // Aprilia
            ['nome_modelo' => 'RSV4', 'marca_id' => 31],
            ['nome_modelo' => 'Tuono V4', 'marca_id' => 31],
            ['nome_modelo' => 'Shiver 900', 'marca_id' => 31],

            // Moto Guzzi
            ['nome_modelo' => 'V7 III', 'marca_id' => 32],
            ['nome_modelo' => 'V9 Bobber', 'marca_id' => 32],
            ['nome_modelo' => 'MGX-21', 'marca_id' => 32],

            // Victory
            ['nome_modelo' => 'Cross Country', 'marca_id' => 33],
            ['nome_modelo' => 'Octane', 'marca_id' => 33],
            ['nome_modelo' => 'Magnum', 'marca_id' => 33],

            // Indian Motorcycle
            ['nome_modelo' => 'Chieftain', 'marca_id' => 34],
            ['nome_modelo' => 'Scout', 'marca_id' => 34],
            ['nome_modelo' => 'Chief Vintage', 'marca_id' => 34],

            // Moto Morini
            ['nome_modelo' => 'Corsaro ZZ', 'marca_id' => 35],
            ['nome_modelo' => 'Scrambler', 'marca_id' => 35],
            ['nome_modelo' => 'Granpasso 1200', 'marca_id' => 35],

            // Benelli
            ['nome_modelo' => 'TNT 600', 'marca_id' => 36],
            ['nome_modelo' => 'Leoncino', 'marca_id' => 36],
            ['nome_modelo' => 'TRK 502', 'marca_id' => 36],

            // MV Agusta
            ['nome_modelo' => 'F4', 'marca_id' => 37],
            ['nome_modelo' => 'Brutale 800', 'marca_id' => 37],
            ['nome_modelo' => 'Dragster 800', 'marca_id' => 37],

            // Royal Enfield
            ['nome_modelo' => 'Classic 500', 'marca_id' => 38],
            ['nome_modelo' => 'Himalayan', 'marca_id' => 38],
            ['nome_modelo' => 'Interceptor 650', 'marca_id' => 38],

            // Buell
            ['nome_modelo' => 'XB12R Firebolt', 'marca_id' => 39],
            ['nome_modelo' => '1125R', 'marca_id' => 39],
            ['nome_modelo' => 'Ulysses XB12X', 'marca_id' => 39],

            // Zero Motorcycles
            ['nome_modelo' => 'SR/F', 'marca_id' => 40],
            ['nome_modelo' => 'DSR Black Forest', 'marca_id' => 40],
            ['nome_modelo' => 'FXE', 'marca_id' => 40],

            // Husqvarna
            ['nome_modelo' => 'Vitpilen 701', 'marca_id' => 41],
            ['nome_modelo' => 'Svartpilen 401', 'marca_id' => 41],
            ['nome_modelo' => '701 Supermoto', 'marca_id' => 41],

            // Volvo
            ['nome_modelo' => 'FH16', 'marca_id' => 13],
            ['nome_modelo' => 'FM', 'marca_id' => 13],
            ['nome_modelo' => 'FH', 'marca_id' => 13],

            // Scania
            ['nome_modelo' => 'R-series', 'marca_id' => 42],
            ['nome_modelo' => 'S-series', 'marca_id' => 42],
            ['nome_modelo' => 'P-series', 'marca_id' => 42],

            // Mercedes-Benz
            ['nome_modelo' => 'Actros', 'marca_id' => 7],
            ['nome_modelo' => 'Arocs', 'marca_id' => 7],
            ['nome_modelo' => 'Atego', 'marca_id' => 7],

            // MAN
            ['nome_modelo' => 'TGX', 'marca_id' => 43],
            ['nome_modelo' => 'TGS', 'marca_id' => 43],
            ['nome_modelo' => 'TGL', 'marca_id' => 43],

            // Iveco
            ['nome_modelo' => 'Stralis', 'marca_id' => 44],
            ['nome_modelo' => 'Eurocargo', 'marca_id' => 44],
            ['nome_modelo' => 'Daily', 'marca_id' => 44],

            // Renault
            ['nome_modelo' => 'T High', 'marca_id' => 21],
            ['nome_modelo' => 'T Range', 'marca_id' => 21],
            ['nome_modelo' => 'D Wide', 'marca_id' => 12],

            // DAF
            ['nome_modelo' => 'XF', 'marca_id' => 45],
            ['nome_modelo' => 'CF', 'marca_id' => 45],
            ['nome_modelo' => 'LF', 'marca_id' => 45],

            // Kenworth
            ['nome_modelo' => 'W900', 'marca_id' => 46],
            ['nome_modelo' => 'T680', 'marca_id' => 46],
            ['nome_modelo' => 'T800', 'marca_id' => 46],

            // Peterbilt
            ['nome_modelo' => '389', 'marca_id' => 47],
            ['nome_modelo' => '579', 'marca_id' => 47],
            ['nome_modelo' => '567', 'marca_id' => 47],

            // Freightliner
            ['nome_modelo' => 'Cascadia', 'marca_id' => 48],
            ['nome_modelo' => 'M2', 'marca_id' => 48],
            ['nome_modelo' => 'Coronado', 'marca_id' => 48],

            // Mack Trucks
            ['nome_modelo' => 'Anthem', 'marca_id' => 49],
            ['nome_modelo' => 'Granite', 'marca_id' => 49],
            ['nome_modelo' => 'Pinnacle', 'marca_id' => 49],

            // International
            ['nome_modelo' => 'LT', 'marca_id' => 50],
            ['nome_modelo' => 'RH', 'marca_id' => 50],
            ['nome_modelo' => 'DuraStar', 'marca_id' => 50],

            // Western Star
            ['nome_modelo' => '5700XE', 'marca_id' => 51],
            ['nome_modelo' => '4900', 'marca_id' => 51],
            ['nome_modelo' => '4700', 'marca_id' => 51],

            // Isuzu
            ['nome_modelo' => 'N-Series', 'marca_id' => 52],
            ['nome_modelo' => 'F-Series', 'marca_id' => 52],
            ['nome_modelo' => 'FX-Series', 'marca_id' => 52],

            // Hino
            ['nome_modelo' => '155', 'marca_id' => 53],
            ['nome_modelo' => '268', 'marca_id' => 53],
            ['nome_modelo' => '338', 'marca_id' => 53],

        ]);


        DB::table('categoria_automovels')->insert([
            ['nome_categoria' => 'Sedan'],
            ['nome_categoria' => 'Hatchback'],
            ['nome_categoria' => 'SUV (utilitário esportivo)'],
            ['nome_categoria' => 'Crossover'],
            ['nome_categoria' => 'Minivan'],
            ['nome_categoria' => 'Picape (ou caminhonete)'],
            ['nome_categoria' => 'Conversível'],
            ['nome_categoria' => 'Cupê'],
            ['nome_categoria' => 'Carro esportivo'],
            ['nome_categoria' => 'Carro de luxo'],
            ['nome_categoria' => 'Carro compacto'],
            ['nome_categoria' => 'Carro subcompacto'],
            ['nome_categoria' => 'Carro elétrico'],
            ['nome_categoria' => 'Carro híbrido'],
            ['nome_categoria' => 'Carro a diesel'],
            ['nome_categoria' => 'Carro familiar'],
            ['nome_categoria' => 'Carro de tamanho médio'],
            ['nome_categoria' => 'Carro de tamanho grande'],
            ['nome_categoria' => 'Carro off-road'],
            ['nome_categoria' => 'Carro de corrida'],
            ['nome_categoria' => 'Caminhão leve'],
            ['nome_categoria' => 'Caminhão médio'],
            ['nome_categoria' => 'Caminhão pesado'],
            ['nome_categoria' => 'Caminhão basculante'],
            ['nome_categoria' => 'Caminhão tanque'],
            ['nome_categoria' => 'Caminhão reboque (ou caminhão trator)'],
            ['nome_categoria' => 'Caminhão guincho'],
            ['nome_categoria' => 'Caminhão betoneira'],
            ['nome_categoria' => 'Caminhão plataforma'],
            ['nome_categoria' => 'Caminhão de entrega'],
            ['nome_categoria' => 'Moto esportiva'],
            ['nome_categoria' => 'Moto de estrada'],
            ['nome_categoria' => 'Moto de aventura (ou dual-sport)'],
            ['nome_categoria' => 'Moto touring'],
            ['nome_categoria' => 'Moto custom'],
            ['nome_categoria' => 'Moto naked'],
            ['nome_categoria' => 'Moto off-road'],
            ['nome_categoria' => 'Moto scooter'],
            ['nome_categoria' => 'Moto elétrica'],
            ['nome_categoria' => 'Moto de competição'],
        ]);
        



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('automoveis', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['modelo_id']);
            $table->dropForeign(['marca_id']);

        });

        Schema::dropIfExists('categoria_automovels');


        Schema::dropIfExists('modelo_automovels');

        Schema::dropIfExists('marca_automovels');

    }
};
