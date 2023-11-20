<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use CodeIgniter\I18n\Time;

?>
<div class="px-10 md:max-w-screen-md mx-auto mt-24 leading-loose">
    <div class="content-detail">
        <img src="<?= base_url('img/cover/' . $blog['gambar']); ?>" alt="" class="mb-3 w-full aspect-[16/9] h-auto object-cover rounded-lg m-auto shadow-lg">
        <!-- <img src="<?= $blog['gambar']; ?>" alt="" class="mb-3 w-full aspect-[16/9] h-auto object-cover rounded-lg m-auto shadow-lg"> -->
        <h1 class="mb-2 text-2xl font-extrabold"><?= $blog['judul']; ?></h1>


        <small class="opacity-50">Created by</small>

        <small class="flex items-center justify-start gap-3">
            <img src="<?= base_url('img/avatar/' . $author['gambar']); ?>" class="w-6 h-6 rounded-full" />
            <div class="small flex items-center gap-1">
                <?= $author['fullname']; ?>
                <button data-popover-target="popover-default" type="button">
                    <svg class="w-3 h-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill="currentColor" d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                        <path fill="#fff" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                    </svg>
                </button>
            </div>

        </small>


        <hr class="mt-3 mb-3 border-3 border-black dark:border-white" />
    </div>
    <article class="max-w-full prose prose-sm  dark:prose-invert">
        <div class="mb-3 text-gray-500 dark:text-gray-400 leading-9 text-justify"><?= $blog['text']; ?></div>
    </article>
    <div class="mt-5 comments">
        <h2 class="mt-5 text-1xl font-extrabold">Comments</h2>
        <hr class="mb-3 border-3 border-black dark:border-white" />
        <div class="reply">
            <?php if ($userUUID) : ?>
                <form method="POST" action="<?= base_url('blogs/comments/' . $blog['slug']); ?>">
                    <?= csrf_field(); ?>
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-zinc-50 dark:bg-zinc-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-zinc-800">
                            <?php if (isset($validation['comment']) || isset($validation['uuid'])) : ?>
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= isset($validation['comment'])  ? $validation['comment'] : $validation['uuid'] ?></p>
                            <?php endif; ?>
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" name="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-zinc-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..."> <?= old('comment'); ?></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Post comment
                            </button>

                            <small class="flex items-center justify-start gap-3">
                                <input type="hidden" value="<?= $userUUID['uuid']; ?>" name="uuid" required>
                                <img src="<?= base_url('img/avatar/' . $userUUID['gambar']); ?>" class="w-6 h-6 rounded-full" />
                                <div class="small flex items-center gap-1">
                                    <?= $userUUID['fullname']; ?>
                                    <?php if ($userUUID['uuid'] === $blog['penulis']) : ?>
                                        <button data-popover-target="popover-default" type="button">
                                            <svg class="w-3 h-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill="currentColor" d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                                <path fill="#fff" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </small>
                        </div>

                    </div>
                </form>
            <?php else : ?>
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-zinc-50 dark:bg-zinc-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-zinc-800">
                        <?php if (isset($validation['comment'])) : ?>
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium font-bold">Gagal!</span> <?= $validation['comment']; ?></p>
                        <?php endif; ?>
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" name="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-zinc-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..."> <?= old('comment'); ?></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <a href="<?= base_url('/login'); ?>" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post comment
                        </a>


                    </div>

                </div>
            <?php endif; ?>

        </div>
        <div class="mt-3 mb-3">
            <?php if ($comments) : ?>

                <?php foreach ($comments as $comment) : if ($comment['replyto'] == "0") : ?>
                        <section class="py-2 antialiased">


                            <article class="p-4 text-sm bg-white rounded-lg dark:bg-zinc-800">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center gap-2">
                                        <p class="inline-flex items-center  text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="<?= base_url('img/avatar/' . $comment['gambar']); ?>">
                                        <div class="small ">
                                            <div class="detail_comment">
                                                <div class="flex flex items-center gap-1">
                                                    <p class="line-clamp-1"> <?= $comment['fullname']; ?></p>
                                                    <?php if ($comment['userid'] === $blog['penulis']) : ?>
                                                        <button data-popover-target="popover-default" type="button">
                                                            <svg class="w-3 h-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill="currentColor" d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                                                <path fill="#fff" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                                            </svg>
                                                        </button>

                                                    <?php endif; ?>
                                                </div>
                                                <p class="text-xs text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022"><?= Time::parse($comment['created_at'])->toLocalizedString('MMM d, yyyy'); ?></time></p>

                                            </div>

                                        </div>
                                        </p>
                                    </div>
                                    <!-- <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:focus:ring-gray-600" type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button> -->
                                    <!-- Dropdown menu -->
                                    <!-- <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-zinc-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Remove</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Report</a>
                                            </li>
                                        </ul>
                                    </div> -->
                                </footer>
                                <p class="text-gray-500 dark:text-gray-400"><?= esc($comment['comments']); ?></p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button" onclick="replyTo('<?= $comment['hashid']; ?>')" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                        </svg>
                                        Reply
                                    </button>
                                </div>
                            </article>
                            <div class="brb-<?= $comment['hashid']; ?>"></div>
                            <?php foreach ($comments as $rpl) : ?>
                                <?php if ($rpl['replyto'] === $comment['hashid']) : ?>
                                    <article class="p-4 mb-3 ml-6 lg:ml-12 text-sm bg-white rounded-lg dark:bg-zinc-800 mt-3">
                                        <footer class="flex justify-between items-center mb-2">
                                            <div class="flex items-center gap-2">
                                                <p class="inline-flex items-center  text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="<?= base_url('img/avatar/' . $rpl['gambar']); ?>">

                                                <div class="small ">
                                                    <div class="detail_comment">
                                                        <div class="flex flex items-center gap-1">
                                                            <p class="line-clamp-1"> <?= $rpl['fullname']; ?></p>
                                                            <?php if ($rpl['userid'] === $blog['penulis']) : ?>
                                                                <button data-popover-target="popover-default" type="button">
                                                                    <svg class="w-3 h-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill="currentColor" d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                                                        <path fill="#fff" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                                                    </svg>
                                                                </button>

                                                            <?php endif; ?>
                                                        </div>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022"><?= Time::parse($comment['created_at'])->toLocalizedString('MMM d, yyyy'); ?></time></p>

                                                    </div>

                                                </div>
                                                </p>

                                            </div>
                                            <!-- <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                </svg>
                                                <span class="sr-only">Comment settings</span>
                                            </button> -->


                                        </footer>
                                        <p class="text-gray-500 dark:text-gray-400"><?= $rpl['comments']; ?></p>

                                    </article>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </section>
                <?php
                    endif;
                endforeach ?>
            <?php else : ?>
                <p class="text-center text-sm italic">Comment tidak ditemukan.</p>
            <?php endif; ?>
        </div>

    </div>
    <!-- button -->

    <?php if ($userUUID) :
        if ($userUUID['uuid'] === $blog['penulis']) :
    ?>
            <div data-dial-init class="fixed right-6 bottom-6 group">
                <div id="speed-dial-menu-dropdown-alternative-square" class="flex flex-col justify-end hidden py-1 mb-4 space-y-2 bg-white border border-gray-100 rounded-lg shadow-lg dark:bg-zinc-700 dark:border-gray-600">
                    <ul class="text-sm text-gray-500 dark:text-gray-300">
                        <li>
                            <a href="<?= base_url('/dashboard/blogs/edit/' . $blog['slug']); ?>" class="flex items-center px-5 py-2 border-b border-gray-200 hover:bg-zinc-100 dark:hover:bg-zinc-600 hover:text-gray-900 dark:hover:text-white dark:border-gray-600">
                                <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                </svg>
                                <span class="text-sm font-medium">Edit blog</span>
                            </a>
                        </li>
                        <li>
                            <form action="<?= base_url('/dashboard/blogs/delete/' . $blog['id']); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="flex items-center px-5 py-2 border-b border-gray-200 hover:bg-zinc-100 dark:hover:bg-zinc-600 hover:text-gray-900 dark:hover:text-white dark:border-gray-600">

                                    <svg class="w-3.5 h-3.5 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                    </svg>
                                    <span class="text-sm font-medium">Delete blog</span>
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
                <button type="button" data-dial-toggle="speed-dial-menu-dropdown-alternative-square" data-dial-trigger="click" aria-controls="speed-dial-menu-dropdown-alternative-square" aria-expanded="false" class="flex items-center justify-center ml-auto text-white  rounded-full w-14 h-14   bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                    </svg>
                    <span class="sr-only">Open actions menu</span>
                </button>
            </div>
    <?php endif;
    endif; ?>



    <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-zinc-800">
        <div class="px-3 py-2 bg-zinc-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-zinc-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">
                <div class="flex items-center gap-1">
                    <p>Akun Terverifikasi</p>
                    <svg class="w-3 h-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill="currentColor" d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                        <path fill="#fff" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                    </svg>
                </div>

            </h3>
        </div>
        <div class="px-3 py-2 ">
            <small class="text-center text-sm font-thin">Akun terverifikasi mengindikasikan bahwa akun tersebut merupakan author/pemilik blog</small>
        </div>
        <div data-popper-arrow></div>
    </div>

</div>
<?php if (session()->get('isLoggedIn') && $comments) : ?>
    <script>
        function replyTo(reply) {
            console.log(reply);
            var replyBuka = document.querySelector('.brb-' + reply);
            if (!replyBuka.innerHTML) {
                replyBuka.innerHTML = `<form method="POST" action="<?= base_url('blogs/comments/' . $blog['slug'] . '/'); ?>` + reply + `">
            <?= csrf_field(); ?>
    <label for="chat" class="sr-only">Your message</label>
    <div class="mt-3 flex items-center px-3 py-2 rounded-lg bg-zinc-50 dark:bg-zinc-700">
    <img class="mr-2 w-6 h-6 rounded-full" src="<?= base_url('img/avatar/' . $userUUID['gambar']); ?>">
    <input type="hidden" value="<?= $userUUID['uuid']; ?>" name="uuid" required>
        <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="comment" required></textarea>
            <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-zinc-600">
            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
            </svg>
            <span class="sr-only">Send message</span>
        </button>
    </div>
</form>`;

            } else {
                replyBuka.innerHTML = "";
            }
        }
    </script>
<?php else : ?>
    <script>
        function replyTo(reply) {
            location.href = "<?= base_url('/login'); ?>"
        }
    </script>
<?php endif; ?>
<script src="<?= base_url('js/text-editor.js'); ?>"></script>

<?= $this->endSection(''); ?>