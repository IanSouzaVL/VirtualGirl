from utilitarios import *
import json, requests
# url = "http://10.234.184.44:11434/api/chat"
url = "http://192.168.18.9:11434/api/chat"
model = "llama3.1:8b-instruct-q4_K_M"

with open("mensagens.json", "r", encoding="utf-8") as arquivo:
    mensagens = json.load(arquivo)

with open("personagem.json", "r", encoding="utf-8") as arquivo:
    system = json.load(arquivo)

dados = {
    "model": model,
    "messages": [system] + mensagens,
    "stream": False
}

while True:
    user_content = input("\033[32mConverse com Fern: \033[0m")
    print()

    dados["messages"].append(
        {
            "role": "user",
            "content": user_content
        }
    )

    try:
        r = requests.post(url, json=dados, timeout=60)
        r.raise_for_status()

        ia_message_dict = r.json()["message"]

        mensagens.append(ia_message_dict)

        write_json(mensagens)
        print(f"\033[38;2;171;71;188m{ia_message_dict["content"]}\033[0m\n")

    except requests.RequestException as e:
        print(f"Erro: {e}")