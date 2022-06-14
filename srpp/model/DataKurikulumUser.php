<?php
class DataKurikulumUser{
  private $_formItem = [];
  private $_db = null;

  public function __construct(){
    $this->_db = DB::getInstance();
  }

  public function validate($formMethod, $submit_type = 'insert'){
    $validate = new Validate($formMethod);

    $this->_formItem['data_kurikulum_utama_id'] = $validate->setRules('data_kurikulum_utama_id',
    'Kurikulum ID', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['user_id'] = $validate->setRules('user_id',
    'User ID', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['semester'] = $validate->setRules('semester',
    'Semester', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['sks'] = $validate->setRules('sks',
    'SKS', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['kategori'] = $validate->setRules('kategori',
    'Kategori', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 10,
    ]);

    $this->_formItem['ambil'] = $validate->setRules('ambil',
    'Ambil', [
      'sanitize' => 'string',
      'max_char' => 10,
    ]);

    $this->_formItem['nilai'] = $validate->setRules('nilai',
    'Nilai', [
      'sanitize' => 'string',
      'max_char' => 10,
    ]);

    $this->_formItem['mutu'] = $validate->setRules('mutu',
    'Mutu', [
      'numeric' => true,
      'sanitize' => 'float',
      'min_value' => 0,
    ]);

    if(!$validate->passed()) {
      return $validate->getError();
    }
  }

  public function getItem($item){
    return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
  }

  public function insert(){
    $data_kurikulum_user = [
      'semester' => $this->getItem('semester'),
      'sks' => $this->getItem('sks'),
      'kategori' => $this->getItem('kategori'),
      'data_kurikulum_utama_id' => $this->getItem('data_kurikulum_utama_id'),
      'user_id' => $this->getItem('user_id'),
    ];

    return $this->_db->insert('data_kurikulum_user',$data_kurikulum_user);
  }

  public function insertWhere($id, $id_user){
    $DB = DB::getInstance();
    $k_utama = $DB->getWhereOnce("data_kurikulum_utama", ['id','=',$id]);
    $data_kurikulum_user = [
      'semester' => $k_utama->semester,
      'sks' => $k_utama->sks,
      'data_kurikulum_utama_id' => $k_utama->id,
      'user_id' => $id_user,
    ];

    return $this->_db->insert('data_kurikulum_user',$data_kurikulum_user);
  }

  public function insertSelect($id){
    $data_kurikulum_user = [
      'data_kurikulum_utama_id' => $this->getItem('data_kurikulum_utama_id'),
      'user_id' => $this->getItem('user_id'),
      'semester' => $this->getItem('semester'),
      'sks' => $this->getItem('sks'),
      'kategori' => $this->getItem('kategori'),
      'ambil' => $this->getItem('ambil'),
      'nilai' => $this->getItem('nilai'),
      'mutu' => $this->getItem('mutu'),
      'prioritas' => $this->getItem('prioritas'),
    ];

    $this->_db->insertSelect('data_kurikulum_user', "data_kurikulum_utama", $data_kurikulum_user, ['id','=',$id]);
  }

  public function generate($id){
    $result = $this->_db->getWhereOnce('data_kurikulum_user',['id','=',$id]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function update($id, $data){
    $data_kurikulum_user = [
      'nilai' => $data['nilai'],
      'mutu' => $data['mutu'],
    ];

    $this->_db->update('data_kurikulum_user',$data_kurikulum_user,['id','=',$id]);
  }

  public function updateIPK($id){
    $DB = DB::getInstance();
    $data = $DB->getWhere('data_kurikulum_user', ['user_id','=',$id]);
    $mutu = 0;
    $sks = 0;
    foreach ($data as $d) {
      if (($d->mutu > 0)) {
        $mutu = $mutu + ($d->mutu * $d->sks);
        $sks = $sks + $d->sks;
      }
    }
    $ipk = $mutu / $sks;

    $student = [
      'total_mutu' => $mutu,
      'total_sks' => $sks,
      'ipk' => $ipk,
    ];

    $this->_db->update('student',$student,['id','=',$id]);
  }

  public function delete($id){
    $this->_db->delete('data_kurikulum_user',['user_id','=',$id]);
  }
}
