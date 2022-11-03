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
  </head>

  <body class="bg-gray-900 text-emerald-500">
    <div class="min-h-screen h-100 w-100 p-8">
        <div class="flex items-center gap-3">
            <img class="w-9" src="../assets/images/bird.svg" alt="Bird">
            <label class="relative block grid col-span-2">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <p class="text-xl">#</p>
                </span>
                <input
                  type="text"
                  name="search"
                  placeholder="Explore"
                  class="rounded-md w-full border-solid bg-gray-800/75 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-1 pl-10 px-4 text-slate-200 transition"
                />
           </label>
        </div> 
        <div>
            <button class="block h-6 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                <img class="h-full w-full object-cover" src="../assets/images/bird.svg" alt="">
            </button>
            <div class="bg-white rounded-lg py-2 w-32 mt-2 shadow-xl">
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Meu Perfil</a>
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Sair</a>
            </div>
        </div> 
    </div>     
  </body>
</html>