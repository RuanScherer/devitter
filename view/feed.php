<?php

include_once __DIR__ . "/../shared/middlewares/Authenticated.php";
include_once __DIR__ . "/../use-cases/create-post/create-post-controller.php";
include_once __DIR__ . "/../use-cases/get-followed-users-posts/get-followed-users-posts-controller.php";
include_once __DIR__ . "/../entities/Post.php";
include_once __DIR__ . "/../shared/utils/get-name-two-letter-abbreviation.php";
include_once __DIR__ . "/../use-cases/get_sugestions/get-sugestion-controller.php";

$authenticated_user = unserialize($_SESSION['user']);
$authenticated_user_name_abbreviation = getNameTwoLetterAbbreviation($authenticated_user->name);
$response_sugestion = GetSugestionController::handle($authenticated_user->id, $authenticated_user->dev_type);
$sugestions = $response_sugestion->data;

$post_creation_error_message = "";
if (!empty($_POST)) {
  $post = new Post();
  $post->content = $_POST["post_content"];
  $post->user = $authenticated_user;

  $response = CreatePostController::handle($post);
  if (isset($response) && !$response->isSuccess()) {
    $post_creation_error_message = $response->message;
  }
}

$responsePosts = GetFollowedUsersPostsController::handle($authenticated_user->id);
$posts = $responsePosts->data;

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

    <title>Devitter | Feed</title>
    <link rel="icon" type="imagem/svg" href="../assets/images/bird.svg" />

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

        <form method="POST">
          <label class="relative block grid col-span-2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fa-solid fa-hashtag text-emerald-500"></i>
            </span>
            <input
              type="text"
              name="search"
              placeholder="Explore"
              class="rounded-md w-full border-solid bg-gray-800/75 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2 pl-9 px-4 text-slate-200 transition"
            />
          </label>
        </form>

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
        <aside class="hidden lg:block lg:col-span-4 xl:col-span-3 rounded-lg shadow">
          <div class="bg-gray-800/75 rounded-lg">
            <div class="bg-emerald-500 h-24 rounded-t-lg"></div>

            <div class="p-4">
              <div class="flex flex-col items-center justify-center w-20 h-20 -mt-14 mx-auto rounded-full border-2 border-neutral-300 bg-neutral-300 text-center font-bold text-3xl text-neutral-800">
                <?= $authenticated_user_name_abbreviation ?>
              </div>

              <h2 class="text-2xl text-center text-neutral-100 font-semibold mt-2">
                <?= $authenticated_user->name ?>
              </h2>
              <h3 class="text-md text-center text-neutral-300 leading-none mb-8">
                @<?= $authenticated_user->username ?>
              </h3>

              <a
                href="profile.php"
                class="block px-6 py-2 bg-neutral-500/10 text-neutral-50/75 text-center text-md font-medium rounded-lg hover:bg-emerald-300/10 hover:text-neutral-100 transition"
              >
                Meu perfil
              </a>
            </div>
          </div>

          <?php if(count($sugestions) > 0): ?>
            <div class="bg-gray-800/75 rounded-lg">
              <h2 class="text-xl text-center text-neutral-100 font-semibold my-5">
                Quem seguir
              </h2>
              <?php foreach($sugestions as $key=>$sugestion): ?>
                <a href="user.php?user=<?= $sugestion->id ?>" class="flex flex-row w-full items-center p-4 mb-4 gap-2 hover:bg-gray-700/25 transition rounded-lg">
                  <div class="flex flex-row">
                    <div class="flex flex-col items-center justify-center w-10 h-10 mx-auto rounded-full border-2 border-neutral-300 bg-neutral-300 text-center font-bold text-lg text-neutral-800">
                      <?= getNameTwoLetterAbbreviation($sugestion->name) ?>
                    </div>
                  </div> 

                  <div class="flex flex-col items-start">
                    <p class="text-lg text-center text-neutral-100 font-semibold">
                      <?= $sugestion->name?>
                    </p>
                    <p class="text-md text-neutral-300 leading-none">
                      @<?= $sugestion->username ?>
                    </p>
                  </div>
              </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </aside>

        <main class="col-span-12 lg:col-span-8 xl:col-span-9">
          <form
            method="POST"
            class="flex flex-col items-stretch bg-gray-800/75 rounded-lg shadow"
          >
            <textarea
              name="post_content"
              placeholder="O que você está pensando?"
              rows="3"
              class="rounded-lg m-3 p-6 block bg-gray-700/30 text-neutral-100 hover:bg-gray-700/50 focus:bg-gray-700/50 focus:outline-none caret-emerald-500 resize-none transition"
              maxlength="255"
              required
            ></textarea>

            <?php
              if (isset($post_creation_error_message)) {
                echo '<span class="text-red-500 mx-3">' . $post_creation_error_message . '</span>';
              }
            ?>

            <button
              type="submit"
              class="mr-3 mb-3 px-6 py-2 self-end bg-emerald-500 text-md text-gray-900 font-medium rounded-lg hover:bg-emerald-500/80 transition"
            >
              Publicar
            </button>
          </form>

          <section class="flex flex-col items-stretch mt-4 bg-gray-800/75 rounded-lg shadow">
            <?php foreach($posts as $key=>$post): ?>
              <article class="px-4 py-6 border-b border-slate-700 text-neutral-200 last:border-b-0">
                <div class="flex items-center gap-3">
                  <a
                    href="user.php?user=<?= $post->user->id ?>"
                    class="flex flex-col items-center justify-center w-8 h-8 rounded-full bg-neutral-300 text-center font-bold text-neutral-800"
                  >
                    <?= getNameTwoLetterAbbreviation($post->user->name) ?>
                  </a>

                  <h4 class="text-lg font-semibold">
                    <?= $post->user->name ?>
                  </h4>
                </div>
                
                <p class="mt-3 leading-tight">
                  <?= $post->content ?>
                </p>

                <div class="flex items-center justify-between mt-3">
                  <a
                    href="#"
                    class="block w-fit px-4 py-1.5 bg-neutral-500/10 text-neutral-50/75 text-sm font-medium rounded-lg hover:bg-emerald-300/10 hover:text-neutral-100 transition"
                  >
                    <i class="fa-regular fa-comment mr-1"></i>
                    Comentar
                  </a>

                  <span class="text-sm text-neutral-300">
                    <?php
                      $created_at = strtotime($post->created_at);
                      echo date('d/m/Y', $created_at);
                    ?>
                  </span>
                </div>
              </article>
            <?php endforeach; ?>
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