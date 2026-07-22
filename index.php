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
            $url = "http://192.168.18.9:11434/api/chat";

            $curl = curl_init($url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json",
                "Accept: application/json"
            ]);

            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];

                $personagem = file_get_contents("personagem.json");
                $personagem_array = [json_decode($personagem, true)];

                $mensagens = file_get_contents("mensagens.json");
                $mensagens_array = json_decode($mensagens, true);
                
                $mensagens_array[] = [
                    "role" => "user",
                    "content" => $msg
                ];

                $m = array_merge($personagem_array, $mensagens_array);

                $dados = [
                    "model" => "llama3.1:8b-instruct-q4_K_M",
                    "messages" => $m,
                    "stream" => false
                ];

                $json = json_encode($dados);

                curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                
                $resposta_txt = curl_exec($curl);
                // true para transformar o txt em array ao enves de objeto
                $resposta_array = json_decode($resposta_txt, true);

                $resposta = $resposta_array["message"];
                $p = $resposta["content"];

                $m_novo = array_merge($mensagens_array, [$resposta]);
                $m_json = json_encode($m_novo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

                file_put_contents(
                    "mensagens.json",
                    $m_json
                );
                ?><script>
                    document.getElementById('p').innerText = <?php echo json_encode($p); ?>;
                    document.getElementById('main').style.backgroundImage = "var(--girl-1)"
                </script><?php
                
            } else {

            } ?>
    </div>
</body>
</html>