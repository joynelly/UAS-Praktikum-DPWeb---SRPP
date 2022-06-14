<?php
class User{
  private $_formItem = [];
  private $_db = null;

  public function __construct(){
    $this->_db = DB::getInstance();
  }

  public function validate($formMethod){
    $validate = new Validate($formMethod);

    $this->_formItem['email'] = $validate->setRules('email',
    'email', [
      'required'  => true,
      'sanitize'  => 'string',
      'unique'    => ['user', 'email'],
      'min_char'  => 3,
      'max_char'  => 200,
    ]);

    $this->_formItem['username'] = $validate->setRules('username',
    'username', [
      'required'  => true,
      'sanitize'  => 'string',
      'unique'    => ['user', 'username'],
      'min_char'  => 3,
      'max_char'  => 50,
    ]);

    $this->_formItem['password'] = $validate->setRules('password',
    'password', [
      'required' => true,
      'sanitize' => 'string',
    ]);

    if(!$validate->passed()) {
      return $validate->getError();
    }
  }

  public function getItem($item){
    return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
  }

  public function insert(){
    $user = [
      'email' => $this->getItem('email'),
      'username' => $this->getItem('username'),
      'password' => $this->getItem('password'),
      'role' => 'Student',
    ];

    return $this->_db->insert('user',$user);
  }

  public function generate($id){
    $result = $this->_db->getWhereOnce('user',['id','=',$id]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function generate2($username){
    $result = $this->_db->getWhereOnce('user',['username','=',$username]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function update($id){
    $user= [
      'email' => $this->getItem('email'),
      'username' => $this->getItem('username'),
      'password' => $this->getItem('password'),
    ];

    $this->_db->update('user',$user,['id','=',$id]);
  }

  public function delete($id){
    $this->_db->delete('user',['id','=',$id]);
  }
}
