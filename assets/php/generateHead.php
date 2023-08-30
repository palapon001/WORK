<?php
function generateHead($pageTitle, $faviconUrl) {
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<meta content="width=device-width, initial-scale=1.0" name="viewport">';
    
    echo '<title>' . $pageTitle . '</title>';
    
    echo '<meta content="" name="description">';
    echo '<meta content="" name="keywords">';
    
    echo '<link href="' . $faviconUrl . '" rel="icon">';
    echo '<link href="' . $faviconUrl . '" rel="apple-touch-icon">';
    
    echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">';
    
    echo '<link href="assets/vendor/aos/aos.css" rel="stylesheet">';
    echo '<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">';
    echo '<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">';
    echo '<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">';
    echo '<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">';

    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>';
    echo '<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css"rel="stylesheet">' ;
    
    echo '<link href="assets/css/style.css" rel="stylesheet">';
    
    echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
    echo '</head>';
}
?>

