<?php
// 本类由系统自动生成，仅供测试用途
header("content-type:text/html;charset=utf-8");
class weixinAction extends Action {
	
	 public function _initialize() 
	 {
	    cookie('login_fail',null);
	}
	
		public function author()
	{
	
	
	$this->visitor = new user_visitor();
		$backurl=session('back_url');
	
	if($this->visitor->is_login)
	{
	//$this->success(L('login_success'), U('user/index'));
	header('Location: /index.php?'.$backurl);
	}
	    $token=session('user_token'); 
	
		//$user = M('diymen_set','imicms_','mysql://bismai:weixinshop@zhaomingyuinter.mysql.rds.aliyuncs.com/bismai'); 
		//$user_data = $user->where("token='".$token."'")->select();
		$user = M('diymen_set','imicms_','mysql://bismai:weixinshop@zhaomingyuinter.mysql.rds.aliyuncs.com/bismai');
		$opr_log = M('user','weixin_','mysql://root:Empire@qq@localhost/weixin');		
		$user_data = $user->where("token='".$token."'")->find();
		$appid =$user_data['appid'];
		$appsecret=$user_data['appsecret'];
		if(isset($_GET['code']))
		{
			$URL="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$_GET['code']."&grant_type=authorization_code";
			$wx_date=$this->get_weichat_token($URL);
			$openid=$wx_date['openid'];
		
			//dump($URL);
			//dump($wx_date);
		    //dump($openid);
		    //$this->success(L('login_success'), U('user/index'));
			
			$login_info=$opr_log->field('id,username')->where("openid='".$openid."' and token ='".session('user_token')."'")->find();
			if($login_info){
			 
			 $this->visitor->login($login_info[id], $login_info[username]);
			 if(!(intval($login_info['subscribe'])))
			 {
				$URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
				$wx_date=$this->get_weichat_token($URL);
				$access_token=$wx_date['access_token'];
				$URL="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
				$wx_date=$this->get_weichat_token($URL);
				if ($wx_date['subscribe']=='1')
				{
					$opr_log->where(array('id' => $login_info[id]))->save($wx_date);
				}
			 }
			//$this->success(L('login_success'), U('user/index'));
			header('Location: /index.php?'.$backurl);
			}
			
			else{
		
			$URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
			$wx_date=$this->get_weichat_token($URL);
			$access_token=$wx_date['access_token'];
			$URL="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
			$wx_date=$this->get_weichat_token($URL);
		
			//dump($URL);
			//dump($wx_date);
			//dump($access_token);
			//dump($_GET['code']);
			
					
					if ($wx_date['subscribe']=='1')
					{
					
					$wx_date['token']=session('user_token');
					//$wx_date['username']=$openid;
					$wx_date['reg_time']=time();
					//dump($wx_date);
					$opr_log->add($wx_date);
					$login_info=$opr_log->field('id,username')->where("openid='".$openid."' and token ='".session('user_token')."'")->find();
					$this->visitor->login($login_info[id], $login_info[username]);
					}else{
					$wx_date['token']=session('user_token');
					//$wx_date['username']=$openid;
					$wx_date['reg_time']=time();
					$wx_date['nickname']="临时会员(关注为后为正式员)";
					//dump($wx_date);
					$opr_log->add($wx_date);
					$login_info=$opr_log->field('id,username')->where("openid='".$openid."' and token ='".session('user_token')."'")->find();
					$this->visitor->login($login_info[id], $login_info[username]);
					}
					//$this->success(L('login_success'), U('user/index'));
					header('Location: /index.php?'.$backurl);
					}
		 

		
		}else{
		cookie('login_fail',1);
		header('Location: /index.php?'.$backurl);
		}
		
		
      }

			public function autologin()
	{
	
		$token=session('user_token'); 
		$user = M('diymen_set','imicms_','mysql://bismai:weixinshop@zhaomingyuinter.mysql.rds.aliyuncs.com/bismai');
		$opr_log = M('user','weixin_','mysql://root:Empire@qq@localhost/weixin');		
		$user_data = $user->where("token='".$token."'")->find();
		$appid =$user_data['appid'];
		$this->assign('appid',$appid);
		//dump($this->_param('token') );
		//dump($appid);
        $this->display();
		
		
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
	
	public function wenben($fromUsername, $toUsername, $time, $contentStr)
	{
		//////文本链接的处理/ ///
		$str=$contentStr;
	    $reg = '/\shref=[\'\"]([^\'"]*)[\'"]/i';
		preg_match_all($reg , $str , $out_ary);//正则：得到href的地址
		$src_ary = $out_ary[1];
       if(!empty($src_ary))//存在
      {
      	$comment=$src_ary[0];
      	if(stristr($comment,"weixinshop"))
      	{
      		if(stristr($comment,"?"))
      		{
      			$links=$comment."&key=".$fromUsername;
      			$contentStr= str_replace($comment,$links,$str);
      		}else
      		{
      			$links=$comment."?key=".$fromUsername;
      			$contentStr= str_replace($comment,$links,$str);
      		}
      	}
      }
		
      	//////文本链接的处理 END////
      
		     $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
              		$msgType = "text";
                	//$contentStr =$contentStr;
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            	echo $resultStr;
	}
	public function tuwen($textTpl,$fromUsername, $toUsername, $time,$count)
	{
              		$msgType = "news";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType,$count);
            	echo $resultStr;
	}
	
	public function index(){
		import('Think.ORG.Weixin');// 导入微信类

		$wechat = new Weixin();
		$wechat->valid();
		//$wechat->responseMsg();

		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		if (!empty($postStr)){
			$key_word=M('keyword');

			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$fromUsername = trim($postObj->FromUserName);//发送方帐号（一个OpenID）
			$toUsername = $postObj->ToUserName;//开发者微信号 
			$keyword = trim($postObj->Content);//用户发来的信息
			$RX_TYPE = trim($postObj->MsgType);//类型
			$EventKey=trim($postObj->EventKey);//事件KEY值
			$Event=$postObj->Event;//事件类型
			$time = time();
			
			if($fromUsername!='')
			{
			 	$user= M('user')->field('id,username')->where("username='".$fromUsername."'")->find();
			 	if($user)
			 	{
			 	
			 	}else 
			 	{
			 		$date=time();
        			$data['username']=$fromUsername;//用户名
        			$data['reg_time']=$date;
        			$data['last_time']=$date;
        			$userid= M('user')->add($data);
			 	}
			}
			
			
			
			if($RX_TYPE=='event')
			{
			
			//**自定义点击事件**//
			if($Event=='CLICK')
			{

				if($EventKey!='')
				{
					 $where=array('key'=>$EventKey);
					 $custom_key= M('custom_menu')->where($where)->find();
					$key_list= $key_word->where("kyword='".$custom_key['keyword']."'")->find();
					//$key_list= $key_word->where("kyword='".$EventKey."'")->find();
					if(is_array($key_list))
					{
						if($key_list['type']==1)//文本
						{
							$this->wenben($fromUsername, $toUsername, $time,$key_list['kecontent']);
						}else //图文
						{
							$titles                   = unserialize($key_list['titles']);
							$imageinfo                = unserialize($key_list['imageinfo']);
							$linkinfo                 = unserialize($key_list['linkinfo']);
							$description			  = $key_list['kecontent'];


							$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							 <ArticleCount>%s</ArticleCount> 
                            <Articles>";
							for($i=0;$i<count($titles);$i++)
							{
								if(stristr($linkinfo[$i],"weixinshop"))
								{
									if(stristr($linkinfo[$i],"?"))
									{
										$links=$linkinfo[$i]."&key=".$fromUsername;
									}else
									{
										$links=$linkinfo[$i]."?key=".$fromUsername;
									}
								}else{
									$links=$linkinfo[$i];
								}
								
								if(stristr($imageinfo[$i],$_SERVER['SERVER_NAME']))
								{
								$images=$imageinfo[$i];
								}else
								{
								
								//$images=$imageinfo[$i];
								$images="http://115.29.14.203/weixinshop3".'/'.$imageinfo[$i];
								}
								
								
								$textTpl.= " <item>
                           <Title><![CDATA[".$titles[$i]."]]></Title> 
                           <Description><![CDATA[".$description."]]></Description>
                          <PicUrl><![CDATA[".$images."]]></PicUrl>
                           <Url><![CDATA[".$links."]]></Url>
                           </item>";
						 /*  $textTpl.= " <item>
                           <Title><![CDATA[".$titles[$i]."]]></Title> 
                           <Description><![CDATA[".$titles[$i]."]]></Description>
                          <PicUrl><![CDATA[http://".$_SERVER['SERVER_NAME'].'/'.$imageinfo[$i]."]]></PicUrl>
                           <Url><![CDATA[".$links."]]></Url>
                           </item>";*/
							}
							$textTpl.= "</Articles>
                           <FuncFlag>0</FuncFlag>
                           </xml> 
							";
							$this->tuwen($textTpl,$fromUsername, $toUsername, $time,count($titles));
						}

					}

				}
			}
				
				if($Event=='subscribe')
				{
					$key_list= $key_word->where("isfollow=1")->find();
					if(is_array($key_list))//关注时回复
					{
						if($key_list['type']==1)//文本
						{
							$this->wenben($fromUsername, $toUsername, $time,$key_list['kecontent']);
						}else //图文
						{

							$titles                   = unserialize($key_list['titles']);
							$imageinfo                = unserialize($key_list['imageinfo']);
							$linkinfo                 = unserialize($key_list['linkinfo']);
							$description			  = $key_list['kecontent'];

							$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							 <ArticleCount>%s</ArticleCount> 
                            <Articles>";
							for($i=0;$i<count($titles);$i++)
							{
								if(stristr($linkinfo[$i],"weixinshop"))
								{
									if(stristr($linkinfo[$i],"?"))
									{
										$links=$linkinfo[$i]."&key=".$fromUsername;
									}else
									{
										$links=$linkinfo[$i]."?key=".$fromUsername;
									}
								}else{
									$links=$linkinfo[$i];
								}
                            if(stristr($imageinfo[$i],$_SERVER['SERVER_NAME']))
								{
								$images=$imageinfo[$i];
								}else
								{
								//$images=$imageinfo[$i];
								$images="http://115.29.14.203/weixinshop3".'/'.$imageinfo[$i];
								}
								
								
								$textTpl.= " <item>
                           <Title><![CDATA[".$titles[$i]."]]></Title> 
                           <Description><![CDATA[".$description."]]></Description>
                          <PicUrl><![CDATA[".$images."]]></PicUrl>
                           <Url><![CDATA[".$links."]]></Url>
                           </item>";
							}
							$textTpl.= "</Articles>
                           <FuncFlag>0</FuncFlag>
                           </xml> 
							";
							$this->tuwen($textTpl,$fromUsername, $toUsername, $time,count($titles));
						}
					}
				}
			}
				
			if(!empty($keyword))
			{
				$key_list= $key_word->where("kyword='".$keyword."'")->find();
				if(is_array($key_list))
				{
					if($key_list['type']==1)//文本
					{
						$this->wenben($fromUsername, $toUsername, $time,$key_list['kecontent']);
					}else //图文
					{
							$titles                   = unserialize($key_list['titles']);
							$imageinfo                = unserialize($key_list['imageinfo']);
							$linkinfo                 = unserialize($key_list['linkinfo']);
							$description			  = $key_list['kecontent'];
						
                    $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							 <ArticleCount>%s</ArticleCount> 
                            <Articles>";
                    for($i=0;$i<count($titles);$i++)
                    {
                    	if(stristr($linkinfo[$i],"weixinshop"))
                    	{
                    		if(stristr($linkinfo[$i],"?"))
                    		{
                    			$links=$linkinfo[$i]."&key=".$fromUsername;
                    		}else
                    		{
                    			$links=$linkinfo[$i]."?key=".$fromUsername;
                    		}
                    	}else{
                    		$links=$linkinfo[$i];
                    	}
                    	   if(stristr($imageinfo[$i],$_SERVER['SERVER_NAME']))
								{
								$images=$imageinfo[$i];
								}else
								{
								//$images=$imageinfo[$i];
								$images="http://115.29.14.203/weixinshop3".'/'.$imageinfo[$i];
								}
								
								
								$textTpl.= " <item>
                           <Title><![CDATA[".$titles[$i]."]]></Title> 
                           <Description><![CDATA[".$description."]]></Description>
                          <PicUrl><![CDATA[".$images."]]></PicUrl>
                           <Url><![CDATA[".$links."]]></Url>
                           </item>";
                    }
                          $textTpl.= "</Articles>
                           <FuncFlag>0</FuncFlag>
                           </xml> 
							";
                    $this->tuwen($textTpl,$fromUsername, $toUsername, $time,count($titles));
					}

				}else //自动回复
				{
					$key_list= $key_word->where("ismess=1")->find();
					if(is_array($key_list))//是否存在
					{
						if($key_list['type']==1)//文本
						{
							$this->wenben($fromUsername, $toUsername, $time, $key_list['kecontent']);
						}else //图文
						{
							$titles                   = unserialize($key_list['titles']);
							$imageinfo                = unserialize($key_list['imageinfo']);
							$linkinfo                 = unserialize($key_list['linkinfo']);
							$description			  = $key_list['kecontent'];

							$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							 <ArticleCount>%s</ArticleCount> 
                            <Articles>";
                    for($i=0;$i<count($titles);$i++)
                    {
                    	if(stristr($linkinfo[$i],"weixinshop"))
                    	{
                    		if(stristr($linkinfo[$i],"?"))
                    		{
                    			$links=$linkinfo[$i]."&key=".$fromUsername;
                    		}else
                    		{
                    			$links=$linkinfo[$i]."?key=".$fromUsername;
                    		}
                    	}else{
                    		$links=$linkinfo[$i];
                    	}
                    	
                    	   if(stristr($imageinfo[$i],$_SERVER['SERVER_NAME']))
								{
								$images=$imageinfo[$i];
								}else
								{
								//$images=$imageinfo[$i];
								$images="http://115.29.14.203/weixinshop3".'/'.$imageinfo[$i];
								}
								
								
								$textTpl.= " <item>
                           <Title><![CDATA[".$titles[$i]."]]></Title> 
                           <Description><![CDATA[".$description."]]></Description>
                          <PicUrl><![CDATA[".$images."]]></PicUrl>
                           <Url><![CDATA[".$links."]]></Url>
                           </item>";
                    }
                          $textTpl.= "</Articles>
                           <FuncFlag>0</FuncFlag>
                           </xml> 
							";
                    $this->tuwen($textTpl,$fromUsername, $toUsername, $time,count($titles));
						}
					}else
					{

					}
				}


			}else{
				echo "Input something...";
			}

		}else {
			echo "";
			exit;
		}

	}
	
	
    
}