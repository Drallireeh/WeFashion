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

        // Création des tailles 
        App\Size::create([
            "value" => "XS"
        ]);

        App\Size::create([
            "value" => "S"
        ]);

        App\Size::create([
            "value" => "M"
        ]);

        App\Size::create([
            "value" => "L"
        ]);

        App\Size::create([
            "value" => "XL"
        ]);

        // création de 80 produits à partir de la factory
        factory(App\Product::class, 80)->create()->each(function ($product) {
            // associons un genre à un produit que nous venons de créer
            $category = App\Category::find(rand(1, 2));

            // pour chaque $product on lui associe un genre en particulier
            $product->category()->associate($category);

            // Récupère une image dans la catégorie qui correspond
            $files = Storage::allFiles($category->gender == "hommes" ? "hommes" : "femmes");
            
            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            // ajout des images

            $product->picture()->create([
                'link' => $file
            ]);
            
            // Récupération de tailles, entre une et cinq possibles
            $sizes = App\Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            
            // Tri les tailles dans leur ordre d'id (XS / S / M / L / XL)
            $filter_sizes = array_values(array_sort($sizes, function ($value) {
                return $value;
            }));
            
            $product->sizes()->attach($filter_sizes);

            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
