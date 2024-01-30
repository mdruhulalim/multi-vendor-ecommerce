<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductImageCalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use App\Models\ProductImageCallery;
use Illuminate\Http\Request;

class ProductImageCalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductImageCalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('admin.product.image-callery.index', compact('product'));
        // return view('admin.product.image-callery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required'],
            'image.*' => ['required', 'image', 'max:2048']
        ]);

        // handle image upload
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        foreach($imagePaths as $path){
            $productImageCallery = new ProductImageCallery();
            $productImageCallery->image = $path;
            $productImageCallery->product_id = $request->product;
            $productImageCallery->save();
        };

        toastr('Uploaded Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = ProductImageCallery::findOrFail($id);
        $this->deleteImage($productImage->image);
        $productImage->delete();
        return response(['status' => 'success', 'massage' => 'Deleted successfully']);
    }
}
