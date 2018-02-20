<?php include "includes/header.php"; ?>
    <h1 class="pageHeadingBig">You Might Also Like</h1>

    <div class="gridViewContainer">

<?php
global $conn;
$albums = new Album($conn);
$allAlbums = $albums->allAlbums();

foreach ($allAlbums as $album) {

    $content = <<<CONTENT

        <div class='gridViewItem'>
            <a href="album.php?id=$album->id">
                <img src="$album->artworkPath" alt="$album->title">
                <div class='gridViewInfo'>$album->title</div>
            </a>
        </div>
    </div>


CONTENT;
    echo $content;
}
?>
<?php include "includes/footer.php"; ?>