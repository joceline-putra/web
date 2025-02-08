<?php
header('Content-type: application/xml; charset="ISO-8859-1"',true);  

// $created = date('c');
$created = '2024-05-04T00:22:00+07:00';
?>
 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
    <loc><?= base_url() ?></loc>
    <lastmod><?= $created ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.1</priority>
</url>
    <?php foreach($site as $i => $v) {?>
    <url>
        <loc><?= $v['url']; ?></loc>
        <lastmod><?= $created; ?></lastmod>
        <changefreq><?= $v['frequency'];?></changefreq>
        <priority><?= $v['priority'];?></priority>
        </url>
    <?php } ?>
</urlset>