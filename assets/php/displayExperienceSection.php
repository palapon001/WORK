<?php
function displayExperienceSection($con, $sql, $col, $title)
{

    $query = mysqli_query($con, $sql);

    echo '<div class="form-control mb-3">';
    echo '<p>' . $title . '</p>';
    echo '<div class="form-control overflow-auto" style="height: 5rem;">';

    while ($result = mysqli_fetch_assoc($query)) {
        if ($result[$col] != '---' && $result[$col] != 'มี' && $result[$col] != 'ไม่มี' && $result[$col] != '---,---') {
            echo $result[$col] . '<br>';
        }
    }
    echo '</div>';
    echo '</div>';
}
?>