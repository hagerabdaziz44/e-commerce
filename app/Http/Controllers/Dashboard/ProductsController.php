<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStockRequest;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\ProductPriceValidation;
use App\Models\Tag;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::select('id','slug','price', 'created_at')->paginate(PAGINATION_COUNT);
        return view('dashboard.products.general.index', compact('products'));
    }

    public function create()
    {
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        return view('dashboard.products.general.create', $data);
    }

    public function store(GeneralProductRequest $request)
    {

        try {

        DB::beginTransaction();

        //validation

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        $product = Product::create([
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
            'is_active' => $request->is_active,
        ]);
        //save translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        //save product categories

        $product->categories()->attach($request->categories);

        //save product tags

        $product->tags()->attach($request->tags);

        DB::commit();
        return redirect()->route('admin.maincategories')->with(['success' => 'تم ألاضافة بنجاح']);
          } 
          catch (\Exception $ex) {
          DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    


    }
    public function getPrice($product_id){

        return view('dashboard.products.prices.create') -> with('id',$product_id) ;
    }

    public function saveProductPrice(ProductPriceValidation $request){
        
      

        try{

            Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));

            return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']); 

        }
    }
    public function getStock($product_id){

        $product=product::where('id',$product_id)->first();
      
        return view('dashboard.products.stock.create',compact('product')) -> with('id',$product_id) ;
    }

    public function saveProductStock (ProductStockRequest $request){

          try {

            Product::whereId($request -> product_id) -> update($request -> except(['_token','product_id']));
            return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);
          }
          

           
            catch(\Exception $ex){
                DB::rollback();
                return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']); 
    
            }
        }
        public function addImages($product_id){
            return view('dashboard.products.images.create')->with('id',$product_id);
        }
        //to save images to folder only
    public function saveProductImages(Request $request ){

        $file = $request->file('dzfile');
        $filename = uploadImage('products', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    

    }



   



