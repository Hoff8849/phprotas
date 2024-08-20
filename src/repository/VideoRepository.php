<?php

namespace Senac\Mvc\Repository;
use PDO;
use Senac\Mvc\Entity\Video;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Video $video): bool
    {
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $video->url);
        $stmt->bindValue(2, $video->title);

        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();

        $video->setId(intVal($id));

        return $result;
    }

    public function update(Video $video): bool
    {
        $sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':url', $video->url);
        $stmt->bindValue(':title', $video->title);
        $stmt->bindValue(':id', $video->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        $videoList = $this->pdo
            ->query("SELECT * FROM videos;")
            ->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(
            function (array $videoData) {
                $video = new Video($videoData['url'], $videoData['title']);
                $video->setId($videoData['id']);

                return $video;
            },
            $videoList
        );
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }
}