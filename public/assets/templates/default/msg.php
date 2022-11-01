<div id='msg' style="width:100vw;height:3vh;">
  <?php
    if(isset($_SESSION['msgs'])){
        foreach($_SESSION['msgs'] AS $msg){
            echo "<div class='alert alert-{$msg['class']}' role='alert'>";
            echo $msg['msg'];
             echo "</div>";
        }
        unset($_SESSION['msgs']);
    }
  ?>  
</div>
<script>
    setTimeout(()=>{document.querySelector('#msg')
    .innerHTML=''},
    3000)
</script>
