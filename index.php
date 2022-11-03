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
    
    <title>Devitter | Home</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="scripts/tailwind-config.js"></script>
  </head>

  <body class="bg-gray-900">
    <main
      class="min-h-screen w-100 bg-center"
      style="background-image: url('assets/images/home-cover.jpg')"
    >
      <div class="h-screen w-100 p-8 bg-neutral-900 bg-opacity-80 flex flex-col items-center justify-center text-center">
        <div class="flex items-center gap-3 mb-8">
          <img class="w-9" src="assets/images/bird.svg" alt="Bird">
          <p class="text-xl text-neutral-50">Devitter<span class="text-emerald-500">.</span></p>
        </div>

        <h1 class="text-emerald-400 font-bold text-4xl">
          Fala, Dev!
        </h1>
        <h2 class="text-emerald-100 text-xl mt-2">
          Inspire-se e compartilhe ideias em uma rede feita especialmente para devs.
        </h2>

        <nav class="flex gap-4 mt-8">
          <a
            href="view/login.php"
            class="px-6 py-2 bg-neutral-50/20 text-neutral-50/75 text-lg font-medium rounded-lg hover:bg-neutral-50/30 hover:text-neutral-100 transition"
          >
            Entrar
          </a>
          <a
            href="view/register.php"
            class="px-6 py-2 bg-emerald-500 text-lg text-gray-900 font-medium rounded-lg hover:bg-emerald-500/80 transition"
          >
            Cadastrar-se
          </a>
        </nav>
      </div>
    </main>
  </body>
</html>