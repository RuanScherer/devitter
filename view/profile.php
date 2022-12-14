<?php

include_once __DIR__ . "/../shared/middlewares/Authenticated.php";
include_once __DIR__ . "/../use-cases/get-user-posts/get-user-posts-controller.php";
include_once __DIR__ . "/../shared/utils/get-name-two-letter-abbreviation.php";

$authenticated_user = unserialize($_SESSION['user']);
$authenticated_user_name_abbreviation = getNameTwoLetterAbbreviation($authenticated_user->name);

$response = GetUserPostsController::handle($authenticated_user->id);
$user_posts = $response->data;

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles/global.css" />

    <title>Devitter | Meu Perfil</title>
    <link rel="shortcut icon" href="../assets/images/bird.svg" type="image/svg">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="scripts/tailwind-config.js"></script>
    <script src="https://kit.fontawesome.com/0fc61897ab.js" crossorigin="anonymous"></script>
  </head>

  <body class="bg-gray-900">
    <div class="container mx-auto p-8">
      <header class="flex items-center justify-between gap-3">
        <a href="feed.php">
          <img
            class="w-9 hidden sm:block"
            src="../assets/images/bird.svg"
            alt="Bird"
          />
        </a>

        <div class="relative">
          <button
            class="flex flex-col items-center justify-center w-10 h-10 rounded-full focus:outline-none bg-neutral-300 text-center font-bold text-neutral-800"
            onclick="toggleUserPopup()"
          >
            <?= $authenticated_user_name_abbreviation ?>
          </button>
          
          <nav
            id="user-popup"
            class="hidden absolute top-10 right-0 bg-gray-700 font-semibold rounded-lg py-2 w-32 mt-2 shadow-lg"
          >
            <a href="profile.php" class="block px-4 py-2 text-neutral-100 hover:bg-emerald-500/10">
              Meu Perfil
            </a>
            <a href="../shared/middlewares/Logout.php" class="block px-4 py-2 text-red-500 hover:bg-emerald-500/10">
              Sair
            </a>
          </nav>
        </div>
      </header>

      <div class="grid grid-cols-12 gap-8 mt-8">
        <aside class="col-span-12 h-fit lg:block lg:col-span-4 xl:col-span-3 bg-gray-800/75 rounded-lg shadow">
          <div class="bg-emerald-500 h-24 rounded-t-lg"></div>

          <div class="p-4">
            <div class="flex flex-col items-center justify-center w-20 h-20 -mt-14 mx-auto rounded-full border-2 border-neutral-300 bg-neutral-300 text-center font-bold text-3xl text-neutral-800">
              <?= $authenticated_user_name_abbreviation ?>
            </div>

            <h2 class="text-2xl text-center text-neutral-100 font-semibold mt-2">
              <?= $authenticated_user->name ?>
            </h2>
            <h3 class="text-md text-center text-neutral-300 leading-none">
              @<?= $authenticated_user->username ?>
            </h3>

            <?= "<p class='text-neutral-200 text-center mt-4'>" . $authenticated_user->biography . "</p>" ?>

            <?php if($authenticated_user->dev_type != null): ?>
              <span class="w-fit mx-auto block mt-2 text-sm font-medium text-neutral-900 rounded-lg bg-emerald-500 px-3 py-1">
                <?= $authenticated_user->dev_type ?>
              </span>
            <?php endif; ?>

            <a
              href="edit-profile.php"
              class="block px-6 py-2 mt-4 bg-neutral-500/10 text-neutral-50/75 text-center text-md font-medium rounded-lg hover:bg-emerald-300/10 hover:text-neutral-100 transition"
            >
              Editar perfil
            </a>
          </div>
        </aside>

        <main class="col-span-12 lg:col-span-8 xl:col-span-9">
          <h2 class="text-2xl text-neutral-50 font-medium">Meus posts</h2>
          <section class="flex flex-col items-stretch mt-4 bg-gray-800/75 rounded-lg shadow">
            <?php foreach($user_posts as $key=>$post): ?>
              <article class="px-4 py-6 border-b border-slate-700 text-neutral-200 last:border-b-0">
                <div class="flex items-center gap-3">
                  <div class="flex flex-col items-center justify-center w-8 h-8 rounded-full bg-neutral-300 text-center font-bold text-neutral-800">
                    <?= getNameTwoLetterAbbreviation($post->user->name) ?>
                  </div>

                  <h4 class="text-lg font-semibold">
                    <?= $post->user->name ?>
                  </h4>
                </div>
                
                <p class="mt-3 leading-tight">
                  <?= $post->content ?>
                </p>

                <div class="flex items-center justify-end mt-2">
                  <span class="text-sm text-neutral-300">
                    <?php
                      $created_at = strtotime($post->created_at);
                      echo date('d/m/Y', $created_at);
                    ?>
                  </span>
                </div>
              </article>
            <?php endforeach; ?>

            <?php if(count($user_posts) < 1): ?>
              <div class="p-8 bg-gray-800/75 rounded-lg shadow">
                <p class="text-lg text-neutral-200">Parece que voc?? ainda n??o publicou nada.</p>
              </div>
            <?php endif; ?>
          </section>
        </main>
      </div>
    </div>

    <script>
      function toggleUserPopup() {
        const userPopup = document.getElementById("user-popup")
        userPopup.classList.toggle("hidden")
      }
    </script>
  </body>
</html>