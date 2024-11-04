<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Models\product;
use App\Models\Subcategory;


class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    //product index method
    function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = product::latest()->get();
            $imageurl = 'public/files/product';
            $product = "";
            $query = DB::table('products')->leftJoin('categories', 'products.category_id', 'categories.id')->leftJoin('subcategories', 'products.subcategory_id', 'subcategories.id')->leftJoin('brands', 'products.brand_id', 'brands.id');

            if ($request->category_id) {
                $query->where('products.category_id', $request->category_id);
            }
            if ($request->brand_id) {
                $query->where('products.brand_id', $request->brand_id);
            }
            if ($request->warehouse_id) {
                $query->where('products.warehouse', $request->warehouse_id);
            }
            if ($request->status == 1) {
                $query->where('products.status', 1);
            }
            if ($request->status == 0) {
                $query->where('products.status', 0);
            }
            $product = $query->select('categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name', 'products.*')->get();

            // $data = DB::table('products')->get();

            return DataTables::of($product)->addIndexColumn()
                ->editColumn(
                    'thumbnail',
                    function ($row) use ($imageurl) {
                        return '<img src="' . $imageurl . '/' . $row->thumbnail . '" height="30" width="30">';
                    }
                )->editColumn(
                    'featured',
                    function ($row) {
                        if ($row->featured == 1) {
                            return '<a href="#" data-id="' . $row->id . '" class="featured-deactive"><i class="fa-solid fa-arrow-down text-danger p-1"></i><span class="badge badge-success">active</span></a>';
                        } else {
                            return '<a href="" data-id="' . $row->id . '" class="featured-active"><i class="fa-solid fa-arrow-up text-success  p-1"></i><span class="badge badge-danger">deactive</span></a>';
                        }
                    }
                )->editColumn(
                    'today_deal',
                    function ($row) {
                        if ($row->today_deal == 1) {
                            return '<a href="#" data-id="' . $row->id . '" class="today_deal-yes"><i class="fa-solid fa-arrow-down text-danger p-1"></i><span class="badge badge-success">Yes</span></a>';
                        } else {
                            return '<a href="#" data-id="' . $row->id . '" class="today_deal-no"><i class="fa-solid fa-arrow-up  p-1"></i><span class="badge badge-success">No</span></a>';
                        }
                    }
                )->editColumn(
                    'status',
                    function ($row) {
                        if ($row->status == 1) {
                            return '<a href="#" data-id="' . $row->id . '" class="status-deactive"><i class="fa-solid fa-arrow-down text-danger p-1"></i><span class="badge badge-success">active</span></a>';
                        } else {
                            return '<a href="#" data-id="' . $row->id . '" class="status-active"><i class="fa-solid fa-arrow-up" p-1></i><span class="badge badge-danger">deactive</span></a>';
                        }
                    }
                )
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="' . route('product.edit', [$row->id]) . '" class="btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                <a href="" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i></a>
                <a href="" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i></a>';
                    return $actionbtn;
                })->rawColumns(['action', 'thumbnail', 'featured', 'status', 'today_deal'])->make(true);
        }
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $warehouse = DB::table('warehouses')->get();
        return view('admin.product.index', compact('category', 'brand', 'warehouse'));
    }

    //product create method
    function create()
    {
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $pickup_point = DB::table('pickup_points')->get();
        $warehouse = DB::table('warehouses')->get();

        return view('admin.product.create', compact('category', 'brand', 'pickup_point', 'warehouse'));
    }


    //produt store method
    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products',
            'subcategory_id' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'product_details' => 'required'
        ]);

        $subcategory = DB::table('subcategories')->where('id', $request->subcategory_id)->first();

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = bin2hex(random_bytes(4));
        $data['code'] = $request->code;
        $data['category_id'] = $subcategory->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand;
        $data['pickup_point_id'] = $request->pickup_point_id;
        $data['unit'] = $request->unit;
        $data['tags'] = $request->tags;
        $data['purchase_price'] = $request->Purchase_price;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['warehouse'] = $request->warehouse;
        $data['stock_quantity'] = $request->stock;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['description'] = $request->product_details;
        $data['video'] = $request->video_embaded_code;
        $data['featured'] = $request->featured_product;
        $data['today_deal'] = $request->today_deal;
        $data['product_slider'] = $request->product_slider;
        $data['trendy'] = $request->trendy_product;
        $data['status'] = $request->status;
        $data['admin_id'] = Auth::id();
        $data['date'] = date('d,m,Y');
        $data['month'] = date('F');

        // thumbnail image 
        if ($request->thubmnail) {
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $thumbnail = $request->thubmnail;
            $thumbnail_name = $slug . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail_read = $manager->read($thumbnail);
            $thumbnail_resize = $thumbnail_read->resize(300, 300)->save('public/files/product/' . $thumbnail_name);
            $data['thumbnail'] = $thumbnail_name;
        }

        // mltiple images
        $images = array();
        if ($request->hasFile('images')) {
            $manager = new ImageManager(new Driver());
            foreach ($request->file('images') as $key => $image) {
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image_read = $manager->read($image);

                $image_resize =  $image_read->resize(300, 300)->save('public/files/product/' . $image_name);
                array_push($images, $image_name);
            }

            $data['images'] = json_encode($images);
        }

        DB::table('products')->insert($data);
        $notification = array('message' => 'Product Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //product edit method
    function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $category = Category::all();
        $subcategory = Subcategory::all();
        $brand = Brand::all();
        $warehouse = DB::table('warehouses')->get();
        $pickup_point = DB::table('pickup_points')->get();
        return view('admin.product.edit', compact('product', 'category', 'subcategory', 'brand', 'warehouse', 'pickup_point'));
    }

    //product update method
    function update()
    {
    }

    //product delete method
    function destroy()
    {
    }

    // product not featured mehtod 
    function not_featured($id)
    {
        DB::table('products')->where('id', $id)->update(['featured' => 0]);
        return response()->json('featured deactiveted');
    }


    // product featured mehtod 
    function featured($id)
    {
        DB::table('products')->where('id', $id)->update(['featured' => 1]);
        return response()->json('featured activated');
    }

    // today deal no method 
    function todaydealno($id)
    {
        DB::table('products')->where('id', $id)->update(['today_deal' => 0]);
        return response()->json('today_deal deactivated');
    }

    // today deal yes method 
    function todaydealyes($id)
    {
        DB::table('products')->where('id', $id)->update(['today_deal' => 1]);
        return response()->json('today_deal activated');
    }

    //status deactive method
    function status_deactive($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);
        return response()->json('product deactivated');
    }

    //status active method
    function status_active($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);
        return response()->json('product activated');
    }
}



// ->editColumn('category_name', function ($row) {
//                 return $row->category->category_name;
//             })
//                 ->editColumn('subcategory_name', function ($row) {
//                     return $row->subcategory->subcategory_name;
//                 })
//                 ->editColumn('brand_name', function ($row) {
//                     return $row->brand->brand_name;
//                 })
