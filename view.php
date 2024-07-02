<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posts</title>
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }
            .pagination a {
                margin: 0 5px;
                padding: 8px 16px;
                text-decoration: none;
                border: 1px solid #680a68;
                color: #654949
            }
            .pagination a.active {
                background-color: #007bff;
                color: #fff;
            }
        </style>
</head>
<body>
<div class="posts">
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><?= htmlspecialchars($post->getTitle()) ?></h2>
            <p><?= nl2br(htmlspecialchars($post->getContent())) ?></p>
            <small>Posted on <?= htmlspecialchars($post->getCreatedAt()) ?></small>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
</body>
</html>