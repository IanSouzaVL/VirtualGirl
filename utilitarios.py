import json
def write_json(mensagens):
    with open("mensagens.json", "w", encoding="utf-8") as arquivo:
        json.dump(mensagens, arquivo, indent=4, ensure_ascii=False)