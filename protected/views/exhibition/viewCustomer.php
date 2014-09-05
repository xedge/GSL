<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript">
    $(function(){
        set();
        $("#exhibition").change(function(){
            set();
        });
        $("#exhibiton_detail").change(function(){
            var id = $(this).val();
            loadTabel(id);
        })
    });
    function set()
    {
        var $dropdown = $('#exhibition');
        $.getJSON("index.php?r=exhibition/getexhibitionDetail&exhid="+$dropdown.val(),function(data){
            var $exd = $('#exhibiton_detail');
            $exd.empty();
            $.each(data,function(index,val){
                $exd.append(
                        "<option value="+val.ED_ID+">"+
                        val.DATE+"</option>"
                        );
            });
            loadTabel($exd.val());
        });
    }
    function loadTabel(exdid)
    {
        $("#cusbody").load("index.php?r=exhibition/CustomerTbl&exdid="+exdid);
    }
</script>
<div class="g12">
    <h1>View Customer</h1>
    <div class="g12">
        <?php echo CHtml::label('Exhibition', 'exh',array('class'=>'g2'))?>
        <?php echo CHtml::dropDownList('exhibition','', $model->getAllExhibition(),array('class'=>'g3'))?>
    </div>
    <div class="g12">
        <?php echo CHtml::label('DATE', 'exd',array('class'=>'g2'))?>
        <?php echo CHtml::dropDownList('exhibiton_detail', '',array(''), array('class'=>'g3'))?>
    </div>
    <div class="g12" id="cusbody">
        
    </div>
</div>