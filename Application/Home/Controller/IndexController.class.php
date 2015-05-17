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
        $count = $table->where($where)->count();//计算留言条数

        $Page = new \Think\Page($count,C('MY_PAGE_MESSAGE'));


        $show =$Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        for ($i=0; $i < count($list); $i++) { 
            $list[$i]['reply'] = htmlspecialchars_decode($list[$i]['reply']);
        }
        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/message/message'); 
        
    }

    public function message_edit(){//留言编辑方法

        if(IS_POST){
            //把接收到的数据用html方式保存
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
                //数据库存的reply数据为加密为html格式的代码，下面进行解密
                $user[0]['reply'] = htmlspecialchars_decode($user[0]['reply']);
                $this->assign('message',$user[0]);
                $this->display('index/message/message_edit');
        } 

    }

    public function lottory(){//抽奖活动管理方法

        $tprize = M('Prize');
        $ttserial = M('Serialstart');
        $where='';
        $wtserial=$ttserial ->field('serialnumber')->select();
        $result = $ttserial -> select();
        for ($i=0; $i < count($wtserial); $i++) {
            //用strotime来把时间进行格式化,取年月日
           $result[$i]['starttime']=date('Y-m-d',strtotime($result[$i]['starttime']));
           $result[$i]['endtime']=date('Y-m-d',strtotime($result[$i]['endtime']));

            $a=$tprize->field('name,number,winning')->where($wtserial[$i])->order('id')->select();
            $string = "";
            for ($j=0; $j < count($a); $j++) { 
            $string[$j] = '【'.$a[$j]['name'].'】---【'.$a[$j]['number'].'】---【'.$a[$j]['winning'].'%】'.'<br />';
            }
            for ($k=0; $k < count($string); $k++) { 
            $result[$i]['prize'].=$string[$k];
            }
        }
        $count =count($result);//计算地址数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $ttserial->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$result);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/lottory/lottory');
        
    }

    public function lottory_add(){//增加抽奖活动方法

        if(IS_POST){
            $time=I('post.time');
            $data=I('post.data');
        if($time['starttime']==""||$time['endtime']==""){
            $this->error('请填写完全!');
        }
        $time['time'] = date('Y-m-d H:i:s',time());
        $tdata = M('Prize');//打开奖品表

        $ttime  = M('Serialstart');//打开活动时间表

        $serialnumber=$ttime->max('serialnumber')+1;

        for ($i=0; $i < count($data); $i++) { 
        $data[$i]['serialnumber']=$serialnumber;
        }

        $time['serialnumber'] =$serialnumber;
        $ret1 = $ttime->add($time);
        for ($i=0; $i < count($data); $i++) { 
            $ret2 = $tdata->add($data[$i]); 
        }
        if(!empty($ret2) && is_numeric($ret2)&&!empty($ret1) && is_numeric($ret1)){
            $this->success('增加成功!',U('Index/lottory'));
        }

        }else{
        $this->display('index/lottory/lottory_add'); 
        }   
        
    }
 

    public function lottory_view(){//抽奖的视图,可对抽奖进行编辑

        $id = I('get.id');

        if (IS_POST) {
            $id1 =I('post.id1');
            $time=I('post.time');
            $data=I('post.data');

            $where1['id'] = $id1;

            if($time['starttime']==""||$time['endtime']==""){
                $this->error('请填写完全!');
            }
            $time['time'] = date('Y-m-d H:i:s',time());
            $tdata = M('Prize');//打开奖品表

            $ttime  = M('Serialstart');//打开活动时间表

            $ret2 = $ttime ->where($where1)->save($time);
            $serialnumber = $ttime->field('serialnumber')->where($where1)->select();

            //数据涿条保存,由于有可能新增,所以必须循环
            for ($i=0; $i < count($data); $i++) { 
                //如果有新增的话,把serialnumber加入到数组中,并重新添加数据到数据库
                if($data[$i]['id']==""){
                    $data[$i]['serialnumber'] = $serialnumber[0]['serialnumber'];
                    $ret3=$tdata->add($data[$i]);
                }else{
                    $where2['id'] = $data[$i]["id"];
                    $ret1=$tdata ->field('name,number,winning')->where($where2)->save($data[$i]);
                }
            }
            if(!empty($ret2) && is_numeric($ret2)){
                $this->success('增加成功!',U('Index/lottory'));
            }
        }else{
            $where['id'] = $id;

            $ttime = M('Serialstart');
            $tprize = M('Prize');
            $serial = $ttime->where($where)->select();

            $where1['serialnumber'] = $serial[0]['serialnumber'];
            $prize =$tprize ->field('id,name,number,winning')->where($where1)->select();

            //给显示的时间设置短时间
            $serial[0]['starttime']=date('Y-m-d',strtotime($serial[0]['starttime']));
            $serial[0]['endtime']=date('Y-m-d',strtotime($serial[0]['endtime']));      

            //分两个数组传给静态页面
            $this->assign('result_serial',$serial[0]);
            $this->assign('result_prize',$prize);
            $this->assign('id1',$where['id']);

            $this->display('index/lottory/lottory_view');
        }

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

    public function lessons(){//查看问卷方法

        $tq = M('Question');
        $tqtype = M('Questiontype');
        $where='';
        $result = $tqtype -> select();

        for ($i=0; $i < count($result); $i++) {
            //用strotime来把时间进行格式化,取年月日
           $result[$i]['starttime']=date('Y-m-d',strtotime($result[$i]['starttime']));
           $result[$i]['endtime']=date('Y-m-d',strtotime($result[$i]['endtime']));

            $where3['number'] =$result[$i]['number'];
            $a=$tq->field('qusnumber,title,a,b,c,d')->where($where3)->order('id')->select();
            $string = "";
            $string1 = "";
            for ($j=0; $j < count($a); $j++) { 

                $string[$j] .=$j.'、'. $a[$j]['title'].'<br>';
                $string1[$j] .=$j.  '、【A:'.$a[$j]['a'].'】【B:'.$a[$j]['b'].'】【C:'.$a[$j]['c'].'】【D:'.$a[$j]['d'].'】<br>';
            }
            for ($k=0; $k < count($string); $k++) { 
                $result[$i]['question'] .=$string[$k];
                $result[$i]['option'] .=$string1[$k];
            }

        }
        $count =count($result);//计算地址数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();

        $list = $tqtype->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$result);
        $this->assign('page',$show);// 赋值分页输出

        $this->display('index/lessons/lessons'); 
        
    }

    public function lessons_view(){

        $data = I("post.data");
        $questiontype = I("post.questiontype");
        dump($data);dump($questiontype);exit();
        $this->display('index/lessons/lessons_add'); 
        
    }

    public function lessons_edit(){

        $data = I("post.data");
        $questiontype = I("post.questiontype");
        dump($data);dump($questiontype);exit();
        $this->display('index/lessons/lessons_edit'); 
        
    }

    public function lessons_add(){//添加问卷方法

        if(IS_POST){
        $data = I("post.data");
        $questiontype = I("post.questiontype");


        if($questiontype['starttime']==""||$questiontype['endtime']==""){
            $this->error('请填写完全!');
        }
        $questiontype['time'] = date('Y-m-d H:i:s',time());
        $tdata = M('Question');

        $ttype  = M('Questiontype');

        $number=$ttype->max('number')+1;

        for ($i=0; $i < count($data); $i++) { 
        $data[$i]['number']=$number;
        }

        $questiontype['number'] =$number;
        $ret1 = $ttype->add($questiontype);
        for ($i=0; $i < count($data); $i++) { 
            $ret2 = $tdata->add($data[$i]); 
        }
        if(!empty($ret2) && is_numeric($ret2)&&!empty($ret1) && is_numeric($ret1)){
            $this->success('增加成功!',U('Index/lessons'));
        }
        }else{
        $this->display('index/lessons/lessons_add'); 
        }   

   }


    public function lessons_delete(){

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

            $news=I('post.data','htmlspecialchars');
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

                    $news[0]['contect'] = htmlspecialchars_decode($news[0]['contect']);
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

    public function order_add(){//订单误删重建方法

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

    public function rebate(){//返利查询方法

        $where = '';
        $table = M('Rebate');

        $alluser = $table->distinct(true)->field('username')->select();


        for ($i=0; $i < count($alluser); $i++) {

            $alluser[$i]['id']=$i;
            $where['downtype']= 1;
            $where['username']=$alluser[$i]['username'];
            $alluser[$i]['rebate1']=$table->where($where)->SUM('backmoney');
                $where['downtype']= 2;
            $alluser[$i]['rebate2']=$table->where($where)->SUM('backmoney');
                $where['downtype']= 3;
            $alluser[$i]['rebate3']=$table->where($where)->SUM('backmoney');
            //获得所有返利金额
            $alluser[$i]['allrebate']=$alluser[$i]['rebate1']+$alluser[$i]['rebate2']+$alluser[$i]['rebate3'];
        }
        $count=count($alluser);

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show = $Page->show();

        // $list =$alluser->limit($Page->firstRow.''.$Page->listRows);

        $this->assign('result',$alluser);
        $this->assign('page',$show);

        $this->display('index/rebate/rebate');
        
    }
    
    public function rebate_look(){//返利查看单用户明细

        $name['username'] = I('get.username');
        $name['downtype']=1;

        $table = M('Rebate');
        $result1 = $table ->where($name)->order('downtype')->select();
        $name['downtype']=2;

        $result2 = $table ->where($name)->order('downtype')->select();
        $name['downtype']=3;

        $result3 = $table ->where($name)->order('downtype')->select();

        $result['username']=$name['username'];
        $result['result1']=$result1;
        $result['result2']=$result2;
        $result['result3']=$result3;
        $this->assign('result',$result);


        $this->display('index/rebate/rebate_look');

    }

    public function barcode(){//条码管理方法 


        $table = M('Barcode');

        $where='';
        $count = $table->where($where)->count();//计算数量

        $Page = new \Think\Page($count,C('MY_PAGE'));
        $show =$Page->show();


        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        for ($i=0; $i < count($list); $i++) {
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
            $data = I('post.data','htmlspecialchars');
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
            $data = I('post.data','htmlspecialchars');
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

                    $product[0]['details'] = htmlspecialchars_decode($product[0]['details']);

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
        $show = $Page->show();

        $list = $table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('result',$list);
        $this->assign('page',$show);// 赋值分页输出


        $this->display('index/product/product'); 
        
    }

    public function product_add(){//展示产品增加方法 

            if(IS_POST){   
            $data = I('post.data','htmlspecialchars');
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
            $data = I('post.data','htmlspecialchars');
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
                    $product[0]['details'] = htmlspecialchars_decode($product[0]['details']);
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

    public function producttype(){//产品类型管理

        $table = M("Producttype");

        $count = $table->count();
        $Page = new \Think\Page($count,C("MY_PAGE_PRODUCTTYPE"));
        $show = $Page ->show();


        $result = $table->limit($Page->firstRow.','.$Page->lsitRows)->select();

        for ($i=0; $i < count($result); $i++) { 
            if ($result[$i]['typeclass']==0) {
                $result[$i]['typeclass']="返利产品";
            }
            if ($result[$i]['typeclass']==1) {
                $result[$i]['typeclass']="展示产品";
            }
        }
        $this->assign('result',$result);
        $this ->assign('page',$show);
        $this->display('index/producttype/producttype');

    }

    public function producttype_add(){

        $this->display("index/producttype/producttype_add");
    }

    public function producttype_edit(){

        $this->display("index/producttype/producttype_edit");
    }

    public function aboutus(){//完成关于企业的信息

        $result = M('Aboutus');

        if(IS_POST){
            $data=I('post.data');
            //判断是否全部填写
            if($data['openregedit']==''||$data['agreement']==''||$data['introduction']==''||$data['aboutus']==''||$data['openregedit']==''||$data['appedition']==''||$data['appdowload']==''||$data['enterpriseweb']==''){
                $this->error('请填写完全！');
            } 
                if($date['settime']==''){
                    //如果第一次设置，则设置当前时间
                $date['settime'] = date('Y-m-d H:i:s',time());
                }
                //设置修改时间
                $date['endtime'] = date('Y-m-d H:i:s',time());


                //由于只有一条数据，所以查询条件直接写出
                $ret = $result ->where('id=1')->save($data);

                //如果不为空则为写入成功
                if(!empty($ret)&&is_numeric($ret)){
                    $this ->success('修改成功',U('index/aboutus'));
                 
            }
        }else{
            //不是提交的POST的情况下直接显示所有要修改的信息
        $aboutus = $result->select();
        $aboutus[0]['agreement'] = htmlspecialchars_decode($aboutus[0]['agreement']);
        $aboutus[0]['introduction'] = htmlspecialchars_decode($aboutus[0]['introduction']);
        $aboutus[0]['aboutus'] = htmlspecialchars_decode($aboutus[0]['aboutus']);
        $this ->assign('aboutus',$aboutus[0]);
        $this->display('index/aboutus/aboutus');
        }

    }






    public function test(){

        $this->display('index/test');

    }

    public function get_td_array($table) {//输入table源码 返回数组
            // 去掉 HTML 标记属性
            $table = preg_replace("'<table[^>]*?>'si", "", $table);
            $table = preg_replace("'<tr[^>]*?>'si", "", $table);
            $table = preg_replace("'<td[^>]*?>'si", "", $table);
            $table = str_replace("</tr>", "{tr}", $table);
            $table = str_replace("</td>", "{td}", $table);
            // 去掉 HTML 标记
            $table = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $table);
            // 去掉空白字符
            $table = preg_replace("'([\r\n])[\s]+'", "", $table);
            $table = str_replace(" ", "", $table);
            $table = str_replace(" ", "", $table);
            
            $table = explode('{tr}', $table);
            array_pop($table);
            foreach ($table as $key => $tr) {
                $td = explode('{td}', $tr);
                array_pop($td);
                $td_array[] = $td;
            } 
            return $td_array;

    } 


    public function lottory_getdata(){//后台获得中奖概率
        $prize_arr = array(
            '0' => array('id'=>1,'prize'=>'平板电脑','v'=>3),
            '1' => array('id'=>2,'prize'=>'数码相机','v'=>5),
            '2' => array('id'=>3,'prize'=>'音箱设备','v'=>10),
            '3' => array('id'=>4,'prize'=>'4G优盘','v'=>12),
            '4' => array('id'=>5,'prize'=>'Q币10元','v'=>20),
            '5' => array('id'=>6,'prize'=>'下次没准就能中哦','v'=>50),);


                foreach ($prize_arr as $key => $val) {
                    $arr[$val['id']] = $val['v'];
                }
                //print_r($arr);

                $rid = getRand($arr); //根据概率获取奖项id
                $res['msg'] = ($rid==6)?0:1; 
                $res['prize'] = $prize_arr[$rid-1]['prize']; //中奖项
                echo json_encode($res);exit;

    }
  
    public function getRand($proArr) { //计算概率

            $result = '';

            //概率数组的总概率精度
            $proSum = array_sum($proArr);

            //概率数组循环
            foreach ($proArr as $key => $proCur) {
                $randNum = mt_rand(1, $proSum);
                if ($randNum <= $proCur) {
                    $result = $key;
                    break;
                } else {
                    $proSum -= $proCur;
                }
            }
            unset ($proArr);

            return $result;
         }   

    }
    
