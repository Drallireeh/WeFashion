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
            "gender" => "hommes"
        ]);

        App\Category::create([
            "gender" => "femmes"
        ]);

        // création de 80 produits à partir de la factory
        factory(App\Product::class, 80)->create()->each(function ($product) {
            // associons un genre à un produit que nous venons de créer
            $category = App\Category::find(rand(1, 2));

            // pour chaque $product on lui associe un genre en particulier
            $product->category()->associate($category);
            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données

            $files = Storage::allFiles($category->gender == "hommes" ? "hommes" : "femmes");
            
            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            // ajout des images

            $product->picture()->create([
                'link' => $file
            ]);
        });
    }
}
