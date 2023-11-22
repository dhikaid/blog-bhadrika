<?php
header('Content-type: application/xml; charset="ISO-8859-1"', true);
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc><?= base_url() ?></loc>
        <lastmod><?= date('d-m-Y H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?= base_url('/blogs') ?></loc>
        <lastmod><?= date('d-m-Y H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?= base_url('/pages/contact') ?></loc>
        <lastmod><?= date('d-m-Y H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.80</priority>
    </url>
    <?php foreach ($blogs as $blog) { ?>
        <url>
            <loc><?= base_url('blogs/' . $blog['slug']) ?></loc>
            <lastmod><?= $blog['created_at'] ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.64</priority>
        </url>
    <?php } ?>
</urlset>