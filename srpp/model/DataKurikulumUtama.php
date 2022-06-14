<?php
class DataKurikulumUtama{
  private $_formItem = [];
  private $_db = null;

  public function __construct(){
    $this->_db = DB::getInstance();
  }

  public function validate($formMethod, $submit_type = 'insert'){
    $validate = new Validate($formMethod);

    $this->_formItem['nama_matkul'] = $validate->setRules('nama_matkul',
    'Nama Matkul', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 100,
    ]);

    $this->_formItem['kode_matkul'] = $validate->setRules('kode_matkul',
    'Kode Matkul', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 10,
    ]);

    $this->_formItem['kategori'] = $validate->setRules('kategori',
    'Kategori', [
      'required' => true,
      'sanitize' => 'string',
      'max_char' => 10,
    ]);

    $this->_formItem['semester'] = $validate->setRules('semester',
    'Semester', [
      'required' => true,
      'numeric' => true,
      'sanitize' => 'string',
    ]);

    $this->_formItem['kurikulum_id'] = $validate->setRules('kurikulum_id',
    'Kurikulum ID', [
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

    if(!$validate->passed()) {
      return $validate->getError();
    }
  }

  public function getItem($item){
    return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
  }

  public function insert(){
    $data_kurikulum_utama = [
      'nama_matkul' => $this->getItem('nama_matkul'),
      'kode_matkul' => $this->getItem('kode_matkul'),
      'kategori' => $this->getItem('kategori'),
      'semester' => $this->getItem('semester'),
      'sks' => $this->getItem('sks'),
      'kurikulum_id' => $this->getItem('kurikulum_id'),
    ];

    return $this->_db->insert('data_kurikulum_utama',$data_kurikulum_utama);
  }

  public function generate($id){
    $result = $this->_db->getWhereOnce('data_kurikulum_utama',['id','=',$id]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function update($id){
    $data_kurikulum_utama = [
      'nama_matkul' => $this->getItem('nama_matkul'),
      'kode_matkul' => $this->getItem('kode_matkul'),
      'kategori' => $this->getItem('kategori'),
      'semester' => $this->getItem('semester'),
      'sks' => $this->getItem('sks'),
      'kurikulum_id' => $this->getItem('kurikulum_id'),
    ];

    $this->_db->update('data_kurikulum_utama',$data_kurikulum_utama,['id','=',$id]);
  }

  public function delete($id){
    $this->_db->delete('data_kurikulum_utama',['id','=',$id]);
  }
}
