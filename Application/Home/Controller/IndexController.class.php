<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	private $_user = array();

	public function __construct(){

		parent::__construct();

		session_start();

		$user = $_SESSION['user'];
		$this->_user = $user;

	}

    public function index(){//方法起始
    	$this->check();

    	$this->assign('username',$user['username']);
    	$this->display('index');

    }

    public function check(){//起始页用户检查

        if(empty($this->_user['username']) || empty($this->_user['id'])){
            session_destroy();
            redirect(U('Index/login'));
            
        } 

    }

    public function welcome(){//欢迎方法
    	
        $this->display('index/welcome/welcome');

    }

    public function login(){//登录方法
    	 if(IS_POST){

            $_user = M('User');

    	 	$user['username']=I('post.username');//用户提交过来的用户名
     	
        	$user['password']=md5(I('post.password'));//用户提交过来的密码并进行MD5加密
        	
        	$user['level']='6';
        	/*$user['vip']='>= 4';*/


        	$result=$_user->where($user)->select(); 
            
        	if($result[0]['username']==$user['username'] && $result[0]['password']==$user['password']){
            	$_SESSION['user'] = array('username'=>$result[0]['username'],'id'=>$result[0]['id']);
	            $this->success('登录成功!','index');

	        }else{
	            $this->error('用户名或密码错误!请重新输入!!');
	        }
    	 }else{
    	 	$this->display('login');
    	 }
	
    }

    public function logout(){//登出方法

    	session_destroy();
    	$this->success('退出成功!','login');

    }

    public function admin(){//管理管理员方法


        $where = array('level'=>'6');
        $_find = $_GET['data'];

        if(isset($_find) && !empty($_find)){

           foreach ($_find as $k => $v) {
                $where[$k] = array('like','%'.$v.'%');
               
           }
        }
  
    	$table = M('User');
        $count = $table->where($where)->count();//计算level的管理员数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出

		$this->display('index/admin/display');

    }

    public function admin_add(){//增加管理员方法

    	if(IS_POST){
    		$user=I('post.data');//用户提交过来的用户名
    		if($user['password']!=$user['confirm']){
    			$this->error('确认密码不一致!');
    		}
    		unset($user['confirm']);

    		$user['password'] = md5($user['password']);
    		$user['level'] = 6;
    		$user['vip'] = 4;
            $user['type'] = '管理员';
    		$user['addtime'] = date('Y-m-d H:m:s');
    		$table = M('user');

    		$ret = $table->add($user);
    		if(!empty($ret) && is_numeric($ret)){

    			$this->success('增加成功!',U('Index/admin_add'));
    		}
    	}else{
    		$this->display('index/admin/add');
    	}//增加管理员 
    	
    }

    public function admin_edit(){//管理员编辑方法 

        
    	if(IS_POST){
    		$data = I('post.data');
            $id = I('post.id');
            $op = 'id='.$id;
        
            $user = M('User');
            
            $ret = $user->where($op)->save($data);
            
            if(!empty($ret) && is_numeric($ret)){

                $this->success('修改成功!',U('Index/admin'));
            }
			
    	}else{
            $id = I('get.id');
	    	if(empty($id)){
	    		$this->error('非法访问!');
	    	}

	    	$table = M('User');
	    	$user = $table->where(array('id'=>$id))->select();

	    	$this->assign('user',$user[0]);
	    	$this->display('index/admin/edit');
    	}//管理员修改方法
	
    }

    public function admin_delete(){//管理员删除方法

    	

    		$id = $_GET['id'];
    	
	    	if(empty($id)){
	    		$this->error('非法访问!');
	    	}

	    	$table = M('User');
	    	$ret = $table->where('id='.$id)->delete();
			if(!empty($ret) && is_numeric($ret)){

    			$this->success('删除成功!',U('Index/admin'));
    		}
    	
    }

    public function userdisplay(){//用户管理方法



        $table = M('User');
        $where=array('vip'=>'0','level'=>'0');
        $_find = $_GET['data'];

        if(isset($_find) && !empty($_find)){

           foreach ($_find as $k => $v) {
                $where[$k] = array('like','%'.$v.'%');
               
           }
        }

        $count = $table->where($where)->count();//计算的会员数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('resultuser',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/admin/userdisplay');

    }

    public function user_add(){//用户增加方法

        if(IS_POST){
            $user=I('post.data');//用户提交过来的用户名
            if($user['password']!=$user['confirm']){
                $this->error('确认密码不一致!');
            }
            unset($user['confirm']);

            $user['password'] = md5($user['password']);
            $user['level'] = '';
            $user['vip'] = '';
            $user['type'] = '用户';
            $user['integral'] = '0';
            $user['addtime'] = date('Y-m-d H:m:s');
            $table = M('User');

            $ret = $table->add($user);
            if(!empty($ret) && is_numeric($ret)){

                $this->success('增加成功!',U('Index/user_add'));
            }
        }else{
            $this->display('index/admin/add');
        }

    }

    public function user_edit(){//用户编辑方法

        if(IS_POST){
            $data = I('post.data');
            $id = I('post.id');
            $op = 'id='.$id;
        
            $user = M('User');
            
            $ret = $user->where($op)->save($data);
            
            if(!empty($ret) && is_numeric($ret)){

                $this->success('修改成功!',U('Index/userdisplay'));
            }
            
        }else{
            $id = I('get.id');
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('User');
            $user = $table->where(array('id'=>$id))->select();

            $this->assign('user',$user[0]);
            $this->display('index/admin/edit');
        }
    
    }

    public function user_delete(){//删除用户方法

        

            $id = $_GET['id'];
        
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('User');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/userdisplay'));
            } 
        
    }

    public function userguid(){//用户引导页

        $where = '';

        $table = M('Guidepage');

        $list =$table ->where($where)->select();
        $guide['img1'] =$list[0]['imgname'];
        $guide['img2'] =$list[1]['imgname'];
        $guide['img3'] =$list[2]['imgname'];
        $this->assign('guide',$guide);

        $this->display('index/userguid/userguid');

    }

    public function message(){//留言方法

        $where='';
        $_find = $_GET['data'];

        if(isset($_find) && !empty($_find)){

            if ($_find['state']!='全部') {

                $where['state'] = $_find['state'];
            }
            if ($_find['type']!='全部') {
                
                $where['type'] = $_find['type'];
            }
                
            if ($_find['content']!='') {
                
            $where['content'] = array('like','%'.$_find['content'].'%');
            }
         }
                    
        $table = M('Message');
        $count = $table->where($where)->count();//计算level的管理员数量

        $Page = new \Think\Page($count,C('MY_PAGE_MESSAGE'));


        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/message/message'); 
        
    }

    public function message_edit(){//留言编辑方法

        if(IS_POST){
            $data = I('post.data');
            if($data['reply']==''){

                $this->error('回复为空!');

            }
            $id = I('post.id');
            $op = 'id='.$id;
            $data['state'] = '已回复';
            $data['sendtime'] = date('Y-m-d H:i:s',time());
            $message = M('Message');
            
            $ret = $message->where($op)->save($data);
            if(!empty($ret) && is_numeric($ret)){
                $this->success('修改成功!',U('Index/message'));
            }
            
        }else{
                $id = I('get.id');
                if(empty($id)){

                    $this->error('非法访问!');
                }

                $table = M('Message');
                $user = $table->where(array('id'=>$id))->select();

                $this->assign('message',$user[0]);
                $this->display('index/message/message_edit');
        } 

    }

    public function lottory(){

        $this->display('index/lottory/lottory');
        
    }

    public function address(){//地址管理方法


        $table = M('Address');

        $where='';
        $count = $table->where($where)->count();//计算地址数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('resultaddress',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/map/address'); //地址方法 
        
    }

    public function address_edit(){//地址编辑方法

            if(IS_POST){   
            $data = I('post.data');
            if($data['contacts']==''){

                $this->error('回复为空!');

            }
            $id = I('post.id');
            $op = 'id='.$id;
            $message = M('Address');
            
            $ret = $message->where($op)->save($data);
            if(!empty($ret) && is_numeric($ret)){
                $this->success('修改成功!',U('Index/address'));
            }  
        
            }else{
                    $id = I('get.id');

                    if(empty($id)){

                         $this->error('非法访问!');
                    }
                    
                    $table = M('Address');
                    $address = $table->where(array('id'=>$id))->select();
                    $this->assign('address',$address[0]);

                    $this->display('Index/map/address_edit');
                    } //地址编辑方法 

    }

    public function address_add(){//地址增加方法
       
        if(IS_POST){
        $address1=I('post.data');//用户提交过来的用户名
        if($address1['address']==""||$address1['storename']==""||$address1['xy']==""||$address1['contacts']==""||$address1['tel']==""){
            $this->error('请填写完全!');
        }
        $table = M('Address');
        $ret = $table->add($address1);
        if(!empty($ret) && is_numeric($ret)){


            $this->success('增加成功!',U('Index/address'));
        }
            }else{
                $this->display('index/map/address_add');
            } 
        
    }

    public function address_delete(){//地址删除方法

            $id = $_GET['id'];
        
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('Address');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/address'));
            } 

    }

    public function lessons(){

        $this->display('index/lessons/lessons'); 
        
    }

    public function news(){//资讯管理方法

        $table = M('News');

        $where='';
        $count = $table->where($where)->count();//计算地址数量

        $Page = new \Think\Page($count,C('MY_PAGE_NEWS'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        //数据库资讯类型为数字，转换为文字：类型名称(1、产品安装介绍；2、问题详解；3、健康科谱知识；4、行业信息；5、活动信息)
        for ($i=0; $i < count($list); $i++) { 

            switch ($list[$i]['type']) {
                case '1':
                    $list[$i]['type']='产品安装介绍';
                    break;
                case '2':
                    $list[$i]['type']='问题详解';
                    break;
                case '3':
                    $list[$i]['type']='健康科谱知识';
                    break;
                case '4':
                    $list[$i]['type']='行业信息';
                    break;
                case '5':
                    $list[$i]['type']='活动信息';
                    break;
                
                default:
                    $list[$i]['type']='类型写入有误！！';
                    break;
            }
        }


        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/news/news');  
        
    }

    public function news_add(){//资讯增加方法 

        if (IS_POST) {

            $news=I('post.data');
            if ($news['title']==''||$news['type']==''||$news['remark']==''||$news['contect']=='') {

                $this->error('请填写完全！');
            }
            $news['date'] = date('Y-m-d H:i:s',time());
            
            switch ($news['type']) {
                case '产品安装介绍':
                    $news['type']='1';
                    break;
                case '问题详解':
                    $news['type']='2';
                    break;
                case '健康科谱知识':
                    $news['type']='3';
                    break;
                case '行业信息':
                    $news['type']='4';
                    break;
                case '活动信息':
                    $news['type']='5';
                    break;
                
                default:
                    $news['type']='0';
                    break;
            }


            $table = M('News');
            $ret = $table ->add($news);
            if(!empty($ret)&&is_numeric($ret)){
                $this->success('增加成功',U('index/news_add'));
            }
        }else{

        $this->display('index/news/news_add');
        }
   
    }

    public function news_edit(){//资讯修改方法

            if(IS_POST){   
            $news=I('post.news');
            if ($news['title']==''||$news['type']==''||$news['remark']==''||$news['contect']=='') {

                $this->error('请填写完全！');
            }
            $id = I('post.id');
            $op = 'id='.$id;
            switch ($news['type']) {
                case '产品安装介绍':
                    $news['type']=1;
                    break;
                case '问题详解':
                    $news['type']=2;
                    break;
                case '健康科谱知识':
                    $news['type']=3;
                    break;
                case '行业信息':
                    $news['type']=4;
                    break;
                case '活动信息':
                    $news['type']=5;
                    break;
                
                default:
                    $news['type']=0;
                    break;
            }

            $news['date'] = date('Y-m-d H:i:s',time());

            $table = M('News');
            
            $ret = $table->where($op)->save($news);
            if(!empty($ret) && is_numeric($ret)){
                $this->success('修改成功!',U('Index/news'));
            }  
        
            }else{
                    $id = I('get.id');

                    if(empty($id)){

                         $this->error('非法访问!');
                    }
                    $table = M('News');
                    $news = $table->where(array('id'=>$id))->select();
                    $this->assign('news',$news[0]);

                    $this->display('Index/news/news_edit');
                    } //地址编辑方法 
        
    }

    public function news_delete(){//资讯删除修改 

            $id = $_GET['id'];
        
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('News');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/News'));
            } 
        
    }

    public function order(){//订单管理方法

        $table = M('Order');
        $where = '';
        $count = $table ->where($where)->count();

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        //数据库state 交易状态(0.已下单；1.已支付；2.已返利）
        for ($i=0; $i < count($list); $i++) { 
            switch ($list[$i]['state']) {
                case '0':
                    $list[$i]['state']='已下单';
                    break;
                case '1':
                    $list[$i]['state']='已支付';
                    break;
                case '2':
                    $list[$i]['state']='已返利';
                    break;
                default:
                    $list[$i]['state']='状态出错';
                    break;
            }
        }
        $this->assign('result',$list);
        $this->assign('page',$show);
        $this->display('index/order/order');
        
    }

    public function order_add(){

        if (IS_POST) {

            $data=I('post.data');
            if ($data['username']==''||$data['ordername']==''||$data['orderid']==''||$data['productid']==''||$data['transactiontime']==''||$data['state']=='') {

                $this->error('请填写完全！');
            }

            $table = M('Order');
            $ret = $table ->add($data);
            if(!empty($ret)&&is_numeric($ret)){
                $this->success('增加成功',U('index/order_add'));
            }
        }else{

        $this->display('index/order/order_add');
        }
        
    }

    public function order_edit(){//订单编辑方法

            if(IS_POST){   
            $data = I('post.data');
            if($data['username']==''||$data['ordername']==''||$data['orderid']==''||$data['productid']==''||$data['transactiontime']==''||$data['state']==''){
                $this->error('请填写完全!');

            }
            $id = I('post.id');
            $op = 'id='.$id;
            $order = M('Order');
            

            $data['lasttime'] =  date('Y-m-d H:i:s',time());

            $ret = $order->where($op)->save($data);
            if(!empty($ret) && is_numeric($ret)){
                $this->success('修改成功!',U('Index/order'));
            }  
        
            }else{
                    $id = I('get.id');

                    if(empty($id)){

                         $this->error('非法访问!');
                    }
                    
                    $table = M('Order');
                    $order = $table->where(array('id'=>$id))->select();
                    $this->assign('order',$order[0]);
                    $this->display('index/order/order_edit'); 
                    } //地址编辑方法    

    }

    public function order_delete(){//订单删除方法

            $id = $_GET['id'];
        
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('Order');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/Order'));
            } 
        
    }
    public function rebate(){

        $this->display('index/rebate/rebate');
        
    }
    
    public function barcode(){//条码管理方法 


        $table = M('Barcode');

        $where='';
        $count = $table->where($where)->count();//计算数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();


        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        for ($i=0; $i < $count; $i++) {
            if($list[$i]['state']==0){
                $list[$i]['state']='未扫码';
            }
            if($list[$i]['state']==1){
                $list[$i]['state']='已扫码';
            }
        }
        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display('index/barcode/barcode');
        
    }

    public function barcode_add(){//条码增加方法 

        if (IS_POST) {

            $data=I('post.data');
            if ($data['name']==''||$data['productid']==''||$data['barcode']=='') {

                $this->error('请填写完全！');
            }
            $data['state'] = '0';//未扫码
            $data['addtime'] = date('Y-m-d H:i:s',time());

            $table = M('Barcode');
            $ret = $table ->add($data);
            if(!empty($ret)&&is_numeric($ret)){
                $this->success('增加成功',U('index/barcode_add'));
            }
        }else{

        $this->display('index/barcode/barcode_add');
        }
   
    }

    public function barcode_delete(){//条码删除方法

            $id = $_GET['id'];
        
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('Barcode');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/barcode'));
            } 
        
    }

    public function productRebate(){//返利产品管理方法

        $table = M('productrebate');

        $where='';
        $count = $table->where($where)->count();//计算数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/productRebate/productRebate'); 
        
    }

    public function productRebate_add(){//返利产品增加方法 

            if(IS_POST){   
            $data = I('post.data');
            if($data['name']==''||$data['price']==''||$data['details']==''||$data['category']==''||$data['backmoney1']==''||$data['backmoney2']==''||$data['backmoney3']==''){

                $this->error('回复为空!');

            }
            $data['time'] =  date('Y-m-d H:m:s');
            $product = M('Productrebate');

            $ret = $product->add($data);

            if(!empty($ret) && is_numeric($ret)){
                
                $this->success('修改成功!',U('Index/productRebate'));
            }  
        
            }else{
                    $this->display('index/productRebate/productRebate_add'); 
                    } //地址编辑方法 
        
    }
   
    public function productRebate_edit(){//返利产品增加方法 

            if(IS_POST){   
            $data = I('post.data');
            if($data['name']==''||$data['price']==''||$data['details']==''||$data['category']==''||$data['backmoney1']==''||$data['backmoney2']==''||$data['backmoney3']==''){
                $this->error('请填写完全!');

            }
            $id = I('post.id');
            $op = 'id='.$id;
            $product = M('Productrebate');
            
            $data['lasttime'] =  date('Y-m-d H:i:s',time());

            $ret = $product->where($op)->save($data);
            if(!empty($ret) && is_numeric($ret)){
                $this->success('修改成功!',U('Index/productRebate'));
            }  
        
            }else{
                    $id = I('get.id');

                    if(empty($id)){

                         $this->error('非法访问!');
                    }
                    
                    $table = M('Productrebate');
                    $product = $table->where(array('id'=>$id))->select();
                    $this->assign('productRebate',$product[0]);
                    $this->display('index/productRebate/productRebate_edit'); 
                    } //地址编辑方法    
        
    }

    public function productRebate_delete(){//返利产品删除方法

            $id = $_GET['id'];
        
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('Productrebate');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/productRebate'));
            }         
            
    }

    public function product(){//展示产品管理方法

        $table = M('Product');

        $where='';
        $count = $table->where($where)->count();//计算地址数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/product/product'); 
        
    }

    public function product_add(){//展示产品增加方法 

            if(IS_POST){   
            $data = I('post.data');
            if($data['name']==''||$data['price']==''||$data['details']==''||$data['category']==''){

                $this->error('请填写完全!');

            }
            $data['time'] =  date('Y-m-d H:i:s',time());
            $product = M('Product');

            $ret = $product->add($data);

            if(!empty($ret) && is_numeric($ret)){
                
                $this->success('修改成功!',U('Index/product'));
            }  
        
            }else{
                    $this->display('index/product/product_add'); 
                    } //地址编辑方法 
        
    }
   
    public function product_edit(){//展示产品增加方法 

            if(IS_POST){   
            $data = I('post.data');
            if($data['name']==''||$data['price']==''||$data['details']==''||$data['category']==''){
                $this->error('请填写完全!');

            }
            $id = I('post.id');
            $op = 'id='.$id;
            $data['lasttime'] =  date('Y-m-d H:i:s',time());

            $product = M('Product');
            
            $ret = $product->where($op)->save($data);
            if(!empty($ret) && is_numeric($ret)){
                $this->success('修改成功!',U('Index/product'));
            }  
        
            }else{
                    $id = I('get.id');

                    if(empty($id)){

                         $this->error('非法访问!');
                    }
                    
                    $table = M('Product');
                    $product = $table->where(array('id'=>$id))->select();
                    $this->assign('product',$product[0]);
                    $this->display('index/product/product_edit'); 
                    } //地址编辑方法    
        
    }

    public function product_delete(){//展示产品删除方法

            $id = $_GET['id'];
            if(empty($id)){
                $this->error('非法访问!');
            }

            $table = M('Product');
            $ret = $table->where('id='.$id)->delete();
            if(!empty($ret) && is_numeric($ret)){

                $this->success('删除成功!',U('Index/product'));
            }         
            
    }

    public function test(){//测试页面

        $User = M('User');
        $count = $User->where('level=6')->count();
        $Page = new \Think\Page($count,2);
        $show =$Page->show();

        $list = $User->where('level=6')->limit($Page->firstRow.','.$Page->listRows)->select();

        
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
       
        $this->display(); //分页测试 

    }
}
