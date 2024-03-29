<?php
/**
 * 访问者
 *
 * @author andery
 */
class user_visitor {

    public $is_login = false; //登陆状态
	public $is_login_fail = false;
    public $info = null;
	public $user_token=null;

	
	
    public function __construct() {
   /*header("Content-type: text/html; charset=utf-8");
    	$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($user_agent, 'MicroMessenger') === false) {
	// 非微信浏览器禁止浏览
	echo "亲，只能在微信内访问...";exit;
		
}*/



		
     if(isset($_GET['key']))
     {
     	  $user= M('user')->field('id,username')->where("username='".trim($_GET['token'])."'")->find();
			 	if($user)
			 	{
			 		$data['last_time']=time();
					$user= M('user')->field('id,username')->where("username='".trim($_GET['key'])."'")->find();
			 		
			 		M('user')->where(array('id'=>$user['id']))->data($data)->save();
			 		$_SESSION['user_info']=$user;
					
			 	}
     }
     
        if (session('?user_info')) {
            //已经登陆
            $this->info = session('user_info');
			//$this->is_login = true;
			//$cur_token=M('user')->field('token')->where(array('id'=>$this->info['id'],'token'=>session('user_token')))->find();
			
	
			if (D('user')->field('token')->where(array('id'=>$this->info['id'],'token'=>session('user_token')))->find())
			{
				$this->is_login = true;
			} else{
						
						session('user_info', null);
						$_SESSION['cart']= null;
						cookie('user_info', null);
						$this->is_login = false;

				}
			
			
			
        } elseif ($user_info = (array)cookie('user_info')) {
            $user_info = M('user')->field('id,username,token')->where(array('id'=>$user_info['id'], 'password'=>$user_info['password']))->find();
            if ($user_info) {
                //记住登陆状态
                $this->assign_info($user_info);
                $this->is_login = true;
			
            }
        } else {
            $this->is_login = false;
			
        }
    }

    /**
     * 登陆会话
     */
    public function assign_info($user_info) {
        session('user_info', $user_info);
        $this->info = $user_info;
    }

    /**
     * 记住密码
     */
    public function remember($user_info, $remember = null) {
        if ($remember) {
            $time = 3600 * 24 * 14; //两周
            cookie('user_info', array('id'=>$user_info['id'], 'password'=>$user_info['password']), $time);
        }
    }

    /**
     * 获取用户信息
     */
    public function get($key = null) {
        $info = null;
        if (is_null($key) && $this->info['id']) {
            $info = M('user')->find($this->info['id']);
        } else {
            if (isset($this->info[$key])) {
                return $this->info[$key];
            } else {
                //获取用户表字段
                $fields = M('user')->getDbFields();
                if (!is_null(array_search($key, $fields))) {
                    $info = M('user')->where(array('id' => $this->info['id']))->getField($key);
                }
            }
        }
        return $info;
    }

    /**
     * 登陆
     */
    public function login($uid, $remember = null) {
        $user_mod = M('user');
        //更新用户信息
        $user_mod->where(array('id' => $uid))->save(array('last_time' => time(), 'last_ip' => get_client_ip()));
        $user_info = $user_mod->field('id,username,password')->find($uid);
        //保持状态
        $this->assign_info($user_info);
        $this->remember($user_info, $remember);
    }

    /**
     * 退出
     */
    public function logout() {
        session('user_info', null);
        cookie('user_info', null);
    }
	
	public function get_weichat_token($URL)
	{
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $URL); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$tmpInfo = curl_exec($ch); 
		if (curl_errno($ch)) {  
			echo 'Errno'.curl_error($ch);
		}
		curl_close($ch); 
		$arr= json_decode($tmpInfo,true);
		return $arr;
	}

}