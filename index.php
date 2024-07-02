<?php
require 'BlogPost.php';
require 'BlogPostRepository.php';
require 'BlogController.php';

$dsn = 'mysql:host=localhost;dbname=blogpost;charset=utf8mb4';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $repository = new BlogPostRepository($pdo);
    $controller = new BlogController($repository, 10); // 10 posts per page

    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $controller->displayPosts($currentPage);
} catch (PDOException $e) {
    echo $e->getMessage();
}