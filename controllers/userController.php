<?php
class userController extends Controller {
	
	public function index() {

		$users=$this->model->load();
        $this->setResponce($users);

	}
	
	public function view($data) {

		$user=$this->model->load($data['id']);
        $this->setResponce($user);

	}
	
	public function add() {

		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['score'])) ){
			$dataToSave=array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score']);
			$addedItem=$this->model->create($dataToSave);
			$this->setResponce($addedItem);
		}

	}
	
	public function edit($data) {

		$_PUT=json_decode(file_get_contents('php://input'));

		if((isset($_PUT['id']))&&(isset($_PUT['name']))&&(isset($_PUT['score']))){
			$dataToUpdate=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'], 'score'=>$_PUT['score'] );
			$updatedItem=$this->model->save($dataToUpdate, $data['id']);
			$this->setResponce($updatedItem);
		}

	}
	
	public function delete($data) {

		$user = $this->model->delete($data['id']);
        $this->setResponce($user);

	}
}