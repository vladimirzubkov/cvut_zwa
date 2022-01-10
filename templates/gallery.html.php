<ul id="gallery">
  <?php
    $options = array(
      'quantity'  => 3, // how many item to display for each pagenumber
      'around'    => 5,  // how many pagenumber btn to show around the current pagenumber btn
    );

    $pagenumber = isset($_GET['pagenumber']) ? $_GET['pagenumber'] : 1;
    $offset = ($pagenumber - 1) * $options['quantity']; // $pagenumber base index is 1
    $filelist = array_diff(scandir(IMAGES_DIR), array('.', '..'));

     //get subset of file array
    $selected_files = array_slice($filelist, $offset, $options['quantity']);

    foreach ($selected_files as $file) {
       echo '<li class="item"><a href="' . IMAGES_DIR . $file .'"><img src="https://oi.flyimg.io/upload/w_200,h_100/'. BASE_URL . IMAGES_DIR . $file .'" width="200" height="100" alt="obrázek k zobrazení"></a></li>';
    }
  ?>
</ul>

<div class="pagination">
  <?php
    $len = count($filelist) / $options['quantity'];
    for ($i = 1; $i < $len + 1; $i++) {
      if (($i == 1 || $i > $len) || ($i > $pagenumber - $options['around'] && $i < $pagenumber + $options['around'])) {
        echo '<a class="btn '. ($pagenumber == $i ? 'active' : '') .'" href="?page=gallery&pagenumber='.$i.'">'. $i .'</a>';
      } elseif ($i > $pagenumber - $options['around'] - 1 && $i < $pagenumber + $options['around'] + 1) {
        echo '<a disabled class="btn">&hellip;</a>';
      }
    }
  ?>
</div>