<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript">
    $(function(){
        $("#calendar").wl_Calendar({
            events: 'https://www.google.com/calendar/feeds/dummypengguna%40gmail.com/public/basic'
        })
    })
</script>
<div class="g12">
    <h1>
        Welcome <?php echo $model->NAME?>
    </h1>
    <p>Your last login is <?php echo $model->LAST_LOGIN?></p>
    <div class="calendar"></div>
</div>