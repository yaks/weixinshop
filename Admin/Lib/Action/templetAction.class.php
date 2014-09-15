<?php
class templetAction extends backendAction {
    public function _initialize() {
        parent::_initialize();
		

		
       }

    public function index() {

        //分类信息
		
	
        $model=new Model();
        $user_temp=$model->table('weixin_user_templet m,weixin_templet c')
              ->where("m.templet_index=c.templet_name and m.token = '".session('token')."'")
              ->field('c.* ')
              ->order('c.id')
              ->select();
			  
		$templet_list=$model->table('weixin_user_templet m,weixin_templet c')
              ->where("m.templet_index!=c.templet_name and m.token = '".session('token')."'")
              ->field('c.* ')
              ->order('c.id')
              ->select();
	$this->assign('user_temp', $user_temp);	
	$this->assign('token',session('token'));
	$this->assign('templet_list', $templet_list);
	$this->display();
       
    }

	
	public function set_temp() {
	
	
	

        //分类信息
		
		
		$data['templet_index'] =$_GET['templet_name'];
		$user_templet = M("user_templet");
		$user_templet->where("token='".session('token')."'")->save($data);
		$this->redirect("admin.php?m=templet&a=index");
		
	
       
       
    }
	
		public function preview() {
			$this->assign('token',session('token'));
			$this->display();
	
       
       
    }
	public function logo() {
		
		Vendor("phpqrcode.phpqrcode");
		$QRcode = new \QRcode();

		$path = "data/rq/";
		$value='http://'.$_SERVER['HTTP_HOST'].'/index.php?token='.session('token');
		$fileName = $path.session('token').'_emall.png';
		$QR_Logo=$path.session('token').'_emall_Logo.png'; 
	
		
		$errorCorrectionLevel = 'H';  
		$matrixPointSize = 10;  
		
  
		
		$QRcode->png($value, $fileName, $errorCorrectionLevel, $matrixPointSize, 2); 
		$logo = $path.'weixinlogo.jpg';  
		$QR = $fileName; 
			
   
		if($logo !== FALSE)  
		{  
   
			$QR = imagecreatefromstring(file_get_contents($QR));  
			$logo = imagecreatefromstring(file_get_contents($logo));  
			$QR_width = imagesx($QR);  
			$QR_height = imagesy($QR);  
			$logo_width = imagesx($logo);  
			$logo_height = imagesy($logo);  
			$logo_qr_width = $QR_width / 5;  
			$scale = $logo_width / $logo_qr_width;  
			$logo_qr_height = $logo_height / $scale;  
			$from_width = ($QR_width - $logo_qr_width) / 2;  
			imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);  
		}  
		imagepng($QR, $QR_Logo); 
		
		
		$this->assign('QR_Logo', $QR_Logo);
		$this->display();
        if (IS_AJAX) {
           $response = $this->fetch();
           $this->ajaxReturn(1, '', $response);
            } 
            

    }
    
 }