<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url() ?></loc>
        <lastmod><?= date('d-m-Y H:i:s') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.1</priority>
    </url>
    <?php foreach ($blogs as $blog) { ?>
        <url>
            <loc><?= base_url('post/' . $blog['slug']) ?></loc>
            <lastmod><?= $blog['created_at'] ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.1</priority>
        </url>
    <?php } ?>
</urlset>