1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
<?php
// Work out the path to the database, so SQLite/PDO can connect
$root = __DIR__;
$database = $root . '/data/data.sqlite';
$dsn = 'sqlite:' . $database;
// Connect to the database, run a query, handle errors
$pdo = new PDO($dsn);
$stmt = $pdo->query(
    'SELECT
        title, created_at, body
    FROM
        post
    ORDER BY
        created_at DESC'
);
if ($stmt === false)
{
    throw new Exception('There was a problem running this query');
}
?>


<!DOCTYPE html>

<html>
    <head>
        <title>A blog application</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    </head>
    <body>
        <h1>Blog title</h1>
        <p>This paragraph summarises what the blog is about.</p>
        

        <?php for ($postId = 1; $postId <= 3; $postId++): ?>
            <h2>Article <?php echo $postId ?> title</h2>
            <div>dd Mon YYYY</div>
            <p>A paragraph summarising article <?php echo $postId ?>.</p>
            <p>
                <a href="#">Read more...</a>
            </p>
        <?php endfor ?>
    </body>
</html>