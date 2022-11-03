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

    <title>Devitter | Login</title>
    <link rel="icon" type="imagem/svg" href="../assets/images/bird.svg" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="scripts/tailwind-config.js"></script>
  </head>

  <body class="bg-gray-900 text-emerald-500">
    <main class="min-h-screen w-100 bg-center" style="background-image: url('../assets/images/home-cover.jpg')">
      <div class="min-h-screen h-100 w-100 p-8 bg-neutral-900 bg-opacity-80 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
        <div class="flex flex-col w-fit h-fit gap-4 bg-gray-900/75 p-8 rounded-xl shadow-xl m-auto">
          <div class="flex items-center gap-3">
            <img class="w-9" src="../assets/images/bird.svg" alt="Bird">
            <p class="text-xl font-medium text-neutral-50">
              Devitter<span class="text-xl font-medium text-emerald-500">.</span>
            </p>
          </div>

          <div class="flex flex-col justify-between gap-8 max-w-sm mt-8">
            <div>
              <p class="text-5xl text-neutral-50 font-semibold">
                Entrar no Devitter<span class="text-emerald-500">.</span>
              </p>
              <p class="text-base text-neutral-300 mt-4">
                Não tem cadastro?
                <a class="text-base font-medium hover:text-emerald-300 transition" href="view/register.php">
                  Cadastrar-se
                </a>
              </p>
            </div>

            <form class="flex flex-col justify-between gap-4 max-w-sm">
              <label class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                  <img class="h-5 w-5 fill-slate-300" src="../assets/images/email.svg" alt="Email">
                </span>
                <input type="text" placeholder="Email" class="rounded-md w-full border-solid bg-gray-800/75 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2 pl-10 px-2 text-slate-200 transition" />
              </label>

              <label class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                  <img class="h-5 w-5 fill-slate-300" src="../assets/images/padlock.svg" alt="Padlock">
                </span>
                <input type="password" placeholder="Senha" class="rounded-md w-full border-solid bg-gray-800/75 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2 pl-10 px-2 text-slate-200 transition" />
              </label>
              <a class="w-fit text-sm text-neutral-300 font-medium hover:text-emerald-300 transition" href="">
                Esqueceu a senha?
              </a>
              <button class="px-6 py-2 mt-4 rounded-lg bg-emerald-500 text-lg text-gray-800 font-medium hover:bg-emerald-500/80 transition" type="submit">
                Entrar
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>