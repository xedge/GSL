<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<style>
    td{cursor: pointer;}
</style>
<h1>High Zone</h1>
<table>
    <thead>
        <tr>
            <th>Floor </th>
            <th colspan="24">Room Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $floors = $model->getFloorbytype(1,2);
        foreach($floors as $floor){
            $rooms = $model->getRoom($floor->FLOOR_ID)
            ?>
        <tr>
            <td style="background-color: #F7EBFC"><?php echo $floor->FLOOR_NUMBER;$i=0;?></td>
            <?php foreach($rooms as $room){
                check($i, $room->ROOM_NUMBER);
                if($room->STATUS=='SOLD'){
                    echo '<td style="background-color:yellow" onclick="display('.$room->ROOM_ID.')">';
                }
                else
                {
                    echo '<td onclick="display('.$room->ROOM_ID.')">';
                }
                ?>
                    <?php echo $room->ROOM_NUMBER;?>
                <?PHP $i=$room->ROOM_NUMBER;?></td>
            <?php }  ?>
        </tr>
        <?php }?>
    </tbody>
</table>

<h1>Low Zone</h1>
<table>
    <thead>
        <tr>
            <th>Floor </th>
            <th colspan="24">Room Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $floors = $model->getFloorbytype(1,1);
        foreach($floors as $floor){
            $rooms = $model->getRoom($floor->FLOOR_ID)
            ?>
        <tr>
            <td style="background-color: #F7EBFC"><?php echo $floor->FLOOR_NUMBER; $i=0;?></td>
            <?php foreach($rooms as $room){
                check($i, $room->ROOM_NUMBER);
                if($room->STATUS=='SOLD'){
                    echo '<td style="background-color:yellow" onclick="display('.$room->ROOM_ID.')">';
                }
                else
                {
                    echo '<td onclick="display('.$room->ROOM_ID.')">';
                }
                ?><?php 
                echo $room->ROOM_NUMBER?>
                    <?PHP $i=$room->ROOM_NUMBER;?></td>
            <?php }  ?>
        </tr>
        <?php }?>
    </tbody>
</table>

<?PHP function check($i,$j)
{
    if($j-$i==1||  substr($j, 3)==5||  substr($j, 2)==23)
    {
        return true;
    }
    elseif ($j-$i<10)
    {   echo "<td></td>";
        return false;
    }
}
?>
<div id="detail"></div>
<script type="text/javascript">
    $(function(){
        $( "#detail" ).dialog({
            autoOpen: false
        });
    });
    function display(tes)
    {
        $('#detail').load("<?php echo 'index.php?r=masterstock/detail&roomid='?>"+tes);
        $('#detail').dialog('open');
    }
</script>

