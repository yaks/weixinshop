<?php
class user_paymodeAction extends backendAction {

    public function _initialize() {
        parent::_initialize();
        $this->_mod = M('user_paymode');
    }

    public function index() 
	{
		if (IS_POST) {
            if (false === $data = $this->_mod->create()) {
                $this->error($this->_mod->getError());
            }
			
			
			if ( $data['id']==""){
			$data['token']=session('token');
			$this->_mod->add($data);
		
			}else{
			
			if(isset($_POST['alipay']))
            {
            	$data['alipay']=1;
            }else {
            	$data['alipay']=0;
            }
             if(isset($_POST['bankpay']))
            {
            	$data['bankpay']=1;
            }else {
            	$data['bankpay']=0;
            }
		
		if(isset($_POST['otherpay']))
            {
            	$data['otherpay']=1;
            }else {
            	$data['otherpay']=0;
            }
		
		
		
			$this->_mod->where(array('id'=>$data['id']))->save($data);
			}
			
			$user_paymode= $this->_mod ->where("token='".session('token')."'")->find();
		    $this->assign('user_paymode', $user_paymode);
			$this->success(L('operation_success'));
		    //$this->display();
        } else 
		{ 
			$user_paymode= $this->_mod ->where("token='".session('token')."'")->find();
			if(count($user_paymode)==0)
			
			{
			$user_paymode['otherpay']=1;
			$user_paymode['alipay']=0;
			$user_paymode['bankpay']=0;
			}
		    $this->assign('user_paymode', $user_paymode);
		    $this->display();
			}
    }	
	  
}