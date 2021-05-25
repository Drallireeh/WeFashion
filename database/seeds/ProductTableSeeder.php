<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création des genres 
        App\Category::create([
            "gender" => "male"
        ]);

        App\Category::create([
            "gender" => "female"
        ]);

        // on prendra garde de bien supprimer toutes les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allFiles());

        // // création de 30 livres à partir de la factory
        factory(App\Product::class, 80)->create()->each(function ($product) {
            // associons un genre à un livre que nous venons de créer
            $genre = App\Category::find(rand(1, 2));

            // pour chaque $product on lui associe un genre en particulier
            $product->category()->associate($genre);
            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
