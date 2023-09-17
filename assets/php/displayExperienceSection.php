<?php
function displayExperienceSection($con, $sql, $col, $title)
{
    $items = [];
    $query = mysqli_query($con, $sql);

    echo '<div class="form-control mb-3">';
    echo '<p>' . $title . '</p>';
    echo '<div class="form-control overflow-auto" style="height: 15rem;">';

    while ($result = mysqli_fetch_assoc($query)) {
        if ($result[$col] != '---' && $result[$col] != 'มี' && $result[$col] != 'ไม่มี' && $result[$col] != '---,---') {
            if (strpos($result[$col] , ',') !== false) {
                $itemList = explode(',', $result[$col]);
                $items = array_merge($items, $itemList);
            } else {
                $items[] = $result[$col];
            }
        }
    }

    foreach ($items as $item) {
        echo '<div class="alert alert-secondary" role="alert">';
        echo '<span>- ' . $item . '</span>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
}
?>