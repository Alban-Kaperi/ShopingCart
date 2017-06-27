<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath'=>'storage/img/products/food/pizza/1.jpg',
            'title'=>'Pizza capricciosa',
            'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
            'price'=>9.99,
            'food'=>1,
            'drink'=>0,
            'dessert'=>0
        ]);
        $product->save();

         $product = new \App\Product([
            'imagePath'=>'storage/img/products/food/pizza/2.jpg',
            'title'=>'Peperoni Pizzaa',
            'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
            'price'=>12,
            'food'=>1,
            'drink'=>0,
            'dessert'=>0
        ]);
        $product->save();

         $product = new \App\Product([
            'imagePath'=>'storage/img/products/food/pizza/3.jpg',
            'title'=>'Pizza quattro stagioni',
            'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
            'price'=>6.5,
            'food'=>1,
            'drink'=>0,
            'dessert'=>0
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=>'storage/img/products/food/pizza/4.jpg',
            'title'=>'Pizza capricciosa',
            'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
            'price'=>5.5,
            'food'=>1,
            'drink'=>0,
            'dessert'=>0
        ]);
        $product->save();

         $product = new \App\Product([
            'imagePath'=>'storage/img/products/food/pizza/5.jpg',
            'title'=>'Peperoni Pizzaa',
            'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
            'price'=>8.88,
            'food'=>1,
            'drink'=>0,
            'dessert'=>0
        ]);
        $product->save();

         $product = new \App\Product([
            'imagePath'=>'storage/img/products/food/pizza/6.jpg',
            'title'=>'Pizza quattro stagioni',
            'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
            'price'=>7.8,
            'food'=>1,
            'drink'=>0,
            'dessert'=>0
        ]);
        $product->save();


        //----------Drinks----------------
        $product = new \App\Product([
           'imagePath'=>'storage/img/products/drinks/1.jpg',
           'title'=>'Beer',
           'description'=>'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.
           Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks.',
           'price'=>7.77,
           'food'=>0,
           'drink'=>1,
           'dessert'=>0
       ]);
       $product->save();

       $product = new \App\Product([
          'imagePath'=>'storage/img/products/drinks/2.jpg',
          'title'=>'Long Island Iced Teai',
          'description'=>'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.
          Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks.',
          'price'=>3.33,
          'food'=>0,
          'drink'=>1,
          'dessert'=>0
      ]);
      $product->save();

      $product = new \App\Product([
         'imagePath'=>'storage/img/products/drinks/3.jpg',
         'title'=>'Californication',
         'description'=>'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.
         Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks.',
         'price'=>11.11,
         'food'=>0,
         'drink'=>1,
         'dessert'=>0
     ]);
     $product->save();

     $product = new \App\Product([
        'imagePath'=>'storage/img/products/drinks/4.jpg',
        'title'=>'Pina Colada',
        'description'=>'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.
        Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks.',
        'price'=>19.16,
        'food'=>0,
        'drink'=>1,
        'dessert'=>0
    ]);
    $product->save();

    $product = new \App\Product([
       'imagePath'=>'storage/img/products/drinks/5.jpg',
       'title'=>'Caipirinha',
       'description'=>'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.
       Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks.',
       'price'=>16.4,
       'food'=>0,
       'drink'=>1,
       'dessert'=>0
   ]);
   $product->save();

   $product = new \App\Product([
      'imagePath'=>'storage/img/products/drinks/6.jpg',
      'title'=>'Cosmopolitan',
      'description'=>'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.
      Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks.',
      'price'=>5.9,
      'food'=>0,
      'drink'=>1,
      'dessert'=>0
  ]);
  $product->save();




    }
}
