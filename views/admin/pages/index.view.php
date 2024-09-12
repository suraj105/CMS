<h1>Admin: Seiten verwalten</h1>

<?php if (!empty($pages)): ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Page</th>
                <th>Titel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pages AS $page): ?>
                <tr>
                    <td><?php echo e($page->id); ?></td>
                    <td><?php echo e($page->slug); ?></td>
                    <td><?php echo e($page->title); ?></td>
                    <td>
                        <form method="POST" action="./?route=admin/page/delete">
                            <input type="hidden" name="id" value="<?php echo e($page->id); ?>" />
                            <input type="submit" value="delete" class="button-as-link" />
                        </form>
                        <a href="./?route=admin/page/edit&id=<?php echo e($page->id); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>There are no pages created</p>
<?php endif; ?>

<br /><hr /><br />
<a href="./?route=admin/page/create">Create new pages</a>
<br /><hr /><br />

<input type="button" value="Log out!" onclick="window.location.href='./?route=admin/logout';">
