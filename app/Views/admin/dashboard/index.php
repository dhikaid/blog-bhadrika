<?= $this->extend('admin/dashboard/template'); ?>

<?= $this->section('contentAdminDashboard'); ?>




<div class="p-4 sm:ml-64">
    <section class="content p-4 mt-14 ">
        <h1 class="text-2xl">Hai, <span class="font-bold"><?= $user['fullname']; ?></span></h1>

        <div class="mt-3">
            <div class=" bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-full  dark:border-gray-700 dark:bg-zinc-800 p-4">
                <h3 class="text-2xl font-bold">EDIT PROFILE</h3>
                <hr class="mt-5 border-3 border-black dark:border-white">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Success!</span> <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('/dashboard/profile/save'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_uuid" value="<?= $user["uuid"]; ?>">
                    <div class="content">
                        <div class="mt-4 mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Profile</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-zinc-50 dark:text-gray-400 focus:outline-none dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" name="uploadGambar" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                            <?php if (isset($validation['gambar'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['gambar']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4 mb-3">
                            <label for="website-admin" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Full Name</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-zinc-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-zinc-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                    </svg>
                                </span>
                                <input type="text" name="fullname" id="website-admin" class="rounded-none rounded-e-lg bg-zinc-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green" value="<?= $user['fullname']; ?>">
                            </div>
                            <?php if (isset($validation['fullname'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['fullname']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4 mb-3">
                            <label for="website-admin" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Username</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-zinc-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-zinc-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                    </svg>
                                </span>
                                <input type="text" name="username" id="website-admin" class="rounded-none rounded-e-lg bg-zinc-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green" value="<?= $user['username']; ?>">
                            </div>
                            <?php if (isset($validation['username'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['username']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4 mb-3">
                            <label for="website-admin" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Email</label>
                            <div class="flex">

                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-zinc-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-zinc-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                                    </svg>

                                </span>
                                <input type="email" name="email" id="website-admin" class="rounded-none rounded-e-lg bg-zinc-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="me@bhadrikais.my.id" value="<?= $user['email']; ?>">
                            </div>
                            <?php if (isset($validation['email'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['email']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4 mb-3">
                            <label for="website-admin" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Password</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-zinc-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-zinc-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z" />
                                    </svg>
                                </span>
                                <input type="password" name="password1" id="website-admin" class="rounded-none rounded-e-lg bg-zinc-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Something secret...">
                            </div>
                            <?php if (isset($validation['password1'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['password1']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-4 mb-3">
                            <label for="website-admin" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Confirm Password</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-zinc-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-zinc-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z" />
                                    </svg>
                                </span>
                                <input type="password" name="password2" id="website-admin" class="rounded-none rounded-e-lg bg-zinc-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Something secret...">
                            </div>
                            <?php if (isset($validation['password2'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['password2']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 ">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>


<?= $this->endSection(); ?>