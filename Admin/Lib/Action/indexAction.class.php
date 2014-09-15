<?php
class indexAction extends backendAction {

    public function _initialize() {
        parent::_initialize();
        $this->_mod = D('menu');
        $this->item_order=M('item_order');
        
    }

    public function index() {
        $top_menus = $this->_mod->admin_menu(0);
        $this->assign('top_menus', $top_menus);
        //$my_admin = array('username'=>$_SESSION['admin']['username'], 'rolename'=>$_SESSION['admin']['role_id']);
        //$this->assign('my_admin', $my_admin);
		$user = M('wxuser','imicms_','mysql://bismai:weixinshop@zhaomingyuinter.mysql.rds.aliyuncs.com/bismai');	
		$my_admin = $user->where("token='".session('token')."'")->find();
		$this->assign('my_admin', $my_admin);
        $this->display();
    }

	
	    public function get_logo() {
		
		Vendor("phpqrcode.phpqrcode");
		$QRcode = new \QRcode();

		$path = "data/rq/";
        $logo_type = $this->_get('type');
		if(intval($logo_type)){
		$value='http://'.$_SERVER['HTTP_HOST'].'/index.php?token='.session('token');
		$fileName = $path.session('token').'_emall.png';
		$QR_Logo=$path.session('token').'_emall_Logo.png'; 
		}else
		{
		$value ='weixin://profile/'.session('token');
		$fileName = $path.session('token').'_weixin.png';
		$QR_Logo=$path.session('token').'_weixin_Logo.png';
				}
		
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
	
		//echo "<img src='".$QR_Logo."'>";
		echo $QR_Logo;
            

    }
	
	
	
    public function panel() {
        $message = array();
        if (is_dir('./install')) {
            $message[] = array(
                'type' => 'error',
                'content' => "您还没有删除 install 文件夹，出于安全的考虑，我们建议您删除 install 文件夹。",
            );
        }
        if (APP_DEBUG == true) {
            $message[] = array(
                'type' => 'error',
                'content' => "您网站的 DEBUG 没有关闭，出于安全考虑，我们建议您关闭程序 DEBUG。",
            );
        }
        if (!function_exists("curl_getinfo")) {
            $message[] = array(
                'type' => 'error',
                'content' => "系统不支持 CURL ,将无法采集商品数据。",
            );
        }
        $this->assign('message', $message);
        $system_info = array(
            'pinphp_version' => PIN_VERSION . ' RELEASE '. PIN_RELEASE .' [<a href="http://www.pinphp.com/" class="blue" target="_blank">查看最新版本</a>]',
            'server_domain' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            'server_os' => PHP_OS,
            'web_server' => $_SERVER["SERVER_SOFTWARE"],
            'php_version' => PHP_VERSION,
            'mysql_version' => mysql_get_server_info(),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_execution_time' => ini_get('max_execution_time') . '秒',
            'safe_mode' => (boolean) ini_get('safe_mode') ?  L('yes') : L('no'),
            'zlib' => function_exists('gzclose') ?  L('yes') : L('no'),
            'curl' => function_exists("curl_getinfo") ? L('yes') : L('no'),
            'timezone' => function_exists("date_default_timezone_get") ? date_default_timezone_get() : L('no')
        );
        $this->assign('system_info', $system_info);
        
        
        
        $buycount= M('item')->where("status=1 and token='".session('token')."'")->count();
         $nobuycount= M('item')->where("status=0 and token='".session('token')."'")->count();
        
        $fukuan= $this->item_order->where("status=1 and token='".session('token')."'")->count();
        $fahuo= $this->item_order->where("status=2 and token='".session('token')."'")->count();
        $yfahuo= $this->item_order->where("status=3 and token='".session('token')."'")->count();
        $this->assign('count',
        array('fukuan'=>$fukuan,
        'fahuo'=>$fahuo,
        'yfahuo'=>$yfahuo,
        'buycount'=>$buycount,
        'nobuycount'=>$nobuycount
        )
        );
        $this->display();
    }

    public function login() {
        if (IS_POST) {
            $username = $this->_post('username', 'trim');
            $password = $this->_post('password', 'trim');
            //$verify_code = $this->_post('verify_code', 'trim');
           // if(session('verify') != md5($verify_code)){
                //$this->error(L('verify_code_error'));
            //}
            $admin = M('admin')->where(array('username'=>$username, 'status'=>1))->find();
            if (!$admin) {
                $this->error(L('admin_not_exist'));
            }
            if ($admin['password'] != md5($password)) {
                $this->error(L('password_error'));
            }
            session('admin', array(
                'id' => $admin['id'],
                'role_id' => $admin['role_id'],
                'username' => $admin['username'],
            ));
            M('admin')->where(array('id'=>$admin['id']))->save(array('last_time'=>time(), 'last_ip'=>get_client_ip()));
            $this->success(L('login_success'), U('index/index'));
			//set token
			session('token','e56d10a2c87ac68a');
			//set templet
			$user_templet = M("user_templet");
			if(!$user_templet->where("token='".session('token')."'")->select())
			{
			$u_t_data['token']=session('token');
			$u_t_data['templet_index']="index";
			$user_templet->add($u_t_data);
			}
			$this->opr_log("user login");
			
        } else {
			$login_info=session('login_info');
			if($login_info)
			{
			
			
				
				session('token',$login_info['weichatid']);
				$user_templet = M("user_templet");
				if(!$user_templet->where("token='".session('token')."'")->select())
				{
				$u_t_data['token']=session('token');
				$u_t_data['templet_index']="index";
				$user_templet->add($u_t_data);
				}
				
				$admin = M('admin')->where(array('username'=>'admin', 'status'=>1))->find();
                if (!$admin) {
                 $this->error(L('admin_not_exist'));
            }  
       
            session('admin', array(
                'id' => $admin['id'],
                'role_id' => $admin['role_id'],
                'username' => $admin['username'],
            ));
			$this->opr_log("user login success");
            M('admin')->where(array('id'=>$admin['id']))->save(array('last_time'=>time(), 'last_ip'=>get_client_ip()));
            $this->success(L('login_success'), U('index/index'));
			
			
				
			}else{
           //$this->display();
		   $this->error("已经超过30分钟没有操作,将为您转接bismai","http://home.bismai.com/index.php");
			}
        }
    }

    public function logout() {
		$this->opr_log("user logout success");
        session('admin', null);
        $this->success(L('logout_success'), U('index/login'));
        exit;
    }

    public function verify_code() {
        Image::buildImageVerify(4,1,'gif','50','24');
    }

    public function left() {
        $menuid = $this->_request('menuid', 'intval');
        if ($menuid) {
            $left_menu = $this->_mod->admin_menu($menuid);
            foreach ($left_menu as $key=>$val) {
                $left_menu[$key]['sub'] = $this->_mod->admin_menu($val['id']);
            }
        } else {
            $left_menu[0] = array('id'=>0,'name'=>'后台首页');
            $left_menu[0]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>9999))->select()) {
                $left_menu[0]['sub'] = $r;
            }
            
            $left_menu[1] = array('id'=>1,'name'=>'商城管理');
            $left_menu[1]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>1))->order('ordid')->select()) {
                $left_menu[1]['sub'] = $r;
            }
              $left_menu[2] = array('id'=>2,'name'=>'商品管理');
            $left_menu[2]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>2))->order('ordid')->select()) {
                $left_menu[2]['sub'] = $r;
            }
            
            
            $left_menu[3] = array('id'=>3,'name'=>'交易管理');
            $left_menu[3]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>3))->select()) {
                $left_menu[3]['sub'] = $r;
            }
            
              $left_menu[4] = array('id'=>4,'name'=>'会员管理');
            $left_menu[4]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>4))->order('ordid')->select()) {
                $left_menu[4]['sub'] = $r;
            }
            
            
              $left_menu[5] = array('id'=>5,'name'=>'数据分析');
            $left_menu[5]['sub'] = array();
            if ($r = $this->_mod->where(array('often'=>128))->select()) {
                $left_menu[5]['sub'] = $r;
            }
            
           
            
            
            
            array_unshift($left_menu[0]['sub'], array('id'=>0,'name'=>'信息面板','module_name'=>'index','action_name'=>'often_menu'));
        }
        $this->assign('left_menu', $left_menu);
        $this->display();
    }

    public function often() {
        if (isset($_POST['do'])) {
            $id_arr = isset($_POST['id']) && is_array($_POST['id']) ? $_POST['id'] : '';
            $this->_mod->where(array('ofen'=>1))->save(array('often'=>0));
            $id_str = implode(',', $id_arr);
            $this->_mod->where('id IN('.$id_str.')')->save(array('often'=>1));
            $this->success(L('operation_success'));
        } else {
            $r = $this->_mod->admin_menu(0);
            $list = array();
            foreach ($r as $v) {
                $v['sub'] = $this->_mod->admin_menu($v['id']);
                foreach ($v['sub'] as $key=>$sv) {
                    $v['sub'][$key]['sub'] = $this->_mod->admin_menu($sv['id']);
                }
                $list[] = $v;
            }
            $this->assign('list', $list);
            $this->display();
        }
    }

    public function map() {
        $r = $this->_mod->admin_menu(0);
        $list = array();
        foreach ($r as $v) {
            $v['sub'] = $this->_mod->admin_menu($v['id']);
            foreach ($v['sub'] as $key=>$sv) {
                $v['sub'][$key]['sub'] = $this->_mod->admin_menu($sv['id']);
            }
            $list[] = $v;
        }
        $this->assign('list', $list);
        $this->display();
    }
}