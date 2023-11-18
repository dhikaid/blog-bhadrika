<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class=" md:max-w-screen-md m-auto mt-24">
    <section class="px-10 md:max-w-screen-md mt-6 m-auto">

        <h2 class="text-1xl font-extrabold underline underline-offset-8 decoration-black-500">
            My Blog
        </h2>

        <!-- content -->
        <?php if (count($blogs) > 0) : ?>
            <div class="mt-5 grid md:grid-cols-2 gap-3">
                <?php foreach ($blogs as $blog) : ?>
                    <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 shadow-md mb-3 ">
                        <a href="<?= base_url('/blogs/' . $blog['slug']); ?>">
                            <img class="rounded-lg aspect-[16/9] object-cover h-full" src="<?= base_url('/img/' . $blog['gambar']); ?>" alt="image description">
                            <!-- <img class="rounded-lg aspect-[16/9] object-cover h-full" src="<?= $blog['gambar']; ?>" alt="image description"> -->
                        </a>
                        <figcaption class="absolute px-4 text-base text-white bottom-6 font-bold">
                            <p><?= $blog['judul']; ?></p>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-center text-sm mt-5">
                <p>Blogs not found.</p>
            </div>
        <?php endif; ?>


        <div class="m-auto mt-5">
            <?= $pager->links('blogs', 'blogs_pagination') ?>
        </div>
        <!-- <div class="mt-5 md:flex gap-3 mx-auto">
            <?php $count = 0; ?>
            <?php foreach ($blogs as $blog) : ?>
                <?php if ($count % 2 == 0) : ?>
                    <div class="md:w-1/2">
                    <?php endif; ?>

                    <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 shadow-lg mb-4">
                        <a href="<?= base_url('/blogs/' . $blog['slug']); ?>">
                            <img class="rounded-lg aspect-[16/9] object-cover h-full w-full" src="<?= base_url('/img/' . $blog['gambar']); ?>" alt="image description">
                        </a>
                        <figcaption class="absolute px-4 text-lg text-white bottom-6 font-bold">
                            <p><?= $blog['judul']; ?></p>
                        </figcaption>
                    </figure>

                    <?php if ($count % 2 == 1 || $count == count($blogs) - 1) : ?>
                    </div>
                <?php endif; ?>

                <?php $count++; ?>
            <?php endforeach; ?>
        </div> -->


    </section>
</div>


<?= $this->endSection(''); ?>