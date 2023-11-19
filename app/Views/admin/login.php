<?= $this->extend('admin/template/template'); ?>

<?= $this->section('contentAdmin'); ?>
<div class="px-10 md:max-w-screen-md mx-auto mt-24">
    <div class="w-full p-4 bg-white border border-zinc-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-zinc-800 dark:border-zinc-700">

        <form class="space-y-6" action="<?= base_url('admin/signin'); ?>" method="POST">

            <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                Sign in
            </h5>
            <div class="">
                <?php if (session()->getFlashdata('registration')) : ?>
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-zinc-900 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Success!</span> <?= session()->getFlashdata('registration'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('loginError')) : ?>
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-zinc-900 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Gagal!</span> <?= session()->getFlashdata('loginError'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <?= csrf_field(); ?>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                <input type="text" name="username" id="username" class="bg-zinc-50 border border-zinc-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-600 dark:border-zinc-500 dark:placeholder-gray-400 dark:text-white" value="<?= old('username'); ?>" />
                <?php if (isset($validation['username'])) : ?>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['username']; ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" class="bg-zinc-50 border border-zinc-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-600 dark:border-zinc-500 dark:placeholder-gray-400 dark:text-white" />
                <?php if (isset($validation['password'])) : ?>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['password']; ?></p>
                <?php endif; ?>
            </div>
            <div class="flex items-start">
                <!-- <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-zinc-300 rounded bg-zinc-50 focus:ring-3 focus:ring-blue-300 dark:bg-zinc-700 dark:border-zinc-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                </div> -->
                <!-- <a
              href="#"
              class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500"
              >Lost Password?</a
            > -->
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Login to your account
            </button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Not registered?
                <a href="<?= base_url('/register'); ?>" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(''); ?>