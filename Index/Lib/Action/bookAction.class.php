<?php

/**
 * 逛宝贝页面
 */
class bookAction extends frontendAction {

    public function _initialize() {
        parent::_initialize();
        $this->assign('nav_curr', 'book');
		

    }

    /**
     * 逛宝贝首页
     */

    /**
     * 按分类查看
     */
    public function cate() {
	
			$cate_id = $this->_get('cateid', 'intval');
			$Data=array ();
			$good_mod = new Model();
			$goods=$good_mod->table('weixin_item a')
				->join('weixin_item_spec b ON a.id = b.item_id')
				->field('a.id,a.token,a.img,a.title,a.dis_flag,IF (a.price = \'0\',min(b.price),a.price) AS price,IF (a.markprice = \'0\',min(b.markprice),a.markprice) AS markprice,IF(a.tuijian=\'1\',\'热销\',\'0\') as rexiao,IF(a.news=\'1\',\'新品\',\'0\') as xinping,if (a.price = \'0\',LEFT(min(b.price)*10/min(b.markprice),3),LEFT(a.price*10/a.markprice,3) )as sale')
				->where("cate_id in (select id  from weixin_item_cate where id='".$cate_id."'  or pid ='".$cate_id."') and a.status = '1' and a.token ='".session('user_token')."'")
				->group('a.id')
				->order('a.ordid asc')
				->limit('0,4')
				->select();
			if(	$goods)
			{
			
			$Data['data']=$goods;
			$json_goods = json_encode($Data);
			}else{
			$json_goods = json_encode($Data);
			}
		$this->memberlevel();
		$this->assign('cate_id', $cate_id);
		$this->assign('json_goods', $json_goods);
        $this->display();
    }
 
	
	public function get_cate_ajax() {
        $item_cate=M('item_cate');
		$parent=$item_cate->where("pid='0' and token ='".session('user_token')."'")->select();
		foreach($parent as $n=> $val)
		{
		$parent[$n]['sub_cate']=$item_cate->where('pid=\''.$val['id'].'\'')->select();
		}
		//$this->assign('list',$parent);
		//$this->display();
		$this->ajaxReturn(1, 'get_cate', $parent,'operation_success');
		}
    /**
     * 标签分类瀑布
     */



	
	    public function get_items_ajax() {
		 $page = intval($this->_get('page', 'trim')); //标签
		 $cate_id = $this->_get('cateid', 'intval');
		 if ($page >0){
		 $page =$page*4;
		 }
		 
			$good_mod = new Model();
			$goods=$good_mod->table('weixin_item a')
				->join('weixin_item_spec b ON a.id = b.item_id')
				->field('a.id,a.token,a.img,a.title,a.dis_flag,IF (a.price = \'0\',min(b.price),a.price) AS price,IF (a.markprice = \'0\',min(b.markprice),a.markprice) AS markprice,IF(a.tuijian=\'1\',\'热销\',\'0\') as rexiao,IF(a.news=\'1\',\'新品\',\'0\') as xinping,if (a.price = \'0\',LEFT(min(b.price)*10/min(b.markprice),3),LEFT(a.price*10/a.markprice,3) )as sale')
				->where("cate_id in (select id  from weixin_item_cate where id='".$cate_id."'  or pid ='".$cate_id."')  and a.status = '1' and a.token ='".session('user_token')."'") 
				->group('a.id')
				->order('a.ordid asc')
				->limit($page.',4')
				->select();
			if(	$goods)
			{
			$this->ajaxReturn(0, L('invalid_item'), $goods);
			}else{
			$this->ajaxReturn(1, L('invalid_item'), $goods);
			}
			
		
    }
   
    public function cate_list() {
	
			$cate_id = $this->_get('cateid', 'intval');
			$Data=array ();
			$item_cate=M('item_cate');
			$cate_list=$item_cate->where("pid='".$cate_id."' and token ='".session('user_token')."'")->select();
		    $this->assign('cate_list', $cate_list);;
            $this->display();
    }
  

}