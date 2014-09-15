<?php
class indexAction extends frontendAction {



    
    public function index() {
    
    	 
    	/*****首页广告***/
    	$ad= M('ad');
    	$ads= $ad->field('token,url,content,desc')->where(" status=1 and token ='".session('user_token')."'")->order('ordid asc')->select();
		$json_ads = json_encode(array('data'=>$ads));
		/*****get cate***/
		$item_cate=M('item_cate');
		$parent=$item_cate->where("status ='1' and is_index ='1' and  pid='0' and token ='".session('user_token')."'")->order('ordid asc')->select();
		foreach($parent as $n=> $val)
		{
		$parent[$n]['sub_cate']=$item_cate->where('status =1 and is_index =1 and  pid=\''.$val['id'].'\'')->order('ordid asc')->select();
		}
		$json_cate=json_encode(array('data'=>$parent));
		
		$this->assign('json_cate',$json_cate);
        $this->assign('json_ads',$json_ads);
        $this->display('index');
    }
	
	
	    public function comp_info() {
    
    	 
    	/*****首页广告***/
    	$sit= M('user_setting');
    	$sit_info= $sit->field('set_info')->where("token ='".session('user_token')."'")->find();
        $this->assign('sit_info',$sit_info);
        $this->display();

    }
	
	
	
	public function get_ad_ajax() {
    
    	/*****首页广告***/
    	$ad= M('ad');
    	$ads= $ad->field('url,content,desc')->where("board_id=1 and status=1 and token ='".session('user_token')."'")->order('ordid asc')->select();
		$this->ajaxReturn(0, L('invalid_item'),$ads);
    }    
    public function ajaxLogin()
    {
    	
       $user_name=$_POST['user_name'];
       $password=$_POST['password'];
       
       $user=M('user');
       $users= $user->where("username='".$user_name."' and password='".md5($password)."'")->find(); 
       if(is_array($users))
       {
    	$data = array('status'=>1);
    	$_SESSION['user_info']=$users;
       }else {
       	$data = array('status'=>0);
       }
    	
    	echo json_encode($data);
    	exit;
    }
    public function ajaxRegister()
    {
    	$username=$_POST['user_name'];
    	$user=M('user');
    	$count=$user->where("username='".$username."'")->find();
    	if(is_array($count))
    	{
        echo 'false';
       // echo json_encode(array('user_nameData'=>true));
    	}else 
    	{
    		echo 'true';
        //echo json_encode(array('user_nameData'=>true));
    	}
    	
    
    }
    
}