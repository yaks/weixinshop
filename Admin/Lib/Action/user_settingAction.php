<?php
class user_settingAction extends backendAction {

    public function _initialize() {
        parent::_initialize();
        $this->_mod = M('user_setting');
    }

    public function index() 
	{
		if (IS_POST) {
            if (false === $data = $this->_mod->create()) {
                $this->error($this->_mod->getError());
            }
			
			if ( is_null($data['id'])){
			$data['token']=session('token');
			$this->_mod->add($data);
			}else{
			$this->_mod->where(array('id'=>$data['id']))->save($data);
			}
			
		$user_setting= $this->_mod ->where("token='".session('token')."'")->find();
		    $this->assign('user_setting', $user_setting);
		    $this->display()	
        } else 
		{ 
			$user_setting= $this->_mod ->where("token='".session('token')."'")->find();
		    $this->assign('user_setting', $user_setting);
		    $this->display();
			}
    }	
	  
}