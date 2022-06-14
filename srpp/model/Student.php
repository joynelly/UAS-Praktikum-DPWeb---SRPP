<?php
class Student{
  private $_formItem = [];
  private $_db = null;

  public function __construct(){
    $this->_db = DB::getInstance();
  }

  public function validate($formMethod, $submit_type = 'insert'){
    $validate = new Validate($formMethod);

    $this->_formItem['nama'] = $validate->setRules('nama',
    'Nama', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 100,
    ]);

    $this->_formItem['tanggal_lahir'] = $validate->setRules('tanggal_lahir',
    'Tanggal Lahir', [
      'required' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['jenis_kelamin'] = $validate->setRules('jenis_kelamin',
    'Jenis Kelamin', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 50,
    ]);

    $this->_formItem['nama_jurusan'] = $validate->setRules('nama_jurusan',
    'Jurusan', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 50,
    ]);

    $this->_formItem['tahun_masuk'] = $validate->setRules('tahun_masuk',
    'Tahun Masuk', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['kurikulum_id'] = $validate->setRules('kurikulum_id',
    'Kurrrr', [
      'sanitize' => 'string',
    ]);

    $this->_formItem['user_id'] = $validate->setRules('user_id',
    'Id User', [
      'required' => true,
      'numeric' => true,
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
    if ($this->getItem('nama_jurusan') == "Ilmu Komputer") {
      $k_id = 2;
    } else {
      $k_id = 3;
    }
    $student = [
      'nama' => $this->getItem('nama'),
      'tanggal_lahir' => $this->getItem('tanggal_lahir'),
      'jenis_kelamin' => $this->getItem('jenis_kelamin'),
      'nama_jurusan' => $this->getItem('nama_jurusan'),
      'tahun_masuk' => $this->getItem('tahun_masuk'),
      'user_id' => $this->getItem('user_id'),
      'kurikulum_id' => $k_id,
    ];

    return $this->_db->insert('student',$student);
  }

  public function generate($id){
    $result = $this->_db->getWhereOnce('student',['id','=',$id]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function update($id){
    $student = [
      'nama' => $this->getItem('nama'),
      'tanggal_lahir' => $this->getItem('tanggal_lahir'),
      'jenis_kelamin' => $this->getItem('jenis_kelamin'),
      'nama_jurusan' => $this->getItem('nama_jurusan'),
      'tahun_masuk' => $this->getItem('tahun_masuk'),
      'user_id' => $this->getItem('user_id'),
      'kurikulum_id' => $this->getItem('kurikulum_id'),
    ];

    $this->_db->update('student',$student,['id','=',$id]);
  }

  public function delete($id){
    $this->_db->delete('student',['id','=',$id]);
  }
}
