<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function addProductView()
    {
        $products = Product::paginate(8);
        $images = []; // if haven't any data or images
        foreach ($products as $product) {
            $images[$product->id] = explode(' | ', $product->image);
        }
        return view('product.addProductView', compact('products', 'images'));
    }

    public function addProduct(Request $request)
    {
        $data = new Product();
        $data->productName = $request->input('product_name','');
        $data->sku = $request->input('sku','');
        $data->unit = $request->input('unit','');
        $data->unitValue = $request->input('unit_value','');
        $data->sellingPrice = $request->input('selling_price','');
        $data->purchasePrice = $request->input('purchase_price','');
        $data->discount = $request->input('discount','');
        $data->tax = $request->input('tax','');

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $files = array_slice($files, 0, 4);

            $ImageLocation = [];

            foreach ($files as $i => $file) {
                $extention = $file->getClientOriginalExtension();
                $fileName = 'pdr-' . time() . '-' . ($i + 1) . '.' . $extention;
                $location = '/img/uploads/';
                $file->move(public_path($location), $fileName);
                $ImageLocation[] = $location . $fileName;
            }
            $data->image = implode(' | ', $ImageLocation);
        } else {
            $data->image = null;
        }

        $data->save();
        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function specificProduct($id)
    {
        $products = Product::find($id);
        $images = explode(' | ', $products->image);
        // dd($products);
        return view('product.specificProduct', compact('products','images'));
    }

    public function editView(Request $request, $id)
    {
        $products = Product::find($id);
        $images = explode(' | ', $products->image);
        // dd($products);
        return view('product.editProduct', compact('products','images'));
    }

    public function editProduct(Request $request, $id)
    {
        $data = product::find($id);
        $data->productName = $request->input('product_name','');
        $data->sku = $request->input('sku','');
        $data->unit = $request->input('unit','');
        $data->unitValue = $request->input('unit_value','');
        $data->sellingPrice = $request->input('selling_price','');
        $data->purchasePrice = $request->input('purchase_price','');
        $data->discount = $request->input('discount','');
        $data->tax = $request->input('tax','');

        if ($request->hasFile('image')) {
            // Delete old images
            if (!empty($data->image)) {
                $oldImages = explode(' | ', $data->image);

                foreach ($oldImages as $oldImage) {
                    $path = public_path($oldImage);

                    if (file_exists($path)) {
                        unlink($path); // Delete the image file
                    }
                }
            }

            // Upload new images (max 4)
            $files = $request->file('image');
            $files = array_slice($files, 0, 4); // limit to 4

            $ImageLocation = [];

            foreach ($files as $i => $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = 'pdr-' . time() . '-' . ($i + 1) . '.' . $extension;
                $location = '/img/uploads/';
                $file->move(public_path($location), $fileName);
                $ImageLocation[] = $location . $fileName;
            }

            $data->image = implode(' | ', $ImageLocation);
        } else {
            $data->image = $data->image;
        }


        $data->update();
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function delete($id)
    {
        $data = Product::find($id);
        if (!empty($data->image)) {
            $oldImages = explode(' | ', $data->image);

            foreach ($oldImages as $oldImage) {
                $path = public_path($oldImage);

                if (file_exists($path)) {
                    unlink($path); // Delete the image file
                }
            }
        }
        $data->delete();
        return redirect()->back()->with('error', 'Product delete successfully');
    }

    public function showAll()
    {
        $data = Product::paginate(12);
        $images = []; // if haven't any data or images
        foreach ($data as $product) {
            $images[$product->id] = explode(' | ', $product->image);
        }

        return view('product.showAll', compact('data', 'images'));
    }

    public function addCard(Request $request, $id)
    {
        $data = Product::find($id);
        $cart = session()->get('cart', []);

        $qty = $request->input('txtqty', 1);
        if(empty($qty)){
            $qty = 1;
        }

        $image = explode('|', $data->image);
        $firstImage = $image[0] ?? null;

        $cart[$id] = [
          "id" => $data->id,
          "name" => $data->productName,
          "price" => $data->sellingPrice,
          "discount" => $data->discount,
          "image" => $firstImage,
          "qty" => $qty
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeCart($id)
    {
      $cart = session()->get('cart', []);

      if(isset($cart[$id]))
      {
          unset($cart[$id]);

          session()->put('cart', $cart);

          return back()->with('success','Item remove successfully');
      }
      return back()->with('error','Item remove not possible');
    }
}
