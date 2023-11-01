<div class="mx-auto mb-3 row align-items-center">
    每頁
    <div class="col-4 col-md-1">
        <select class="pagesize custom-select form-select" onchange="window.location='?total='+this.value">
            <option value="5" <?php if($total == "5"){ echo " selected"; }?>>5</option>
            <option value="10" <?php if($total == "10"){ echo " selected"; }?>>10</option>
            <option value="20" <?php if($total == "20"){ echo " selected"; }?>>20</option>
            <option value="50" <?php if($total == "50"){ echo " selected"; }?>>50</option>
        </select>
    </div>
    筆，第<?php if($count != 0){echo $page."/";};?><?php echo $pages;?>頁，共<?php echo $count;?>筆
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        

        <?php 
            
            if($page > 1){
                $pre = "";
            }else{
                $pre = "disabled";
            }
        
            echo "<li class='page-item $pre'><a class='page-link' href='?total=$total&page=".($page-1)."&order=$order&&sort=$sort'>上一頁</a></li>";
            for($i =1; $i <= $pages; $i++){
                if($i == $page){
                    $active = "active";
                }else{
                    $active = "";
                }
                echo "<li class='page-item'><a class='page-link $active' href='?total=$total&page={$i}&order=$order&&sort=$sort'>{$i}</a></li>";
            }

            if($page < $pages){
                $next = "";
            }else{
                $next = "disabled";
            }
            echo "<li class='page-item $next'><a class='page-link' href='?total=$total&page=".($page+1)."&order=$order&&sort=$sort'>下一頁</a></li>";
            
        
        ?>
        
    
    </ul>
</nav>