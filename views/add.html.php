<?php

use M2i\Mvc\Controller\BooksController;

 require 'partials/header.html.php';?>
<div class="max-w-5xl mx-auto px-3">
        <!-- <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
            <p>Le titre est invalide.</p>
            <p>Le prix est invalide.</p>
            <p>L'ISBN est invalide.</p>
            <p>L'auteur est invalide.</p>
            <p>La date est invalide.</p>
            <p>L'image est invalide.</p>
        </div> -->
        <form action="" method="post" class="w-1/2 mx-auto" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block">Titre *</label>
                <input type="text" name="title" id="title" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            <div class="mb-4">
                <label for="price" class="block">Prix *</label>
                <input type="text" name="price" id="price" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            <div class="mb-4">
                <label for="discount" class="block">Promotion</label>
                <input type="text" name="discount" id="discount" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            <div class="mb-4">
                <label for="isbn" class="block">ISBN *</label>
                <input type="text" name="isbn" id="isbn" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            <div class="mb-4">
                <label for="author" class="block">Auteur *</label>
                <input type="text" name="author" id="id_author" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            <div class="mb-4">
                <label for="published_at" class="block">Publié le *</label>
                <input type="date" name="published_at" id="published_at" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2">Image *</label>
                <input type="file" name="image" id="image" class="cursor-pointer w-full
                    file:rounded-full file:border-0 file:cursor-pointer
                    file:bg-blue-50 hover:file:bg-blue-100
                    file:font-semibold file:py-2 file:px-4 file:mr-4
                ">
            </div>

            <div class="text-center">
                <button class="bg-gray-900 px-4 py-2 text-white inline-block rounded hover:bg-gray-700 duration-200">Créer</button>
            </div>
        </form>
    </div>
    <?php require 'partials/footer.html.php';?>
