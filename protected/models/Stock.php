<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stock extends CFormModel{
    public function getRoom($floorid)
    {
        $rooms = Room::model()->findAll(array(
            'order'=>'ROOM_NUMBER',
            'condition'=>'FLOOR_ID=:x',
            'params'=>array(':x'=>$floorid)
        ));
        return $rooms;
    }
    
    public function getFloor($towerid)
    {
        $floors = Floor::model()->findAllByAttributes(array('TOWER_ID'=>$towerid));
        return $floors;
    }
    
    public function getFloorbytype($towerid,$floortype)
    {
        $floors = Floor::model()->findAllByAttributes(array('TOWER_ID'=>$towerid,'FLOOR_TYPE_ID'=>$floortype),array('order'=>'FLOOR_NUMBER DESC'));
        return $floors;
    }
}