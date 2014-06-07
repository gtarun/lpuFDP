<?php
class WidgetDashboardTop extends CWidget
{
	public $visible=true;

	public function init()
	{
		if($this->visible)
		{

		}
	}

	public function run()
	{
		if($this->visible)
		{
			$this->renderContent();
		}
	}
	protected function renderContent()
	{
		$profile = Yii::app()->user->profile;
		$this->render('widgetDashboardTop',array('profile'=>$profile));
	}
}
