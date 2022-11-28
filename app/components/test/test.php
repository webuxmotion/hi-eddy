<section>
    <a href="/test/createFile">Create file</a>
    <a href="/test/deleteFiles">Delete all files</a>
    <h2>Functions</h2>

    <?php foreach ($functions as $function): ?>
        <a href="/test/<?=$function?>"><?=$function?></a>
    <?php endforeach; ?>
</section>