<?php
class member_levelAction extends backendAction {

    public function _initialize() {
        parent::_initialize();
        $this->_mod = M('member_level');
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
		
			$this->_mod->where(array('id'=>$data['id']))->save($data);
			}
			
			$member_level= $this->_mod ->where("token='".session('token')."'")->find();
		    $this->assign('member_level', $member_level);
			IS_AJAX && $this->ajaxReturn(1, L('operation_success'), '', 'edit');
			$this->success('提交成功');
		    //$this->display();
        } else 
		{ 
			$member_level= $this->_mod ->where("token='".session('token')."'")->find();
			if(count($member_level)==0)
			
			{
			$member_level['level_flag']=0;
			$member_level['rate']=1;
			}
		    $this->assign('member_level', $member_level);
            //$this->success(L('operation_success'));
		    $this->display();
			}
    }	
	  
}