<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Parfumerie & Fragrance',
            'Parfums homme/femme de luxe',
            'Coffrets parfumés pour occasions spéciales',
            'Bougies parfumées haut de gamme',
            'Diffuseurs d’ambiance premium',
            'Soins de la peau & anti-âge',
            'Crèmes hydratantes et sérums luxueux',
            'Masques faciaux premium',
            'Gels et huiles pour soins anti-âge',
            'Kits complets de routine visage',
            'Maquillage haut de gamme',
            'Palettes de fards à paupières et blushs',
            'Rouge à lèvres longue tenue de luxe',
            'Kits de pinceaux professionnels',
            'Fond de teint et illuminateurs premium',
            'Accessoires de mode & luxe',
            'Sacs à main, pochettes, sacs de soirée',
            'Bijoux en argent, plaqués or ou cristaux',
            'Lunettes de soleil et montres élégantes',
            'Écharpes et foulards de designer',
            'Soins capillaires premium',
            'Shampoings et masques nutritifs',
            'Produits pour lissage, boucles et coiffures protectrices',
            'Kits de coiffure automatique (tresses, boucles)',
            'Accessoires de coiffure haut de gamme',
            'Luxe technologique / gadgets beauté',
            'Brosses à dents électriques haut de gamme',
            'Appareils de massage visage et corps',
            'Mini-sèche-cheveux portables et stylers',
            'Montres intelligentes et trackers santé/fitness',
            'Coffrets cadeaux & éditions limitées',
            'Coffrets beauté et parfums pour fêtes',
            'Box luxe pour hommes/femmes',
            'Produits saisonniers ou collaborations exclusives',
        ];
        foreach ($categories as $name) {
            DB::table('categories')->updateOrInsert(['name' => $name]);
        }
    }
}
