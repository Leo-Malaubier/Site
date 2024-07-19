<header>
  <nav>
    <ul class='menu'>
    <?php foreach ($this->menu as $key => $value){
      echo "<li><a href='".$value."'>".$key."</a></li>";
      }
    ?>
    </ul>
  </nav>
</header>
