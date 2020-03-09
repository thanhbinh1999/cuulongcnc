<?php

namespace App\Http\Controllers\admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\userModel\product;
use App\userModel\category;
use App\userModel\producer;
use App\userModel\review;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = product::where('StatusID', '=' ,'active')->paginate(10);
        $category = category::where('StatusID', '=' , 'active')->get();
        $producer = producer::where('StatusID' , '=' , 'active')->get();
       return view('admin.san-pham-kinh-doanh',['productLists'=>$table , 'category' => $category, 'producer'=> $producer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ok';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
       
             $rules = [
            'name' => 'required|max:30',
            'producerID' =>'required|numeric',
            'categoryID' =>'required|numeric',
            'price'    => 'numeric',
            'amount'  =>'numeric',
            'color'  => 'max:15',
            'size'  => 'max:15',
            'avatar' =>'required',

        ];
        $error = [
            'name.required' => 'Nhập tên sản phẩm',
            'name.max' => 'Tên không vượt quá 30 ký tự',
            'producerID.required' => 'Nhà sản xuất không tồn tại',
            'categoryID.required' => 'Danh mục không tồn tại',
            'price.numeric' => 'Giá sản phẩm không hợp lệ',
            'amount.numeric' => 'Số lượng không hợp lệ',
            'color.max' => 'Phải nhỏ hơn 15 ký tự',
            'size.max' => 'Phải nhỏ hơn 15 ký tự',
            'avatar.required' => 'Chưa có hình đại diện',
        ];
        $validator = Validator::make($request->all(), $rules,$error);
         if($validator->fails()){
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else{
            $product = new product();
            $review = new review();
            $product->name = $request->name;
            $product->avatar = $request->avatar->getClientOriginalName();
            $product->producerID = $request->producerID;
            $product->categoryID = $request->categoryID;
            $product->size = $request->size;
            $product->amountProduct = $request->amount;
            $product->color = $request->color;
            $product->price = $request->price;
            $product->seo = $this->seo_to_str($request->name);
            $product->StatusID  = 'active';
            $product->productType = 0;
            if($product->save()==1){
                $productID = $product->id;
                $review->productID = $productID;
                $review->title = $request->title;
                $review->description = $request->description;
                $review->guide = $request->guide;
                $review->save();
                return response()->json(['success'=> 'Tạo mới thành công']);
            }

           
        }
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
         $table = product::
                Join('category','product.categoryID','=' ,'category.ID')
                ->join('producer' , 'product.producerID' ,'=' , 'producer.ID')
                ->leftJoin('review', 'review.productID' , '=' , 'product.ID')
                ->select('product.avatar','category.name as category'
                        ,'producer.name as producer', 'product.name'
                        , 'product.price' ,'product.amountProduct as amount'
                        ,'product.color', 'product.size','review.title'
                        ,'review.description' , 'review.guide')
                ->where('product.ID' , '=' , $id)
                ->get();
                return $table;
                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $rules = [
            'name' => 'required|max:30',
            'ID' =>'required|numeric',
            'producerID' =>'required|numeric',
            'categoryID' =>'required|numeric',
            'price'    => 'numeric',
            'amount'  =>'numeric',
            'color'  => 'max:15',
            'size'  => 'max:15',

        ];
        $error = [
            'name.required' => 'Nhập tên sản phẩm',
            'name.max' => 'Tên không vượt quá 30 ký tự',
            'ID.required'=> 'Mã sản phẩm không phù hợp',
            'producerID.required' => 'Nhà sản xuất không tồn tại',
            'categoryID.required' => 'Danh mục không tồn tại',
            'price.numeric' => 'Giá sản phẩm không hợp lệ',
            'amount.numeric' => 'Số lượng không hợp lệ',
            'color.max' => 'Phải nhỏ hơn 15 ký tự',
            'size.max' => 'Phải nhỏ hơn 15 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules,$error);
        if($validator->fails()){
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else{
               $product = product::where('ID',$request->ID);
               $review  = review::where('productID',$request->ID);
               $productUpdate = '';
               $reviewUpdate = '';
               if($request->avatar ==''){
                    if($product->count()>0){
                        $productUpdate  = $product->update([
                            'name' => $request->name,
                            'price' => $request->price,
                            'color' => $request->color,
                            'categoryID' => $request->categoryID,
                            'producerID' => $request->producerID,
                            'amountProduct' => $request->amount,
                            'size' => $request->size,
                            'SEO' => $this->seo_to_str($request->name),
                        ]);
                    }
                    if($review->count() >0){
                        $reviewUpdate = $review->update([
                            'productID' => $request->ID,
                            'description' => $request->description,
                            'title' => $request->title,
                            'guide' => $request->guide,
                        ]);

                    }else{

                        $reviewUpdate =  new review();
                        $reviewUpdate->productID = $request->ID;
                        $reviewUpdate->description = $request->description;
                        $reviewUpdate->guide = $request->guide;
                        $reviewUpdate->title = $request->title;
                        $reviewUpdate->save();
                    }

               }else{

                 $productUpdate  = $product->update([
                            'name' => $request->name,
                            'price' => $request->price,
                            'color' => $request->color,
                            'categoryID' => $request->categoryID,
                            'producerID' => $request->producerID,
                            'amountProduct' => $request->amount,
                            'size' => $request->size,
                            'avatar' => $request->avatar,
                             'SEO' => $this->seo_to_str($request->name),
                        ]);

                         if($review->count() >0){
                        $reviewUpdate = $review->update([
                            'productID' => $request->ID,
                            'description' => $request->description,
                            'title' => $request->title,
                            'guide' => $request->guide,
                        ]);

                    }else{


                        $reviewUpdate =  new review();
                        $reviewUpdate->productID = $request->ID;
                        $reviewUpdate->description = $request->description;
                        $reviewUpdate->guide = $request->guide;
                        $reviewUpdate->title = $request->title;
                        $reviewUpdate->save();
                    } 
               }
               if($reviewUpdate || $reviewUpdate ==1){
                    return response()->json(['success' => 'Cập nhật thành công','productLists' => product::select('name','price','avatar','StatusID','ID')->where('StatusID','!=','stop')->paginate(10)]);
               }else{
                 return response()->json(['errors' => 'Lỗi vui lòng thao tác lại']);
               }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //   $review  = review::where('productID','=', $id)->delete();
        $update = product::where('ID' ,$id)->update(['StatusID' => 'stop']);
      //  if($review == 1){
            if($update ==1){
                $product = product::select('ID','name','StatusID','avatar','price')->where('StatusID', '=' , 'active')->paginate(10);
                $i = 1;
                $html = '';
               foreach ($product as  $value) {
                  $html .= "<tr class='product'>";
                        $html.= "<td>".($i++)."</td>";
                            $html.="<td>";
                                    $html.="<img style='width:100px;height:100px' src='../public/img/".$value['avatar']."'>";
                            $html.="</td>";
                            $html.="<td>".$value['name']."</td>";
                            $html.="<td>".number_format($value['price'])."</td>";
                            $html.="<td>
                                <button class='btn btn-primary'>".$value['StatusID']."</button>
                                </td>";
                            $html.="<td>";
                            $html.="<button class= 'btn btn-primary edit' rol-e='".$value['ID']."'>";
                                 $html.="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
                            $html.="</button>";
                                $html.="<button class= 'btn btn-danger delete' rol-d='".$value['ID']."'>";
                                        $html.="<i class='fa fa-trash-o' aria-hidden='true'></i>";
                                $html.="</button>";
                            $html.="</td>";
                     $html.="</tr>";
                 }
                return response()->json(['success'=>$html]);
            }else{
                 return response()->json(['error'=> 'Xóa Thất bại']);   
            }
      //  }else{
        //    return response()->json(['error'=> 'Xóa Thất bại']);
       // }
            

      
    }
    public function search(Request $request){
        if(strlen($request->get('keyword')) >=2){
             $table = product::where('name','like','%'.$request->get('keyword').'%')->where('StatusID', '=' , 'active')->get();
            return $table;
        }else{
            $table = product::all()->take(10);
            return $table;
        }
    }
    public function change_avatar(Request $request){

    
         $rules = [
            'avatar' => 'required | max:5000',
         ];
         $error = [
             'avatar.required' => 'Chưa chọn hình ảnh nào!',
             'avatar.max' => 'Hình ảnh ko vượt quá 5MB!',
         ];
        $validator = Validator::make($request->all(),$rules,$error);
        if($validator->fails())
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        else
            return response()->json(array('success' => $request->avatar->getClientOriginalName()));
         
    }
  public  function seo_to_str ($str)
  {
 
        $unicode = array(

        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'd'=>'đ',

        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'i'=>'í|ì|ỉ|ĩ|ị',

        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'D'=>'Đ',

        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach($unicode as $nonUnicode=>$uni){

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);

        }
        $str = str_replace(' ','-',$str);

        return strtolower($str);
 
    }
}
