<?php
class ninjaController extends Controller {
	
	public function index() {

		$ninjas=$this->model->load();
        $this->setResponce($ninjas);
        
	}
	
	public function view($data) {

		$ninja=$this->model->load($data['id']);
        $this->setResponce($ninja);

	}
	
	public function add() {
		
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) && (isset($_POST['power'])) && (isset($_POST['speed'])) ) {
				$dataToSave=array( 'id'=>$_POST['id'], 'name'=>$_POST['name'], 'image'=>$_POST['image'], 'power'=>$_POST['power'], 'speed'=>$_POST['speed']);
				$addedItem=$this->model->create($dataToSave);
				$this->setResponce($addedItem);
			}

	}
	
	public function edit($data) {
		
		$_PUT=json_decode(file_get_contents('php://input'));
		
		if((isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) && (isset($_POST['power'])) && (isset($_POST['speed']))) {
			$dataToUpdate=array('id'=>$_POST['id'],'name'=>$_POST['name'],'image'=>$_POST['image'], 'power'=>$_POST['power'], 'speed'=>$_POST['speed']);
			$updatedItem=$this->model->save($dataToUpdate, $data['id']);
			$this->setResponce($updatedItem);
			}

	}
	
	public function delete($data) {

		$ninja = $this->model->delete($data['id']);
        $this->setResponce($ninja);

	}
}