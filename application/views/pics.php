<?php
//application/views/pics.php

$this->load->view($this->config->item('theme') . 'header');
?>

<h2>Pictures of "<?=$tags?>"</h2>

<table>
<tr>
<?php

if ($pics->stat != "fail") {

    $counter = 0;
    $row_size = 4; // the number of photos on a single row of the table.

    foreach($pics->photos->photo as $pic) {
        
        $size = 'm';
        $photo_url = 'http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

        // start a new row of the table every so often, to organize them nicer.
        if ($counter >= $row_size) {
            echo "</tr><tr>";
            $counter = 0;
        }
        $counter++;
        
        echo "<td>";
        echo "<img title='" . $pic->title . "' src='" . $photo_url . "' /><br>";
        echo $pic->title;
        echo "</td>";
    }

}
?>
</tr>
</table>

<?php
$this->load->view($this->config->item('theme') . 'footer');
?>
