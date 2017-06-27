//-----------------------------------------------------------
>> php artisan make:model Product -m //ben modelin dhe krijon migration
//-----------------------------------------------------------
migrations:
Schema::create('products', function (Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->string('imagePath');
    $table->string('title');
    $table->text('description');
    $table->double('price', 15);
});
//-----------------------------------------------------------
tek Product.php

$fillable=['imagePath','title','description','price']
//-----------------------------------------------------------
tek ProductTableSeeder.php

$product = new \App\Product([
    'imagePath'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTdTyyrUYL9FXMQRCFZ4Lr-gMKSaRSiV0_uh68o48AB4n95VgSaDg',
    'title'=>'Pizza capricciosa',
    'description'=>'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato!',
    'price'=>9.99
]);
$product->save();


pastaj i bejme uncomment file te DatabaseSeeder.php
//-----------------------------------------------------------
Krijojme tabelen Product dhe e mbushim me te dhena

php artisan migrate
php artisan db:seed
//-----------------------------------------------------------
Afishojme produktet duke marre te dhenat nga databaza

@foreach($products->chunk(3) as $productChunk)
 <div class="row">
   @foreach($productChunk as $product)
   <div class="col-sm-6 col-md-4">
       <div class="thumbnail">
       <img src="{{$product->imagePath}}" alt="pizza pomodor"class="img img-responsive" width="100%">
       <div class="caption">
           <h3 style="font-family: 'Anton'">{{$product->title}}</h3>
           <p class="description" style="font-family: 'Roboto'">{{$product->description}}</p>
               <div class="clearfix">
               <div class="pull-left price">${{$product->price}}</div>
               <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
               </div>
       </div>
       </div>
   </div>
   @endforeach
 </div>
@endforeach
//-----------------------------------------------------------
krijo signup dhe signin views
//-----------------------------------------------------------
tek routes.php

Route::get('/',[
  'uses'=>'ProductController@getIndex',
  'as'=>'home.index'
]);
Route::get('/signup',[
  'uses'=>'UserController@getSignup',
  'as'=>'user.signup'
]);
Route::get('/signin',[
  'uses'=>'UserController@getSignin',
  'as'=>'user.signin'
]);

Route::post('/signup',[
  'uses'=>'UserController@postSignup',
  'as'=>'user.signup'
]);
Route::post('/signin',[
  'uses'=>'UserController@postSignin',
  'as'=>'user.signin'
]);
//-----------------------------------------------------------
>>php artisan make:controller UserController

public function getSignup(){

  return view('user.signup');
}
public function postSignup(Request $request){
  $this->validate($request, [
    'email'=>'email|required|unique:users',
    'password'=>'required|min:4',
    'username'=>'required|unique:users'
  ]);

  // $user= new User([
  //   'email'=>$request->input('email'),
  //   'password'=>bcrypt($request->input('password')),
  //   'username'=>$request->input('username')
  // ]);
  // $user->save();

  $user= new User();
  $user->email=$request->email;
  $user->username=$request->username;
  $user->password=bcrypt($request->password);
  $user->save();
  return redirect()->route("product.index");

}

//-----------------------------------------------------------
!!!!!! Kujdes
nqs fut te dhena me array kur tek modeli nuk eshte e specifikuar si $fillable
atehere nuk do te futen ato te dhena qe nuk ndodhen tek $fillable.

nqs fut te dhena me objekt atehere do te futen edhe nqs nuk jan te specifikuara
tek $fillable.

//-----------------------------------------------------------
!!!http/middleware
Authenticate.php  kontrollon nqs useri eshte loguar nqs jo i dergojm tek user.signin route
RedirectifAuthenticated.php eshte per te bere redirect nqs useri eshte loguar

//-----------------------------------------------------------
!!! kisha disa probleme tek route
Route::get('/add-to-cart/{$id}', [
    'uses'=> 'ProductController@getAddToCart',
    'as'=> 'product.addToCart'
]);

por duhej hequr $ tek {id}
//

shikoje pak ndryshimin me ate qe eshte sepse nxirrte probleme me

class Cart
{
    public $items=null;
    public $totalQty=0;
    public $totalPrice=0.0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }
     public function add($item, $id){
         $storedItem=['qty'=>0,'price'=>$item->price,'item'=>$item];
         if($this->items){
             if(array_key_exists($id, $this->item)){
                 $storedItem=$this->items[$id];
             }
         }
         $storedItem['qty']++;
         $storedItem['price']=$item->price*$storedItem['qty'];
         $this->items[$id]=$storedItem;
         $this->totalQty++;
         $this->totalPrice+=$item->price;

     }


}

array:16 [▼
  "_token" => "lqDTc629unreE3SSg4N6zeC3rNV9LSuqBXIVIl6o"
  "stripeToken" => "tok_19G9FlLHMMBcfDPKBbPJX94O"
  "stripeTokenType" => "card"
  "stripeEmail" => "albanikaperi@gmail.com"
  "stripeBillingName" => "alban"
  "stripeBillingAddressCountry" => "Albania"
  "stripeBillingAddressCountryCode" => "AL"
  "stripeBillingAddressZip" => "1045"
  "stripeBillingAddressLine1" => "Rr. Kaperi"
  "stripeBillingAddressCity" => "Tirana"
  "stripeShippingName" => "alban"
  "stripeShippingAddressCountry" => "Albania"
  "stripeShippingAddressCountryCode" => "AL"
  "stripeShippingAddressZip" => "1045"
  "stripeShippingAddressLine1" => "Rr. Kaperi"
  "stripeShippingAddressCity" => "Tirana"
]
