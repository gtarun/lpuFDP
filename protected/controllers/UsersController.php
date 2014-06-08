<?php

class UsersController extends Controller
{

    public $allowed = array("certificate","index");
	public function filters()
    {
		return array(
        	'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
         );
    }
	public function accessRules()
    {
		return array(
        	array('allow', // allow authenticated user to perform 'create' and 'test' actions
				  'actions'=>$this->allowed,
				  'users'=>array('@'),
				 ),
			array('deny',  // deny all users
				  'users'=>array('*'),
				 ),
		);
    }

	public function actionIndex()
	{
        if(isset($_POST["UsersAnswer"]))
        {
            $allquestions = array_keys($_POST["UsersAnswer"]);
            $answer = CHtml::listData(Answers::model()->findAllByAttributes(array("questions_id"=>$allquestions)),"id","is_right");
            //CVarDumper::dump($_POST["UsersAnswer"],10,1);die;
            $right_count=0;
            foreach($_POST["UsersAnswer"] as $key=>$q)
            {
                if($answer[$key]==1)
                    $right_count++;
                $ans = new  UsersAnswer;
                $ans->question_id   = $key;
                $ans->answer_id     = $q;
                $ans->save();

            }
            $user = Users::model()->findByPk(Yii::app()->user->profile->id);
            $user->is_complete =1;
            $user->total  =$right_count.",".count($allquestions);
            $user->save();
            $this->redirect(array("users/certificate"));



        }
        $questions = Questions::model()->findAllByAttributes(array("status"=>1));
        //CVarDumper::dump($questions,10,1);die;
		$this->render('index',array("questions"=>$questions));
	}
	public function actionView()
	{
		$this->render('index');
	}

    public function actionCertificate()
    {
        $this->render("certificate");
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
