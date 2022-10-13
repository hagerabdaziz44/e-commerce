<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\DB ;

class BrandsController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index', compact('brands'));
    }
    public function create()
    {
        return view('dashboard.brands.create');
    }


    public function store(BrandRequest $request)
    {


       DB::beginTransaction();

        //validation

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);


        $fileName = "";
        if ($request->has('photo')) {

            $fileName = uploadImage('brands', $request->photo);
        }

        $brand = Brand::create($request->except('_token', 'photo'));

        //save translations
        $brand->name = $request->name;
        $brand->photo = $fileName;

        $brand->save();
        DB::commit();
        return redirect()->route('admin.brands')->with(['success' => 'تم ألاضافة بنجاح']);



    }
    public function edit($id)
    {

     
        $brand = Brand::find($id);

        if (!$brand)
            return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.brands.edit', compact('brand'));

    }


    public function update($id, BrandRequest $request)
    {
        try {
            //validation

            //update DB


            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود']);


            DB::beginTransaction();
          
            if ($request->has('photo')) {
                
                $old_name=Brand::findOrfail($id)->photo;
                removeImage('assets/images/brands/', $old_name);
                $fileName = uploadImage('brands', $request->photo);
                Brand::where('id', $id)
                    ->update([
                        'photo' => $fileName,
                    ]);
            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;

            $brand->save();

            DB::commit();
            return redirect()->route('admin.brands')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {
        try {
            
            $brand = Brand::find($id);

            if (!$brand)

                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود ']);

                 DB::beginTransaction();

                $old_name=Brand::findOrfail($id)->photo;
             
                removeImage('assets/images/brands/', $old_name);

                $translation=BrandTranslation::where('brand_id',$id)->delete();

                $brand->delete();
    
                DB::commit();

            return redirect()->route('admin.brands')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}