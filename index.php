<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualGirl</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        :root {
            --girl-1: url("./ASSETS/fern1.png");
            --girl-2: url("./ASSETS/fern2.png");
        }
        main {
            background-image: var(--girl-2);
        }
    </style>
</head>
<body>
    
    <main id="main">
        <div class="inpArea">
            <form action=""><input placeholder="Fale com fern: " type="text" name="msg" id="text"></form>
        </div>
    </main>
    <div class="resp">
        <p id="p"></p>      
            <?php

            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                



                ?><script>
                    document.getElementById('p').innerText = "Eu não estou brava, só estou cansada de ter que explicar as coisas o tempo inteiro. Sabe, tem horas que eu fico pensando se as pessoas realmente entendem o que é estar sobrecarregada, tentando lidar com tantas coisas ao mesmo tempo. Não é questão de ser bravo ou nervoso, é só uma sensação de estar sendo puxada para todos os lados e, mesmo assim, ser a última a ser ouvida. Isso cansa, sabe? E quando eu fico quieta ou pareço distante, não é porque estou brava, é só uma forma de proteger a minha paz, de não permitir que tudo ao redor me sobrecarregue ainda mais. É difícil às vezes equilibrar tudo, manter a calma e o sorriso, quando tudo que eu quero é poder ser ouvida de verdade, sem que as pessoas pensem que minha expressão fechada é um sinal de raiva. Mas ok, se você acha que estou brava, então talvez seja a maneira que tenho de me proteger. Só não me interprete errado, por favor.";
                    document.getElementById('main').style.backgroundImage = "var(--girl-1)"
                </script><?php
                
            } else {

            } ?>
    </div>
</body>
</html>