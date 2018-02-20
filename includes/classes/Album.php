<?php

class Album
{
    private $conn;

    public $id;
    public $title;
    public $artist;
    public $genre;
    public $artworkPath;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function allAlbums()
    {
        $query = "SELECT * FROM albums";
        $stmt = $this->conn->query($query);
        $albums = [];
        while ($row = $stmt->fetch_assoc()) {
            $album = new Album($this->conn);
            $album->id = $row['id'];
            $album->title = $row['title'];
            $album->artist = $row['artist'];
            $album->genre = $row['genre'];
            $album->artworkPath = $row['artworkPath'];
            array_push($albums, $album);
        }
        return $albums;
    }

//    public function addAlbum()
//    {
//
//    }
//
//    public function getAlbum()
//    {
//
//    }
//
//    public function updateAlbum()
//    {
//
//    }
//
//    public function deleteAlbum()
//    {
//
//    }
}

