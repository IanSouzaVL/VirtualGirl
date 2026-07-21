from utilitarios import *
import json, requests
url = "http://localhost:11434/api/chat"
model = "llama3.1:8b-instruct-q4_K_M"

with open("mensagens.json", "r", encoding="utf-8") as arquivo:
    mensagens = json.load(arquivo)

dados = {
    "model": model,
    "messages": mensagens,
    "stream": False
}

user_content = input("Digite uma mensagem: ")


dados["messages"].append(
    {
        "role": "user",
        "content": user_content
    }
)

r = requests.post(url, json=dados, timeout=60)
r.raise_for_status()

ia_message_dict = r.json()["message"]

mensagens.append(ia_message_dict)

write_json(mensagens)
print(ia_message_dict["content"])