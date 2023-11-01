
<nav class="navbar navbar-dark navbar-expand-lg bg-primary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">水土保持申請案件管理系統</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="index.php">首頁</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        案件管理
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $query = "SELECT * FROM categories";
                        $select_all_categories_query = mysqli_query($connection, $query);
                    
                        while($row = mysqli_fetch_assoc($select_all_categories_query)){
                            $cat_name = $row['cat_name'];
                            $cat_url = $row['cat_url'];
                            echo "<li><a class='dropdown-item' href='$cat_url.php'>$cat_name</a></li>";
                        }
                        ?>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        系統權限管理
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="UserList.php?type=role">角色權限設定</a></li>
                        <li><a class="dropdown-item" href="UserList.php">人員帳號管理</a></li>
                    </ul>
                </li>
            </ul>
            <div>
                <span class="text-light me-2">
                    您好，<a class="link-light" href="UserList.php?type=profile"><?php echo $_SESSION['username'];?></a>
                </span>
                <a href="logout.php" class="btn btn-dark btn-sm">登出</a>
            </div>

        </div>
    </div>
</nav>
<nav class="container-fluid mt-3" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
    <?php
      if(strpos($_SERVER['REQUEST_URI'], 'WSProject')){
        echo ' <li class="breadcrumb-item"><a href="WSProject.php">水土保持計畫案件</a></li>';
      }else if(strpos($_SERVER['REQUEST_URI'], 'WSSimpleApply')){
        echo ' <li class="breadcrumb-item"><a href="WSSimpleApply.php">簡易水保申請書</a></li>';
      }else if(strpos($_SERVER['REQUEST_URI'], 'WSViolate')){
        echo ' <li class="breadcrumb-item"><a href="WSViolate.php">違規取締表單</a></li>';
      }else if(strpos($_SERVER['REQUEST_URI'], 'WSLimit')){
        echo ' <li class="breadcrumb-item"><a href="WSLimit.php">超限利用表單</a></li>';
    }else if(strpos($_SERVER['REQUEST_URI'], 'UserList')){
        echo ' <li class="breadcrumb-item"><a href="UserList.php">系統權限管理</a></li>';
    }else if(strpos($_SERVER['REQUEST_URI'], 'map')){
      echo ' <li class="breadcrumb-item"><a href="map.php">地理資訊系統圖台</a></li>';
  }
    ?>
   <?php
      if(strpos($_SERVER['REQUEST_URI'], 'type=add')){
        echo ' <li class="breadcrumb-item active" aria-current="page">新增</li>';
      }else if(strpos($_SERVER['REQUEST_URI'], 'type=edit')){
        echo ' <li class="breadcrumb-item active" aria-current="page">編輯</li>';
      }else if(strpos($_SERVER['REQUEST_URI'], 'type=search')){
        echo ' <li class="breadcrumb-item active" aria-current="page">查詢</li>';
      }else if(strpos($_SERVER['REQUEST_URI'], 'type=profile')){
        echo ' <li class="breadcrumb-item active" aria-current="page">個人資料管理</li>';
    }else{
        echo ' <li class="breadcrumb-item active" aria-current="page">所有列表</li>';

    }
    ?>
    
  </ol>
</nav>