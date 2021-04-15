<?php


class UserController extends BaseController
{
    /**
     * 控制器过滤器
     */
    public function __construct() {
        $this->beforeFilter('auth', array('except'=>array('Login', 'DoLogin')));
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    /**
     * 后台用户列表页
     */
    public function getIndex(){
        $users = User::paginate(2);
        $count = User::count();
        return View::make('user.list')->with('users', $users)->with('count', $count);
    }

    /**
     * 添加用户
     */
    public function getAddUser(){
        return View::make('user.adduser');
    }

    public function postAddUser(){
        $datas = Input::all();
        $rules = array(
            'username'=>'required|unique:users|alpha_num',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        );
        $validator = Validator::make($datas,$rules);
        if ($validator->fails()){
            $msg1 = $validator->messages()->first('username');
            $msg2 = $validator->messages()->first('email');
            $msg3 = $validator->messages()->first('password');
            $msg = $msg1."\n".$msg2."\n".$msg3;
            return json_encode(array('success'=>false, 'msg'=>$msg));
        }

        $user = new User();
        $user->username=$datas['username'];
        $user->email=$datas['email'];
        $user->password=Hash::make($datas['password']);
        $user->save();

        $data = array('success'=>true, 'msg'=>'添加成功');
        return json_encode($data);
    }

    /**
     * 修改密码
     */
    public function getEditUser($id){
        $user = User::find($id);
        return View::make('user.edituser')->with('user', $user);
    }

    public function postEditUser(){
        $datas = Input::all();
        $rules = array(
            'password'=>'required|min:6|confirmed',
        );
        $validator = Validator::make($datas,$rules);
        if ($validator->fails()){
            $msg = $validator->messages()->first('password');
            return json_encode(array('success'=>false, 'msg'=>$msg));
        }

        $id = $datas['id'];
        $password = $datas['password'];
        $user = User::find($id);
        $user->password=Hash::make($password);
        $user->save();

        $data = array('success'=>true, 'msg'=>'修改成功');
        return json_encode($data);
    }

    /**
     * 用户登录
     */
    public function Login(){
        return View::make('user.login');
    }

    /**
     * 用户登录提交
     */
    public function DoLogin(){
        $datas = Input::all();
        $rules = array(
            'username'=>'required',
            'password'=>'required',
        );
        $validator = Validator::make($datas,$rules);
        if ($validator->fails()){
            $msg1 = $validator->messages()->first('username');
            $msg2 = $validator->messages()->first('password');
            $msg = $msg1."\n".$msg2;
            return json_encode(array('success'=>false, 'msg'=>$msg));
        }

        $username=$datas['username'];
        $password=$datas['password'];
        if (Auth::attempt(array('username'=>$username, 'password'=>$password))){
            return json_encode(array('success'=>true, 'msg'=>'登录成功，即将跳转到后台首页'));
        } else {
            return json_encode(array('success'=>false, 'msg'=>'用户名或密码错误'));
        }
    }

    /**
     * 用户注销
     */
    public function Logout(){
        Auth::logout();
        return Redirect::to('/login');
    }
}