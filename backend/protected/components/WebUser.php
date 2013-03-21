<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author sani
 */
class WebUser extends CWebUser {
    //put your code here
private $_model;
  
    function getName(){
            if(isset(Yii::App()->user->id)){
                  //$user = $this->loadUser(Yii::App()->user->id);
                  $user=User::model()->findByPk(Yii::App()->user->id);
                  return $user->alamat;
            }else{
                    return 'Guest';
            }
    }
  
	
    public function detail(){
            $user=User::model()->findByPk(1);
            return $user;
    }
    
    public function get(){
            $user=User::model()->findByPk(Yii::app()->user->id);
            return $user;
    }
    
    //public function role(){
        //$role = Role
    //}
  
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}

?>
