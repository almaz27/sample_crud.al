<p>
    Hello Pakistani
</p>
<table class="table">
    <?php foreach($posts as $post):?>
        <tr><td><?= $post->client_id?></td>
        <td><?= $post->status_availability?></td>
        <td><?= $post->total?></td></tr>

        <?php endforeach?>
</table>