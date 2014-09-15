<?php
// 本类由系统自动生成，仅供测试用途
class shopcartAction extends frontendAction {
	
	  public function _initialize() {
        parent::_initialize();
        import('Think.ORG.Cart');// 导入分页类
    	 $cart=new Cart();
    	  
    }
	
	
    public function index(){
     import('Think.ORG.Cart');// 导入分页类
    $cart=new Cart();	

	  // import('Think.ORG.Util.weixin');// 导入分页类
	   
	  //  $wechat = new wechat();// 实例化分页类 传入总记录数ss
	  //  $wechat->responseMsg();
	//  echo "<pre>";
	  //var_dump($_SESSION['cart']);
	 // echo "</pre>";
	$this->assign('item',$_SESSION['cart']);
	$this->assign('sumPrice',$cart->getPrice());
	  $this->_config_seo();
	  $this->display();
    }
    

    public function add_cart()//添加进购物车
    {
    	 import('Think.ORG.Cart');// 导入分页类
    	  $cart=new Cart();
    	$goodId= $this->_post('goodId', 'intval');//商品ID
    	$quantity=$this->_post('quantity', 'intval');//购买数量
		$spec_id=$this->_post('spec_id', 'intval');
		$goodprice=$this->_post('price');//购买数量
		//$goodprice=1.11;
		$goods_stock=0;
		$spec_1='';
		$spec_2='';
		$price =0;
    	$item=M('item')->field('id,title,img,price,goods_stock')->find($goodId);
		  	$item=M('item')->field('id,title,img,price,goods_stock')->find($goodId);
		        $model=new Model();
        $members=$model->table('weixin_user a,weixin_member_setting b')
              ->where('a.score_level=b.id and a.id='.$this->visitor->info['id'])
              ->field('LEFT(b.discount/100 ,4) as discount')
              ->find();
		if (!$members)
		{ 
		  $members['discount']=1;
		   
		}
    	if(!is_array($item))
    	{
    		$data=array('status'=>0,'msg'=>'不存在该商品','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
			
    	}
		if($spec_id == 0)
		{   $goods_stock=$item['goods_stock'];
			//$price=floor($item['price']*$members['discount']);
			$price=$goodprice;
		
		}else{
			$item_spec=M('item_spec')->field('spec_1,spec_2,price,stock')->find($spec_id);
			$goods_stock=$item_spec['stock'];
			//$price=floor($item_spec['price']*$members['discount']);
			$price=$goodprice;
			$spec_1=$item_spec['spec_1'];
			$spec_2=$item_spec['spec_2'];
		}
		
		if($goods_stock<$quantity)
		{
    		
    		$data=array('status'=>0,'msg'=>'没有足够的库存','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
    	}else {
    	
    		$result= $cart->addItem($item['id'],$item['title'],$price,$quantity,$item['img'],$spec_id,$spec_1,$spec_2,$goods_stock);
    		if($result==1)//购物车存在该商品
    		{
    			$data=array('result'=>$result,'status'=>1,'count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice(),'msg'=>'该商品已经存在购物车');
    		}else{
    		$data=array('result'=>$result,'status'=>1,'count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice(),'msg'=>'商品已成功添加到购物车');
    		}
    	}
    	
    	//$data=array('status'=>2);
    	echo json_encode($data);
    }
        public function add_to_cart()//添加进购物车
    {
    	 import('Think.ORG.Cart');// 导入分页类
    	  $cart=new Cart();
    	
    	$goodId= $this->_post('goodId', 'intval');//商品ID
    	$quantity=$this->_post('quantity', 'intval');//购买数量
    	$item=M('item')->field('id,title,img,price,goods_stock')->find($goodId);
    	if(!is_array($item))
    	{
    		$data=array('status'=>0,'msg'=>'不存在该商品','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
    	}elseif($item['goods_stock']<$quantity){
    		
    		$data=array('status'=>0,'msg'=>'没有足够的库存','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
    	}else {
    	
    		$result= $cart->addItem($item['id'],$item['title'],$item['price'],$quantity,$item['img'],$item['goods_stock']);
    		if($result==1)//购物车存在该商品
    		{
    			$data=array('result'=>$result,'status'=>1,'count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice(),'msg'=>'该商品已经存在购物车');
    		}else{
    		$data=array('result'=>$result,'status'=>1,'count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice(),'msg'=>'商品已成功添加到购物车');
    		}
    	}
    	
    	$data=array('status'=>2);
        echo json_encode($data);

    }
    
    public function remove_cart_item()//删除购物车商品
    {
    	import('Think.ORG.Cart');// 导入购物车类
    	  $cart=new Cart();
    	
    	$goodId= $this->_post('itemId', 'intval');//商品ID
		$spec_id= $this->_post('spec_id', 'intval');//商品ID
    	$cart->delItem($goodId,$spec_id);
    	$data=array('status'=>1);
    	echo json_encode($data);
    }
    
    public function change_quantity()
    {
    	import('Think.ORG.Cart');// 导入购物车类
        $cart=new Cart();
    	  
    	$itemId= $this->_post('itemId', 'intval');//商品ID
    	$quantity= $this->_post('quantity', 'intval');//购买数量
		$spec_id=$this->_post('spec_id', 'intval');//购买数量
		
		
		$goods_stock=0;
		$spec_1='';
		$spec_2='';
		$price =0;
    	$item=M('item')->field('id,title,img,price,goods_stock')->find($itemId);
    	if(!is_array($item))
    	{
    		$data=array('status'=>0,'msg'=>'不存在该商品','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
			
    	}
		if($spec_id == 0)
		{   $goods_stock=$item['goods_stock'];
			$price=$item['price'];
		}else{
			$item_spec=M('item_spec')->field('spec_1,spec_2,price,stock')->find($spec_id);
			$goods_stock=$item_spec['stock'];
			$price=$item_spec['price'];
			$spec_1=$item_spec['spec_1'];
			$spec_2=$item_spec['spec_2'];
		}
		
		if($goods_stock<$quantity)
		{
    		
    		$data=array('status'=>0,'msg'=>'没有足够的库存','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
    	}else {

    	$cart->modNum($itemId,$spec_id,$quantity);
    	$data=array('status'=>1,'item'=>$cart->getItem($itemId,$spec_id),'sumPrice'=>$cart->getPrice());
    	}
    	
    
    	echo json_encode($data);
    }
}