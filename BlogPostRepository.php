<?php
class BlogPostRepository {
    public function __construct(private PDO $pdo) {}

    public function getPaginatedPosts(int $limit, int $offset): array {
        $stmt = $this->pdo->prepare("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $posts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new BlogPost(
                $row['id'],
                $row['title'],
                $row['content'],
                $row['created_at']
            );
        }

        return $posts;
    }

    public function getTotalPosts(): int {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM blog_posts");
        return (int) $stmt->fetchColumn();
    }
}
