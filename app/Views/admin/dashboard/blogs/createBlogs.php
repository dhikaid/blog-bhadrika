<?= $this->extend('admin/dashboard/template'); ?>

<?= $this->section('contentAdminDashboard'); ?>



<div class="p-4 sm:ml-64">

    <section class="content p-4 mt-14 ">
        <div class="content-detail">

            <!-- error data -->
            <form action="<?= base_url('dashboard/blogs/save'); ?>" method="POST" enctype="multipart/form-data">
                <!-- amanin -->
                <?= csrf_field(); ?>
                <input type="hidden" name="creator" value="<?= $user['uuid']; ?>">
                <div class="mb-6">
                    <label for="Gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="gambar" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="gambar" type="file" name="gambar" class="hidden" />
                        </label>
                    </div>

                    <?php if (isset($validation['gambar'])) : ?>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['gambar']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-6">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" id="judul" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <?php if (isset($validation['judul'])) : ?>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['judul']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-6 ">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text</label>

                    <div class="text-editor-js bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <article class=" max-w-full prose prose-sm ">

                            <textarea id="editor" name="text" class=""><?= old('text'); ?></textarea>

                        </article>
                    </div>

                </div>



                <button type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">Post</button>
            </form>
        </div>
    </section>

</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script src="<?= base_url('js/text-editor.js'); ?>"></script>
<?= $this->endSection(); ?>