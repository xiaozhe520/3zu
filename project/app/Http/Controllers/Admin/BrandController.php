<?php 
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
	//添加品牌
	public function brand_add(){
		if($_POST){
             $data = $_POST;
             //print_r($data);die;
             //图片信息
             $file = $_FILES['dfile'];
             //print_r($file);die;
             if($file['error']==0){
                 //图片名称
                 $name = $file['name'];
                 $tmp_name = $file['tmp_name'];
                 $path = 'uploads/'.time().$name;
                 //echo $path;die;
                 $res = move_uploaded_file($tmp_name,$path); 
                 $brand_name = $data['brand_name'];
                 $site_url = $data['site_url'];
                 $brand_desc = $data['brand_desc'];
                 $sort_order = $data['sort_order'];
                 $is_show = $data['is_show'];
                 $arr = [
                 'brand_name' => $brand_name,
                 'site_url'   => $site_url,
                 'brand_desc' => $brand_desc,
                 'brand_logo' => $path,
                 'sort_order' => $sort_order,
                 'is_show'    => $is_show
                 ];
                 $res = DB::table('brand')->insert($arr);
                 if($res){
                 	return redirect('brand/brand_list');
                 	//echo "<script>alert('添加成功');location.href='{{url('brand/brand_list')}}'</script>";
                 }else{
                 	return redirect('brand/brand_add');
                 }
             }else{
             	echo "上传失败";
             }
		}else{
			return view('admin/brand_add');
		}
		
	}

	//z展示品牌
	public function brand_list(){
		//获取数据
		$data = DB::table('brand')->get();
		//print_r($data);die;
		return view('admin/brand_list',['data'=>$data]);
	}

	//删除
	public function delete(){
      $brand_id = $_GET['id'];
      //echo $brand_id;
      $res = DB::table('brand')->where('brand_id',$brand_id)->delete();
      if($res){
			echo "<script>alert('删除成功');location.href='brand_list'</script>";
		}else{
			echo "<script>alert('删除失败');location.href='brand_list'</script>";
		}
	}

	//查询一条
	public function edit(){
       $brand_id = $_GET['id'];
       //print_r($brand_id);die;
       $data = DB::table('brand')->where('brand_id',$brand_id)->first();
       //print_r($data);die;
       return view('admin/brand_edit',['data'=>$data]);		
	}

	//修改
	public function edit_do(){
		$data = $_POST;
		unset($data['_token']);
		$brand_id = $data['brand_id'];
	    //print_r($data);die;
	    
	    $arr = [
                 'brand_name' => $data['brand_name'],
                 'site_url'   => $data['site_url'],
                 'brand_desc' => $data['brand_desc'],
                 'sort_order' => $data['sort_order'],
                 'is_show'    => $data['is_show']
                 ];
	    //print_r($arr);die;
	    $res = DB::table('brand')->where('brand_id',$brand_id)->update($arr);
	    //echo $res;die;
	    if($res){
			echo "<script>alert('修改成功');location.href='brand_list'</script>";
		}else{
			echo "<script>alert('修改失败');location.href='brand_list'</script>";
		}
	}
}




 ?>