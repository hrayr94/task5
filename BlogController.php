<?php

class BlogController
{
    public function __construct(
        private BlogPostRepository $repository,
        private int                $postsPerPage = 10
    )
    {
    }

    public function displayPosts(int $currentPage = 1): void
    {
        $totalPosts = $this->repository->getTotalPosts();
        $totalPages = (int)ceil($totalPosts / $this->postsPerPage);
        $offset = ($currentPage - 1) * $this->postsPerPage;

        $posts = $this->repository->getPaginatedPosts($this->postsPerPage, $offset);

        // Render the view
        include 'view.php';
    }
}
