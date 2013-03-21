<?php
	class MydbConection extends CDbConnection {
	  protected function initConnection($pdo)
	  {
		parent::initConnection($pdo);
		$stmt=$pdo->prepare("set search_path to public");
		$stmt->execute();
	  }
	}
?>