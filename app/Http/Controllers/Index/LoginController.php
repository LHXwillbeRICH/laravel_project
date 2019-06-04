<?php

namespace App\Http\Controllers\Index;
use App\Models\AccountBalance;
use App\Models\ActionLog;
use App\Models\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    const WEB = 'wb';  //来自移动端
    const PC = 'pc';  //来自pc端
    public function index(){
        //判断是否来自微信
        if($this->is_weixin()){
            return Socialite::with('weixin')->redirect();
        }else{
            return Socialite::with('weixinweb')->redirect();
        }
    }

    public function callback(){
        $info = $_REQUEST;
        $type = $info['state'];   //获取微信返回值的来源 pc还是web
        if(substr($type,0,2) == self::WEB){
            $source = 'weixin';
        }else{
            $source = 'weixinweb';
        }
        $user_data = Socialite::with($source)->stateless()->user()->user;
        if(substr($type,0,2) == self::WEB){
            $infos['open_id'] = $user_data['openid'];
        }
        $U = new Users();
        $user_info = $U->getInfoByUnionId($user_data['unionid']);
        if(!$user_info){
            DB::beginTransaction();
            try{

                $infos['nickname'] =$user_data['nickname'];
                $infos['sex']=$user_data['sex'];
                $infos['union_id']=$user_data['unionid'];
                $infos['img_url'] =$user_data['headimgurl'];
                $infos['created_at']=date('Y-m-d H:i:s');
                $infos['updated_at']=date('Y-m-d H:i:s');
                $U->addUser($infos);

                $user_info = $U->getInfoByUnionId($user_data['unionid']);
                $account = new AccountBalance();
                $account->addAccountBalance(['u_id'=>$user_info->id]);     //添加用户账户信息
                DB::commit();
            }catch (\Exception $e){
                DB::rollback();
                $action = new ActionLog();
                $info = ['action'=>'register','error_msg'=>$e->getMessage()];
                $action->addInfo($info);
            }
        }
        Auth::login($user_info); //进行登陆 将对象信息写入session中
        return redirect('/');
    }

    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function logout(Request $request) {
        Auth::logout();

        return \response()->json(['code'=>1]);
    }

    /**
     * 登陆提醒页面
     */
    public function remind(){
        if($this->is_weixin()){
            $msg = '登陆中请稍后';
            $msg2 = '秒钟后自动跳转至首页';
            $url = '/login';
        }else{
            $msg = '对不起,您还没有登录!请先登录!';
            $msg2 = '秒钟后自动跳转至登录页面';
            $url = '/login';
        }
        return view('index.public.loginRemind',['msg'=>$msg,'msg2'=>$msg2,'url'=>$url]);
    }
    /**
     * 判断是否为微信浏览器登陆
     * @return bool
     */
    function is_weixin(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ){
            //strpos() 函数查找字符串在另一字符串中第一次出现的位置。
            return true;
        }
        return false;
    }
}
