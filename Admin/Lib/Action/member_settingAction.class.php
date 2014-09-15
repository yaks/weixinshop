<?php

class member_settingAction extends backendAction
{

    public function _initialize() {
        parent::_initialize();
        $this->_mod = D('member_setting');
    }

    public function _before_index() {
        $big_menu = array(
            'title' => L('添加会员规则'),
            'iframe' => U('member_setting/add'),
            'id' => 'add',
            'width' => '400',
            'height' => '130'
        );
        $this->assign('big_menu', $big_menu);

        //默认排序
        $this->sort = 'discount';
        $this->order = 'desc';
    }

	
	    protected function _before_insert($data = '') {
        //检测分类是否存在
 
		$data['token']=session('token');
        return $data;
    }
    protected function _search() {
        $map = array();
		$map['token']=session('token');
        ($keyword = $this->_request('keyword', 'trim')) && $map['name'] = array('like', '%'.$keyword.'%');
        $this->assign('search', array(
            'keyword' => $keyword,
        ));
        return $map;
    }

    public function ajax_check_name() {
        $name = $this->_get('level_name', 'trim');
        $id = $this->_get('id', 'intval');
		if(!$id ){$id ="0000";}
		$token=session('token');
        if (D('member_setting')->where("level_name='".$name."' and token='".$token."' and id !='".$id."'" )->select()) {
            $this->ajaxReturn(0, L('该分类名称已存在'));
        } else {
            $this->ajaxReturn(1);
        }
    }
    
	    public function ajax_check_num() {
        $min_num = $this->_get('min_num', 'trim');
        $id = $this->_get('id', 'intval');
		$token=session('token');
        if (D('member_setting')->where("'".$min_num."' between min_num and max_num and token='".$token."'")->select()) {
            $this->ajaxReturn(0, L('此最小积分已经在其它积分段中'));
        } else {
            $this->ajaxReturn(1);
        }
    }
		    public function ajax_check_num1() {
        $max_num = $this->_get('max_num', 'trim');
        $id = $this->_get('id', 'intval');
		$token=session('token');
        if (D('member_setting')->where("'".$max_num."' between min_num and max_num and token='".$token."'")->select()) {
            $this->ajaxReturn(0, L('此最小积分已经在其它积分段中'));
        } else {
            $this->ajaxReturn(1);
        }
    }
    
		public function ajax_check_min() {
        $min_num = $this->_get('min_num', 'trim');
        $id = $this->_get('id', 'intval');
		$token=session('token');
        if (D('member_setting')->where("'".$min_num."' between min_num and max_num and token='".$token."' and id !=".$id)->select()) {
            $this->ajaxReturn(0, L('此最小积分已经在其它积分段中'));
        } else {
            $this->ajaxReturn(1);
        }
    }
	
			public function ajax_check_max() {
        $max_num = $this->_get('max_num', 'trim');
        $id = $this->_get('id', 'intval');
		$token=session('token');
        if (D('member_setting')->where("'".$max_num."' between min_num and max_num and token='".$token."' and id !=".$id)->select()) {
            $this->ajaxReturn(0, L('此最小积分已经在其它积分段中'));
        } else {
            $this->ajaxReturn(1);
        }
    }
	
    public function deletebrand()
    {
    	 
        $mod = D($this->_name);
      
        $pk = $mod->getPk();
        $ids = trim($this->_request($pk), ',');
        
        if ($ids) {
        
        	
            if (false !== $mod->delete($ids)) {
                IS_AJAX && $this->ajaxReturn(1, L('operation_success'));
                $this->success(L('operation_success'));
            } else {
                IS_AJAX && $this->ajaxReturn(0, L('operation_failure'));
                $this->error(L('operation_failure'));
            }
        } else {
            IS_AJAX && $this->ajaxReturn(0, L('illegal_parameters'));
            $this->error(L('illegal_parameters'));
        }
    }
    
}