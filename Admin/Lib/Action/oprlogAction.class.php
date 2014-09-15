<?php
class oprlogAction extends backendAction
{
    public function _initialize() {
        parent::_initialize();
        $this->_mod = M('opr_log');
    }

    public function index() {
        $prefix = C(DB_PREFIX);

        if ($this->_request("sort", 'trim')) {
            $sort = $this->_request("sort", 'trim');
        } else {
            $sort = $prefix.'opr_log.id';
        }
        if ($this->_request("order", 'trim')) {
            $order = $this->_request("order", 'trim');
        } else {
            $order = 'DESC';
        }

        $p = $this->_get('p','intval',1);
        $this->assign('p',$p);
        
        $where =" '1=1' and token='".session('token')."'";
        $keyword = $this->_request('keyword','trim','');
        $keyword && $where .= " AND ((".$prefix."opr_log.user LIKE '%".$keyword."%') OR (".$prefix."opr_log.opr_content LIKE '%".$keyword."%') OR (".$prefix."opr_log.opr_ip LIKE '%".$keyword."%') )";
        $search = array();
        $keyword && $search['keyword'] = $keyword;
        $this->assign('search',$search);

        $count = $this->_mod->where($where)->count($prefix.'opr_log.id');
        $pager = new Page($count,20);
        $list  = $this->_mod->where($where)->order($sort . ' ' . $order)->limit($pager->firstRow.','.$pager->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$pager->show());

        $this->assign('list_table', true);

        $this->display();
    }
    

    
}