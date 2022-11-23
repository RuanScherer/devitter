<?php

include_once __DIR__ . "/../shared/middlewares/Authenticated.php";
include_once __DIR__ . "/../use-cases/update-user-profile/update-user-profile-controller.php";
include_once __DIR__ . "/../entities/User.php";
include_once __DIR__ . "/../shared/utils/get-name-two-letter-abbreviation.php";

$authenticated_user = unserialize($_SESSION['user']);
$authenticated_user_name_abbreviation = getNameTwoLetterAbbreviation($authenticated_user->name);

if (!empty($_POST)) {
  $user = $authenticated_user;
  $user->biography = $_POST["biography"];
  $user->dev_type = $_POST["dev_type"];

  UpdateUserProfileController::handle($user);
  header("Location: profile.php");
}

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

      <main class="h-fit max-w-4xl mx-auto mt-8 bg-gray-800/75 rounded-lg shadow">
        <div class="bg-emerald-500 h-24 rounded-t-lg"></div>

        <form class="p-4 flex flex-col items-stretch" method="POST">
          <div class="flex flex-col items-center justify-center w-20 h-20 -mt-14 mx-auto rounded-full border-2 border-neutral-300 bg-neutral-300 text-center font-bold text-3xl text-neutral-800">
            <?= $authenticated_user_name_abbreviation ?>
          </div>

          <h2 class="text-2xl text-center text-neutral-100 font-semibold mt-2">
            <?= $authenticated_user->name ?>
          </h2>
          <h3 class="text-md text-center text-neutral-300 leading-none mb-8">
            @<?= $authenticated_user->username ?>
          </h3>

          <label for="biography" class="text-neutral-50 ml-2 mb-2 font-medium">
            Biografia
          </label>
          <textarea
            name="biography"
            id="biography"
            placeholder="Diga um pouco sobre você"
            rows="3"
            class="rounded-lg p-4 block bg-gray-700/30 text-neutral-100 hover:bg-gray-700/50 focus:bg-gray-700/50 focus:outline-none caret-emerald-500 resize-none transition"
            maxlength="255"
            required
          ><?= $authenticated_user->biography ?></textarea>
          
          <label for="dev_type" class="text-neutral-50 ml-2 mb-2 mt-4 font-medium">
            Categoria
          </label>
          <select
            id="dev_type"
            name="dev_type"
            class="rounded-lg p-4 block bg-gray-700/30 text-neutral-100 hover:bg-gray-700/50 focus:bg-gray-700/50 focus:outline-none caret-emerald-500 resize-none transition"
          >
            <option value="Frontend" <?= $authenticated_user->dev_type == "Frontend" ? "selected" : "" ?>>Frontend</option>
            <option value="Backend" <?= $authenticated_user->dev_type == "Backend" ? "selected" : "" ?>>Backend</option>
            <option value="DevOps" <?= $authenticated_user->dev_type == "DevOps" ? "selected" : "" ?>>DevOps</option>
            <option value="Mobile" <?= $authenticated_user->dev_type == "Mobile" ? "selected" : "" ?>>Mobile</option>
            <option value="FullStack" <?= $authenticated_user->dev_type == "FullStack" ? "selected" : "" ?>>FullStack</option>
          </select>

          <button
            type="submit"
            class="block px-6 py-2 mt-8 bg-emerald-500 text-neutral-900 text-center text-md font-medium rounded-lg hover:bg-emerald-500/80 transition"
          >
            Salvar alterações
          </button>
        </form>
      </main>
    </div>

    <script>
      function toggleUserPopup() {
        const userPopup = document.getElementById("user-popup")
        userPopup.classList.toggle("hidden")
      }
    </script>
  </body>
</html>