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
    <div class="container mx-auto flex flex-col justify-between gap-4 min-h-screen">
        <div class="flex items-center gap-3 py-4">
            <img class="w-9" src="../assets/images/bird.svg" alt="Bird">
            <p class="text-xl text-neutral-50">Devitter<span class="text-emerald-500">.</span></p>
        </div>
        <div class="flex-col flex justify-between gap-4 max-w-sm">
            <p class="text-5xl text-neutral-50 py-5" >Entrar no Devitter<span class="text-emerald-500">.</span></p>
            <p class="text-base text-neutral-50">Não tem cadastro? <a class="text-base text-emerald-500 hover:text-emerald-700 transition" href="view/register.php">Cadastrar-se</a></p>
            <label class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <img class="h-5 w-5 fill-slate-300" src="../assets/images/email.svg" alt="Email">    
                </span>
                <input 
                    type="text"
                    placeholder="Email"
                    class="rounded-md w-full border-solid bg-gray-800 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2 pl-10 px-2 text-slate-200">
            </label>
            <label class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <img class="h-5 w-5 fill-slate-300" src="../assets/images/padlock.svg" alt="Padlock">    
                </span>
                <input 
                type="password"
                placeholder="Senha"
                class="rounded-md w-full border-solid bg-gray-800 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 py-2 pl-10 px-2 text-slate-200">
            </label>
            <a 
                class="text-sm text-emerald-500 hover:text-emerald-700 transition" 
                href="">Esqueceu a senha?</a>
            <button 
                class="rounded-lg text-neutral-50 bg-emerald-500 text-gray-800 h-9 hover:bg-emerald-700 transition font-bold" 
                type="submit">Entrar</button>
        </div>  
        <div></div>  
    </div>
  </body>
</html>